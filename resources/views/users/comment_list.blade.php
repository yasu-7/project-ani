<x-app-layout>
    <x-slot name="header">
        <h1>プロフィール</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="lg:pb-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pt-6 py-6">
            <!-- menu - start -->
                <div class=" rounded-lg border bg-white shadow-sm lg:block">
                  <h2><div class="text-2xl text-left mb-1 font-semibold p-4">{{$users->name}}</h2>
                  <div class="mx-auto flex max-w-screen-lg items-center gap-8 p-4">
                    <div class="flex gap-2">
                        <div class="text-xl font-bold">コメント数</div>
                        <div class="text-xl text-gray-500">:</div>
                        <div class="text-xl text-gray-500">{{$comments->count()}}</div>
                    </div>
                  </div>
                </div>
              </div>
                <!-- menu - end -->
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pt-6">
                    <div class="rounded-lg bg-white">
                        <div class="text-center text-2xl font-bold border-t-2 border-b-2 border-green-500 mt-8 py-2">ユーザー詳細情報</div>
                        <ul class="hidden text-lg font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
                        <li class="w-full">
                            <a href="/users/{{ $users->id }}/list/like" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">いいね</a>
                        </li>
                        <li class="w-full">
                            <a href="/users/{{ $users->id }}/list/view" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">視聴済み</a>
                        </li>
                        <li class="w-full">
                            <a href="/users/{{ $users->id }}/list/rate" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">評価一覧</a>
                        </li>
                        <li class="w-full">
                            <a href="/users/{{ $users->id }}/list/comment" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-r-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">コメント一覧</a>
                        </li>
                    </ul>
                        <div class="text-2xl text-center border-t-2 border-b-2 border-green-500 py-2">コメント一覧</div>
                        <div class="mx-auto max-w-screen-md px-4 md:px-8 pt-6 py-2">    
                            <div class="divided-y rounded px-4 border-b-2">
                                @foreach ($comments as $comment)
                                <div class="flex flex-col gap-2 py-2 md:py-4 border-t-2">
                                        <div class='comments'>
                                            <span class="block text-sm font-bold">投稿日</br>{{$comment->created_at}}</span>
                                            <span class="block text-sm font-bold"></span>{{$comment->body}}</span>
                                        </div>
                                        <div class="flex justify-end gap-8">
                                            @if(Auth::id() == $comment->user_id)
                                                <form action="/posts/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="bg-gray-50 no-underline hover:underline decoretion-sky-500 hover:text-sky-500" onclick="deletePost({{ $comment->id }})">削除</button> 
                                                </form>
                                                <div class="rounded bg-gray-50 no-underline hover:underline decoretion-sky-500 hover:text-sky-500"><a href="/posts/{{ $comment->id }}/edit">編集</a></div>
                                            @endif
                                        </div>
                                </div>
                                @endforeach
                            </div>
                            <script>
                                function deletePost(id) {
                                    'use strict'
                                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                                        document.getElementById(`form_${id}`).submit();
                                    }
                                }
                            </script>
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
