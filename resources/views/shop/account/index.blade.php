@extends('layouts.shop')

@section('content')
    <div class="container" style="margin-top: -30px;">
        <hr>
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <h2 class="text-primary">Welcome {{\Auth::user()->name}}</h2>

                <p>Hello {{\Auth::user()->name}}. From your account dashboard you can view your recent orders, manage your shipping and billing addresses and edit your password and account details.
                </p>
                <p>Deliveries will be made to the following contact details;</p>
                <p>Billing address: {{\Auth::user()->address}}</p>
                <p>Telephone number: {{\Auth::user()->phone}}</p>
                <p>Notifications will be sent to your email address
                    <small class="text-muted">({{\Auth::user()->email}}).</small>
                </p>

            </div>

            <div class="row">
                <h2>Shopping History</h2>
            </div>

            <div class="row">
                <table class="table table-hover" id='refresh'>
                    <thead>
                    <tr>
                        <th><small>ORDER NUMBER:</small></th>
                        <th><small>ITEM NAME:</small></th>
                        <th><small>DATE:</small></th>
                        <th><small>TOTAL:</small></th>
                        <th><small>QTY:</small></th>
                        <th><small>PAYMENT METHOD:</small></th>
                        <th><small>STATUS</small></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->products->name}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->qty}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <h2>Edit Account</h2>
                {{--<div class="alert alert-success update-msg"> @{{user.updateSuccess}}</div>--}}
                <div class="col-xs-12 col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="newpassword">New Password</label><label class="pass-update"></label><br>
                        <input v-model="user.password" class="form-control" id="newpassword"  type="password" required>
                        <br/><button v-on:click="edit()" class="btn btn-info">Update passwords</button>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="telephone">New Telephone Number</label><label class="tel-update"></label><br>
                        <input v-model="user.telephone" class="form-control" id="telephone"  type="tel" required>
                        <br/><button v-on:click="edit()" class="btn btn-info">Update telephone</button>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="new_addr">New Billing Address</label><label class="addr-update"></label><br>
                        <input v-model="user.address" class="form-control" id="new_addr"  type="text" required>
                        <br/><button v-on:click="edit()" class="btn btn-info">Update address</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection