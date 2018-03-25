@extends('layouts.afrika')

@section('title') {{config('app.name')}} | Movies @endsection
@section('styling')
    <link href="{{mix('/css/player2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/movies.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="movies-container">
        <div class="row movies-row" >
            <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12" style="height: 524pt">
                <h2 class="most-watch-title">10 African Movies<br/> You Need To Watch</h2>
                <div class="most-watch-movies">
                    <div class="hyenas default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">Hyenas</span>
                            <span class="movie-country">(1992) | Senegal</span>
                        </div>
                    </div>
                    <div class="black_girl default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">Black Girl</span>
                            <span class="movie-country">(1966) | Senegal</span>
                        </div>
                    </div>

                    <div class="tsotsi default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">Tsotsi</span>
                            <span class="movie-country">(2005) | South Africa</span>
                        </div>
                    </div>

                    <div class="hotel_rwanda default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">Hotel Rwanda</span>
                            <span class="movie-country">(2004) | Rwanda</span>
                        </div>
                    </div>

                    <div class="sambizanga default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">Sambizanga</span>
                            <span class="movie-country">(1972) | Angola</span>
                        </div>
                    </div>

                    <div class="osofia default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">Osuofia in London</span>
                            <span class="movie-country">(2003) | Nigeria</span>
                        </div>
                    </div>

                    <div class="from_a_whisper default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">From A Whisper</span>
                            <span class="movie-country">(2009) | Kenya</span>
                        </div>
                    </div>

                    <div class="de_voe default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">De Voortrekkers</span>
                            <span class="movie-country">(1916) | South Africa</span>
                        </div>
                    </div>

                    <div class="district9 default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">District 9</span>
                            <span class="movie-country">(2009) | South Africa</span>
                        </div>
                    </div>

                    <div class="come_back_afrika default-bg">
                        <div class="movie-desc">
                            <span class="movie-title">Come Back, Africa</span>
                            <span class="movie-country">(1959) | South Africa</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                <div class="movie-vidoe-container">
                    <h2 class="movie-video-title">Black panther</h2>
                    <div class="movie-vidoe video1 default-bg">
                        <img src="/images/movie-play.png">
                    </div>
                </div>

                <div class="movie-vidoe-container">
                    <h2 class="movie-video-title">Black series</h2>
                    <div class="movie-vidoe video2 default-bg">
                        <img src="/images/movie-play.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="row movies-row">
            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                <div class="movie-vidoe-container">
                    <h2 class="movie-video-title">Tell me something sweet</h2>
                    <div class="movie-vidoe default-bg" style="background-image: url(/storage/movies/tell-me.jpg)">
                        <img src="/images/movie-play.png">
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                <div class="movie-vidoe-container">
                    <h2 class="movie-video-title">TSOTSI</h2>
                    <div class="movie-vidoe default-bg" style="background-image: url(/storage/movies/tsotsi2.jpg)">
                        <img src="/images/movie-play.png">
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                <div class="movie-vidoe-container">
                    <h2 class="movie-video-title">SARAFINA</h2>
                    <div class="movie-vidoe default-bg" style="background-image: url(/storage/movies/sarafina.jpg)">
                        <img src="/images/movie-play.png">
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                <div class="movie-vidoe-container">
                    <h2 class="movie-video-title">Submission</h2>
                    <div class="movie-vidoe default-bg" style="background-image: url(/storage/movies/submission.jpg)">
                        <img src="/images/movie-play.png">
                    </div>
                </div>
            </div>
        </div>

        <div class="row movies-row">
            <div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">
                <div class="load-more-movies">
                    <p>load more</p>
                </div>
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