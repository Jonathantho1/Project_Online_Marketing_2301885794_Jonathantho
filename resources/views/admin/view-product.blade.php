@extends('layouts.app')

@section('content')

<div class="container">
    <h1><b>Manage Product</b></h1>
    
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col" style="width:40%">Product Description</th>
            <th scope="col">Product Price</th>
            <th scope="col">Product Category</th>
            <th scope="col" style="width:15%">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $item)
            <tr>
                <td><img class="card-img-top" src="../storage/products/{{$item->photo}}" alt="Card image cap" style="width:100px"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->category_name }}</td>
                <td>
                    <div >
                        <a href="/admin/update-product/{{$item->prodid}}" class="btn btn-warning">Update</a>
                        <a href="/admin/delete-product/{{$item->prodid}}" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>     
            @endforeach

      </tbody>
    </table>
</div>

@endsection