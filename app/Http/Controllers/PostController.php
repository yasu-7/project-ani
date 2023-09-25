<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Comment;
use App\Models\Commentp;
use App\Models\Rank;
use App\Http\Requests\PostRequest;
use App\Http\Requests\AnimeRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /*-- アニメ投稿位の表示--*/
    public function index(Commentp $commentp)
    {
        return view('posts.index')->with(['commentps' => $commentp->getByLimit()]);
    }
    
    /*-- アニメ一覧の表示--*/
    public function show(Anime $anime)
    {
        return view('posts.anime')->with(['animes' => $anime->getByLimit()]);
    }
    
    /*-- 口コミの表示--*/
    public function show_comment(Comment $comment)
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
    
    /*--口コミ作成用--*/
    public function store(Comment $comment, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['comment'];
        $input += ['user_id' => $request->user()->id];
        $comment->fill($input)->save();
        return redirect('/posts/comment');
    }
    
    /*--アニメ作成用--*/
    public function store_p(Post $post, AnimeRequest $request, Anime $anime) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/anime');
    }
    
    
    /*--口コミ編集--*/
    public function edit(Comment $comment)
    {
        if(Auth::id() == $comment->user_id){
        return view('posts.comment_edit')->with(['comment' => $comment]);
        
        } else {
            return redirect('/posts/comment');
        }
    }
    
    /*--口コミ編集--*/
    public function rate(Anime $anime, Post $post)
    {
        return view('posts.anime_rate')->with(['anime' => $anime]);
        return view('posts.anime_rate')->with(['posts' => $post]);
        
    }
    
    public function update(PostRequest $request, Comment $comment)
    {
    $input_comment = $request['comment'];
    $comment->fill($input_comment)->save();

    return redirect('/posts/comment');
    }
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/');
    }

}

