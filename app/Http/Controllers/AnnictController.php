<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class AnnictController extends Controller
{
    public function  show_annict()
    {
        $access_token = config('services.annict.access_token');
        
        //最近のアニメ
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_season=2023-autumn&per_page=50";
        $response =  Http::get($url);
        //dd($new);
        $datas = $response->json($key = null, $default = null)["works"];
        
        $coll = collect($datas);
        
        $data = $this->paginate($coll, 5, null, ['path'=>'/anime/show']);
        $page = null ?: (Paginator::resolveCurrentPage() ?: 1);
        
        //dd($page);
        return view('anime.show', compact('data', 'page'));
    }
    
    private function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        //dd($page);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    
    
    public function  show_season()
    {
        return view('anime.show_season');
    }
    
    
    public function search_annict(Request $request)
    {
        
        if ($request->input('title') == null){
            $count = 0;
             return view("anime.search")->with(["count" => $count]);
        }else{
        $title=$request->input('title');
        $access_token = config('services.annict.access_token');
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_title={$title}&per_page=50";
        $response = Http::get($url);
        $datas = $response->json($key = null, $default = null)["works"];
        $count = $response->json($key = null, $default = null)["total_count"];
        
        $count_num =  count($datas);

        for($i = 0; $i < $count_num; $i++){
            if (empty($datas[$i]["images"]["recommended_url"])){
                $datas[$i]["images"]["recommended_url"] = "https://res.cloudinary.com/doyffsenj/image/upload/v1697170709/kyzyghyxq4mdkrso70zk.png";
        }
        }
        
        return view("anime.search")->with(["datas"=> $datas, "count" => $count_num]);
        }
    }
    
    public function search_season(Request $request)
    {
        //dd($request);
        
        $request->validate([
	        'period' => 'required|integer',
        ]);
        
        $period=$request->input('period');
        $season=$request->input('season');
        $access_token = config('services.annict.access_token');
        $url = "https://api.annict.com/v1/works?access_token={$access_token}&filter_season={$period}-{$season}&per_page=50";
        $response = Http::get($url);
        if ($response->successful()){
        //dd($response->successful());
            $datas = $response->json($key = null, $default = null)["works"];
            $count = $response->json($key = null, $default = null)["total_count"];
            
            $count_num =  count($datas);
            for($i = 0; $i < $count_num; $i++){
                if (empty($datas[$i]["images"]["recommended_url"])){
                    $datas[$i]["images"]["recommended_url"] = "https://res.cloudinary.com/doyffsenj/image/upload/v1697170709/kyzyghyxq4mdkrso70zk.png";
                }
            }
        } else {
            $count = 0;
            //dd($request);
            $period = $request->input('period');
            return view("anime.search_season")->with(["count" => $count, "period" => $period]);
        }
        
        return view("anime.search_season")->with(["datas"=> $datas, "count" => $count_num, "period" => $period]);
        
    }
    
}
