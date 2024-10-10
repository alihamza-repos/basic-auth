@extends('layouts.app')

@section('content')
    <h1>Uploaded Images</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
<div class="container">
    @if ($images->isEmpty())
        <p>No images uploaded yet.</p>
    @else
        <div class=row>
            @foreach ($images as $image)
                <div class="col-md-2">
                    <img src="{{ asset($image->url) }}" alt="Uploaded Image"
                        style="width:100%; height:200px; object-fit:cover; border-radius:5px;">
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
