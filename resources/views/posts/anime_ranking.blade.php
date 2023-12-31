<x-app-layout>
    
    
    <x-slot name="header">
        <h1>アニメランキング</h1>
    </x-slot>
    
    
<x-slot name="slot">
    <div class="py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="rounded-lg bg-gray-50 px-4 py-6 md:py-8 lg:py-12">
          <p class="mb-2 text-center font-semibold text-indigo-500 md:mb-3 lg:text-lg">Introducing</p>
    
          <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">アニメのランキングを調べる</h2>
    
          <div class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">
            ユーザー全体の評価によるランキングを表示しています。</br>
          </div>
        </div>
  <div class="flex justify-center rounded bg-white p-8 mt-8">
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
              <th>
                <div class="py-3">
                like数
                </div>
              </th>
              <th>
                <div class="py-3">
                視聴済み
                </div>
              </th>
              <th>
                <div class="pl-2 py-3 text-left">
                アニメ評価
                </div>
              </th>
              <th>
                <div class="py-3 text-left">
                評価する
                </div>
              </th>
            </tr>
      </thead>
      <tbody>
              <!-- row 1 -->
          @foreach ($ratings as $rating)
            <tr class="border-b-8">
              <td>
                  <div class="flex items-center">
                      <div class='image'>
                          <img class="mask mask-squircle w-28 h-24" src="{{$rating->anime->image}}">
                      </div>
                  </div>
              </td>
                
              <!-- title -->
              <td>
                  <div class="font-bold text-center px-8 no-underline hover:underline decoretion-sky-500 hover:text-sky-500"><a href="/posts/{{ $rating->anime->id }}/anime_view">{{$rating->anime->name}}</a></div>
              </td>
              <td>
                  <span>
                    <!-- もしlikeがあれば＝ユーザーが「いいね」をしていたら -->
                    @if($rating->anime->is_like())
                      <!-- 「いいね」の数を表示 -->
                      <a href="{{ route('like', $rating->anime) }}" class="btn btn-success btn-sm">
                        <div class="text-center px-8 py-3">	{{$rating->anime->likes->count()}}<br/>
                      <!-- 「いいね」取消用ボタンを表示 -->
                      <div class="text-gray-600 text-center ">いいね</div>
                      </div>
                      </a> 
                    @else
                      <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                        <a href="{{ route('unlike', $rating->anime) }}" class="btn btn-secondary btn-sm">
                          <!-- 「いいね」の数を表示 -->
                          <div class="text-center px-8 py-3">{{$rating->anime->likes->count()}}<br/>
                          <div class="text-orange-600 text-center">いいね!</div>
                          </div>
                        </a>
                    @endif
                  </span>
              </td>
              <td>  
                    <span>
                        <!-- もし$viewがあれば＝ユーザーが「いいね」をしていたら -->
                        @if($rating->anime->is_look())
                        <!-- 「いいね」取消用ボタンを表示 -->
                        	<a href="{{ route('look', $rating->anime) }}" class="btn btn-success btn-sm">
                        		<div class="text-gray-600 text-center">未視聴</div>
                        		
                        	</a>
                        @else
                        <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                        	<a href="{{ route('unlook', $rating->anime) }}" class="btn btn-secondary btn-sm">
                        		<div class="text-center text-blue-600">視聴済み
                        		</div>
                        	</a>
                        @endif
                    </span>
                </td>
                
                <td>
                
                    <div class="text-left px-4">レート:{{$rating->rate}}</div>
                    <div class="items-center">
                      <div class="flex">
                          @for($i=0; $i < floor($rating->rate); $i++)
                              <div class="flex-none">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                          　　          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        　　      　</svg>
                              </div>
                          @endfor
                          @if(  $rating->rate - floor($rating->rate) !== 0.0000)
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 transform scale-x-[-1]" viewBox="0 0 20 20" fill="currentColor">
                                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8" />
                              </svg>
                        　@endif
                      </div> 
                    </div>
                </td>
                  
              <th class="border-b-8 text-left">
                <button class="btn btn-ghost btn-xs no-underline hover:underline decoretion-sky-500 hover:text-sky-500"><a href="/posts/{{ $rating->anime->id }}/anime_rate">評価する</a></button>
              </th>
            </tr>
          @endforeach
        </tbody>
    </table>
  </div>
  </div>
  </div>
</x-slot>

  <x-slot name="sub1">
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを探す</button></a><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime'>アニメ一覧</button></a><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/youtube/anime'>PV集<br>
      <button type="button" class="text-2xl text-white bg-blue-600 font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを評価</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment'>口コミ一覧</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
      <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
  </x-slot>
    
    
 </x-app-layout> 
