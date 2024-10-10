{{-- Display comments --}}
@foreach ($comments as $comment)
    <div style="margin-left: {{ $comment->parent_id ? '30px' : '0' }}; border-left: 3px solid #ccc; padding: 10px; margin-bottom: 10px;">
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

        {{-- Display replies --}}
        @if ($comment->replies->count() > 0)
            @include('comments.replies', ['replies' => $comment->replies])
        @endif
    </div>
@endforeach
