@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p>Posted by: <strong>{{ $post->user->name }}</strong></p> <!-- Display post creator's name -->

        <a href="{{ route('posts.index', $post) }}" class="btn btn-info btn-sm me-1">Back to All Posts</a>
        @auth
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        @endauth


        <hr> <!-- Horizontal line for separation -->

        <h3>Comments</h3>
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="content" class="form-control" rows="3" required placeholder="Write a comment..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Comment</button>
        </form>

        <hr>

        @if ($comments->count())
            <h4>All Comments</h4>
            <ul class="list-group">
                {{-- Display top-level comments --}}
                @foreach ($comments as $comment)
                    @include('comments.single', ['comment' => $comment])
                @endforeach
            </ul>
        @else
            <p>No comments yet.</p>
        @endif
    </div>
@endsection
