<x-app-layout>
    <x-slot name="header">
        <h1>アニメ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <form action="/anime/search"　method="GET">
        <div class="flex justify-center">
            <div class="w-80">
        　      <span class="font-semibold text-xl text-yellow-400">キーワード:</span><input class="bg-yellow-400 text-violet-700" type="search" name="title" placeholder="検索ワード">
            </div>
        </div></br>
        <div class="text-center">
            <button class="bg-yellow-400 font-medium text-violet-500 py-2 px-4 rounded hover:text-violet-700 hover:bg-yellow-200 ">
                <input class="" type="submit" value="Search">
            </button>
        </div>
        </form>
        @for($i = 0; $i < $count; $i++)
        <a href="/posts/{{ $datas[$i]["id"] }}/anime_view">{{$datas[$i]["title"]}}<br>
        <a href="{{$datas[$i]["wikipedia_url"]}}">wiki</a><br>
        <img src="{{$datas[$i]["images"]["recommended_url"]}}" alt=""><br>
        <a href="/posts/{{ $datas[$i]["id"] }}/anime_rate">アニメ評価<br>
        @endfor
    </x-slot>
    
    <x-slot name="sub1">
        <div id="sub1">
        <h1>アニメを探す</h1>
        <a href='/posts/anime'>roll</a>
        <h1>アニメ一覧</h1>
        <a href='/posts/anime'>roll</a>
        <h1>アニメ評価一覧</h1>
        <a href='/posts/anime_rate_v'>ro</a>
        <h1>ランキング</h1>
        <a href='/posts/anime_ranking'>rol</a>
        <h1>オススメアニメ投稿</h1>
        <a href='/posts/create'>create</a>
        <h1>口コミ一覧</h1>
        <a href='/posts/comment'>roll2</a>
        <h1>口コミ投稿</h1>
        <a href='/posts/comment_create'>create_c</a>
        </div>
    </x-slot>
    
    <x-slot name="sub2">
        <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
        </div>
    </x-slot>
    
 </x-app-layout> 
