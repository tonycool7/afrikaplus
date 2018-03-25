@extends('layouts.shop')

@section('content')
    <div class="container">
        <div class="row" >
            <div class="pull-right small">
                <i>&larr;</i>BACK TO <a href="/shop/{{$product->category}}">{{$product->category}}</a>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 product">
                <div class="view-cart {{$product->id}}">
                    <a href="/shop/cart">View cart</a>
                </div>
                <div class="default-bg product-img" style="background-image: url('/storage/images/{{$product->image}}');">

                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                <div class="col-xs-12 col-xs-12">
                    <h1>{{$product->name}}</h1>
                    <p>{{$product->description}}
                    <h3>Price</h3>
                    <h3 class="text-primary"><strike>{{$product->old_price}} Rubles</strike> {{$product->new_price}} Rubles</h3>
                    <button v-on:click="addToCart({{$product->id}})" class="btn btn-info" >ADD TO CART</button>

                </div>

                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <small>Category</small> <a href="/shop/{{$product->category}}">{{$product->category}}</a>
            </div>
        </div>

        <div class="row">
            <h1>Related Products</h1>
        </div>
    </div>
    <br>
@endsection

@section('scripts')

@endsection