@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | Videos
@endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/video.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        body{
            background-color: rgb(54, 54, 54);
        }
    </style>
@endsection
@section('content')
    <div class="container video-container">
        <div class="main-video">
            <iframe src="//vk.com/video_ext.php?oid=-143177449&id=456239019&hash=7a7261f03510e741&hd=2" width="100%" height="100%" frameborder="0" allowfullscreen>

            </iframe>
        </div>

        <div class="videos">
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