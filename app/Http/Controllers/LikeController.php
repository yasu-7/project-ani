<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anime;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Anime $anime, Request $request){
        $like = New Like();
        $like->anime_id = $anime->id;
        $like->user_id = Auth::id();
        $like->save();
        return back();
    }
    
    public function unlike(Anime $anime, Request $request){
        $user=Auth::id();
        $like=Like::where('anime_id', $anime->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }
}
