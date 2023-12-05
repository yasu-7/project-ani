<x-app-layout>
    <x-slot name="header">
        <h1>プロフィール</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="py-6 sm:py-8 lg:pb-12">
          <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pt-6">
            <!-- menu - start -->
            <div class=" rounded-lg border bg-gray-50 shadow-sm lg:block">
              <h2><div class="text-2xl text-left mb-1 font-semibold p-4">{{$users->name}}</h2>
              <div class="mx-auto flex max-w-screen-lg items-center gap-8 p-4">
                <div class="grid w-full grid-cols-2 gap-8">
                    <div class="rounded p-2 text-center">
                      <div class="mb-1 font-semibold">いいね数</div>
                      <p class="text-lg text-gray-500">{{$like->count()}}</p>
                    </div>
        
                    <div class="rounded p-2 text-center">
                      <div class="mb-1 font-semibold">視聴済み数
                      </div>
                      <p class="text-lg text-gray-500">{{$look->count()}}</p>
                    </div>
          
                    <div class="rounded p-2 text-center">
                      <div class="mb-1 font-semibold">評価数</div>
                      <p class="text-lg text-gray-500">{{$posts->count()}}</p>
                    </div>
        
                    <div class="rounded p-2 text-center">
                      <div class="mb-1 font-semibold">コメント数</div>
                      <p class="text-lg text-gray-500">{{$comment->count()}}</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
            <!-- menu - end -->
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pt-6">
              <div class="rounded-lg bg-white">
                <div class="text-center text-2xl font-bold border-t-4 border-b-4 border-green-500 mt-8 py-2">ユーザー詳細情報</div>
                <ul class="text-lg font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
                    <li class="w-full">
                        <a href="/users/{{ $users->id }}/list/like" class="inline-block w-full p-4 bg-white rounded-l-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">いいね一覧</a>
                    </li>
                    <li class="w-full">
                        <a href="/users/{{ $users->id }}/list/view" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">視聴済み一覧</a>
                    </li>
                    <li class="w-full">
                        <a href="/users/{{ $users->id }}/list/rate" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">評価一覧</a>
                    </li>
                    <li class="w-full">
                        <a href="/users/{{ $users->id }}/list/comment" class="inline-block w-full p-4 bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">コメント一覧</a>
                    </li>
                </ul>
                <div class="text-center text-2xl border-t-4 border-b-4 border-green-500 py-2">投稿</div>
                <div class="ranking bg-white">
           @foreach ( $rankings as $ranking)
          <div class="bg-white py-6 sm:py-8 lg:py-12">
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
                  <div class="flex flex-col rounded-lg  p-4 sm:flex-row">
                    <div class="w-full">
                      @foreach($ranking->ranks as $rank)
                        <div class="flex flex-row gap-4 mb-2">
                          <div class="text-center text-xl font-semibold w-1/5 rounded-lg p-4">第{{$rank->number}}位</div>
                          <div class="text-center w-4/5 p-4 border-b-2 border-gray-900">{{$rank->title}}</div>
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
                                <div class="edit"><a href="/posts/{{ $ranking->user->id }}/edit_post">編集</a></div>
                  @endif
                </span>
                </div>
              </div>
            </div>
          </div>
            @endforeach
        </div>
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
