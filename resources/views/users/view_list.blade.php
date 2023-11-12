<x-app-layout>
    <x-slot name="header">
        <h1>アニメ一覧</h1>
    </x-slot>
    
    <x-slot name="slot">
        <div class="bg-white lg:pb-12">
          <div class="mx-auto max-w-screen-2xl px-4 md:px-8 pt-6">
            <!-- menu - start -->
            <div class=" rounded-lg border bg-gray-50 shadow-sm lg:block">
              <h2><div class="text-2xl text-left mb-1 font-semibold p-4">{{$users->name}}</h2>
              <div class="mx-auto flex max-w-screen-lg items-center gap-8 p-4">
                <div class="flex">
                    <div>
                      <div class="mb-1 font-semibold">視聴済み</div>
                      <p class="text-sm text-gray-500">{{$animes->count()}}</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select list</label>
            <select id="tabs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>お気に入り一覧</option>
                <option>視聴一覧</option>
                <option>評価一覧</option>
                <option>コメント一覧</option>
            </select>
        </div>
        <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400 p-6">
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/like" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">いいね</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/view" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-l-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">視聴済み</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/rate" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">評価一覧</a>
            </li>
            <li class="w-full">
                <a href="/users/{{ $users->id }}/list/comment" class="inline-block w-full p-4 bg-white rounded-r-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">コメント一覧</a>
            </li>
        </ul>
        
        <h1><div class="text-2xl text-center border-t-4 border-b-4 border-green-500">視聴済み</div></h1>
        <div class="flex justify-center overflow-x-auto p-2">
            <table class="md:border-collapse">
              <!-- head -->
                  <thead>
                      <div class="px-8 py-3">
                        <tr class="border-b-8">
                          <th>
                            <div class="px-8 py-3">
                              image
                            </div>
                          </th>
                          <th>title</th>
                          <th>link</th>
                          <th>
                            <div class="px-4 py-3">
                            いいね数
                            </div>
                          </th>
                          <th>
                            <div class="px-4 py-3">
                            視聴済み
                          </th>
                          <th>評価</th>
                        </tr>
                      </div>
                  </thead>
              <tbody>
                      <!-- row 1 -->
                  @foreach ($animes as $anime)
                  @if(in_array($anime->id,$view_anime))
                    <tr class="border-b-8">
                      <td>
                          <div class="flex items-center">
                              <div class='image'>
                                  <img class="mask mask-squircle w-28 h-24" src="{{$anime->image}}" alt="">
                              </div>
                          </div>
                      </td>
                        
                      <!-- title -->
                      <td>
                          <div class="font-bold text-center px-8"><a href="/posts/{{ $anime->id }}/anime_view">{{$anime->name}}</a></div>
                          <div class='era text-center px-8 py-3'>{{$anime->era}}</div>
                      </td>
                    
                      <!-- link -->
                      <th>
                          <a href="{{$anime->link}}">公式サイト</a>
                      </th>
                        
                      <td>
                          <span>
                            <!-- もしlikeがあれば＝ユーザーが「いいね」をしていたら -->
                            @if($anime->is_like())
                              <!-- 「いいね」の数を表示 -->
                              <a href="{{ route('like', $anime) }}" class="btn btn-success btn-sm">
                                <div class="text-center px-8 py-3">	{{$anime->likes->count()}}<br/>
                              <!-- 「いいね」取消用ボタンを表示 -->
                              <div class="text-gray-600 text-center">いいね</div>
                              </div>
                              </a> 
                            @else
                              <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                                <a href="{{ route('unlike', $anime) }}" class="btn btn-secondary btn-sm">
                                  <!-- 「いいね」の数を表示 -->
                                  <div class="text-center px-8 py-3">{{$anime->likes->count()}}<br/>
                                  <div class="text-orange-600 text-center ">いいね!</div>
                                  </div>
                                </a>
                            @endif
                          </span>
                      </td>
                      <td>  
                            <span>
                                <!-- もし$viewがあれば＝ユーザーが「いいね」をしていたら -->
                                @if($anime->is_look())
                                <!-- 「いいね」取消用ボタンを表示 -->
                                	<a href="{{ route('look', $anime) }}" class="btn btn-success btn-sm">
                                		<div class="text-gray-600 text-center">未視聴</div>
                                		
                                	</a>
                                @else
                                <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                                	<a href="{{ route('unlook', $anime) }}" class="btn btn-secondary btn-sm">
                                		<div class="text-blue-600 text-center">視聴済み</div>
                                		</div>
                                	</a>
                                @endif
                            </span>
                        </td>
                          
                      <th class="border-b-8">
                        <button class="btn btn-ghost btn-xs"><a href="/posts/{{ $anime->id }}/anime_rate">アニメ評価</a></button>
                      </th>
                    </tr>
                  @endif
                  @endforeach
                </tbody>
            </table>
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
