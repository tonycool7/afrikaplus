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
                <div class="col-xs-4">
                    <h5 class="text-strong">Upcoming Events</h5>
                </div>
                <div class="col-xs-8">
                    <button class="btn btn-black pull-right" data-toggle="modal" data-target="#create-event">Create Event</button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr style="margin: 10px 0px 10px 0px !important;"/>
                    </div>
                </div>
                <form>
                    {{--<div class="form-group col-10">--}}
                        <input type="text" placeholder="Search events" class="form-control event-search" style="display: inline; width: 90%">
                    {{--</div>--}}
                    {{--<div class="form-group col-2">--}}
                        <button class="btn"><i class="fa fa-search"></i> </button>
                    {{--</div>--}}
                </form>

                <div class="event-list-container">
                    <div class="event row">
                        @foreach($upcomingEvents as $item)
                            <div class="col-xs-2">
                                <a href="/profile/event{{$item->id}}" class="event-img " style="background-image: url(storage/avatar/{{$item->image_path}})"></a>
                            </div>
                            <div class="col-xs-10 event-descr">
                                <h5>{{$item->title}}<button class="btn btn-black pull-right">Join event</button></h5>
                                <h5>{{date("d/m/Y", strtotime($item->start_date))}}</h5>
                            </div>
                            <div class="row" style="margin: 0px 0px 10px 0px !important;">
                                <div class="col-md-12">
                                    <hr style="margin: 0px !important;"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <h5 class="text-strong">Past events</h5>
                <hr/>
                <div class="event-list-container">
                    <div class="event row">
                        @foreach($pastEvents as $item)
                            <div class="col-xs-2">
                                <a href="/profile/event{{$item->id}}" class="event-img " style="background-image: url(storage/avatar/{{$item->image_path}})"></a>
                            </div>
                            <div class="col-xs-10 event-descr">
                                <h5>{{$item->title}}
                                <h5>{{date("d/m/Y", strtotime($item->start_date))}}</h5>
                            </div>
                            <div class="row" style="margin: 0px 0px 10px 0px !important;">
                                <div class="col-md-12">
                                    <hr style="margin: 0px !important;"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create-event" role="dialog">
        <div class="modal-dialog view-post-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create event</h4>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <i class="fa fa-calendar fa-5x" aria-hidden="true"></i>
                        <h4>Events</h4>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 col-lg-offset-2">
                            <p class="text-center">Organise events and parties. <br/> Invite your friends to your parties, events and gatherings</p>
                            <form class="form-horizontal" action="/user_events" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        Name:
                                    </label>
                                    <div class="col-xs-8">
                                        <input type="text" class="form-control" name="title" placeholder="Event name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        Category:
                                    </label>
                                    <div class="col-xs-8">
                                        <select class="form-control" name="category" required>
                                            <option value="party">party</option>
                                            <option value="personal">personal event</option>
                                            <option value="sports">sports</option>
                                            <option value="lecture">lecture/training</option>
                                            <option value="lessons">lessons</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        Event type:
                                    </label>
                                    <div class="col-xs-8">
                                        <select class="form-control" name="type" required>
                                            <option value="open">open</option>
                                            <option value="close">close</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        Start time:
                                    </label>
                                    <div class="col-xs-8">
                                        <input type="text" autocomplete="off" name="start_date" class="form-control" id="start-date" placeholder="start time" required>
                                        <div id="datetimepicker12"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        End time:
                                    </label>
                                    <div class="col-xs-8">
                                        <input type="text" name="end_date" autocomplete="off" class="form-control" id="end-date" placeholder="end time" required>
                                        <div id="datetimepicker22"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        Country
                                    </label>
                                    <div class="col-xs-8">
                                        <input type="text" name="country" class="form-control" placeholder="country" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        City
                                    </label>
                                    <div class="col-xs-8">
                                        <input type="text" name="city" class="form-control" placeholder="city" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        Address
                                    </label>
                                    <div class="col-xs-8">
                                        <input type="text" name="venue" class="form-control" placeholder="address" required>
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
                                        <input type="tel" name="phone" class="form-control" placeholder="phone number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-xs-4">
                                        Email
                                    </label>
                                    <div class="col-xs-8">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-4"></div>
                                    <div class="col-xs-8">
                                        <button class="btn btn-black">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-black" data-dismiss="modal">Close</button>
                </div>
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