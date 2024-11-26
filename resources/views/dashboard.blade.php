@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">{{ $message }}</div>
@endif
    <h1>Hello</h1>



@endsection

