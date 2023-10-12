<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\View;

class AccessController extends Controller
{
    
    public function index(Anime $anime, Request $request)
    {
    
        $accessCounter = New View();
        $accessCounter->anime_id = $anime->id;
        $accessCounter->user_id = Auth::id();
        $accessCounter->increment('count');
        $accessCounter->save();
    
        return view('posts.anime_view')->with(['accessCounter' => $accessCounter]);
    }
    
    
}
