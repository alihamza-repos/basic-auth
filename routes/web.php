<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ImageController;

// routes/web.php
Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');

//for image upload and download
Route::get('/images/upload', [ImageController::class, 'create'])->name('images.upload');
Route::post('/images/store', [ImageController::class, 'store'])->name('images.store');
Route::get('/images', [ImageController::class, 'index'])->name('images.index');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
//Route::resource('posts', PostController::class);
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Admin routes
// Route::group(['middleware' => ['role:admin']], function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index']);
// });

// User routes
// Route::group(['middleware' => ['role:user']], function () {
//     Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
// });

// Editor routes
// Route::group(['middleware' => ['role:editor']], function () {
//     Route::get('/editor/articles', [EditorController::class, 'index']);
// });
