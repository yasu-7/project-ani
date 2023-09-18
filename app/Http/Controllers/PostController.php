<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getByLimit()]);
    }
    
    public function roll(Anime $anime)
    {
        return view('posts.anime')->with(['animes' => $anime->getByLimit()]);
    }
    
    public function roll2(Comment $comment)
    {
        return view('posts.comment')->with(['comments' => $comment->getByLimit()]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function show()
    {
        return view('posts.anime');
    }
    
    public function show2()
    {
        return view('posts.comment');
    }
}

