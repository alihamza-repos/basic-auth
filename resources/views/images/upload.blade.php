@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">{{ $message }}</div>
@endif
<h1>Upload Image</h1>
<br>


    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" name="images[]" id="images" multiple>
        <button type="submit">Upload</button>
    </form>

@endsection
