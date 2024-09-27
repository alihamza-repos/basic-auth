<div style="border-left: 3px solid #000000; padding: 10px;">
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->content }}</p>

    {{-- Display reply form only if the user is logged in --}}
    @auth
        <form action="{{ route('comments.reply', $comment) }}" method="POST">
            @csrf
            <textarea name="content" required placeholder="Reply..."></textarea>
            <button type="submit">Reply</button>
        </form>
    @endauth

    {{-- Display replies recursively --}}
    @if ($comment->replies->count() > 0)
        <div style="margin-left: 30px;">
            @foreach ($comment->replies as $reply)
                @include('comments.single', ['comment' => $reply]) <!-- Recursion for replies -->
            @endforeach
        </div>
    @endif
</div>
