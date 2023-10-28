<x-app-layout>
    <x-slot name="header">
        <h1>アニメ評価</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='posts'>
            <form action="/posts/{{$post->id}}/update_rate" method="POST">
                @csrf
                @method('PUT')
                <div class="title">{{$post->title}}</h2></div>
                
                 <div class="anime_id">
                    <input type="hidden" name="post[anime_id]" value="{{$post->anime_id}}"/>
                    
                <div class="title2">
                    <h2>Title</h2>
                    <textarea name="post[title]" placeholder="{{$post->title}}">{{$post->title}}</textarea>
                </div>
                
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="口コミや感想などを投稿">{{$post->body}}</textarea>
                </div>
                
                <div class="rate">
                    <h2>rate</h2>
                    <select name="post[rate]" >
                        <option value="{{$post->rate}}">元の評価：{{$post->rate}}</option>
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
                 <a href="/posts/anime">戻る</a>
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
