<x-app-layout>
    <x-slot name="header">
        <h1>アニメ評価</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="px-4 py-6 sm:py-8 lg:pb-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8 p-4">
                <div class="rounded-lg bg-gray-50 px-4 py-6 md:py-8 lg:py-12">
                      <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
                
                      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">アニメ評価編集画面</h2>
                
                      <div class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                        アニメ評価済み</br>
                        
                      </div>
                </div>
            </div>
            
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8 p-4">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8 p-4 bg-gray-50">
            <div class="mx-auto flex max-w-screen-lg items-center gap-8">
                <!-- promo - start -->
                <div class="w-1/3 overflow-hidden rounded-lg border">
                  <div class="h-48 bg-gray-100">
                    <img src="{{$post->anime->image}}"  class="h-full w-full object-cover object-center" />
                  </div>
                </div>
                <!-- promo - end -->
                
                <div class="grid w-2/3 gap-8">
                    <div class="mb-1 font-bold text-2xl">{{$post->title}}</div>
                </div>
             </div>
                
            <div class='posts'>
            <form action="/posts/edit/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')
                 <div class="anime_id">
                    <input type="hidden" name="post[anime_id]" value="{{$post->anime_id}}"/>
                </div>
                    
                <div class="title">
                    <input type="hidden" name="post[title]" value="{{$post->title}}"/>
                </div>
                
                <div class="flex flex-row gap-8 justify-center pt-8">
                    <div class="flex justify-center">
                        <div class="text-2xl font-bold">感想：</div>
                        <textarea name="post[body]" placeholder="口コミや感想などを投稿">{{$post->body}}</textarea>
                    </div>
                
                    <div class="flex justify-center">
                    <div class="text-2xl font-bold">レート：</div>
                    <select name="post[rate]">
                        <option value="{{$post->rate}}">元の評価：{{$post->rate}}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                </div>
                
                <div class="flex flex-row gap-8 justify-center mt-8">
                    <input type="submit" value="保存" class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500"/>
                    <div class="back no-underline hover:underline decoretion-sky-500 hover:text-sky-500">
                        <a href="/posts/anime">戻る</a>
                    </div>
                </div>
                
             </form>
                
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
      <button type="button" class="text-2xl text-white bg-blue-600 font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを評価</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment'>口コミ一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </x-slot>
    
</x-app-layout>
