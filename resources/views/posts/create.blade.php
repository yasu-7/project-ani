<x-app-layout>
    <x-slot name="header">
        <h1>アニメ評価編集</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='posts'>
            <form action="/posts" method="POST">
                <div class="title">
                    <h2>Title</h2>
                    <textarea name="commentp[title]" placeholder="タイトル"></textarea>
                </div>
                
                <div>
                    <h2>1</h2>
                    <textarea name="rank[title]" placeholder="タイトル"></textarea>
                    <textarea name="rank[title]" placeholder="タイトル"></textarea>
                </div>
                
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="commentp[body]" placeholder="感想"></textarea>
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
        <ul id="sample1">
            <li>ランキング</li>
            <li>年代別アニメ</li>
            <li>ジャンル別アニメ</li>
        </ul>
        <h1>アニメ評価</h1>
        <a href='/posts/create'>create</a>
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
