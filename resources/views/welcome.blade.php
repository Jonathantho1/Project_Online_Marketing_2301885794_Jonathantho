@extends('layouts.app')

@section('content')

<div class="container d-flex">
    

    @foreach($products as $item)

    <div class="card" style="width: 22rem; margin-right: 2rem">
        <img class="card-img-top" src="../storage/products/{{$item->photo}}" alt="Card image cap">
        <div class="card-body d-flex flex-column">
            <h3 class="card-title">{{ $item->name }}</h3>
            <p class="card-text">{{ $item->category_name }}</p>
            <p class="card-text">{{ $item->description }}</p>
            <a href="/products/{{$item->prodid}}" class="btn btn-primary mt-auto">View Details</a>
        </div>
    </div>

    @endforeach

</div>

<div class="container" style="margin-top: 2rem">
    {{ $products->links('pagination::bootstrap-4') }}
</div>

@endsection