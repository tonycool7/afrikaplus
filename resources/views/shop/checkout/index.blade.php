@extends('layouts.shop')

@section('content')
    <div class="container">
        <h3>Your order</h3>

        <div class="row">
            <div class="form-group col-xs-12">
                <table class="table table-condensed table-responsive">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Total</th>
                        <th>Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($cart)
                    @foreach($cart as $id => $item)
                        <tr>
                            <td><div class="cart-img default-bg" style="background-image: url('/storage/images/{{$item["item"]->image}}')"></div></td>
                            <td>{{$item['item']->name}}</td>
                            <td>{{$item['item']->new_price}}</td>
                            <td>{{$item['qty']}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><b>Subtotal:</b></td>
                        <td><b>{{\Session::get('cart')->totalPrice}} Rubles</b></td>
                    </tr>
                    @endif
                    <tr>
                        <td><b>Shipping:</b></td>
                        <td><b>{{env('SHIPPING_FEE')}} Rubles</b></td>
                    </tr>
                    <tr>
                        <td><b>Payment Method:</b></td>
                        <td><b>Cash on Delivery</b></td>
                    </tr>
                    <tr>
                        <td><b>Total</b></td>
                        <td><b>{{(float)\Session::get('cart')->totalPrice + (float)env('SHIPPING_FEE')}} Rubles</b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h5>Cash on Delivery</h5>
                <div class="payment_box payment_method_cod ">
                    <p>Pay with cash upon delivery.</p>
                    <a href="/shop/place_order" class="btn btn-primary">Place order</a><br/>
                </div>
            </div>

        </div>

    </div>
    <br><br>
@endsection