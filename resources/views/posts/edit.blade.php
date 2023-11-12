<x-app-layout>
    <x-slot name="header">
        <h1>アニメ投稿編集</h1>
    </x-slot>
    
    <x-slot name="slot">
      <div class="posts">
        <form action="/posts/{{$reason->user_id}}/update_ranking" method="POST">
          @csrf 
          @method('PUT')
          <div class="bg-gray-50 py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-md rounded-lg bg-white px-4 outline md:px-8">
              <h2 class="mb-2 pl-4 pt-4 text-left font-semibold text-gray-800 sm:text-2xl">タイトル</h2>
              <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="title">
                  <textarea name="reason[title]" placeholder="{{$reason['title']}}" value="{{ $user->reason->title }}" class="border-blue-gray-200 text-blue-gray-700 placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 disabled:bg-blue-gray-50 peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border focus:border-2 focus:border-gray-800 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0"></textarea>
                </div>
              </div>
              <br />
              <h2 class="mb-2 pl-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">ランキング</h2>
              <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                  <div>
                    <input type="hidden" name="rank[number][]" value="1" />
                    1<input type="textbox" name="rank[title][]" value="{{$rank[0]['title']}}" class="border-blue-gray-200 text-blue-gray-700 placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 disabled:bg-blue-gray-50 peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0" /><br />
                  </div>
    
                  <div>
                    <input type="hidden" name="rank[number][]" value="2"  />
                    2<input type="textbox" name="rank[title][]" value="{{$rank[1]['title']}}" class="border-blue-gray-200 text-blue-gray-700 placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 disabled:bg-blue-gray-50 peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border focus:border-2 focus:border-blue-500 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0"/><br />
                  </div>
    
                  <div>
                    <input type="hidden" name="rank[number][]" value="3" />
                    3<input type="textbox" name="rank[title][]" value="{{$rank[2]['title']}}" class="border-blue-gray-200 text-blue-gray-700 placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 disabled:bg-blue-gray-50 peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border focus:border-2 focus:border-yellow-500 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0"/>
                  </div>
              </div>
    
              <h2 class="mb-2 pl-4 pt-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">コメント</h2>
              <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
                <textarea name="reason[body]" placeholder="{{$reason['body']}}" value="{{ $user->reason->body }}" class="border-blue-gray-200 text-blue-gray-700 placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 disabled:bg-blue-gray-50 peer h-full min-h-[100px] w-full resize-none rounded-[7px] border border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal outline outline-0 transition-all placeholder-shown:border focus:border-2 focus:border-gray-800 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0"></textarea>
              </div>
    
              <input type="hidden" name="reason[id]" value="{{$user->reason->id}}" />
              <div class="mt-auto flex items-end justify-end p-4">
                <input type="submit" value="保存" class="rounded border px-2 py-1 text-sm text-gray-500" />
                <div class="back">
                  <a href="/">
                  <span class="rounded border px-2 py-1 text-sm text-gray-500">削除</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </x-slot>
    
    
    <x-slot name="sub1">
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを探す</button></a><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime'>アニメ一覧</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを評価</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment'>口コミ一覧</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
          <button type="button" class=" text-black w-64 text-left py-2 px-10 rounded"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </x-slot>
    
</x-app-layout>
