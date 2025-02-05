<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PharmacyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('/products', ProductController::class);
Route::resource('/posts', PostController::class);
Route::resource('/reporters', \App\Http\Controllers\ReporterController::class);
Route::resource('/comments', CommentController::class);
Route::resource('/siswas', \App\Http\Controllers\SiswaController::class);
Route::resource('/nilais', \App\Http\Controllers\NilaiController::class);
Route::resource('/reviews', ReviewController::class);
Route::resource('games', GameController::class);
Route::post('games/{gameId}/reviews', [GameController::class, 'storeReview'])->name('reviews.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/', [GameController::class, 'index'])->name('home');
// Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
// Route::get('search', [GameController::class, 'search'])->name('games.search');
// Route::post('games/{gameId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');