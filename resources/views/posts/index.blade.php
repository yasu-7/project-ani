
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
            @if(Auth::id() == $ranking->user_id)
                <div class="edit"><a href="/posts/{{ $ranking->user->id }}/edit_post">edit</a></div>
            @endif
            @endforeach
        </div>
   
    

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

    
        <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
        <a href='/posts/comment'>roll2</a>
        </div>
  
