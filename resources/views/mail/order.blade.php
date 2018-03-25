
<div class="container">
<h3>Your order</h3>
<div class="row">
    <h2>Client's contact</h2>
    <h3>Username: {{$user->name}}</h3>
    <h3>Telephone: {{$user->phone}}</h3>
    <h3>Email: {{$user->email}}</h3>
</div>
<div class="row">
    <div class="form-group col-xs-12">
        <table border="1">
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
                        <td><div style="height: auto; background-repeat: no-repeat; background-position: center; background-size: cover; width: 60px;background-image: url('http://afrikaplustheworld.com/storage/images/{{$item["item"]->image}}')"></div></td>
                        <td>{{$item['item']->name}}</td>
                        <td>{{$item['item']->new_price}}</td>
                        <td>{{$item['qty']}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2"><b>Subtotal:</b></td>
                    <td colspan="2"><b>{{\Session::get('cart')->totalPrice}} Rubles</b></td>
                </tr>
            @endif
            <tr>
                <td colspan="2"><b>Shipping:</b></td>
                <td colspan="2"><b>{{env('SHIPPING_FEE')}} Rubles</b></td>
            </tr>
            <tr>
                <td colspan="2"><b>Payment Method:</b></td>
                <td colspan="2"><b>Cash on Delivery</b></td>
            </tr>
            <tr>
                <td colspan="2"><b>Total</b></td>
                <td colspan="2"><b>{{(float)\Session::get('cart')->totalPrice + (float)env('SHIPPING_FEE')}} Rubles</b></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
