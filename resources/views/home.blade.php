@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<<<<<<< HEAD
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
=======
            <div class="row p-5 bg-white border rounded">
            
            </div>

            <div class="row p-5 bg-white border rounded my-3">
            
            </div>
        </div>

        <div class="d-none d-lg-block col-lg-4 p-5">
            Hello
        </div>
>>>>>>> 330b869868e9dcb63cea4ff9381a6b9a84a1cd8f
    </div>
</div>
@endsection
