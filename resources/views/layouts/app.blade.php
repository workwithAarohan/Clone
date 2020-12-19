<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Instagram</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .dropdown-menu
        {
            width: 250px;
            border: none;
            margin-top: 12px;
            position: relative;
            box-shadow: 0px -4px 3px rgba(50, 50, 50, 0.9);
        }
        .dropdown-toggle:after { content: none; }

    </style>

</head>
<body>
    <div id="app">        
            <!-- Authentication Links -->
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm p-0">
            <div class="container w-75">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/image/ig-logo.png" style="width: 120px; object-fit: cover;">
                </a>

                <form class="form-inline mx-auto d-none d-md-inline">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>

                @auth
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Message</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notification</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/image/profile/{{ Auth::user()->profile_img }}" width="22px" height="22px" class="rounded-circle">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
                                 
                                <a class="dropdown-item" href="{{url('/profile/'.auth()->user()->id)}}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{url('/profile/'.auth()->user()->id).'/saved'}}">
                                    Saved
                                </a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white font-weight-bold mt-1 mr-2" 
                            href="{{url('/login')}}" style="padding: 2px 8px;">
                                Log In
                            </a>
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link text-primary font-weight-bold" href="{{url('/register')}}">Sign Up</a>
                        </li>  
                    </ul>
                @endauth
            </div>
        </nav>
                   
        <main class="py-3">
            
            @yield('content')
        </main>
    </div>
</body>
</html>
