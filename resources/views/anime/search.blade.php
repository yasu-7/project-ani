<x-app-layout>
    <x-slot name="header">
        <h1>アニメ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <form action="/anime/search"　method="GET">
        <div class="flex justify-center">
            <div class="w-80">
        　      <span class="font-semibold text-xl text-yellow-400">キーワード:</span><input class="bg-yellow-400 text-violet-700" type="search" name="title" placeholder="検索ワード">
            </div>
        </div></br>
        <div class="text-center">
            <button class="bg-yellow-400 font-medium text-violet-500 py-2 px-4 rounded hover:text-violet-700 hover:bg-yellow-200 ">
                <input class="" type="submit" value="Search">
            </button>
        </div>
        </form>
        
        <div class="bg-white py-6 sm:py-8 lg:py-12">
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
                            <a href="#" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                              <img src="{{$datas[$i]["images"]["recommended_url"]}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>
                
                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <h2 class="mb-2 text-lg font-semibold text-gray-800">
                                    <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$datas[$i]["title"]}}</a>
                                </h2>
                        
                                <p class="mb-4 text-gray-500">何をしますか？</p>
                                <p class="mb-4 text-gray-500">
                                <a href="/posts/{{ $datas[$i]["id"] }}/anime_view">アニメ詳細画面へ</a></br>
                                <a href="/posts/{{ $datas[$i]["id"] }}/anime_rate">アニメ評価</a></br>
                                <a href="{{$datas[$i]["wikipedia_url"]}}">公式サイトへ</a>
                                </p>
                                
                                <div class="mt-auto flex items-end justify-between">
                                    <div class="flex items-center gap-2">
                                      制作年：</br>
                                      引用元：
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
              <!-- article - end -->
            </div>
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
