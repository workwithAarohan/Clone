@extends('layouts.app')

@section('content')
    @include('profile.index')

    <div class="container w-75">
        <div class="row justify-content-center border-top">
            <div class="d-flex mt-3 font-weight-bold tab">
                <a href=" {{url('profile/'.$user->id)}} " class="pr-5 text-dark"
                    style="position: relative;">
                    <hr class="line">
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

        @if ($posts->count!=0)
        <div class="row mt-5 ">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <a href="{{url('post/'.$post->id)}}" class="post">
                        @foreach ($post->postAttrs as $postAttrs)
                            <img src="/image/post/{{$postAttrs->image}}" class="w-100">
                        @endforeach
                    </a>
                </div>
            @endforeach
        </div>
        @else
            <div class="row mt-5 justify-content-center">
                @if ($user->id == auth()->user()->id)
                    <div class="d-block mt-3 text-center">
                        <a href="{{url('/post/create')}}">
                            <i class="fas fa-camera camera p-3 mb-3"></i>
                        </a>
                        <h3>Share Photos</h3>
                        <p>When you share photos, they will appear on your profile.</p>
                        <a href="{{url('/post/create')}}" class="font-weight-bold">Share your first photo</a>
                    </div>
                @else
                    <div class="d-block mt-3 text-center">
                        <i class="fas fa-camera camera p-3 mb-3"></i>
                        <h3>No Posts Yet</h3>
                    </div>
                @endif
            </div>
        @endif
    
    </div>
    
    
    
@endsection