@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Albums
@endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/album.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="panel panel-default col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 album-body">
        <div class="panel-header">
            <div class="album-cover__img default-bg col-md-3 col-lg-3 col-sm-3 col-xs-12" style="background-image: url({{'/storage/images/'.$album->image_path}})">

            </div>
            <div class="album-cover__decr col-md-8 col-lg-8 col-sm-8 col-xs-12">
                <h3>{{$album->artist}}</h3>
                <h4>{{$album->title}}</h4>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-responsive album-table">
                <thead>
                    <th></th>
                    <th>track</th>
                    <th>album</th>
                    <th>artist</th>
                    <th>time</th>
                    <th></th>
                </thead>
                <tbody class="album-playlist" data-thumbnail="{{$album->image_path}}">
                @php
                    $image = $album->image_path;
                @endphp
                @foreach($songs as $item)

                    <tr data-value="{{$item->music_path}}" data-img="{{$item->image_path}}" data-title="{{$item->title}}" data-artist="{{($item->artist == NULL) ? $item->album->artist : $item->artist}}">
                        <td style="text-align: center"><i class="fa fa-play-circle"></i> </td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->album->title}}</td>
                        <td>{{($item->artist == NULL) ? $item->album->artist : $item->artist}}</td>
                        <td class="music-item__length">00:00</td>
                        <td><i class="fa fa-plus"></i> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('layouts.audio-player')
@endsection

@section('scripts')
    <script src="/js/player.js"></script>
    <script>
        $(function(){
            var play = new player({
                audio : 'audio',
                table: true,
                source : 'audioSource',
                playlist : $('.album-playlist')
            });

            $('tr').click(function () {
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