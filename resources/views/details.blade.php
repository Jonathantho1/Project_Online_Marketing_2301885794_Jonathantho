@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col" style="padding-left: 13%; margin-right:-13%">
        <img src="../storage/products/{{$selectedProducts->photo}}" alt="" style="width: 550px">
    </div>
    <div class="col">
        <h1><b>{{ $selectedProducts->name }}</b></h1>
        <br>
        <h3><b>Category:</b></h3>
        <h3>{{ $selectedProducts->category_name }}</h3>
        <br>
        <h3><b>Price:</b></h3>
        <h3>{{ $selectedProducts->price }}</h3>
        <br>
        <h3><b>Description:</b></h3>
        <h3>{{ $selectedProducts->description }}</h3>
        <br>

        @guest
            <a href="{{ route('login') }}" class="btn btn-warning">Login to Buy</a>
        @else
            @if(Auth::user()->id != 1)
                <form method="POST" action="/insert-cart/{{$selectedProducts->prodid}}">
                    @csrf

                    <div class="row">
                        <div class="col-md-1">
                            <p>Qty: </p>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="quantity" default="1" value=1>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-warning">
                                Add To Cart
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        @endguest
    </div>
</div>

@endsection