<x-app-layout>
    
    <x-slot name="slot">
    <div class="px-4 py-6 md:py-8 lg:py-12">  
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="rounded-lg bg-gray-100 px-4 py-6 md:py-8 lg:py-12">
          <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
    
          <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">アニメのランキングを調べる</h2>
    
          <div class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
            ユーザー全体の評価によるランキングを表示しています。</br>
          </div>
        </div>
      
      <div class=" rounded bg-white my-3">
        <div class="flex justify-end">
            <button type="button" class="rounded bg-blue-900 px-4 py-2 text-white hover:bg-blue-300 mx-6 mt-3"><a href='/posts/anime_filter'>絞り込み</button></a><br>
        </div>
        <div class="flex justify-center bg-white rounded p-8">
        <table class="md:border-collapse w-full">
          <!-- head -->
          <thead>
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
                      <div class="font-bold text-center px-2"><a href="/posts/{{ $anime->id }}/anime_view">{{$anime->name}}</a></div>
                      <div class='era text-center px-2 py-3'>{{$anime->era}}</div>
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
                            	</a>
                            @endif
                        </span>
                    </td>
                      
                  <th class="border-b-8">
                    <button class="btn btn-ghost btn-xs"><a href="/posts/{{ $anime->id }}/anime_rate">アニメ評価</a></button>
                  </th>
                </tr>
              @endforeach
            </tbody>
        </table>
        
      </div>
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
