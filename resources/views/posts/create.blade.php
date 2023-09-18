<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>main</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
         <!-- CSSの読み込み -->
        <link rel="stylesheet" href="../css/style.css">
        
    </head>
    <body>
    <div id="page">
    <header>
        <h1>Blog Name</h1>
    </header>
    
    <main>
        <div class='posts'>
            <form action="/posts" method="POST">
                @csrf
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="post[title]" placeholder="タイトル"/>
                </div>
                
                
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
                </div>
                <input type="submit" value="store"/>
             </form>
             <div class="footer">
                <a href="/">戻る</a>
             </div>
    </main>
    
    <div id="sub1">
        <h1>アニメを探す</h1>
        <ul id="sample1">
            <li>ランキング</li>
            <li>年代別アニメ</li>
            <li>ジャンル別アニメ</li>
        </ul>
        <h1>アニメ評価</h1>
        <h1>アニメ一覧</h1>
        <h1>オススメアニメ投稿</h1>
        <h1>口コミ一覧</h1>
    </div>
    
    <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
    </div>
    
    </div>
    </body>
</html>