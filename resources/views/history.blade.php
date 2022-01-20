@php
    $subtotal = 0;
    $totalvalue = 0;
    $currDate = 0001-01-01;
    $trigger = -1;
@endphp

@extends('layouts.app')

@section('content')
<div class="container" style="padding-left: 10px;">
    <h1><b>My History Transaction</b></h1>

    @foreach ($allTransaction as $item)
        @if($item["date"]==$currDate)
            @php
                $trigger = 0;
            @endphp
        @else
            <!-- at the very start -->
            @if($trigger == -1)
                @php
                    $trigger = 1;
                @endphp
            @else
                <div style="text-align: right">
                    <br>
                    <h3><b>Total Price:</b></h3>
                    <h3><b>IDR. {{$totalvalue}}</b></h3>
                </div>
                <br>
                @php
                    $trigger = 1;
                    $totalvalue = 0;
                @endphp
            @endif
            
            @php
                $currDate = $item->date
            @endphp
            <hr>
            <h2><b>{{$item->date}}</b></h2>
        @endif
        
        @php
            $subtotal = 0;
            $subtotal = $item->quantity * $item->price;
            $totalvalue += $subtotal;
        @endphp        
        
        <div class="row">
            <div class="col" style="margin-right:-13%; padding-bottom: 10px">
                <img src="../storage/products/{{$item->photo}}" alt="" style="width: 250px">
            </div>
            <div class="col" style="margin-right:30%">
                <h2><b>{{$item->name}}</b></h2>
                <h4>x{{$item->quantity}} pc(s)</h4>
                <h4>IDR. {{$item->price}}</h4>
            </div>
            <div class="col" style="padding-left:85%">
                <h3><b>IDR. {{$subtotal}}</b></h3>
            </div>
            <hr>
        </div>       

    @endforeach

    <div style="text-align: right">
        <br>
        <h3><b>Total Price:</b></h3>
        <h3><b>IDR. {{$totalvalue}}</b></h3>
    </div>
    <br>
</div>
@endsection