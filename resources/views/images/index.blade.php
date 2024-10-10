@extends('layouts.app')

@section('content')

<h1>Uploaded Images</h1>

@foreach ($images as $image)
    <div>
        {{-- for testing --}}
        {{-- <img src="{{ asset('public/storage/images/2WquhzyHUiWlCheBmREYVVPIPf9lMalDYsv28xWy.png') }}" alt="Image" style="max-width: 200px; max-height: 200px;"> --}}

        <img src="{{ $image->url }}" alt="Image" style="max-width: 200px; max-height: 200px;">

        {{-- <img src="{{ asset('public/storage/' . $image) }}" alt="Image" style="max-width: 200px; max-height: 200px;"> --}}
    </div>
@endforeach

<a href="{{ route('images.upload') }}">Upload More Images</a>

@endsection
