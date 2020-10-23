@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="/css/profile.css">

    <div class="container w-75">
        <div class="row p-2 justify-content-center mb-4">
            <div class="col-md-3 p-2">
                <img src="/image/profile/{{$user->profile_img}}" class="rounded-circle mx-auto d-block profile_img"
                style="width: 72%;">
            </div>
            <div class="col-md-8 p-2 ml-3">
                <div class="d-flex">
                    <h2 class="pb-2 pr-5"> {{$user->username}} </h2>
                    @auth
                        @if ($user->id == Auth::user()->id)
                            <a href="#" class="btn border font-weight-bold"
                            style="height: 100%;">
                                Edit Profile
                            </a>
                        @endif
                    @else
                        <a href="{{url('/login')}}" class="btn btn-primary font-weight-bold"
                        style="color: white; height: 100%;">
                            Login
                        </a>
                    @endauth
                </div>
                <div class="d-flex">
                    <a href="#" class="pr-5"><strong>0</strong> posts</a>
                    <a href="#" class="pr-5"><strong>10</strong> followers</a>
                    <a href="#" class="pr-5"><strong>11</strong> following</a>
                </div>
                <div class="pt-3 font-weight-bold" style="font-size: 16px;"> {{$user->name}} </div>
                <p class="mb-0"> {{$user->profile->bio}} </p>
                <a class="url" href="https://{{$user->profile->website}}"> {{$user->profile->website}} </a>
            </div>
        </div>
        <div class="row justify-content-center border-top">
            <div class="d-flex mt-3 font-weight-bold tab">
                <a href="#" class="pr-5">
                    <i class="fas fa-th mr-2"></i>Posts
                </a>
                @auth 
                    @if ($user->id == Auth::user()->id)
                        <a href="#" class="pr-5">
                            <i class="fas fa-tv mr-2"></i>Igtv
                        </a>
                        <a href="#" class="pr-5">
                            <i class="far fa-bookmark mr-2"></i>Saved
                        </a>   
                    @endif
                @endauth
                <a href="#" class="pr-5">
                    <i class="fas fa-user-tag mr-2"></i>Tagged
                </a>
            </div>
        </div>

        <?php $post = array(1,2,3,4,5) ?>
        
        @if (count($post)!=0)
            <div class="row mt-4 ">
                @foreach ($post as $value)
                    <div class="col-md-4 mb-4">
                        <a href="#" class="post">
                            <img src="/image/download.jpeg" class="w-100">
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row mt-4 justify-content-center">
                <div class="d-block mt-3 text-center">
                    <h3>Share Photos</h3>
                    <p>When you share photos, they will appear on your profile.</p>
                    <a href="" class="font-weight-bold">Share your first photo</a>
                </div>
            </div>
        @endif
    </div>

@endsection