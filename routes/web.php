<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

use App\Http\Controllers\CommentController;

Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{postId}/comments', [CommentController::class, 'index'])->name('comments.index');

// Comments Routes
Route::post('comments/{comment}/reply', [CommentController::class, 'storeReply'])->name('comments.reply');
Route::post('comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');

// Other routes for posts (if you haven't already)
Route::resource('posts', PostController::class);
