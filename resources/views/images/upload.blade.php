@extends('layouts.app')

@section('content')
<h1>Upload Image</h1>
<br>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="images[]" id="images" multiple>
        <button type="submit">Upload</button>
    </form>

@endsection
