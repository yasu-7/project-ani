<x-app-layout>
    <x-slot name="header">
        <h1>アニメ評価編集</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='posts'>
            <form action="/posts/{{$anime->id}}" method="POST">
                @csrf
                <div class="title">{{ $anime->name }}</h2></div>
                
                 <div class="anime_id">
                    <input type="hidden" name="post[anime_id]" value="{{ $anime->id }}"/>
                    
                <div class="title2">
                    <h2>Title</h2>
                    <textarea name="post[title]" placeholder="作品名"></textarea>
                </div>
                
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="口コミや感想などを投稿"></textarea>
                </div>
                
                <div class="rate">
                    <h2>rate</h2>
                    <select name="post[rate]">
                        <option value="">----</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <input type="submit" value="store_p"/>
             </form>
            <div class="back">
                 [<a href="/">戻る</a>]
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
