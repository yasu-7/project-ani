<x-app-layout>
    <x-slot name="header">
        <h1>アニメの詳細</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="bg-white lg:pb-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8 p-4">
            <!-- menu - start -->
            <div class=" rounded-lg border bg-gray-50 shadow-sm lg:block">
              <h2><div class="text-3xl text-center mb-1 font-semibold p-4">{{$anime->name}}</h2>
              <div class="mx-auto flex max-w-screen-lg items-center gap-8 p-4">
                <!-- promo - start -->
                <div class="w-1/3 overflow-hidden rounded-lg border">
                  <div class="h-48 bg-gray-100">
                    <img src="{{$anime->image}}"  class="h-full w-full object-cover object-center" />
                  </div>
        
                  <div class="flex items-center justify-between gap-2 bg-white p-3">
                    <p class="text-sm text-gray-500"> <a href="{{$anime->link}}">公式サイト</a></p>
        
        
                  </div>
                </div>
                <!-- promo - end -->
                
                <div class="grid w-2/3 grid-cols-2 gap-8">
                    <div>
                      <div class="mb-1 font-semibold">アニメ評価</div>
                        <div class="items-center">
                            <div class="flex">
                                @for($i=0; $i < floor($rating); $i++)
                                    <div class="flex-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                              　　            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            　　        　</svg>
                                    </div>
                                 @endfor
                                @if(  $rating - floor($rating) !== 0.0000)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400 transform scale-x-[-1]" viewBox="0 0 20 20" fill="currentColor">
                                         <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8" />
                                    </svg>
                            　  @endif
                            </div>
                            <span class="block text-sm text-gray-500">Bases on {{$anime->posts->count()}} reviews</span>
                        </div>
                    </div>
                    <div>
                      <div class="mb-1 font-semibold">rating</div>
                      <p class="text-2xl text-left text-gray-500">{{$rating}}</p>
                    </div>
                    <div>
                      <div class="mb-1 font-semibold">いいね数</div>
                      <p class="text-2xl text-left text-gray-500">{{$anime->likes->count()}}</p>
                    </div>
                    <div>
                      <div class="mb-1 font-semibold">アクセス数</div>
                      <p class="text-2xl text-left text-gray-500">{{$accessCounter->count}}</p>
                    </div>
                </div>
              </div>
              
            </div>
            <!-- menu - end -->
          </div>
        </div>
            <div class="mx-auto max-w-screen-md px-4 md:px-8">
            <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl xl:mb-12">アニメ評価一覧</h2>
    
            <div class="divide-y rounded">
            @foreach ($posts as $post)
                <!-- review - start -->
                <div class="flex flex-col gap-3 py-4 md:py-8 border-t-2 border-b-2">
                    <div>
                        <span class="block text-sm font-bold">{{$post->anime->name}}</span>
                        <span class="block text-sm font-bold">{{$post->user->name}}</span>
                        <span class="block text-sm text-gray-500"><p class='time'>{{$post->created_at}}</p></span>
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
                    @if(Auth::id() == $post->user_id)
                        <div class="edit">
                            <a href="/posts/{{ $post->id }}/anime_rate_edit">
                                <span class="rounded border px-2 py-1 text-sm text-gray-500">
                                    edit
                                </span>
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
            </div>
        </div>
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
