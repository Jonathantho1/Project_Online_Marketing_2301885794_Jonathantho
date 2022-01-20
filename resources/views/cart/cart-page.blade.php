@php
    $subtotal = 0;
    $totalvalue = 0;
@endphp

@extends('layouts.app')

@section('content')

<div class="container">
    <h1><b>My Cart</b></h1>
    <hr>
    @if(empty($cart) || count($cart)==0)

    @else
        @foreach ($cart as $ct => $item)
            @php
                $subtotal = 0;
                $subtotal = $item["quantity"] * $item["product_price"];
                $totalvalue += $subtotal;
            @endphp

            <div class="row">
                <div class="col" style="margin-right:-13%; padding-bottom: 10px">
                    <img src="../storage/products/{{$item["product_photo"]}}" alt="" style="width: 250px">
                </div>
                <div class="col" style="margin-right:25%">
                    <h2><b>{{$item["product_name"]}}</b></h2>
                    <h4>x{{$item["quantity"]}} pc(s)</h4>
                    <h4>IDR. {{$subtotal}}</h4>
                    <div class="container" style="margin-left: -23px">
                        <a href="{{url('/update-cart/'.$ct)}}" class="btn btn-warning">Update</a>
                        <a href="{{url('/delete-cart/'.$ct)}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    @endif

    <h4><b>Total Price:</b></h4>
    <h4>IDR. {{$totalvalue}}</h4>

    <a href="/transaction" class="btn btn-primary" style="width:100%">Checkout</a>
</div>

@endsection