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
