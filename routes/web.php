<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AnnictController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\YoutubeController;
/*
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [PostController::class, 'index'])->name('index');
//Route::get('/view', [RankController::class, 'rank_view']);
//Route::get('/view_post', [RankController::class, 'post_view']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route::get('/', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::get('/posts/comment_create', [PostController::class, 'create_comment']);
    
    Route::get('/posts/{id}/anime_rate', [PostController::class, 'rate']);
    Route::get('/posts/{anime}/anime_view', [PostController::class, 'anime_view']);

    Route::post('/comments', [PostController::class, 'comment']);
    Route::post('/posts/{datas}', [PostController::class, 'rate_post']);
    Route::post('/reasons', [PostController::class, 'rank_post']);
    
    Route::get('/posts/anime', [PostController::class, 'show'])->name('anime');
    Route::get('/posts/anime_filter', [PostController::class, 'show_filter'])->name('anime_filter');
    Route::get('/posts/comment', [PostController::class, 'show_comment'])->name('comment');
    Route::get('/posts/anime_ranking', [RankController::class, 'ranking'])->name('ranking');
    Route::get('/posts/anime_rate/list', [PostController::class, 'show_post'])->name('rate_list');
    Route::get('/anime/show',[AnnictController::class, 'show_annict'])->name('show');
    Route::get('/anime/search',[AnnictController::class, 'search_annict'])->name('search');
    Route::get('/anime/show_season',[AnnictController::class, 'show_season'])->name('show_season');
    Route::get('/anime/search_season',[AnnictController::class, 'search_season'])->name('search_season');
    
    
    Route::get('/users/{id}', [PostController::class, 'profile']);
    Route::get('/users/{id}/list/view', [PostController::class, 'view_list']);
    Route::get('/users/{id}/list/like', [PostController::class, 'like_list']);
    Route::get('/users/{id}/list/rate', [PostController::class, 'rate_list']);
    Route::get('/users/{id}/list/ranking', [PostController::class, 'ranking_list']);
    Route::get('/users/{id}/list/comment', [PostController::class, 'comment_list']);
    
    Route::get('/posts/{comment}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{comment}', [PostController::class, 'update']);
    Route::delete('/posts/{comment}', [PostController::class,'delete']);
    
    Route::get('/posts/{id}/edit_post', [PostController::class, 'edit_ranking']);
    Route::put('/posts/{id}/update_ranking', [PostController::class, 'update_ranking']);
  
    
    Route::get('/posts/{id}/anime_rate_edit', [PostController::class, 'edit_rate']);
    Route::put('/posts/edit/{id}', [PostController::class, 'update_rate']);
    Route::delete('/posts/{id}', [PostController::class,'delete_post']);
    
    Route::get('/posts/like/{anime}', [LikeController::class, 'like'])->name('like');
    Route::get('/posts/unlike/{anime}', [LikeController::class, 'unlike'])->name('unlike');
    
    Route::get('/posts/look/{anime}', [ViewController::class, 'look'])->name('look');
    Route::get('/posts/unlook/{anime}', [ViewController::class, 'unlook'])->name('unlook');
    
    Route::get('/posts/{anime}/anime_count',[AccessController::class, 'index']);
    
    Route::get('youtube/anime', [YoutubeController::class, 'searchVideos']);
    
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
