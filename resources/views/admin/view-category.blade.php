@extends('layouts.app')

@section('content')

<div class="container">
    <h1><b>Manage Category</b></h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th scope="col"><h4><b>Category Name</b></h4></th>
            <th scope="col" style="width:20%"><h4><b>Action</b></h4></th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $item)
            <tr>
                <td><h5>{{ $item->category_name }}</h5></td>
                <td>
                    <div >
                        <a href="/admin/update-category/{{$item->id}}" class="btn btn-warning">Update</a>
                        <a href="/admin/delete-category/{{$item->id}}" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>     
            @endforeach

      </tbody>
    </table>
</div>

@endsection