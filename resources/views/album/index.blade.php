@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Albums
@endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/album.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="container-fluid album">
        @foreach($featured as $item)
            <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6">
                <a href="/album/{{$item->id}}" class="album-item">
                    <div class="album-image default-bg" style="background-image: url({{'/storage/images/'.$item->image_path}})">

                    </div>
                    <div class="album-description">
                        <div class="album-description__artist">{{$item->artist}}</div>
                        <div class="album-description__title">{{$item->title}}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="container-fluid album-search">
        <input type="text" class="form-control" autofocus placeholder="search album">
    </div>

    <div class="container-fluid all-albums">
        @foreach($albums as $item)
            <div class="col-md-2 col-lg-2 col-sm-3 col-xs-6">
                <a href="/album/{{$item->id}}" class="album-item">
                    <div class="album-image default-bg" style="background-image: url({{'/storage/images/'.$item->image_path}})">

                    </div>
                    <div class="album-description">
                        <div class="album-description__artist">{{$item->artist}}</div>
                        <div class="album-description__title">{{$item->title}}</div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>

    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">
            <div class="more-albums">
                <p>show more</p>
            </div>
        </div>
    </div>
    <div class="bottom-space"></div>

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