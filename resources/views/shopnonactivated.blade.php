@extends('layouts.shop')

@section('content')
    <div class="container" style="margin-top: -30px;">
        <hr/>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading"></div>
                    <div class="panel-body text-center">
                        <p>You have to verify your account, follow the link sent to your email address to verify account.</p>
                        <a href="/shop/resend_email_verification" class="btn btn-primary">Resend email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection