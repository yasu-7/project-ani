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
        <h1>口コミ一覧</h1>
    </header>
    
    <main>
        <div class='comments'>
            @foreach ($comments as $comment)
                <div class='comment'>
                    <h2 class='user'>{{ $comment->user_id }}</h2>
                    <p class='body'>{{ $comment->body }}</p>
                    <p class='time'>{{ $comment->created_at }}</p>
                </div>
            @endforeach
        </div>
    </main>
    
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
