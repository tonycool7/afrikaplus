@extends('layouts.profile')

@section('title')
    {!! \Auth::user()->firstname !!}
@endsection

@section('styling')
    <link href="/css/datepicker.css" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/profile.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/playlist.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/userevent.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .profile-setting{
            display: none;
        }
    </style>
@endsection

@section('content')
    <nav class="navbar navbar-inverse">
        <div class="profile-container">
            <div class="row">
                <div class="navbar-header col-sm-2">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/" title="Go to Afrika+ welcome page">
                        <img src="/images/footer-img.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse col-sm-10" id="myNavbar">
                    <div class="row">
                        <ul class="nav navbar-nav">
                            <li>
                                <form class="form search-form">
                                    <input type="text" placeholder="Find friends">
                                </form>
                            </li>
                            <li><a href="#"><i class="fa fa-bell"></i> </a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">{{(!\Auth::guest()) ? \Auth::user()->firstname : ""}}</a></li>
                            @if(\Auth::guest())
                                <li><a href="/login">Login</a></li>
                                <li><a href="/register">Register</a></li>
                            @else
                                <li>
                                    <a href="#" class="profile-pik-container dropdown">
                                    <span class="default-bg profile-pik" onclick="toggleLogout()"  alt="avatar" style="background-image: url(/storage/avatar/{{\Auth::user()->image}}">
                                    <i class="fa fa-caret-down profile-caret"></i>
                                    <div class="profile-setting">
                                        <form action="/logout" method="post" class="logout-form">
                                            {{csrf_field()}}
                                            <input type="submit" class="btn btn-block btn-default" value="logout">
                                        </form>

                                        <form action="/user" method="post" class="logout-form">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" class="btn btn-block btn-default" value="Delete Profile">
                                        </form>
                                    </div>
                                    </span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="profile-container">
        <div class="row">
            <div class="col-sm-2">
                <ul class="left-side-menu">
                    <li><a href="/profile" title="Go to Profile Page"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="/user_events"><i class="fa fa-pencil-square"></i> Events</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> Messages</a></li>
                    <li><a href="#"><i class="fa fa-picture-o"></i> Photo</a></li>
                    <li><a href="#"><i class="fa fa-map"></i> Inside Afrika</a></li>
                    <li><a href="#"><i class="fa fa-music"></i> Album</a></li>
                    <li><a href="#"><i class="fa fa-shopping-bag"></i> Shop</a></li>
                    <li><a href="/playlist"><i class="fa fa-music"></i> Music</a></li>
                    <li><a href="#"><i class="fa fa-video-camera"></i> Videos</a></li>
                </ul>
            </div>
            <div class="col-sm-10 playlist-container">
                <h5 class="text-strong">Edit profile</h5>
                <hr/>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Status</label>
                        <div class="col-xs-9">
                            <textarea name="status" class="form-control">{{$user->status}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Firstname</label>
                        <div class="col-xs-9">
                            <input class="form-control" name="firstname" value="{{$user->firstname}}" type="text" placeholder="firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Lastname</label>
                        <div class="col-xs-9">
                            <input class="form-control" name="lastname" value="{{$user->lastname}}" type="text" placeholder="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Email</label>
                        <div class="col-xs-9">
                            <input class="form-control" name="email" value="{{$user->email}}" type="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Phone</label>
                        <div class="col-xs-9">
                            <input class="form-control" name="phone" value="{{$user->phone}}" type="tel" placeholder="Telephone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Country</label>
                        <div class="col-xs-9">
                            <input class="form-control" name="country" value="{{$user->country}}" type="text" placeholder="Country">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">City</label>
                        <div class="col-xs-9">
                            <input class="form-control" name="city" value="{{$user->city}}" type="text" placeholder="City">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"></label>
                        <div class="col-xs-9">
                            <button class="btn btn-black">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function toggleLogout(){
            $('.profile-setting').toggle();
        }
    </script>
@endsection