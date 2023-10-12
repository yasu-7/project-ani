<x-app-layout>
    <x-slot name="header">
        <h1>アニメランキング</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='animes'>
            @foreach ($ratings as $rating)
            <div class='anime'>
               <p>{{$rating->anime->name}}</p>
               <p>{{$rating->anime->body}}</p>
                <p>{{$rating->anime->image}}</p>
                <p>{{$rating->anime->link}}</p>
                <p>{{$rating->anime->era}}</p>
                <p>アニメ評価：{{$rating->rate}}</p>
            </div>
            @endforeach
        </div>
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
