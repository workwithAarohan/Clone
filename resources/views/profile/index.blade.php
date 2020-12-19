<link rel="stylesheet" href="/css/profile.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container w-75">
    <div class="row p-2 justify-content-center mb-4">
        <div class="col-md-3 p-2">
            <form action=" {{url('/profileimg/'.$user->id)}} " method="post" id="form" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <label for="image" style="cursor: pointer;">
                    <img src="/image/profile/{{$user->profile_img}}" class="rounded-circle mx-auto d-block profile_img" style="width: 70%;">
                </label>
                <input type="file" name="image" id="image" style="display: none;" onchange="upload_image();" required>
            </form>
        </div>
        <div class="col-md-8 p-2 ml-3">
            <div class="d-flex">
                <h2 class="pb-2 pr-5"> {{$user->username}} </h2>
                @auth
                    @if ($user->id == Auth::user()->id)
                        <a href="#" class="btn border font-weight-bold h-100">
                            Edit Profile
                        </a>
                        <a href="{{url('/post/create')}}" class="ml-5 text-center">
                            <i class="far fa-plus-square" style="font-size: 1.5rem;">Add Post</i>
                        </a>
                    @else 
                        <a href="#" class="btn btn-primary font-weight-bold"
                        style="color: white; height: 100%;">
                            Follow
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
                <a href="#" class="pr-5"><strong> {{$posts->count}} </strong> posts</a>
                <a href="#" class="pr-5"><strong>10</strong> followers</a>
                <a href="#" class="pr-5"><strong>11</strong> following</a>
            </div>
            <div class="pt-3 font-weight-bold" style="font-size: 16px;"> {{$user->name}} </div>
            <p class="mb-0"> {{$user->profile->bio}} </p>
            <a class="url" href="https://{{$user->profile->website}}"> {{$user->profile->website}} </a>
        </div>
    </div>
    
</div>


<script type="text/javascript">

    function upload_image()
    {
        document.getElementById('form').submit();
    }

</script>

