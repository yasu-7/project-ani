<x-app-layout>
    <x-slot name="header">
        <h1>アニメ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <form action="/anime/search"　method="GET">
        <div class="bg-white py-6 sm:py-8 lg:py-12">
          <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
             
            最近のアニメ
            @for($i = 0; $i < 5; $i++)
                {{$data[$i]["title"]}}
            @endfor
            {{$data->links() }}
            <div class="rounded-lg bg-gray-100 px-4 py-6 md:py-8 lg:py-12">
              <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
        
              <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">アニメの作品名を入力してください</h2>
        
              <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                検索結果に出てこない場合は、作品名を詳細に入力してください。
              </p>
            </div>
          </div>
        </div>
        <div class="flex justify-center">
            <div class="w-80">
        　      <span class="font-semibold text-xl text-yellow-400">キーワード:</span><input class="text-gray-600" type="search" name="title" placeholder="検索ワード">
            </div>
            
            <div class="w-80">
        　     <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show_season'>年代で探す</button></a>
            </div>
            
        </div></br>
        <div class="text-center">
            <button class="bg-yellow-400 font-medium text-violet-500 py-2 px-4 rounded ">
                <input class="" type="submit" value="Search">
            </button>
        </div>
        </form>
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
