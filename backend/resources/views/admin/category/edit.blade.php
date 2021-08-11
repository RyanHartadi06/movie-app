@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Category Movie') }}</div>

                <div class="card-body">
                    <form action="/category/update/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Nama Category</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Category" value="{{ $category->name }}">
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                        </div>
                        
                        <div class="footer">
                            <button class="btn btn-primary" type="submit">Edit Data Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
