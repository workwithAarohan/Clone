@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 bg-white shadow-sm border p-5 text-center">
                    <h1>Instagram</h1>
                    <h4 class="text-muted my-3">Sign up to see photos and videos from your friends.</h4>
                    <hr>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-1 mt-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-light shadow-none" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group my-1">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror bg-light shadow-none" placeholder="Full Name" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group my-1">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror bg-light shadow-none" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group mt-1">
                                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-light shadow-none" placeholder="Password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary"><strong>
                                    {{ __('Sign up') }}
                                </strong></button>
                        </div>
                    </form>
        </div>
        </div>
    <div class="row justify-content-center mt-4">
        <div class="col-4 bg-white shadow-sm border p-4 text-center">
            <p class="mb-0">Have an account? <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
        </div>
    </div>
</div>
@endsection
