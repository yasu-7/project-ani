<x-app-layout>
    <x-slot name="header">
        <h1>アニメ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='animes'>
            @foreach ($users as $user)
                <div class='anime'>
                    <p class='body'>{{$user->anime->title}}</p>
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
            @endforeach
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