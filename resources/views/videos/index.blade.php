@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Videos
@endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/video.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/video-player.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        body{
            background-color: rgb(54, 54, 54);
        }
    </style>
@endsection
@section('content')
    <div class="container video-container">
        <div class="container">
            <div class="row">
                <div class="video-player-wrapper">
                    <figure class="video-player-container">
                        <video id="video-player">
                            <source class="videoSource" src="/storage/video/sample.mp4" type="video/mp4">
                        </video>

                        <img src="/images/video-play.png" class="video-play-icon">
                        <div class="video-controls">
                            <div class="loading-container">
                                <div class="buffered-video"></div>
                                <div class="loaded-video"></div>
                            </div>
                            {{--<div class="play-container"><img src="" class="video-play"> </div>--}}
                            {{--<div class="skip-container"><img src="" class="skip-btn"> </div>--}}
                            {{--<div class="speaker-container"><img src="" class="video-play"> </div>--}}
                            <div class="play-container"><i class="video-play fa fa-play"></i> </div>
                            <div class="skip-container"><i class="skip-btn fa fa-forward" data-skip="0.5"></i> </div>
                            <div class="speaker-container"><i class="volume-btn fa fa-speaker"></i> </div>
                            <div class="time"><span class="loaded-time">0:00</span>/<span class="video-length">0:00</span></div>
                        </div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="videos">
            <div class="col-md-4 video-item">
                <iframe width="100%" height="100%" src="//vk.com/video_ext.php?oid=-143177449&id=456239019&hash=7a7261f03510e741&hd=2" frameborder="0" allowfullscreen></iframe>
            </div>
             <div class="col-md-4 video-item">
                 <iframe width="100%" height="100%" src="https://www.youtube.com/embed/XyXDP7B7ai0" frameborder="0" allowfullscreen></iframe>
             </div>
             <div class="col-md-4 video-item">
                 <iframe width="100%" height="100%" src="https://www.youtube.com/embed/xfc5tGPzbZQ" frameborder="0" allowfullscreen></iframe>
             </div>
             <div class="col-md-4 video-item">
                 <iframe width="100%" height="100%" src="https://www.youtube.com/embed/cZ1tKFMhcKo" frameborder="0" allowfullscreen></iframe>
             </div>
            <div class="col-md-4 video-item">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/rDuIPzfowcc" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 video-item">
                <iframe src="//vk.com/video_ext.php?oid=-121611333&id=456239048&hash=16900c61edfdd933&hd=2" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 video-item">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/tlnr3OqUxYY" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 video-item">
                <iframe src="//vk.com/video_ext.php?oid=63616857&id=456239213&hash=9671a980d9fbf6fa&hd=2" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 video-item">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/PVAjrhmp_Iw" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4 video-item">
                <iframe src="//vk.com/video_ext.php?oid=336989067&id=456239045&hash=fc9e9a70bdf33f4f&hd=2" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
            </div>


        </div>
    </div>
@endsection

@include('general-playlist')
@include('layouts.audio-player')

@section('scripts')
    <script src="/js/player.js"></script>
    <script src="/js/video.js"></script>
    <script>
        $(function(){
            var play = new player({
                audio : 'audio',
                source : 'audioSource',
                playlist : $('.general-playlist')
            });

            var video = new videoPlayer({
                video: 'video-player',
                source: 'videoSource'
            });

        });
    </script>
@endsection