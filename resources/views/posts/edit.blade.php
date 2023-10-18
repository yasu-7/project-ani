<x-app-layout>
    <x-slot name="header">
        <h1>アニメ投稿編集</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='posts'>
            <form action="/posts/{{$reason->user_id}}/update_ranking" method="POST">
                @csrf
                @method('PUT')
                <div class="title">
                    <h2>Title</h2>
                    <textarea name="reason[title]" placeholder="タイトル"></textarea>
                </div>
               
                <input type='hidden' name="rank[number][]" value=1 >
                1<input type="textbox" name="rank[title][]"value="{{$rank[0]['title']}}" >
                
                <input type='hidden' name="rank[number][]" value=2 >
                2<input type="textbox" name="rank[title][]"value="{{$rank[1]['title']}}" >
                
                <input type='hidden' name="rank[number][]" value=3 >
                3<input type="textbox" name="rank[title][]"value="{{$rank[2]['title']}}" >
        
               
                <div>
                    <h2>Body</h2>
                    <textarea name="reason[body]" placeholder="感想" value="{{ $user->reason->body }}"></textarea>
                </div>
                
                <input type='hidden' name="reason[id]" value="{{$user->reason->id}}" >
                
              
                <input type="submit" value="store_pp"/>
             </form>
            <div class="back">
                 [<a href="/">戻る</a>]
            </div>
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
