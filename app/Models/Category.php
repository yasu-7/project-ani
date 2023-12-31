<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    //Animeに対するリレーション「1対多」の関係なので'posts'と複数形に
    public function animes() 
    {
        return $this->hasMany(Anime::class);
    }
}
