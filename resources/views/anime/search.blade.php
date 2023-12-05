<x-app-layout>
    <x-slot name="header">
        <h1>アニメ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <form action="/anime/search"　method="GET">
        <div class="py-6 sm:py-8 lg:py-12">
          <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
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
        　      <span class="font-semibold text-xl text-black">キーワード:</span><input class="bg-white" type="search" name="title" placeholder="検索ワード">
            </div>
            
            <div class="w-80">
        　     <button type="button" class="font-semibold text-xl p-2 hover:text-blue-600"><a href='/anime/show_season'>年代で探す</button></a>
            </div>
            
        </div></br>
        <div class="text-center">
            <button class="bg-black font-medium text-white py-2 px-4 rounded">
                <input class="" type="submit" value="Search">
            </button>
        </div>
        </form>
        
        <div class="py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <!-- text - start -->
                <div class="mb-10 md:mb-16">
                  <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">検索結果</h2>
                  @if($count == 0)
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">検索件数は0件でした。</br>
                  @else
                    <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">検索件数は{{$count}}件でした。<br>
                  @endif
                </div>
                <!-- text - end -->
            
                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                      <!-- article - start -->
                        @for($i = 0; $i < $count; $i++)
                        <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                            <a href="/posts/{{ $datas[$i]["id"] }}/anime_view" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                                    <img src="{{$datas[$i]["images"]["recommended_url"]}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>
                
                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <h2 class="mb-2 text-lg font-semibold text-gray-800 no-underline hover:underline decoretion-sky-500 hover:text-sky-500">
                                    <a href="/posts/{{ $datas[$i]["id"] }}/anime_view" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$datas[$i]["title"]}}</a>
                                </h2>
                        
                                <p class="mb-4 text-gray-500">何をしますか？</p>
                                <p class="mb-4 text-gray-500">
                                <a href="/posts/{{ $datas[$i]["id"] }}/anime_view" class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500">アニメ詳細画面へ</a></br>
                                <a href="/posts/{{ $datas[$i]["id"] }}/anime_rate" class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500">アニメ評価</a></br>
                                <a href="{{$datas[$i]["official_site_url"]}}">公式サイトへ</a>
                                </p>
                            </div>
                        </div>
                        @endfor
                    </div>
              <!-- article - end -->
            </div>
        </div>
    </x-slot>
    
  <x-slot name="sub1">
      <button type="button" class="text-2xl text-white bg-blue-600 font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを探す</button></a><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime'>アニメ一覧</button></a><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/youtube/anime'>PV集<br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを評価</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment'>口コミ一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
  </x-slot>
    
 </x-app-layout> 
