<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'title',
        'number',
        'user_id',
        'commentp_id',
        ];
        
    public $timestamps = false; // 追加
    
    
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
    
    public function commentp(){
    return $this->belongTo(Commentp::class);
    }
    
}
