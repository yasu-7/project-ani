<x-app-layout>
    <x-slot name="header">
        <h1>プロフィール</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="bg-white lg:pb-12">
          <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pt-6">
            <!-- menu - start -->
            <div class=" rounded-lg border bg-gray-50 shadow-sm lg:block">
              <h2><div class="text-2xl text-left mb-1 font-semibold p-4">{{$users->name}}</h2>
              <div class="mx-auto flex max-w-screen-lg items-center gap-8 p-4">
                <div class="flex">
                    <div>
                      <div class="mb-1 font-semibold">評価数</div>
                      <p class="text-sm text-gray-500">{{$posts->count()}}</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select list</label>
            <select id="tabs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>お気に入り一覧</option>
                <option>視聴一覧</option>
                <option>評価一覧</option>
                <option>コメント一覧</option>
            </select>
        </div>
        <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400 p-6">
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/like" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">いいね</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/view" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">視聴済み</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/rate" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">評価一覧</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/comment" class="inline-block w-full p-4 bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">コメント一覧</a>
            </li>
        </ul>
        <h1><div class="text-2xl text-center border-t-4 border-b-4 border-green-500">アニメ評価一覧</div></h1>
        <div class="grid gap-3 sm:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:grid-cols-3 xl:gap-8">
            <!-- article - start -->
            @foreach ($posts as $post)
            <div class="flex flex-col overflow-hidden rounded-lg border bg-white">
                <a href="#" class="group relative block h-48 overflow-hidden bg-gray-100 md:h-64">
                  <img src="{{$post->anime->image}}" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
                </a>
    
                <div class="flex flex-1 flex-col p-4 sm:p-6">
                    <h2 class="mb-2 text-lg font-semibold text-gray-800">
                        <a href="#" class="transition duration-100 hover:text-indigo-500 active:text-indigo-600">{{$post->anime->name}}</a>
                    </h2>
            
                    <a href="/posts/{{ $post->anime->id }}/anime_view">アニメ詳細画面へ</a></br>
                    <p class="mb-4 text-gray-500">アニメ評価</p>
                    <p calss="text-2xl text-blue-500">{{$post->rate}}
                    <div class="flex">
                        @for($i=0; $i < $post->rate; $i++)
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        　　          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      　　      　</svg>
                            </div>
                        @endfor
                    <!-- stars - end -->
                    </div>
                    </p></br>
                    <p class="mb-4 text-gray-500">感想</p>
                    <p class="text-gray-600">{{$post->body}}</p>
                    
                    <div class="mt-auto flex items-end justify-right">
                        <div>
                            <span class="block text-sm text-gray-500">{{$post->created_at}}</span>
                            @if(Auth::id() == $post->user_id)
                                <div class="edit">
                                    <a href="/posts/{{ $post->id }}/anime_rate_edit">
                                        <span class="rounded border px-3 py-3 text-sm text-gray-500">
                                            編集
                                        </span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </x-slot>
   
    
    <x-slot name="sub1">
    <div class="">
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを探す</button></a><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime'>アニメ一覧</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを評価</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment'>口コミ一覧</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </div>
    </x-slot>
    
    
 </x-app-layout> 
