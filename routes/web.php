<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AnnictController;
use App\Http\Controllers\AccessController;
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
Route::get('/', [PostController::class, 'index']);
Route::get('/view', [RankController::class, 'rank_view']);
Route::get('/view_post', [RankController::class, 'post_view']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route::get('/', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts/comment_create', [PostController::class, 'create_c']);
    
    Route::get('/posts/{id}/anime_rate', [PostController::class, 'rate']);
    Route::get('/posts/{anime}/anime_view', [PostController::class, 'anime_view']);

    Route::post('/comments', [PostController::class, 'comment']);
    Route::post('/posts/{datas}', [PostController::class, 'rate_post']);
    Route::post('/reasons', [PostController::class, 'rank_post']);
    
    Route::get('/posts/anime', [PostController::class, 'show']);
    Route::get('/posts/comment', [PostController::class, 'show_comment']);
    Route::get('/posts/anime_ranking', [RankController::class, 'ranking']);
    Route::get('/posts/anime_rate_v', [PostController::class, 'show_post']);
    Route::get('/anime/show',[AnnictController::class, 'show_annict']);
    Route::get('/anime/search',[AnnictController::class, 'search_annict']);
    
    Route::get('/posts/{comment}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{comment}', [PostController::class, 'update']);
    Route::delete('/posts/{comment}', [PostController::class,'delete']);
    
    Route::get('/posts/{id}/edit_post', [PostController::class, 'edit_ranking']);
    Route::put('/posts/{id}/update_ranking', [PostController::class, 'update_ranking']);
    Route::delete('/posts/{id}', [PostController::class,'delete_post']);
    
    Route::get('/posts/like/{anime}', [LikeController::class, 'like'])->name('like');
    Route::get('/posts/unlike/{anime}', [LikeController::class, 'unlike'])->name('unlike');
    
    Route::get('/posts/look/{anime}', [ViewController::class, 'look'])->name('look');
    Route::get('/posts/unlook/{anime}', [ViewController::class, 'unlook'])->name('unlook');
    
    Route::get('/posts/{anime}/anime_count',[AccessController::class, 'index']);
    
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
