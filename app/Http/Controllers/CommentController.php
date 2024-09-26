<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Create the comment using the request data
        Comment::create([
            'user_id' => Auth::id(), // Get the authenticated user's ID
            'post_id' => $postId,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function index($postId)
    {
        $comments = Comment::where('post_id', $postId)->with('user')->get();
        return view('comments.index', compact('comments'));
    }
}
