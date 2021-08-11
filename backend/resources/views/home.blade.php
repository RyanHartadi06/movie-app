@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 mb-3">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 <a href="{{  route('category') }}" class="text-decoration-none text-dark">Category Movie</a>  
                </div>
            </div>
        </div>
        <div class="col-lg-6 mt-5 mb-3">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href="" class="text-decoration-none text-dark">Movie</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href="" class="text-decoration-none text-dark">User</a> 
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="" class="text-decoration-none text-dark"> Komentar</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
