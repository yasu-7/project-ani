<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Anime extends Model
{
    use HasFactory;
    
    public $timestamps = false; // 追加
    // Likeに対するリレーション
    public function likes() 
    {
        return $this->hasMany(Like::class);
    }
    
    // Viewに対するリレーション
    public function accesscounter() 
    {
        return $this->belongsTo(AccessCOunter::class);
    }
    
    
    // Postに対するリレーション
    //「1対多」の関係なので単数系に
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    // Rankに対するリレーション
    //「1対多」の関係なので単数系に
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
    
    public function getByLimit(int $limit_count = 5)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('id')->limit($limit_count)->get();
    }
    
    public function is_like()
    {
        return is_null(Like::where('anime_id', $this->id)->where('user_id', Auth::id())->first());
    }
    
    public function is_look()
    {
        return is_null(View::where('anime_id', $this->id)->where('user_id', Auth::id())->first());
    }
}
