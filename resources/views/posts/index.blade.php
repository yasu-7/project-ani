<x-app-layout>
    <x-slot name="header">
        <h1>アニメ投稿一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='commentps'>
            @foreach ( $commentps as $commentp)
                <div class='post'>
                    <p class='user'>{{$commentp->user_id}}</p>
                    <p class='time'>{{ $commentp->created_at }}</p>
                    <h2 class='title'>{{$commentp->title}}</h2>
                    <p class='body'>{{$commentp->body}}</p>
                </div>
            @endforeach
        </div>
        <div>
            @foreach($ranks_data as $rank_data)
                <p>{{$rank_data->number}}
                {{$rank_data->anime_id}}</p>
            @endforeach
        </div>
    </x-slot>
    
    <x-slot name="sub1">
        <div id="sub1">
        <h1>アニメを探す</h1>
        <a href='/posts/anime'>roll</a>
        <ul id="sample1">
            <li>ランキング</li>
            <li>年代別アニメ</li>
            <li>ジャンル別アニメ</li>
        </ul>
        <h1>アニメ評価</h1>
        <h1>アニメ一覧</h1>
        <a href='/posts/anime'>roll</a>
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
