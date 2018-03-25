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
            <div class="events-item-container">
                <div class="contain-bg col-md-6 event-item" style="background-image: url(/storage/events/{{$event->image_path}})">

                </div>
                <div class="col-md-6 event-descr">
                    <ul>
                        <li>{{$event->title}}</li>
                        <li>{{$event->description}}</li>
                        <li>{{date("d/m/Y", strtotime($event->start_date))}} {{$event->start_time}} - {{date("d/m/Y", strtotime($event->end_date))}} {{$event->end_time}}</li>
                        <li>{{$event->country}}, {{$event->city}}</li>
                        <li>Venue: {{$event->venue}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">

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