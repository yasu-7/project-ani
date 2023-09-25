<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    
    // Likeに対するリレーション
    public function likes() 
    {
        return $this->belongsToMany(Like::class);
    }
    
    // Viewに対するリレーション
    public function views() 
    {
        return $this->belongsToMany(View::class);
    }
    
    // Categoryに対するリレーション
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
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
}
