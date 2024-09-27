<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    // Show all posts
    public function index()
    {
        // Fetch posts along with their related user
        $posts = Post::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);


        // Create post and associate it with the currently authenticated user
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // Assign the authenticated user's ID
        ]);

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    // Show a single post
    public function show(Post $post)
{
    // Fetch only top-level comments with their replies and users
    $comments = Comment::where('post_id', $post->id)
        ->whereNull('parent_id') // Fetch only top-level comments
        ->with('replies.user') // Load replies and their users
        ->get();

    return view('posts.show', compact('post', 'comments'));
}


    // Show the form for editing a post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update a post
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    // Delete a post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
