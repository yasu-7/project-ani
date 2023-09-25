<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Anime;
use App\Models\Rank;
use App\Models\Commentp;

use Illuminate\Support\Facades\Auth;
class RankController extends Controller
{
    public function  rank_view(Anime $anime, Commentp $commentp)
    {
        $user_id = Auth::id();
        
        $ranks_data = Rank::where('user_id', $user_id)->get()->sortBy('rank');
        return view('posts.index')->with([
            'ranks_data' => $ranks_data, 'commentps' => $commentp->getByLimit()
            ]);
    }
}
