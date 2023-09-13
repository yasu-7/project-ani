<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
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
    
}
