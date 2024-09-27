{{-- resources/views/comments/replies.blade.php --}}
@foreach ($comments as $reply)
    <div style="margin-left: 30px; border-left: 3px solid #ccc; padding: 10px;">
        <strong>{{ $reply->user->name }}</strong>
        <p>{{ $reply->content }}</p>

        {{-- Display reply form only if the user is logged in --}}
        @auth
            <form action="{{ route('comments.reply', $reply) }}" method="POST">
                @csrf
                <textarea name="content" required placeholder="Reply..."></textarea>
                <button type="submit">Reply</button>
            </form>
        @endauth

        {{-- Recursively display replies if they exist --}}
       @if ($reply->replies->isNotEmpty())
            @include('comments.replies', ['comments' => $reply->replies])
        @endif
    </div>
@endforeach

