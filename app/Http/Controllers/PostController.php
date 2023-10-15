<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Comment;
use App\Models\Reason;
use App\Models\Rank;
use App\Models\Like;
use Cloudinary;
use App\Models\AccessCounter;
use App\Http\Requests\PostRequest;
use App\Http\Requests\AnimeRequest;
use App\Http\Requests\CommentpRequest;
use App\Http\Requests\RankRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
    
    /*--アニメ詳細画面--*/
    public function anime_view($id)
    {
        $make= Anime::where('id', $id);
        //animeテーブルにID
        if ($make->exists() == null){
        $access_token = config('services.annict.access_token');
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_ids={$id}";
        $response = Http::get($url);
        $datas = $response->json($key = null, $default = null)["works"];
        $count = $response->json($key = null, $default = null)["total_count"];
        
        //アニメテーブルにデータを挿入
        $anime = New Anime();
        $anime->id = $datas[$count-1]["id"];
        $anime->name = $datas[$count-1]["title"];
        $anime->body = $datas[$count-1]["id"];
        $anime->link = $datas[$count-1]["wikipedia_url"];
        $anime->image = $datas[$count-1]["images"]["recommended_url"];
        //urlが正常に挿入できるか判断
        if ($anime->images == null){
            $anime->image = "https://res.cloudinary.com/doyffsenj/image/upload/v1697170709/kyzyghyxq4mdkrso70zk.png";
        }
        $anime->era = $datas[$count-1]["released_on"];
        $anime->category_id = 1;
        $anime->save();
        }
        
        $anime = Anime::find($id);
        
        $accessCounter = AccessCounter::where('anime_id', $anime->id);
        if ($accessCounter->exists() == null){
            $accessCounter = New AccessCounter();
            $accessCounter->anime_id = $anime->id;
            $accessCounter->count = 1;
            $accessCounter->save();
        } else{
            $accessCounter = AccessCounter::where('anime_id', $anime->id)->first();
            //dd($accessCounter);
            $accessCounter->count += 1;
            $accessCounter->save();
        }
        return view('posts.anime_view')->with(['anime' => $anime, 'accessCounter' => $accessCounter]);
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
        $make= Anime::where('id', $input["anime_id"]);
        
        //animeテーブルにID
        if ($make->exists() == null){
        $access_token = config('services.annict.access_token');
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_ids={$input["anime_id"]}";
        $response = Http::get($url);
        $datas = $response->json($key = null, $default = null)["works"];
        $count = $response->json($key = null, $default = null)["total_count"];
        
        //アニメテーブルにデータを挿入
        $anime = New Anime();
        $anime->id = $datas[$count-1]["id"];
        $anime->name = $datas[$count-1]["title"];
        $anime->body = $datas[$count-1]["id"];
        $anime->link = $datas[$count-1]["wikipedia_url"];
        $anime->image = $datas[$count-1]["images"]["recommended_url"];
        //urlが正常に挿入できるか判断
        if ($anime->images == null){
            $anime->image = "https://res.cloudinary.com/doyffsenj/image/upload/v1697170709/kyzyghyxq4mdkrso70zk.png";
        }
        $anime->era = $datas[$count-1]["released_on"];
        $anime->save();
        }
        //postをテーブルに挿入
        $post = New Post();
        $post->anime_id = $input['anime_id'];
        $post->title = $input["title"];
        $post->body = $input["body"];
        $post->rate = $input["rate"];
        $post->user_id = $input["user_id"];
        $post->save();
        return redirect('/posts/anime_rate_v');
    }
    
     /*--アニメranking投稿--*/
    public function rank_post(Reason $reason, Rank $rank, Request $request) // 引数をRequestからPostRequestにする
    {
        $user_id = Auth::id();
        $input_rank = $request['rank'];
        $input_reason = $request['reason'];
        $input_reason += ['user_id' => $user_id];
        $reason->fill($input_reason)->save();
        
        
        $reason_id = $reason->orderBy('id', 'DESC')->first()->id;
        
        foreach(array_map(null,$input_rank['number'], $input_rank['title']) as [$number,$title])
        {
            $rank = new Rank();
            $rank->number = $number;
            $rank->title = $title;
            $rank->user_id = $user_id;
            $rank->reason_id = $reason_id;
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
    
    /*--評価投稿--*/
    public function rate($id,Post $post)
    {
        $access_token = config('services.annict.access_token');
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_ids={$id}";
        $response = Http::get($url);
        $datas = $response->json($key = null, $default = null)["works"];
        $count = $response->json($key = null, $default = null)["total_count"];
        
        return view('posts.anime_rate')->with(['datas' => $datas,'post' => $post,"count" => $count]);
    }
    
    public function update(PostRequest $request, Comment $comment)
    {
    $input_comment = $request['comment'];
    $comment->fill($input_comment)->save();

    return redirect('/posts/comment');
    }
    
    /*--アニメranking投稿編集--*/
    public function edit_ranking($id,Reason $reason, Rank $rank)
    {
        $reason = Reason::where('user_id',$id)->first();
        $rank = Rank::where('user_id',$id)->get()->toArray();
        $user = Auth::user();
        return view('posts.edit')->with(['rank' => $rank, 'reason' => $reason, 'user' => $user]);
    }
    
    public function update_ranking(Request $request,Reason $reason, Rank $rank)
    {
        $user_id = Auth::id();
        $user = Auth::user();
        //dd($user_id);
        $input_rank = $request['rank'];
        $input_reason = $request['reason'];
        $input_reason += ['user_id' => $user_id];
        $reason_id = $input_reason['id'];
        DB::table('reasons')->where('user_id',$user_id)->delete();
        DB::table('ranks')->where('user_id',$user_id)->delete();
        
        $reason->fill($input_reason)->save();
        //dd($reason);
        $reason_id = $user->reason->id;
        
        foreach(array_map(null,$input_rank['number'], $input_rank['title']) as [$number,$title])
        {
            $rank = new Rank();
            $rank->number = $number;
            $rank->title = $title;
            $rank->user_id = $user_id;
            $rank->reason_id = $reason_id;
            $rank->save();
        }
        
        return redirect('/');
    }
    
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/');
    }

}

