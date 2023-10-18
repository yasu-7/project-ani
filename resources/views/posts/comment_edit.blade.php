<x-app-layout>
    <x-slot name="header">
        <h1>口コミ投稿編集</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="content">
            <form action="/posts/{{ $comment->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='comment[body]' value="{{ $comment->body }}">
                </div>
                <input type="submit" value="store">
            </form>
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
