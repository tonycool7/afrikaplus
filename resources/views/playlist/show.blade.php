@extends('layouts.profile')

@section('styling')
    <link href="{{mix('/css/playlist.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <Playlist :csrf="{{json_encode(csrf_token())}}" :user="{{json_encode($user)}}" :playlist="{{json_encode($playlist)}}"></Playlist>

    <div class="profile-container">
        <div class="row">
            <div class="col-sm-2">
                <ul class="left-side-menu">
                    <li><a href="/profile" title="Go to Profile Page"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa fa-pencil-square"></i> Events</a></li>
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
                <div class="">
                    <div class="player-container">
                        @include('layouts.playlist-player')
                    </div>
                    <div class="playlist-search">
                        <form>
                            <input type="text" placeholder="search playlist" class="form-control">
                        </form>
                    </div>
                    <h5 class="text-black">Audios</h5>
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
                                        <i class="fa fa-play-circle"></i>
                                        <span style="background-image: url(storage/images/{{$image}})" class="music-item__img default-bg"></span>
                                        <div class="music-item__description">
                                            <span class="music-item__title">{{$item->music->title}}</span><br/>
                                            <span class="music-item__artist">{{($item->music->artist == NULL) ? $item->music->album->artist : $item->music->artist}}</span>
                                            <span class="music-item__length">00:00</span>
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
    <script>
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
                    play : true
                };
                play.setAndReloadPlayer(args);
            });
        });

    </script>
@endsection