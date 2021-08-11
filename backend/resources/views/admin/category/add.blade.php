@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Category Movie') }}</div>

                <div class="card-body">
                    <form action="/category/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="name">Nama Category</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Category" required>
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        
                        <div class="footer">
                            <button class="btn btn-primary" type="submit">Add Data Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
