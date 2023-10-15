<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anime;
use App\Models\View;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function look(Anime $anime, Request $request){
        $like = New View();
        $like->anime_id = $anime->id;
        $like->user_id = Auth::id();
        $like->save();
        return back();
    }
    
    public function unlook(Anime $anime, Request $request){
        $user=Auth::id();
        $like=View::where('anime_id', $anime->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }
}
