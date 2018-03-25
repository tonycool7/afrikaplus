@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Register
@endsection
@section('styling')
    <link href="/css/player2.css" rel="stylesheet" type="text/css"/>
    <style>
        body{
            background-color: rgb(54, 54, 54);
        }
    </style>
@endsection

@section('content')
    <div class="container login-reg-container">
        <h2>AFRIKA+</h2>
        <div class="col-md-8 col-md-offset-2">
            <div class="login-left">
                <form class="form form-vertical" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input class="form-control login-input" value="{{old('name')}}" type="text" name="name" placeholder="Full name" required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input class="form-control login-input" type="email" value="{{old('email')}}" name="email" placeholder="Email" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <input class="form-control login-input" type="tel" value="{{old('phone')}}" name="phone" placeholder="Telephone" required>
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input class="form-control login-input" type="password" name="password" placeholder="********" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control login-input" type="password" name="password_confirmation" placeholder="********" required>
                    </div>
                    <div class="form-group">
                        <button class="form-control login-submit">Register</button>
                    </div>
                </form>
            </div>

            <div class="login-middle">
                <div class="form-divider"></div>
            </div>

            <div class="register-right">
                <div class="social-media-register">
                    <div class="form-group">
                        <input class="form-control vk-btn" type="submit" value="Log in with VK">
                    </div>
                    <div class="form-group">
                        <input class="form-control fb-btn" type="submit" value="Log in with FACEBOOK">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('general-playlist')
    @include('layouts.audio-player')
@endsection

@section('scripts')
    <script src="/js/player.js"></script>
    <script>
        $(function(){
            var play = new player({
                audio : 'audio',
                source : 'audioSource',
                playlist : $('.general-playlist')
            });
        });
    </script>
@endsection