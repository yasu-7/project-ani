<x-app-layout>
    <x-slot name="header">
        <h1>プロフィール</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="like"><a href="/users/{{ $users->id }}/list/like">お気に入り一覧</a></div>
        <div class="view"><a href="/users/{{ $users->id }}/list/view">視聴一覧</a></div>
        <div class="rate"><a href="/users/{{ $users->id }}/list/rate">評価一覧</a></div>
        <div class="comment"><a href="/users/{{ $users->id }}/list/comment">コメント一覧</a></div>
        <h1>コメント一覧</h1>
        @foreach ($comments as $comment)
            <div class='comments'>
                <div class="body">{{$comment->body}}</div>
            </div>
            @if(Auth::id() == $comment->user_id)
                <form action="/posts/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $comment->id }})">delete</button> 
                </form>
                <div class="edit"><a href="/posts/{{ $comment->id }}/edit">edit</a></div>
            @endif
        @endforeach
        <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
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