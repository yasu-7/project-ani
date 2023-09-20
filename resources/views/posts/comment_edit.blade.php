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
