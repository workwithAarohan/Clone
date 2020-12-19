@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 border">
                <h3 class="mt-3">New Post</h3>
                <form action="{{url('/post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="{{auth()->user()->id}}">
                        <div class="p-2 bg-white">
                            <div class="d-flex mb-2">
                                <img src="/image/profile/{{auth()->user()->profile_img}}" class="mr-3"
                                style="width: 40px; height: 40px;"> 
                                <p class="mt-2"><strong>{{auth()->user()->username}}</strong></p>
                            </div>
                            <textarea name="caption" class="p-2 border-bottom mb-2" id=""  placeholder="Write a caption..." 
                                style="border:none; outline: none; width: 100%; height: 200px;
                                 font-size: 18px; resize: none;">
                            </textarea>
                            <label for="image" style="border: 1px solid black; padding: 20px 40px;
                            font-size: 50px; cursor: pointer;">
                                &plus;
                            </label>
                            <input type="file" id="image" name="image[]" accept="image/*" multiple="true" required 
                            onchange="readImage(this);" style="display: none;">
                            <img src="/image/profile/download.jpg" id="img" class=" ml-3"
                            style="width: 110px; height: 122px; margin-top: -28px;">
                            
                            <input type="submit" class="form-control">
                            

                        </div>
                        
                        
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function readImage(input)
        {
            for(i=0; i<2; i++)
            {
                if(input.files && input.files[i])
                {
                    var reader = new FileReader();

                    reader.onload = function(e){
                        $('#img')
                        .attr('src', e.target.result)
                        .css('width','110px')
                        .css('height','122px')
                        .css('margin-right','40px')
                    };

                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>
    
@endsection