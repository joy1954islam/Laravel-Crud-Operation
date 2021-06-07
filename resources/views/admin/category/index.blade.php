@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Created User</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Created Time</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach ($categories as $categories)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$categories->user->name}}</td>
                                    <td>{{$categories->category_name}}</td>
                                    <td>{{$categories->created_at}}</td>
                                    <td>
                                        <a href="{{ url('edit/category/'.$categories->id )}}" class="btn btn-primary">Edit</a> 
                                    </td>
                                    <td>
                                        <form action="{{ route('delete_category', $categories->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                          </form>
                                    </td>
                                </tr>  
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('add_category')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name" placeholder=" Category Name">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
