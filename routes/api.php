<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
// Add this in your api.php
use App\Models\User;

Route::get('/users/{id}', function ($id) {
    return User::findOrFail($id);
});

// Define the route for the API
Route::get('/posts', [PostController::class, 'index']); // Get all posts
Route::post('/posts', [PostController::class, 'store']); // Create a new post
Route::get('/posts/{post}', [PostController::class, 'show']); // Get a single post
Route::put('/posts/{post}', [PostController::class, 'update']); // Update a post
Route::delete('/posts/{post}', [PostController::class, 'destroy']); // Delete a post

