<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessCounter extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'count',
        'anime_id',
        'id',
    ];
    
    public $timestamps = false; // 追加
    
    // Userに対するリレーション
    
    // Animeに対するリレーション
    public function anime() 
    {
        return $this->hasOne(Anime::class);
    }
}
