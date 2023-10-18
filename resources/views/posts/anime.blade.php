<x-app-layout>
    <x-slot name="header">
        <h1>アニメ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='animes'>
            @foreach ($animes as $anime)
            @if(!in_array($anime->id,$not_view))
                <div class='anime'>
                    <div class="name"><a href="/posts/{{ $anime->id }}/anime_view">{{$anime->name}}</a></div>
                    <p class='body'>{{$anime->body}}</p>
                    <img src="{{$anime->image}}" alt=""><br>
                    <a href="{{$anime->link}}">公式サイト</a><br>
                    <p class='era'>{{$anime->era}}</p>
                    <div class="rate"><a href="/posts/{{ $anime->id }}/anime_rate">アニメ評価</a></div>
                </div>
            <span>
             
            <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
            @if($anime->is_like())
            <!-- 「いいね」取消用ボタンを表示 -->
            	<a href="{{ route('like', $anime) }}" class="btn btn-success btn-sm">
            		いいねする
            		<!-- 「いいね」の数を表示 -->
            		{{$anime->likes->count()}}
            		
            	</a>
            @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
            	<a href="{{ route('unlike', $anime) }}" class="btn btn-secondary btn-sm">
            		いいね解除
            		<!-- 「いいね」の数を表示 -->
            		{{$anime->likes->count()}}
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
