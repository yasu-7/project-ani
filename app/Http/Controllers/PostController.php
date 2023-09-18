<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Comment;
use App\Http\Requests\PostRequest;

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
    
    /*--アニメ投稿--*/
    public function create()
    {
        return view('posts.create');
    }
    
    /*--口コミ投稿--*/
    public function create_c()
    {
    return view('posts.comment_create');
    }
    
    /*--アニメ一覧--*/
    public function show()
    {
        return view('posts.anime');
    }
    
    /*--口コミ一覧--*/
    public function show2()
    {
        return view('posts.comment');
    }
    
    /*--口コミ作成用--*/
    public function store(Comment $comment, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/posts/' . $comment->id);
    }
    
    /*--口コミ編集--*/
    public function edit(Comment $comment)
    {
        return view('posts.edit')->with(['comment' => $comment]);
    }
    
    public function update(PostRequest $request, Comment $comment)
    {
    $input_comment = $request['comment'];
    $comment->fill($input_comment)->save();

    return redirect('/posts/' . $comment->id);
    }
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/');
    }
}

