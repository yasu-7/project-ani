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
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    // Rankに対するリレーション
    //「1対多」の関係なので単数系に
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
