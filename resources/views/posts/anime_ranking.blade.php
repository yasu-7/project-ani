<x-app-layout>
    <x-slot name="header">
        <h1>アニメランキング</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='animes'>
            @foreach ($ratings as $rating)
            <div class='anime'>
                <div class="name"><a href="/posts/{{ $rating->anime->id }}/anime_view">{{$rating->anime->name}}</a></div>
                <img src="{{$rating->anime->image}}" alt=""><br>
                <a href="{{$rating->anime->link}}">公式サイト</a><br>
                <p>{{$rating->anime->era}}</p>
                <p>アニメ評価：{{$rating->rate}}</p>
                <div class="rate"><a href="/posts/{{ $rating->anime->id }}/anime_rate">評価する</a></div>
            </div>
            @endforeach
        </div>
    </x-slot>
    
    <x-slot name="sub1">
    <div id="sub1">
        <h1>
            <a href='/anime/show'>アニメを探す</a>
        </h1>
        <h1>
            <a href='/posts/anime'>アニメ一覧</a>
        </h1>
        <h1>
            <a href='/posts/anime_rate/list'>アニメ評価一覧</a>
        </h1>
        <h1>
            <a href='/posts/anime_ranking'>アニメランキング</a>
        </h1>
        <h1>
            <a href='/posts/create'>アニメランキング投稿</a>
        </h1>    
        <h1>
            <a href='/anime/show'>アニメを評価</a>
        </h1>
        <h1>
            <a href='/posts/comment'>口コミ一覧</a>
        </h1>
        <h1>
            <a href='/posts/comment_create'>口コミ投稿</a>
        </h1>
        <h1>
            <a href='/users/{{Auth::id()}}'>プロフィール</a>
        </h1>
    </div>
    </x-slot>
    
    <x-slot name="sub2">
        <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
        </div>
    </x-slot>
    
 </x-app-layout> 
