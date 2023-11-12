<x-app-layout>
    <x-slot name="header">
        <h1>アニメ評価</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class='posts'>
            <form action="/posts/edit/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="title">{{$post->title}}</h2></div>
                
                 <div class="anime_id">
                    <input type="hidden" name="post[anime_id]" value="{{$post->anime_id}}"/>
                    
                <div class="title2">
                    <h2>Title</h2>
                    <textarea name="post[title]" placeholder="{{$post->title}}">{{$post->title}}</textarea>
                </div>
                
                <div class="body">
                    <h2>Body</h2>
                    <textarea name="post[body]" placeholder="口コミや感想などを投稿">{{$post->body}}</textarea>
                </div>
                
                <div class="rate">
                    <h2>rate</h2>
                    <select name="post[rate]" >
                        <option value="{{$post->rate}}">元の評価：{{$post->rate}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <input type="submit" value="保存"/>
             </form>
            <div class="back">
                 <a href="/posts/anime">戻る</a>
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
