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
        'rank_id',
        'reason_id',
        
        ];
    
    //Animeに対するリレーション「1対多」の関係なので'posts'と複数形に
    public function anime() 
    {
        return $this->belongsTo(Anime::class);
    }
    
    //Userに対するリレーション「多対1」の関係なので'posts'と複数形に
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
    public function getByLimit(int $limit_count = 5)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
}
