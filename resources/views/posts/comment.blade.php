<x-app-layout>
    <x-slot name="header">
        <h1>口コミ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='comments'>
            @foreach ($comments as $comment)
                <div class='comment'>
                    <h2 class='user'>{{ $comment->user_id }}</h2>
                    <h2 class='user'>{{ $comment->user->name }}</h2>
                    <p class='body'>{{ $comment->body }}</p>
                    <p class='time'>{{ $comment->created_at }}</p>
                </div>
                @if(Auth::id() == $comment->user_id){
                <form action="/posts/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $comment->id }})">delete</button> 
                </form>
                <div class="edit"><a href="/posts/{{ $comment->id }}/edit">edit</a></div>
                }
                @endif
            @endforeach
        </div>
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
    
    
