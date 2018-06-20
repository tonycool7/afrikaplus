@extends('layouts.profile')

@section('styling')
    <link href="{{mix('/css/profile.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/playlist.css')}}" rel="stylesheet" type="text/css"/>
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
                                    <input type="text" v-model="searchtext" placeholder="Find friends">
                                </form>
                                <div class="search-result" v-if="searchResult.length > 0">
                                    <ul v-for="user in searchResult">
                                        <li><a :href="`/profile/`+user.username" class="user-search-img" :style="`background-image : url(/storage/avatar/`+user.image+`)`"></a> <span class="user-search-name">@{{user.firstname}}</span></li>
                                    </ul>
                                </div>
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
                <div class="">
                    <div class="player-container">
                        @include('layouts.playlist-player')
                    </div>
                    <div class="playlist-search">
                        <form>
                            <input type="text" placeholder="search playlist" class="form-control">
                        </form>
                    </div>
                    <h5 class="text-black text-strong">Audios</h5>
                    <ul class="playlist">
                        @foreach($playlist as $item)
                            @php
                                $image = $item->music->image_path ?? $item->music->album->image_path ?? "";
                            @endphp
                            <li class="col-sm-12 music-border" data-img="{{$image}}" data-title="{{$item->music->title}}" data-artist="{{($item->music->artist == NULL) ? $item->music->album->artist : $item->music->artist}}" data-value="{{$item->music->music_path}}">
                                <div class="music">
                                    <div class="music-loader">

                                    </div>
                                    <div class="music__item">
                                        <i class="fa fa-play-circle play-icon"></i>
                                        <span style="background-image: url(storage/images/{{$image}})" class="music-item__img default-bg"></span>
                                        <div class="music-item__description">
                                            <span class="music-item__title">{{$item->music->title}}</span><br/>
                                            <span class="music-item__artist">{{($item->music->artist == NULL) ? $item->music->album->artist : $item->music->artist}}</span>
                                        </div>
                                        <div class="music-extra">
                                            <span class="music-item__length">00:00</span>
                                            <a href="#"><i class="fa fa-remove"></i></a>
                                            <a href="/playlist/{{$item->music->id}}"><i class="fa fa-download"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/js/player.js"></script>
    <script type="text/javascript">
        $(function(){
            var play = new player({
                audio : 'audio',
                source : 'audioSource',
                playlist : $('.playlist'),
            });

            $('.playlist li').click(function () {
                args = {
                    music : $(this).data('value'),
                    title : $(this).data('title'),
                    artist : $(this).data('artist'),
                    image : $(this).data('img'),
                    play : true,
                    row: $(this)
                };
                play.setAndPlay(args);
            });
        });


        function toggleLogout(){
            $('.profile-setting').toggle();
        }

    </script>
@endsection