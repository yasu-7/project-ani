<x-app-layout>
    <x-slot name="header">
        <h1>アニメ投稿編集</h1>
    </x-slot>
    
    <x-slot name="slot">
      <div class="py-6 sm:py-8 lg:py-12">
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="rounded-lg bg-gray-50 px-4 py-6 md:py-8 lg:py-12">
            <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
      
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">あなたのオススメアニメ投稿編集画面</h2>
      
            <div class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
              あなたのオススメアニメ投稿：投稿済み</br>
            </div>
        </div>
        
        <div class="posts">
          <form action="/posts/{{$reason->user_id}}/update_ranking" method="POST">
            @csrf 
            @method('PUT')
            <div class="py-6 sm:py-8 lg:py-12">
              <div class="mx-auto max-w-screen-md bg-white rounded-lg px-4 outline md:px-8">
                <h2 class="mb-2 pl-4 pt-4 text-left font-semibold text-gray-800 sm:text-2xl">タイトル</h2>
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                  <div class="title">
                    <textarea name="reason[title]" placeholder="{{$reason['title']}}" value="{{ $user->reason->title }}" class="border-blue-gray-200 text-blue-gray-700 placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 disabled:bg-blue-gray-50 peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border focus:border-2 focus:border-gray-800 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0"></textarea>
                  </div>
                </div>
                <br />
                <h2 class="mb-2 pl-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">ランキング</h2>
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="flex flex-col gap-4 mb-2">
                    <div class="flex flex-row gap-4 mb-2">
                      <input type="hidden" name="rank[number][]" value="1" />
                      <div class="text-center text-xl font-semibold w-1/5 p-4">第1位</div>
                      <input type="textbox" name="rank[title][]" value="{{$rank[0]['title']}}" class="w-4/5 rounded-lg bg-gray-50 p-4" />
                    </div>
      
                    <div class="flex flex-row gap-4 mb-2">
                      <input type="hidden" name="rank[number][]" value="2"  />
                      <div class="text-center text-xl font-semibold w-1/5 p-4">第2位</div>
                      <input type="textbox" name="rank[title][]" value="{{$rank[1]['title']}}" class="w-4/5 rounded-lg bg-gray-50 p-4"/>
                    </div>
      
                    <div class="flex flex-row gap-4 mb-2">
                      <input type="hidden" name="rank[number][]" value="3" />
                      <div class="text-center text-xl font-semibold w-1/5 p-4">第3位</div>
                      <input type="textbox" name="rank[title][]" value="{{$rank[2]['title']}}" class="w-4/5 rounded-lg bg-gray-50 p-4"/>
                    </div>
                </div>
                </div>
      
                <h2 class="mb-2 pl-4 pt-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">コメント</h2>
                <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
                  <textarea name="reason[body]" placeholder="{{$reason['body']}}" value="{{ $user->reason->body }}" class="border-blue-gray-200 text-blue-gray-700 placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 disabled:bg-blue-gray-50 peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border focus:border-2 focus:border-gray-800 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0"></textarea>
                </div>
      
                <input type="hidden" name="reason[id]" value="{{$user->reason->id}}" />
                
                 <div class="flex flex-row justify-end gap-4 p-4">
                  <input type="submit" value="保存" class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500"/>
                  
                  <div class="back no-underline hover:underline decoretion-sky-500 hover:text-sky-500">
                      <a href="/">戻る</a>
                  </div>
                  
                </div>
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
      <button type="button" class="text-2xl text-white bg-blue-600 font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを評価</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment'>口コミ一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
  </x-slot>
    
</x-app-layout>
