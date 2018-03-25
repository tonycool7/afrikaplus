@extends('layouts.afrika')

@section('content')
    <div class="container" style="margin-top: 130px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading"></div>
                    <div class="panel-body text-center">
                        <p class="nonactivated_p">You have to verify your account, follow the link sent to your email address to verify account.</p>
                        <a href="/resend_email_verification" class="btn btn-primary nonactivated_btn">Resend email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection