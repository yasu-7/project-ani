<x-app-layout>
    <x-slot name="header">
        <h1>口コミ投稿作成</h1>
    </x-slot>
    
     <x-slot name="slot">
        <div class='comments'>
            <form action="/comments" method="POST">
                @csrf
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="comment[body]" placeholder="口コミや感想などを投稿"></textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                </div>
                <input type="submit" value="store"/>
             </form>
            <div class="back">
                 [<a href="/">戻る</a>]
            </div>
    </x-slot>
    
   <x-slot name="sub1">
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを探す</button></a><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime'>アニメ一覧</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを評価</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment'>口コミ一覧</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </x-slot>
    
</x-app-layout>
