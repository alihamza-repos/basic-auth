<div style=" padding: 10px;">
    <strong>By: {{ $comment->user->name }}</strong>
    <p style="border: 1px solid black; padding:5px; border-radius:5px;">{{ $comment->content }}</p>

    {{-- Display reply form only if the user is logged in --}}
    @auth
        <form action="{{ route('comments.reply', $comment) }}" method="POST">
            @csrf
            <textarea name="content" required placeholder="Reply..." rows="1"></textarea>
            <button type="submit">Reply</button>
        </form>
    @endauth

    {{-- Display replies recursively --}}

    @if ($comment->replies->count() > 0)
        <div style="border-left:2px solid black; margin-left: 30px;">
            @foreach ($comment->replies as $reply)
                @include('comments.single', ['comment' => $reply]) <!-- Recursion for replies -->
            @endforeach
        </div>
    @endif
</div>
