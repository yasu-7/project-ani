<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Comment;
use App\Models\Reason;
use App\Models\Rank;
use App\Models\Like;
use App\Http\Requests\PostRequest;
use App\Http\Requests\AnimeRequest;
use App\Http\Requests\CommentpRequest;
use App\Http\Requests\RankRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /*-- アニメ投稿一覧の表示--*/
    public function  index(Reason $reason, Rank $rank)
    {
        
        $rankings = $reason->orderBy('updated_at', 'DESC')->get();
        
        return view('posts.index')->with([ 'rankings' => $rankings]);
    }
    
    /*-- アニメ一覧の表示--*/
    public function show(Anime $anime)
    {
        $like=Like::where('user_id', Auth::id())->first();
        
        $animes = $anime->get();
        return view('posts.anime', compact('animes', 'like'));
    }
    
    /*-- 口コミの表示--*/
    public function show_comment(Comment $comment)
    {
        return view('posts.comment')->with(['comments' => $comment->getByLimit()]);
    }
    
    /*-- アニメ一覧の表示--*/
    public function show_post(Post $post)
    {
        return view('posts.anime_rate_v')->with(['posts' => $post->getByLimit()]);
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
    public function comment(Comment $comment, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['comment'];
        $input += ['user_id' => $request->user()->id];
        $comment->fill($input)->save();
        return redirect('/posts/comment');
    }
    
    /*--アニメ作成用--*/
    public function rate_post(Post $post, Request $request, Anime $anime) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/posts/anime_rate_v');
    }
    
    public function rank_post(Reason $reason, Rank $rank, Request $request) // 引数をRequestからPostRequestにする
    {
        $user_id = Auth::id();
        $input_rank = $request['rank'];
        $input_commentp = $request['comment'];
        $input_commentp += ['user_id' => $user_id];
        $reason->fill($input_commentp)->save();
        
        
        $comment_id = $reason->orderBy('id', 'DESC')->first()->id;
        
        foreach(array_map(null,$input_rank['number'], $input_rank['title']) as [$number,$title])
        {
            $rank = new Rank();
            $rank->number = $number;
            $rank->title = $title;
            $rank->user_id = $user_id;
            $rank->reason_id = $comment_id;
            $rank->save();
        }
        
        return redirect('/');
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
        return view('posts.anime_rate')->with(['anime' => $anime,'post' => $post]);
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

