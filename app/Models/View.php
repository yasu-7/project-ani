<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'anime_id',
        'user_id',
        ];
        
    public $timestamps = false; // 追加
    
    // Userに対するリレーション
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }
    
    // Animeに対するリレーション
    public function animes() 
    {
        return $this->belongsToMany(Anime::class);
    }
    
}
