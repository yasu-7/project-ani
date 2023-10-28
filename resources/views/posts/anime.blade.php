<x-app-layout>
    
    <x-slot name="slot">
      <div class="flex justify-center overflow-x-auto">
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
              @if(!in_array($anime->id,$not_view))
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
    </x-slot>
    
    <x-slot name="sub1">
    <div class="">
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを探す</button></a><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime'>アニメ一覧</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/anime/show'>アニメを評価</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment'>口コミ一覧</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
          <button type="button" class="bg-gray-100 text-black w-64 text-left py-2 px-10 rounded"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </div>
    </x-slot>
    
 </x-app-layout> 
