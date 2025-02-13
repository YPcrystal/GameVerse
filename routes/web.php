<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::resource('/products', ProductController::class);
Route::resource('/posts', PostController::class);
Route::resource('/reporters', ReporterController::class);
Route::resource('/comments', CommentController::class);
Route::resource('/siswas', SiswaController::class);
Route::resource('/nilais', NilaiController::class);

Route::resource('games', GameController::class);

// Nested routes for reviews within games
Route::prefix('games/{game}')->group(function () {
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');