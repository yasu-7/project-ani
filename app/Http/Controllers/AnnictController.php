<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class AnnictController extends Controller
{
    public function  show_annict()
    {
        return view('anime.show');
    }
    
    public function search_annict(Request $request)
    {
        
        if ($request->input('title') == null){
            $count = 0;
             return view("anime.search")->with(["count" => $count]);
        }else{
        $title=$request->input('title');
        $access_token = config('services.annict.access_token');
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_title={$title}";
        $response = Http::get($url);
        $datas = $response->json($key = null, $default = null)["works"];
        $count = $response->json($key = null, $default = null)["total_count"];
        
        $count_num =  count($datas);

        for($i = 0; $i < $count_num; $i++){
            if (empty($datas[$i]["images"]["recommended_url"])){
                $datas[$i]["images"]["recommended_url"] = "https://res.cloudinary.com/doyffsenj/image/upload/v1697170709/kyzyghyxq4mdkrso70zk.png";
        }
        }
        
        $new = "https://api.annict.com/v1/works?access_token={$access_token}&filter_season=2023-autumn&page=2";
        $new =  Http::get($new);
        //dd($new);
        $recent_data = $new->json($key = null, $default = null)["works"];
        
        $perPage = 5;
        $page = Paginator::resolveCurrentPage('page');
        
        $paginatedData = new LengthAwarePaginator($recent_data , $perPage, $page, $page, array('path'=>'/search'));
        
        return view("anime.search")->with(["datas"=> $datas, "count" => $count_num, "recent" => $paginatedData, "data_new" => $recent_data]);
        }
    }
    
}
