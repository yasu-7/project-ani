<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RankController;

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Route::get('/', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts/comment_create', [PostController::class, 'create_c']);
    
    Route::get('/posts/{anime}/anime_rate', [PostController::class, 'rate']);

    Route::post('/comments', [PostController::class, 'store']);
    Route::post('/posts', [PostController::class, 'store_p']);
    
    Route::get('/posts/anime', [PostController::class, 'show']);
    Route::get('/posts/comment', [PostController::class, 'show_comment']);
    
    
    Route::get('/posts/{comment}/edit', [PostController::class, 'edit']);
    Route::put('/posts/{comment}', [PostController::class, 'update']);
    Route::delete('/posts/{comment}', [PostController::class,'delete']);
    
    
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
