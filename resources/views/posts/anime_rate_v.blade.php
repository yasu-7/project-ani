<x-app-layout>
    <x-slot name="header">
        <h1>アニメ評価一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="bg-white py-6 sm:py-8 lg:py-12">
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
    <div id="sub1">
        <h1>
            <a href='/anime/show'>アニメを探す</a>
        </h1>
        <h1>
            <a href='/posts/anime'>アニメ一覧</a>
        </h1>
        <h1>
            <a href='/posts/anime_rate/list'>アニメ評価一覧</a>
        </h1>
        <h1>
            <a href='/posts/anime_ranking'>アニメランキング</a>
        </h1>
        <h1>
            <a href='/posts/create'>アニメランキング投稿</a>
        </h1>    
        <h1>
            <a href='/anime/show'>アニメを評価</a>
        </h1>
        <h1>
            <a href='/posts/comment'>口コミ一覧</a>
        </h1>
        <h1>
            <a href='/posts/comment_create'>口コミ投稿</a>
        </h1>
        <h1>
            <a href='/users/{{Auth::id()}}'>プロフィール</a>
        </h1>
    </div>
    </x-slot>
    
    <x-slot name="sub2">
        <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
        </div>
    </x-slot>
    
 </x-app-layout> 
