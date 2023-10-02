<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnnictController extends Controller
{
    public function  show_annict()
    {
        return view('anime.show');
    }
    
    public function search_annict(Request $request)
    {
        $title=$request->input('title');
        $access_token = config('services.annict.access_token');
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_title={$title}";
        $response = Http::get($url);
        $datas = $response->json($key = null, $default = null)["works"];
        $count = $response->json($key = null, $default = null)["total_count"];
        return view("anime.search")->with(["datas"=> $datas, "count" => $count]);
    }
    
}
