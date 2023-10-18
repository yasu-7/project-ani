<x-app-layout>
    <x-slot name="header">
        <h1>プロフィール</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="like"><a href="/users/{{ $users->id }}/list/like">お気に入り一覧</a></div>
        <div class="view"><a href="/users/{{ $users->id }}/list/view">視聴一覧</a></div>
        <div class="rate"><a href="/users/{{ $users->id }}/list/rate">評価一覧</a></div>
        <div class="comment"><a href="/users/{{ $users->id }}/list/comment">コメント一覧</a></div>
        <h1>お気に入り一覧</h1>
        @foreach ($animes as $anime)
            @if(in_array($anime->id,$like_anime))
                <div class='anime'>
                    <div class="rate"><a href="/posts/{{ $anime->id }}/anime_view">{{$anime->name}}</a></div>
                    <img src="{{$anime->image}}" alt=""><br>
                </div>
                <span>
                    <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                    @if($anime->is_like())
                    <!-- 「いいね」取消用ボタンを表示 -->
                    	<a href="{{ route('like', $anime) }}" class="btn btn-success btn-sm">
                    		いいねする
                    	</a>
                    @else
                    <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                    	<a href="{{ route('unlike', $anime) }}" class="btn btn-secondary btn-sm">
                    		いいね解除
                    	</a>
                    @endif
                    </span>
                    
                    <span>
                     
                    <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                    @if($anime->is_look())
                    <!-- 「いいね」取消用ボタンを表示 -->
                    	<a href="{{ route('look', $anime) }}" class="btn btn-success btn-sm">
                    		未視聴
                    	</a>
                    @else
                    <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                    	<a href="{{ route('unlook', $anime) }}" class="btn btn-secondary btn-sm">
                    		視聴済み
                    @endif
                </span>
            @endif
        @endforeach
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
        <h1>口コミ投稿</h1>
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
