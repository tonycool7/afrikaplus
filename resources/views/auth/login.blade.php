@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Login
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
        <div class="login-container">
            <form class="form form-vertical" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input class="form-control login-input" type="text" value="{{old('email')}}" name="email" placeholder="Email" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input class="form-control login-input" type="password" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="form-control login-submit">Log in</button>
                    <span>If you are a new user </span><a href="/register">register here</a>
                </div>
            </form>
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