@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col" style="padding-left: 13%; margin-right:-13%">
        <img src="../storage/products/{{$selectedCart["product_photo"]}}" alt="" style="width: 550px">
    </div>
    <div class="col">
        <h1><b>{{ $selectedCart["product_name"] }}</b></h1>
        <br>
        <h3><b>Price:</b></h3>
        <h3>{{ $selectedCart["product_price"] }}</h3>
        <br>

        @if(Auth::user()->id != 1)
            <form method="POST" action="/update-cart/{{$id}}">
                @csrf

                <div class="row">
                    <div class="col-md-1">
                        <p>Qty: </p>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="quantity" default="1" value="{{$selectedCart["quantity"]}}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>

@endsection