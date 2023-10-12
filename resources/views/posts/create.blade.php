<x-app-layout>
    <x-slot name="header">
        <h1>アニメランキング投稿</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='posts'>
            <form action="/reasons" method="POST">
                @csrf
               
                <div class="title">
                    <h2>Title</h2>
                    <textarea name="reason[title]" placeholder="タイトル"></textarea>
                </div>
               
                <p><input type='hidden' name="rank[number][]" value=1 >
                1<input type="textbox" name="rank[title][]"value="タイトル" ></p>
                
                <p><input type='hidden' name="rank[number][]" value=2 >
                2<input type="textbox" name="rank[title][]"value="タイトル" ></p>
                
                <p><input type='hidden' name="rank[number][]" value=3 >
                3<input type="textbox" name="rank[title][]"value="タイトル" ></p>
                
                <div>
                    <h2>Body</h2>
                    <textarea name="reason[body]" placeholder="感想"></textarea>
                </div>
              
                <input type="submit" value="store_pp"/>
             </form>
            <div class="back">
                 [<a href="/">戻る</a>]
            </div>
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
