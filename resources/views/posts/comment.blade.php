<x-app-layout>
    <x-slot name="header">
        <h1>口コミ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
      <div class="py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="rounded-lg bg-gray-50 px-4 py-6 md:py-8 lg:py-12">
              <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
        
              <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">口コミ掲示板</h2>
        
              <div class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                アニメの話やオススメアニメを話し合いましょう。</br>
              </div>
            </div>
            <div class="mx-auto max-w-screen-md px-4 md:px-8 mt-8">
                    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl xl:mb-12">口コミ一覧</h2>
            
                    <div class="divide-y rounded bg-white px-4 py-2">
                        
                    <div class ="flex justify-end pb-2">
                         <button type="button" class="rounded bg-blue-900 px-4 py-2 text-white hover:bg-blue-300 mx-6 mt-3"><a href='/posts/comment_create'>口コミを投稿する</button></a>
                    </div>
                    @foreach ($comments as $comment)
                        <!-- review - start -->
                        <div class="flex flex-col gap-3 py-2 md:py-2 border-t-2 border-b-2 px-4">
                            <div class="mt-auto">
                                <div>
                                    <div class="flex justify-end">
                                        <span class="block text-sm font-bold justify-end">{{ $comment->created_at }}</span>
                                    </div>
                                    <span class="block text-sm font-bold">{{ $comment->user->name }}</span>
                                    <span class="block text-sm text-gray-500">{{ $comment->body }}</span>
                                </div>
                            </div>
                            <div class="flex flex-row gap-4 justify-end">
                                @if(Auth::id() == $comment->user_id)
                                    <form action="/posts/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deletePost({{ $comment->id }})" class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500">削除</button> 
                                    </form>
                                    <div class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500"><a href="/posts/{{ $comment->id }}/edit">編集</a></div>
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
    </x-slot>
    
    <x-slot name="sub1">
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを探す</button></a><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime'>アニメ一覧</button></a><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/youtube/anime'>PV集<br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを評価</a></button><br>
      <button type="button" class="text-2xl text-white bg-blue-600 font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment'>口コミ一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </x-slot>
    
 </x-app-layout> 
    
    
