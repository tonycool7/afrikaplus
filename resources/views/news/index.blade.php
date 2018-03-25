@extends('layouts.afrika')
@section('title')
    {{config('app.name')}} | News
@endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/news.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        body{
            background-color: rgb(37, 37, 37);
        }
        .owl-carousel {
            margin-top: 6pt !important;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid news-wrapper">
        <div class="row">
            <div class="news-row">
                <div class="news-container default-bg">
                    <h3 class="main-title">Afrika+ news</h3>
                    <span class="yellow-box"></span>
                </div>
            </div>
        </div>

        <div class="row news-list">
            <div class="news-row">
                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                    <a href="#" class="news-body">
                        <div class="default-bg news-image" style="background-image: url(storage/news/news1.png)"></div>
                        <h3 class="news-title">5th of March</h3>
                        <p class="news-descr">10 Things I Wish I Knew Before Joining the Peace Corps</p>
                    </a>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                    <a href="#" class="news-body">
                        <div class="default-bg news-image" style="background-image: url(storage/news/news2.png)"></div>
                        <h3 class="news-title">5th of April</h3>
                        <p class="news-descr">Only God Will Remove Me’: Mugabe In Quotes</p>
                    </a>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                    <a href="#" class="news-body">
                        <div class="default-bg news-image" style="background-image: url(storage/news/news3.png)"></div>
                        <h3 class="news-title">5th of May</h3>
                        <p class="news-descr">The Palace of the Lost City, Sun City, South Africa</p>
                    </a>
                </div>

                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                    <a href="#" class="news-body">
                        <div class="default-bg news-image" style="background-image: url(storage/news/news2.png)"></div>
                        <h3 class="news-title">5th of April</h3>
                        <p class="news-descr">Only God Will Remove Me’: Mugabe In Quotes</p>
                    </a>
                </div>
            </div>

        </div>

        <div class="row more-news">
            <div class="news-row">
                <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">
                    <div class="load-more-news">
                        <p>show more</p>
                    </div>
                </div>
            </div>
        </div>


            {{--</div>--}}
        {{--</div>--}}
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