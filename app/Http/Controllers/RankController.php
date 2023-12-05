<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Rank;
use App\Models\Commentp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RankController extends Controller
{
    
    public function  ranking(Post $post, Anime $anime)
    {
        
        $ratings = Post::select('anime_id')->selectRaw('AVG(rate) as rate')->groupby('anime_id')->orderBy('rate', 'desc')->get();
        $count = count($ratings);
      
      
        //小数点第二位を四捨五入
        for ($i=0; $i < $count; $i++){
            $ratings[$i]["rate"] = round($ratings[$i]["rate"],1);
        }
        
        return view('posts.anime_ranking')->with([ 'ratings' => $ratings]);
    }
}
