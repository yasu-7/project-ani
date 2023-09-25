<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
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
    
    // commentに対するリレーション
    public function comment() 
    {
        return $this->hasOne(Comment::class);
    }
    
    // comment_postに対するリレーション
    public function commentp() 
    {
        return $this->hasOne(Commentp::class);
    }
    
    
    // Postに対するリレーション
    //「多対1」の関係なので単数系に
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
    
    // Rankに対するリレーション
    //「1対多」の関係なので単数系に
    public function ranks()
    {
        return $this->hasMany(Rank::class);
    }
}
