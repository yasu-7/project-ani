<x-app-layout>
    <x-slot name="header">
        <h1>口コミ投稿作成</h1>
    </x-slot>
    
    
     <x-slot name="slot">
      <div class="py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="rounded-lg bg-gray-50 px-4 py-6 md:py-8 lg:py-12">
              <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
        
              <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">口コミ掲投稿</h2>
        
              <div class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                アニメの話やオススメアニメを話し合いましょう。</br>
              </div>
            </div>
        
            <div class="rounded bg-white p-8 mt-8">
                <form action="/comments" method="POST">
                    @csrf
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">コメント記入</div>
                        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                            <textarea rows="8" name="comment[body]" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="口コミや感想などを投稿"></textarea>
                        </div>
                    </div>
                    
                    <div class="flex flex-row justify-center gap-8 p-4">
                        <input type="submit" value="保存" class="text-xl no-underline hover:underline decoretion-sky-500 hover:text-sky-500"/>
                        
                        <div class="back text-xl no-underline hover:underline decoretion-sky-500 hover:text-sky-500">
                            <a href="/posts/comment">戻る</a>
                        </div>
                    </div>
                 </form>
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
      <button type="button" class="text-2xl text-white bg-blue-600 font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </x-slot>
    
</x-app-layout>
