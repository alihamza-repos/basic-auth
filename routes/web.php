<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ImageController;
use App\Http\Middleware\SpecialUser;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HelloController;
// routes/web.php
Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');

//for image upload and download
Route::middleware('special')->group(function(){
    Route::get('/images/upload', [ImageController::class, 'create'])->name('images.upload');
    Route::post('/images/store', [ImageController::class, 'store'])->name('images.store');
    Route::get('/images', [ImageController::class, 'index'])->name('images.index');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Dashboard routes
Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('show.dashboard');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Posts Routes
Route::resource('posts', PostController::class);
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Comments Routes
Route::middleware('auth')->group(function(){
    Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/posts/{postId}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('comments/{comment}/reply', [CommentController::class, 'storeReply'])->name('comments.reply');
    Route::post('comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');

});

//Hello Temp Routes
Route:: get('/temp-hello', [HelloController::class, 'index'])->name('hello.index');
Route::get('/temp-hello/create', [HelloController:: class, 'create'])->name('create');
Route::post('/temp-hello/create', [HelloController:: class, 'store'])->name('store');


// Tailwind Routes
Route:: get('forcss', function(){
    return view('temp.forcss');
});
