@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">

                    <strong>{{ __('Profile Information') }}</strong>
                </div>
                <div class="card-body">
                    {{-- <h5 class="card-title">John Doe</h5> --}}
                    {{-- <img src="{{ asset('public/storage/images/profile.jpeg') }}" alt="profile-image" width="100" width="100"> --}}
                    <img src="{{ asset('public/storage/' . Auth::user()->image) }}" alt="Profile Picture" width="100" width="100">
                    <p class="card-text pt-3"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>

                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <form action="{{ route('user.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete My Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
