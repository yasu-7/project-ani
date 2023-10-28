
        <h1>アニメ投稿一覧</h1>
   
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.3/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    

    <div class='ranking'>
            @foreach ( $rankings as $ranking)   
        <div class="bg-gray-50 py-6 sm:py-8 lg:py-12">
          <div class="mx-auto max-w-screen-md px-4 md:px-8 bg-slate-200">
            <h1 class="mb-4 text-right text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6">投稿日：{{$ranking->updated_at}}</h1>
            <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6">ユーザー名：{{$ranking->user->name}}</h1>
    
          <div class="bg-orange-500 py-6 sm:py-8 lg:py-12 rounded-lg">
            <h2 class="mb-2 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">タイトル</h2>
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
              <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-yellow-50 p-4 sm:flex-row md:p-4">
                <div>
                  <h2 class="text-center font-bold text-gray-600 md:text-2xl">{{$ranking->title}}</h2>
                </div>
              </div>
            </div>
            <br>
    
          <h2 class="mb-2 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">ランキング</h2>
          <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
            <div class="flex flex-col items-center rounded-lg bg-yellow-50 p-4 sm:flex-row">
                @foreach($ranking->ranks as $rank)
                  <div>
                    <div class="flex flex-col items-center justify-between rounded-lg bg-gray-300 p-4">第{{$rank->number}}位  {{$rank->title}}</div><br>
                  </div>
                  <br>
                @endforeach
            </div>
          </div>
          <br>
    
          <h2 class="mb-2 text-left font-semibold text-gray-800 sm:text-2xl md:mb-4">コメント</h2>
            <div class="mx-auto max-w-screen-2xl px-4 md:px-4">
              <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-yellow-50 p-4 sm:flex-row md:p-8">
                <div>
                  <p class="text-gray-500 sm:text-lg">{{$ranking->body}}</p>
                </div>
              </div>
            </div>
            <br>
            <div class="items-rigt px-4 md:px-4">
              <div class=" items-right rounded-lg bg-yellow-50 px-4 md:px-4">
                <div>
                  <p class="text-gray-500 sm:text-lg">
                　  @if(Auth::id() == $ranking->user_id)
                        <div class="edit"><a href="/posts/{{ $ranking->user->id }}/edit_post">edit</a></div>
                　  @endif
                　</p>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
    
    

    <div id="sub1">
        <div class="tabs">
          <a class="tab tab-bordered" href='/anime/show'>アニメを探す</button></a><br>
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

    
        <div id="sub2">
        <h1>今期のアニメ一覧</h1>
        <h1>新規の口コミ</h1>
        <a href='/posts/comment'>roll2</a>
        </div>
  
