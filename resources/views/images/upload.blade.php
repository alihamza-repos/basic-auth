@extends('layouts.app')

@section('content')
<h1>Upload Image</h1>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
    
@endsection
