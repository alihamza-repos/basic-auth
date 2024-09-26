@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit Post</a>

    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Post</button>
    </form>
    <p>Posted by: <strong>{{ $post->user->name }}</strong></p> <!-- Display post creator's name -->

    <hr> <!-- Horizontal line for separation -->

    <h3>Comments</h3>
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" rows="3" required placeholder="Write a comment..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>

    <hr>

    @if ($post->comments->count())
        <h4>All Comments</h4>
        <ul class="list-group">
            @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments yet.</p>
    @endif
</div>
@endsection
