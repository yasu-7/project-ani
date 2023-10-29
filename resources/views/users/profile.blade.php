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
                      <div class="mb-1 font-semibold">いいね数</div>
                      <p class="text-sm text-gray-500">{{$like->count()}}</p>
                    </div>
        
                    <div>
                      <div class="mb-1 font-semibold">視聴済み
                      </div>
                      <p class="text-sm text-gray-500">{{$look->count()}}</p>
                    </div>
          
                    <div>
                      <div class="mb-1 font-semibold">評価数</div>
                      <p class="text-sm text-gray-500">{{$posts->count()}}</p>
                    </div>
        
                    <div>
                      <div class="mb-1 font-semibold">コメント数</div>
                      <p class="text-sm text-gray-500">{{$comment->count()}}</p>
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
                <a href="/users/{{ $users->id }}/list/like" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">いいね</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/view" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">視聴済み</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/rate" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">評価一覧</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/comment" class="inline-block w-full p-4 bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">コメント一覧</a>
            </li>
        </ul>
        
        <h1>投稿</h1>
        
        
        
        <div class="ranking bg-white">
           @foreach ( $rankings as $ranking)
          <div class="bg-gray-50 py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-md outline rounded-lg bg-white px-4 md:px-8">
              <h1 class="pt-3 text-right font-bold text-gray-800">投稿日：{{$ranking->updated_at}}</h1>
              <h1 class="pb-3 text-left font-bold text-gray-800">ユーザー名：{{$ranking->user->name}}</h1>
        
              <div class="rounded-lg bg-white py-3">
                <h2 class="mb-2 pl-4 text-left font-semibold text-gray-800 sm:text-2xl">タイトル</h2>
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                  <div class="flex flex-col items-center justify-center gap-4 rounded-lg p-4 sm:flex-row md:p-4">
                    <div>
                      <h2 class="text-center font-bold text-gray-600 text-2xl">{{$ranking->title}}</h2>
                    </div>
                  </div>
                </div>
                <br />
        
                <h2 class="mb-2 pl-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">ランキング</h2>
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                  <div class="flex flex-col items-center justify-center rounded-lg  p-4 sm:flex-row">
                    <div>
                      @foreach($ranking->ranks as $rank)
                          <div>
                            <div class="flex flex-col items-center justify-center rounded-lg bg-gray-300 p-4">第{{$rank->number}}位  {{$rank->title}}</div><br>
                          </div>
                        @endforeach
                    </div>
                  </div>
                </div>
        
                <h2 class="mb-2 pl-4 pt-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">コメント</h2>
                <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
                  <div class="flex flex-col items-center gap-4 rounded-lg bg-yellow-50 p-4 sm:flex-row">
                    <div>
                      <p class="text-gray-500 sm:text-lg">{{$ranking->body}}</p>
                    </div>
                  </div>
                </div>
                <div class="mt-auto flex items-end justify-end px-4 pt-3">
                <span class="rounded border px-2 py-1 text-sm text-gray-500">
                  @if(Auth::id() == $ranking->user_id)
                                <div class="edit"><a href="/posts/{{ $ranking->user->id }}/edit_post">edit</a></div>
                  @endif
                </span>
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
