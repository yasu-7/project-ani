
  <div class="flex">
    <div class="w-full text-center text-3xl font-bold m-4">アニメ投稿一覧</div>
    <div class="justify-end m-4 w-80 text-center"><a href="/register" class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500">新規登録</a></div>
  </div>
   
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

  <div class="flex flex-row bg-amber-100">
    <div name="sub1" class="flex-none w-1/6 max-h-max bg-blue-200">
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを探す</button></a><br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime'>アニメ一覧</button></a><br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_rate/list'>アニメ評価一覧</a></button><br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/youtube/anime'>PV集<br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/anime_ranking'>アニメランキング</a></button><br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/create'>アニメランキング投稿</a></button><br>  
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/anime/show'>アニメを評価</a></button><br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment'>口コミ一覧</a></button><br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/posts/comment_create'>口コミ投稿</a></button><br>
        <button type="button" class="text-2xl text-black font-bold text-left w-full py-2 px-10 rounded hover:bg-blue-600 hover:text-white"><a href='/users/{{Auth::id()}}'>プロフィール</a></button><br>
    </div>


    <div class="ranking flex-none w-3/4 max-h-max bg-amber-100">
      @foreach ( $rankings as $ranking)
      <div class="bg-amber-100 py-6 sm:py-8 lg:py-12">
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
              <div class="flex flex-col rounded-lg  p-4 sm:flex-row">
                <div class="w-full">
                  @foreach($ranking->ranks as $rank)
                      <div class="flex flex-row gap-4 mb-2">
                        <div class="text-center text-xl font-semibold w-1/5 rounded-lg p-4">第{{$rank->number}}位</div>
                        <div class="text-center w-4/5 p-4 border-b-2 border-gray-900">{{$rank->title}}</div>
                      </div>
                    @endforeach
                </div>
              </div>
            </div>
    
            <h2 class="mb-2 pl-4 pt-4 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">コメント</h2>
            <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
              <div class="flex flex-col items-center gap-4 rounded-lg p-4 sm:flex-row">
                <div>
                  <p class="text-gray-500 sm:text-lg">{{$ranking->body}}</p>
                </div>
              </div>
            </div>
            <div class="mt-auto flex items-end justify-end px-4 pt-3">
            <span class="rounded border px-2 py-1 text-sm text-gray-500">
              @if(Auth::id() == $ranking->user_id)
                            <div class="no-underline hover:underline decoretion-sky-500 hover:text-sky-500"><a href="/posts/{{ $ranking->user->id }}/edit_post">編集</a></div>
              @endif
            </span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

