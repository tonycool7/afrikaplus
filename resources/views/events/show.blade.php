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
                <div class="row">
                    <div class="contain-bg col-md-6 event-item" style="background-image: url(/storage/avatar/{{$event->image_path}})">

                    </div>
                    <div class="col-md-6 event-descr">
                        <ul>
                            <li>{{$event->title}}</li>
                            <li>{{$event->description}}</li>
                            <li>{{date("d/m/Y", strtotime($event->start_date))}} {{$event->start_time}} - {{date("d/m/Y", strtotime($event->end_date))}} {{$event->end_time}}</li>
                            <li>{{$event->country}}, {{$event->city}}</li>
                            <li>Venue: {{$event->venue}}</li>
                        </ul>
                        <h4 class="checkout-event">Checkout event page on our social network <a href="/profile/event{{$event->id}}">{{$event->title}}</a> </h4>
                    </div>
                </div>

                <div class="row">
                    @if($posts)
                        <h4 class="event-gallery-header">Event Gallery</h4>
                    @endif
                    @foreach($posts as $item)
                        <div class="col-xs-6">
                            <div class="event-post-img" style="background-image: url(/storage/posts/{{$item->image}})"></div>
                            <h5 class="event-post-title">{{$item->text}}</h5>
                        </div>
                    @endforeach
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