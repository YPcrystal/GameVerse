<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
    Route::resource('/products', \App\Http\Controllers\ProductController::class);
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('/reporters', \App\Http\Controllers\ReporterController::class);
    Route::resource('/comments', \App\Http\Controllers\CommentController::class);
    Route::resource('/siswas', \App\Http\Controllers\SiswaController::class);
    Route::resource('/nilais', \App\Http\Controllers\NilaiController::class);
    Route::resource('/reviews', \App\Http\Controllers\ReviewController::class);
    Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductController::class);
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    
    
});

require __DIR__.'/auth.php';
