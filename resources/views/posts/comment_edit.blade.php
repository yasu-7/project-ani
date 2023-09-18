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
        <h1>口コミ投稿編集</h1>
    </header>
    
    <main>
        <div class="content">
        <form action="/posts/{{ $comment->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='comment[body]' value="{{ $comment->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
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
        <a href='/posts/anime'>roll</a>
        <h1>オススメアニメ投稿</h1>
        <a href='/posts/create'>create</a>
        <h1>口コミ一覧</h1>
        <a href='/posts/comment'>roll2</a>
        <h1>口コミ投稿</h1>
        <a href='/posts/comment_create'>create_c</a>
        
    </div>
    
    <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
    </div>
    
    </div>
    </body>
</html>
