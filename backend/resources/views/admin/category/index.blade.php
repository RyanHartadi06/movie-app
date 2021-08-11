@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Category Movie') }}</div>

                <div class="card-body">
                    <a href="/category/add" class="btn btn-primary btn-sm mb-2">+ Tambah Category</a>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($category as $category)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td><img src="{{ $category->image }}" alt="" width="50px"></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success text-decoration-none">Sunting</a>
                                    <a href="" class="btn btn-sm btn-danger text-decoration-none">Delete</a>
                                </td>
                              </tr> 
                            @endforeach
                          
                         
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
