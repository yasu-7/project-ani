<x-app-layout>
    <x-slot name="header">
        <h1>Youtube オススメPV集</h1>
    </x-slot>
    
    <x-slot name="slot">
      <div class="main">
        
        <div class="py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <!-- article - start -->
                <div class="text-2xl py-8">KADOKAWAanimeチャンネル</div>
                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                        @foreach ($kadokawa as $kadokawa)
                        <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                            <a href="https://www.youtube.com/watch?v={{$kadokawa['id']['videoId']}}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                                    <img src="{{$kadokawa['snippet']['thumbnails']['high']['url']}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>
                
                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <h2 class="mb-2 text-lg font-semibold text-gray-800">
                                    <a href="https://www.youtube.com/watch?v={{$kadokawa['id']['videoId']}}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$kadokawa['snippet']['title']}}</a>
                                </h2>
                            </div>
                        </div>
                        @endforeach
                    </div>
              <!-- article - end -->
                <div class="text-2xl py-8">アニプレックスチャンネル</div>
                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                        @foreach ($aniplex as $aniplex)
                        <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                            <a href="https://www.youtube.com/watch?v={{$aniplex['id']['videoId']}}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                                    <img src="{{$aniplex['snippet']['thumbnails']['high']['url']}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>
                
                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <h2 class="mb-2 text-lg font-semibold text-gray-800">
                                    <a href="https://www.youtube.com/watch?v={{$aniplex['id']['videoId']}}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$aniplex['snippet']['title']}}</a>
                                </h2>
                            </div>
                        </div>
                        @endforeach
                    </div>
                
                <div class="text-2xl py-8">ジャンプチャンネル</div>
                    <div class="grid gap-4 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-8">
                        @foreach ($jump as $jump)
                        <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                            <a href="https://www.youtube.com/watch?v={{$jump['id']['videoId']}}" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                                    <img src="{{$jump['snippet']['thumbnails']['high']['url']}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                            </a>
                
                            <div class="flex flex-1 flex-col p-4 sm:p-6">
                                <h2 class="mb-2 text-lg font-semibold text-gray-800">
                                    <a href="https://www.youtube.com/watch?v={{$jump['id']['videoId']}}" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$jump['snippet']['title']}}</a>
                                </h2>
                            </div>
                        </div>
                        @endforeach
                    </div>
                
            </div>
        </div>
    </div>
    </x-slot>
    
    <x-slot name="sub1">
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを探す</button></a><br>
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
