@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Music
@endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        body{
            background-color: rgb(54, 54, 54);
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid music-title-container">
        <span class="music_page_title">hot tracks</span>
    </div>
    <hr class="music-hr-top" style="margin-top: -106px;"/>
    <div class="music-wrapper">
        <input class="music-search form-control" type="text" autofocus placeholder="Search music">
    </div>
    <ul class="music-page-container all-songs">
        <hr class="music-hr-bottom" />
        @php
            $i = 0;
        @endphp
        @foreach($music as $item)
            @php
                $i++;
                $image = $item->image_path ?? $item->album->image_path ?? "";
            @endphp
            <li class="col-md-6 col-lg-6 col-xs-12 col-sm-12 music-border" data-img="{{$image}}" data-title="{{$item->title}}" data-artist="{{($item->artist == NULL) ? $item->album->artist : $item->artist}}" data-value="{{$item->music_path}}">
                <div class="music">
                    <div class="music-loader">

                    </div>
                    <div class="music-number">{{$i}}</div>
                    <div class="music__item">
                        <img src="/images/africa/play-svg.svg"/>
                        <span style="background-image: url(storage/images/{{$image}})" class="music-item__img default-bg"></span>
                        <div class="music-item__description">
                            <span class="music-item__title">{{$item->title}}</span><br/>
                            <span class="music-item__artist">{{($item->artist == NULL) ? $item->album->artist : $item->artist}}</span>
                            <span class="music-item__length">00:00</span>
                            <span class="add-music"><img src="/images/africa/addtoplaylist.png"/> </span>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
    </ul>

    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">
            <div class="more-music">
                <p>show more</p>
            </div>
        </div>
    </div>
    <div class="bottom-space"></div>
    @include('layouts.audio-player')
@endsection
@section('scripts')
    <script src="/js/player.js"></script>
    <script>
        $(function(){
            var play = new player({
                audio : 'audio',
                source : 'audioSource',
                playlist : $('.all-songs'),
            });

            $('.music-border').click(function () {
                $('.music-border').removeClass('active');
                $(this).addClass('active');
                var args = {
                    music : $(this).data('value'),
                    image : $(this).data('img'),
                    title : $(this).data('title'),
                    artist : $(this).data('artist'),
                    play: true
                };
                play.setAndReloadPlayer(args);
                $('.music-border').removeClass('music-active-pause');
                $(this).addClass('music-active-pause')
            });
        });
    </script>
@endsection