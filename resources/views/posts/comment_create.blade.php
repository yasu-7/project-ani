<x-app-layout>
    <x-slot name="header">
        <h1>口コミ投稿作成</h1>
    </x-slot>
    
     <x-slot name="slot">
        <div class='comments'>
            <form action="/comments" method="POST">
                @csrf
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="comment[body]" placeholder="口コミや感想などを投稿"></textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                </div>
                <input type="submit" value="store"/>
             </form>
            <div class="back">
                 [<a href="/">戻る</a>]
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
