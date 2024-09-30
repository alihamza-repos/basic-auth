<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Define the route for the API
Route::get('/posts', [PostController::class, 'index']); // Get all posts
Route::post('/posts', [PostController::class, 'store']); // Create a new post
Route::get('/posts/{id}', [PostController::class, 'show']); // Get a single post
Route::put('/posts/{id}', [PostController::class, 'update']); // Update a post
Route::delete('/posts/{id}', [PostController::class, 'destroy']); // Delete a post

