@extends('layouts.shop')

@section('content')
    <div class="container" style="margin-top: -30px;">
        <hr>
    </div>

    <div class="container">
        <div class="row shop">
            <a href="/shop/product">shop</a>
            @if($category)
                <small>/ {{$category}}</small>
            @endif
        </div>
    </div>

    <div class="container" style="margin-top: -30px;">
        <hr>
    </div>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class='col-md-4 col-lg-3 col-xs-12 col-sm-12 product'>
                <div class="view-cart {{$product->id}}">
                    <a href="/shop/cart">View cart</a>
                </div>
                <a href='/shop/product/{{$product->id}}' class="default-bg product-link" style="background-image: url('/storage/images/{{$product->image}}');">
                    <span class='sale'>sale!</span>
                </a>
                <center><h5>{{$product->name}}</h5></center>
                <center><h4 style='color: #1e73be;'><strike style='color: black;'>{{$product->old_price}} Rub. </strike>{{$product->new_price}} Rub.</h4></center>
                <button class='btn add_to_cart' v-on:click="addToCart({{$product->id}})"><center>ADD TO CART</center></button>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')

@endsection