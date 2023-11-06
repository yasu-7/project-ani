
        <h1>アニメ投稿一覧</h1>
   
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
<div class="ranking">
  @foreach ( $rankings as $ranking)
  <div class="bg-gray-50 py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-md outline rounded-lg bg-white px-4 md:px-8">
      <h1 class="pt-3 text-right font-bold text-gray-800">投稿日：{{$ranking->updated_at}}</h1>
      <h1 class="pb-3 text-left font-bold text-gray-800">ユーザー名：{{$ranking->user->name}}</h1>

      <div class="rounded-lg bg-white py-3">
        <h2 class="mb-2 pl-4 text-left font-semibold text-gray-800 sm:text-2xl">タイトル</h2>
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="flex flex-col items-center justify-center gap-4 rounded-lg p-4 sm:flex-row md:p-4">
            <div>
              <h2 class="text-center font-bold text-gray-600 text-2xl">{{$ranking->title}}</h2>
            </div>
          </div>
        </div>
        <br />

        <h2 class="mb-2 pl-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">ランキング</h2>
        <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
          <div class="flex flex-col items-center justify-center rounded-lg  p-4 sm:flex-row">
            <div>
              @foreach($ranking->ranks as $rank)
                  <div>
                    <div class="flex flex-col items-center justify-center rounded-lg bg-gray-300 p-4">第{{$rank->number}}位  {{$rank->title}}</div><br>
                  </div>
                @endforeach
            </div>
          </div>
        </div>

        <h2 class="mb-2 pl-4 pt-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">コメント</h2>
        <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
          <div class="flex flex-col items-center gap-4 rounded-lg bg-yellow-50 p-4 sm:flex-row">
            <div>
              <p class="text-gray-500 sm:text-lg">{{$ranking->body}}</p>
            </div>
          </div>
        </div>
        <div class="mt-auto flex items-end justify-end px-4 pt-3">
        <span class="rounded border px-2 py-1 text-sm text-gray-500">
          @if(Auth::id() == $ranking->user_id)
                        <div class="edit"><a href="/posts/{{ $ranking->user->id }}/edit_post">edit</a></div>
          @endif
        </span>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>



    <div id="sub1">
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
    </div>

