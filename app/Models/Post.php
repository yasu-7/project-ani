<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'rate',
        'number',
        'name',
        'image',
        'link',
        'era',
        'category_id',
        'anime_id',
        'user_id',
        
        ];
    
    //Animeに対するリレーション「1対多」の関係なので'posts'と複数形に
    public function animes() 
    {
        return $this->hasMany(Anime::class);
    }
    
    //Userに対するリレーション「多対1」の関係なので'posts'と複数形に
    public function user() 
    {
        return $this->hasMany(User::class);
    }
}
