<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    
</head>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center" style="padding: 0 40px;">
            <div class="col-md-4 border bg-white box" style="padding: 5px 45px;">
                <center><img src="/image/ig-logo.png" style="width: 80%; margin-bottom: 20px;"></center>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>   
                        <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="">Phone number, username, or email</label>
                    </div>
                    
                    <div>
                        <input type="password" id="password-field" class="@error('password') is-invalid @enderror" name="password" required>

                        <span toggle="#password-field" class="field-icon toggle-password show">Show</span>
                        <span toggle="#password-field" style="display: none;" class="field-icon toggle-password hide">Hide</span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="">Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Log In </button>

                </form>

                <div style="position: relative; margin: 30px 0 ;">
                    <hr>
                    <p class="OR">OR</p>
                </div>

                <div class="anchor">
                    <a href="#" class="fb" style="margin-bottom: 10px;">
                        <i class="fab fa-facebook-square"></i> Log in with Facebook
                    </a> <br>
                    
                    @if (Route::has('password.request'))
                        <a class="forgot" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                
            </div>
        </div>
        <div class="row justify-content-center mt-2" style="padding: 0 40px;">
            <div class="col-md-4 border pt-3 bg-white" style="text-align: center;">
                <p>Don't have an account? <a href="/register" class="signup">Sign up</a></p>
            </div>
        </div>
    </div>

    <script>
        $('.toggle-password').click(function() 
        {
            var input = $($(this).attr('toggle'));
            if(input.attr('type')=="password")
            {
                input.attr('type','text');
                $('.show').hide();
                $('.hide').show();
            }    
            else
            {
                input.attr('type','password');
                $('.hide').hide();
                $('.show').show();
            }
        });
    </script>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
