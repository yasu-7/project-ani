
        <h1>アニメ投稿一覧</h1>
   
    
   
        <div class='ranking'>
            @foreach ( $rankings as $ranking)
            <p>ユーザー名：{{$ranking->user->name}}</p>
            <p>投稿日{{$ranking->updated_at}}</p>
            <p>タイトル：{{$ranking->title}}</p>
                @foreach($ranking->ranks as $rank)
                <div>
                    順位：{{$rank->number}}
                    作品名：{{$rank->title}}
                </div>
                @endforeach
            {{$ranking->body}}
            @endforeach
        </div>
   
    

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

    
        <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
        <a href='/posts/comment'>roll2</a>
        </div>
  
