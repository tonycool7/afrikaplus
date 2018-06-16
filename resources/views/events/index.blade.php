@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Events
@endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/events.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        body{
            background-color: rgb(104, 45, 65);
        }
        .owl-carousel {
            margin-top: 6pt !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid events-wrapper">
        <div class="row">
            <div class="events-col">
                <div class="event-container default-bg">
                    <h3 class="main-title">Afrika+ events</h3>
                    <div class="afrikaplusevents-decr">
                        <p >Be present at our mind blowing events, meet the best african DJs,
                            dance the dance and feel the african music.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row event-list">
            <div class="events-col">
                @foreach($events as $item)
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
                            <a href="/events/{{$item->id}}" class="event-body">
                                <div class="default-bg event-image" style="background-image: url(storage/avatar/{{$item->image_path}})"></div>
                                <h3 class="event-title">{{date("d/m/Y", strtotime($item->start_date))}}</h3>
                                <p class="event-descr">{{$item->title}}</p>
                            </a>
                        </div>
                @endforeach
            </div>
        </div>

        <div class="row more-events-block">
            <div class="events-col">
                <div class="col-md-3 col-md-offset-5 col-lg-3 col-lg-offset-5 col-sm-3 col-sm-offset-5">
                    <div class="moreevents">
                        <p>show more</p>
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