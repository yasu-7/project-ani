<x-app-layout>
    <x-slot name="header">
        <h1>プロフィール</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="like"><a href="/users/{{ $users->id }}/list/like">お気に入り一覧</a></div>
        <div class="view"><a href="/users/{{ $users->id }}/list/view">視聴一覧</a></div>
        <div class="rate"><a href="/users/{{ $users->id }}/list/rate">評価一覧</a></div>
        <div class="comment"><a href="/users/{{ $users->id }}/list/comment">コメント一覧</a></div>
        <h1>アニメ評価一覧</h1>
        @foreach ($posts as $post)
            <div class='posts'>
                <div class="title"><a href="/posts/{{ $post->anime_id }}/anime_view">{{$post->title}}</a></div>
                <div class="body">{{$post->body}}</div>
                <div class="rate">{{$post->rate}}</div>
            </div>
            @if(Auth::id() == $post->user_id)
                <div class="edit"><a href="/posts/{{ $post->id }}/anime_rate_edit">edit</a></div>
            @endif
        @endforeach
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
        <h1>口コミ投稿</h1>
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