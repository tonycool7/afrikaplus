@extends('layouts.profile')

@section('title')
    {!! \Auth::user()->firstname !!} | Edit
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
                    {{--<li><a href="#"><i class="fa fa-picture-o"></i> Photo</a></li>--}}
                    <li><a href="#"><i class="fa fa-map"></i> Inside Afrika</a></li>
                    {{--<li><a href="#"><i class="fa fa-music"></i> Album</a></li>--}}
                    <li><a href="#"><i class="fa fa-shopping-bag"></i> Shop</a></li>
                    <li><a href="/playlist"><i class="fa fa-music"></i> Music</a></li>
                    <li><a href="#"><i class="fa fa-video-camera"></i> Videos</a></li>
                </ul>
            </div>
            <div class="col-sm-10 playlist-container">
                <h5 class="text-strong">Upcoming Events</h5>
                <hr/>
                <form class="form-horizontal" action="/user_events/{{$event->id}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="patch"/>
                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Name:
                        </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="title" value="{{$event->title}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Description:
                        </label>
                        <div class="col-xs-8">
                            <textarea class="form-control" name="description">{{$event->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Category:
                        </label>
                        <div class="col-xs-8">
                            <select class="form-control" name="category" required>
                                <option value="personal" @if($event->category == "personal") selected @endif>personal event</option>
                                <option value="party" @if($event->category == "party") selected @endif>party</option>
                                <option value="sports" @if($event->category == "sports") selected @endif>sports</option>
                                <option value="lecture" @if($event->category == "lecture") selected @endif>lecture/training</option>
                                <option value="lessons" @if($event->category == "lessons") selected @endif>lessons</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Event type:
                        </label>
                        <div class="col-xs-8">
                            <select class="form-control" name="type" required>
                                <option value="close" @if($event->type == "close") selected @endif>close</option>
                                <option value="open" @if($event->type == "open") selected @endif>open</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Start time:
                        </label>
                        <div class="col-xs-8">
                            <input type="text" autocomplete="off" name="start_date" class="form-control" id="start-date" value="{{$event->start_date." ".$event->start_time}}" placeholder="start time" required>
                            <div id="datetimepicker12"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            End time:
                        </label>
                        <div class="col-xs-8">
                            <input type="text" name="end_date" autocomplete="off" class="form-control" id="end-date"  value="{{$event->end_date." ".$event->end_time}}" placeholder="end time" required>
                            <div id="datetimepicker22"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Event cover:
                        </label>
                        <div class="col-xs-8">
                            <input type="file" name="image_path">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Event link:
                        </label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" value="http://afrikaplustheworld/profile/event{{$event->id}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Country
                        </label>
                        <div class="col-xs-8">
                            <input type="text" name="country" value="{{$event->country}}" class="form-control" placeholder="country" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            City
                        </label>
                        <div class="col-xs-8">
                            <input type="text" name="city" value="{{$event->city}}" class="form-control" placeholder="city" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Address
                        </label>
                        <div class="col-xs-8">
                            <input type="text" name="venue" value="{{$event->venue}}" class="form-control" placeholder="address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4">
                        </label>
                        <div class="col-xs-8">
                            <h5>Contact details (Optional)</h5>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Phone
                        </label>
                        <div class="col-xs-8">
                            <input type="tel" name="phone" value="{{$eventProfile->phone}}" class="form-control" placeholder="phone number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-4">
                            Email
                        </label>
                        <div class="col-xs-8">
                            <input type="email" name="email" value="{{$eventProfile->email}}" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-4"></div>
                        <div class="col-xs-8">
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
        $(function () {
            var date_input=$('#start-date'); //our date input has the name "date"
            var date_input2=$('#end-date'); //our date input has the name "date"

            date_input.datetimepicker({
                inline: true,
                sideBySide: true,
                todayHighlight: true,
            });
            date_input2.datetimepicker({
                inline: true,
                sideBySide: true,
                todayHighlight: true,
            });

        });

        function toggleLogout(){
            $('.profile-setting').toggle();
        }
    </script>
@endsection