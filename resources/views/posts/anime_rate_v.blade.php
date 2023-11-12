<x-app-layout>
    <x-slot name="header">
        <h1>アニメ評価一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="bg-white py-6 sm:py-8 lg:py-12">
              <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="rounded-lg bg-gray-100 px-4 py-6 md:py-8 lg:py-12">
                  <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
            
                  <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">ユーザーのアニメの評価を確認</h2>
            
                  <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
                    今まで、どんな評価をされたのか知ることができます。</br>
                    [作品名]→[アニメ詳細画面]に遷移することで、作品ごとの評価を見ることができます。
                  </p>
                </div>
              </div>
            </div>
            <div class="mx-auto max-w-screen-md px-4 md:px-8">
                <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl xl:mb-12">アニメ評価一覧</h2>
        
                <div class="divide-y rounded">
                @foreach ($posts as $post)
                    <!-- review - start -->
                    <div class="flex flex-col gap-3 py-4 md:py-8 border-t-2 border-b-2">
                        <div class="mt-auto flex items-end justify-between">
                            <div>
                                <span class="block text-sm font-bold">{{$post->anime->name}}</span>
                                <span class="block text-sm font-bold">{{$post->user->name}}</span>
                                <span class="block text-sm text-gray-500"><p class='time'>{{$post->created_at}}</p></span>
                            </div>
                            <div>
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
        
                    <!-- stars - start -->
                        <div class="flex">
                            @for($i=0; $i < $post->rate; $i++)
                                <div class="flex-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                            　　          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                          　　      　</svg>
                                </div>
                            @endfor 
                            <p calss="text-2xl">アニメ評価：{{$post->rate}}</p>
                            <!-- stars - end -->
                        </div>
                        <p class="text-gray-600">{{$post->body}}</p>
                    </div>
                @endforeach
                </div>
            </div>
            {{ $posts->links() }}
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
