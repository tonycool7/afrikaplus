@extends('layouts.afrika')
@section('title')
    Afrikaplustheworld | Home
@endsection
@section('styling')
    <link href="{{mix('/css/player.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/easy-carousel.css')}}" rel="stylesheet" type="text/css"/>

@endsection
@section('content')
            {{--Audio player--}}
            <main class="afrika-audio">
                <audio controls id="audio">
                <source id="audioSource" src="" type="audio/mpeg">
                Your browser does not support the audio element.
                </audio>

                <div class="audio-head">
                    <ul class="main-controls">
                        <li class="album-list"><i class="fa fa-list fa-2x"></i></li>
                        <li class="album-prev"><i class="fa fa-step-backward"></i></li>
                        <li class="album-play"><i class="fa fa-play fa-2x"></i></li>
                        <li class="album-next"><i class="fa fa-step-forward"></i></li>
                        <li class="album-repeat"><i class="fa fa-repeat"></i></li>
                        <li class="album-shuffle"><i class="fa fa-random"></i></li>
                    </ul>
                    <div class="loading">
                        <div class="current-length"></div>
                        <div class="loaded-length"></div>
                        <div class="total-length">
                    </div>

                    </div>
                </div>
                <div class="audio-body">
                    <div id="album-img">
                        <img class="img-thumbnail" src="">
                    </div>
                    <p class="album-title">Wizkid - closer</p><span class="player-time">1:25</span>

                    <ol class="album-content col-md-3 col-lg-3 col-xs-6 col-sm-6"></ol>
                </div>
            </main>
            <ol class="playlist-wiz" style="visibility: hidden" data-thumbnail="">
                @foreach($songs as $item)
                    <li data-value="{{$item->music_path}}">{{$item->name}}<span><i class="fa fa-play"></i></span></li>
                @endforeach
            </ol>

        {{--End of featuring album section--}}

            {{--New section--}}
            <section class="container-fluid default-bg intro">
                <img src="/images/africa/africa.jpg">
                <div class="welcome-msg">
                    <p>Welcome to <bold class="text-black">Afrika+!</bold> <br/>Feel the vibe, <br/> Feel the music inside.</p>
                </div>
            </section>
            {{--end of new section--}}

            {{--Music album section--}}
            <section class="container-fluid music-album">
                <div class="custom-container">
                    <h1 class="section-title">music</h1>
                    <div class="music-container">
                        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-6">
                            <div class="music-content">
                                <div class="music-playlist black-bg">
                                    <br/>
                                    <h3>Davido</h3>
                                    <h3>SKELEWU</h3>
                                    <br/>
                                    <ul class="playlist" data-thumbnail="storage/images/davido.jpg">
                                        <li data-value="Davido-Aye.mp3">Davido-Aye <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="Davido-Fall.mp3">Davido-Fall <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="Davido-FIA.mp3">Davido-FIA <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="Davido-Gobe.mp3">Davido-Gobe <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="Davido-If.mp3">Davido-If <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="Davido-Like Dat.mp3">Davido-Like Dat <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="Davido-Skelewu.mp3">Davido-Skelewu <span><i class="fa fa-play"></i></span></li>
                                    </ul>
                                    <div>
                                        <i class="fa fa-pause-circle fa-3x"></i>
                                        <i class="fa fa fa-caret-up fa-5x"></i>
                                    </div>
                                </div>
                                <div class="music-item">
                                    <br/>
                                    <h3 class="text-black">Davido</h3>
                                    <h3 class="text-black">SKELEWU</h3>
                                    <img src="storage/images/davido.jpg">
                                    {{--<div class="music-item__thumbnail contain-bg" style="background-image: url(images/ft_album2.jpg)"></div>--}}
                                    <div class="music-item__play">
                                        <i class="fa fa-play-circle fa-3x text-black"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-6">
                            <div class="music-content">
                                <div class="music-playlist black-bg">
                                    <br/>
                                    <h3>R2bees</h3>
                                    <h3>REFUSE TO BE BROKE</h3>
                                    <br/>
                                    <ul class="playlist" data-thumbnail="images/trending2.jpeg">
                                        <li data-value="R2Bees-Agyeiii (feat Sarkodie).mp3" data-title="" data-artist="" class="active">R2Bees-Agyeiii (feat Sarkodie) <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="R2Bees-Dance (feat Wizkid).mp3" data-title="" data-artist="">R2Bees-Dance (feat Wizkid) <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="R2Bees-Its Alright.mp3" data-title="" data-artist="">R2Bees-Its Alright <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="R2Bees-Kiss Your Hand (feat Wande Coal).mp3" data-title="" data-artist="">R2Bees-Kiss Your Hand (feat Wande Coal) <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="R2Bees-Life (Walaahi).mp3" data-title="" data-artist="">R2Bees-Life (Walaahi) <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="R2Bees-Solo (feat Davido).mp3" data-title="" data-artist="">R2Bees-Solo (feat Davido) <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="R2bees, Wizkid-Tonight (feat Wizkid).mp3" data-title="" data-artist="">R2bees, Wizkid-Tonight (feat Wizkid) <span><i class="fa fa-play"></i></span></li>
                                    </ul>
                                    <div>
                                        <i class="fa fa-pause-circle fa-3x"></i>
                                        <i class="fa fa fa-caret-up fa-5x"></i>
                                    </div>
                                </div>
                                <div class="music-item black-bg">
                                    <br/>
                                    <h3 class="text-custom">R2bees</h3>
                                    <h3 class="text-custom">REFUSE TO BE BROKE</h3>
                                    <img src="images/trending2.jpeg">
                                    {{--<div class="music-item__thumbnail contain-bg" style="background-image: url(images/ft_album2.jpg)"></div>--}}
                                    <div class="music-item__play">
                                        <i class="fa fa-play-circle fa-3x text-custom"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="music-content">
                                <div class="music-playlist black-bg">
                                    <br/>
                                    <h3>BLACK SNOW</h3>
                                    <h3>OYONGO MUSIC</h3>
                                    <br/>
                                    <ul class="playlist" data-thumbnail="images/Korede-Bello.jpg">
                                        <li data-value="bisona!!!.mp3">Biso na Biso <span><i class="fa fa-play"></i></span></li>
                                        <li data-value="Black Snow -mauvais garcon.mp3">Mauvais Garcon <span><i class="fa fa-play"></i></span></li>
                                    </ul>
                                    <div>
                                        <i class="fa fa-pause-circle fa-3x"></i>
                                        <i class="fa fa fa-caret-up fa-5x"></i>
                                    </div>
                                </div>
                                <div class="music-item">
                                    <br/>
                                    <h3 class="text-black">BLACK SNOW</h3>
                                    <h3 class="text-black">OYONGO MUSIC</h3>
                                    <img src="storage/images/TSpfcuVd-7M.jpg">
                                    {{--<div class="music-item__thumbnail contain-bg" style="background-image: url(images/ft_album2.jpg)"></div>--}}
                                    <div class="music-item__play">
                                        <i class="fa fa-play-circle fa-3x text-custom"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="listentomusic-block">
                            <a href="/music" target="_blank">More music</a>
                        </div>
                    </div>

                </div>

            </section>
            {{--End of music album section--}}

            {{--Videos section--}}
            <section class="container-fluid music-videos">
                <h1 class="section-title">video</h1>
                <div class="poster-main" id="carousel" data-setting='{
							"width":1000,
							"height":400,
							"posterWidth":600,
							"posterHeight":400,
							"scale":0.8,
							"speed":1000,
							"autoPlay":true,
							"delay":10000,
							"verticalAlign":"middle"
							}'>
                    <div class="poster-btn poster-prev-btn"></div>
                    <ul class="poster-list">
                        <li class="poster-item">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/v_sMYUVyw4I" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                        </li>
                        <li class="poster-item">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/j2u5Gbadn7o" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                        </li>
                        <li class="poster-item">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/8ORvJcpe2Oc" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                        </li>
                    </ul>
                    <div class="poster-btn poster-next-btn"></div>
                    <div class="buy-merchandise-block" style="margin: auto;">
                        <a href="/videos" target="_blank">WATCH MORE</a>
                    </div>
                </div>


            </section>
            {{--End of videos section--}}

            {{--djmix section--}}
            <section class="container-fluid new-trending">
                <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
                    <h3>Dj mix</h3>
                    <p>{{config('app.name')}} presents you with the best non stop music prepared for you from the best Djs all over the world.<br/> Sit back and relax.</p>
                    <div class="listendjmix-block">
                        <a href="/djmix" target="_blank">Non stop Djmix</a>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 1000" preserveAspectRatio="none" class="triangle">
                        <polygon points="0,0 0,1000 500,500" style="fill:white;stroke:white;stroke-width:1" />
                    </svg>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                    <div class="row">
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(images/Korede-Bello.jpg);"></div>
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(images/trending2.jpeg);"></div>
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(storage/images/davido.jpg);"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(images/Korede-Bello.jpg);"></div>
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(images/trending2.jpeg);"></div>
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(storage/images/davido.jpg);"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(images/Korede-Bello.jpg);"></div>
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(images/trending2.jpeg);"></div>
                        <div class="col-md-4 default-bg trending-img" style="background-image: url(storage/images/davido.jpg);"></div>
                    </div>
                </div>
            </section>
            {{--end of djmix section--}}

            {{--Start of news section--}}
            <section class="container-fluid news-block default-bg">
                <div class="custom-container">
                    <div class="date-container">
                        <span class="time">TIME NOW {{date('h:m:i:s')}}</span><br/>
                        <span class="date">{{date('D').', '.date('d').' '.date('M').' '.date('Y')}}</span>
                    </div>
                    <h3>AFRICAN NEWS</h3>
                    <p>AT YOUR FINGER TIPS</p>
                    <div class="featured-news-container">
                        <div class="col-md-2 col-lg-2 col-sm-2">
                            <h3 style="margin-bottom:-29px; color: white;">FEATURED</h3>
                            <h3 style="color:red;">NEWS</h3>
                        </div>
                        <div class="featured-news col-md-10 col-lg-10 col-sm-10">
                            <div class="news-item col-md-4 col-lg-4 col-sm-4">
                                <span class="news-label">PROJECT</span>
                                <div class="news-item__img default-bg" style="background-image: url(/images/africa/news/news1.jpg);">

                                </div>
                                <div class="news-content">
                                    <p>CONTRARY TO POPULAR BELIEF, LOREM IPSUM IS NOT</p>
                                    <a href="javascript:">READ MORE ></a>
                                </div>
                            </div>
                            <div class="news-item col-md-4 col-lg-4 col-sm-4">
                                <span class="news-label">SPORT</span>
                                <div class="news-item__img default-bg" style="background-image: url(/images/africa/news/news2.jpg);">

                                </div>
                                <div class="news-content">
                                    <p>CONTRARY TO POPULAR BELIEF, LOREM IPSUM IS NOT</p>
                                    <a href="javascript:">READ MORE ></a>
                                </div>
                            </div>
                            <div class="news-item col-md-4 col-lg-4 col-sm-4">
                                <span class="news-label">ENTERTAINMENT</span>
                                <div class="news-item__img default-bg" style="background-image: url(/images/africa/news/news3.jpg);">

                                </div>
                                <div class="news-content">
                                    <p>CONTRARY TO POPULAR BELIEF, LOREM IPSUM IS NOT</p>
                                    <a href="javascript:">READ MORE ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{--End of news section--}}

            {{--start of events section--}}
            <section class="container-fluid events-block">
                <div class="custom-container">
                    <h1 class="section-title">events</h1>
                    <div class="event-bg default-bg">
                        <h3>Afrika+ events</h3>
                        <p>Be present at our mind blowing events, meet the best african DJs,<br/> dance the dance and feel the african music.</p>
                        <div class="buy-merchandise-block">
                            <a href="/events" target="_blank">More events</a>
                        </div>
                        <div class="more-events">
                            <div class="more-events_item default-bg" style="background-image: url(/images/africa/djsnake.jpg)">
                                <a href="javascript:" class="btn btn-sm btn-event">Learn more</a>
                            </div>
                            <div class="more-events_item default-bg" style="background-image: url(/images/africa/christmas.jpg)">
                                <a href="javascript:" class="btn btn-sm btn-event">Learn more</a>
                            </div>
                            <div class="more-events_item default-bg" style="background-image: url(/images/africa/polyrap.jpg)">
                                <a href="javascript:" class="btn btn-sm btn-event">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{--end of events section--}}

            {{--start of shopping section--}}
            <section class="container-fluid shopping-block">
                <div class="custom-container">
                    <h1 class="section-title">shopping</h1>
                    <div class="shopping-block__wrapper">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                            <h3>Visit <b class="text-black">Daweng shop</b> for the best fashion designs</h3>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                            </p>
                            <div class="buy-merchandise-block">
                                <a href="/shop" target="_blank">Buy our merchandise</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                            <div class="row">
                                <div style="top: 0px;  min-width: 240px;" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                    <a href="/shop/men" class="homepromolink" target="_self">
                                        <div class="infobanner" style="background-image: url(images/shop/men.jpg);">
                                            <div class="home-message" style="height:220px;">
                                                <h4>MEN</h4>
                                                <h5>Shop Now</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div style="top: 0px; min-width: 240px;" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <a href="/shop/women" class="homepromolink" target="_self">
                                        <div class="infobanner" style="background-image: url(images/shop/women.jpg);">
                                            <div class="home-message" style="height:220px;">
                                                <h4>WOMEN</h4>
                                                <h5>Shop Now</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div style="top: 0px; min-width: 240px;" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <a href="/shop/product" class="homepromolink" target="_self">
                                        <div class="infobanner" style="background-image: url(images/shop/fashion.jpg);">
                                            <div class="home-message" style="height:220px;">
                                                <h4>FASHION</h4>
                                                <h5>Shop Now</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div style="top: 0px; min-width: 240px;" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <a href="/shop/product" class="homepromolink" target="_self">
                                        <div class="infobanner" style="background-image: url(images/shop/children.jpg);">
                                            <div class="home-message" style="height:220px;">
                                                <h4>CHILDREN</h4>
                                                <h5>Shop Now</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            {{--end of shopping section--}}

        {{--start of movies section--}}
        {{--<section class="container-fluid movies-block">--}}
            {{--<div class="custom-container">--}}
                {{--<h1 class="section-title">movies</h1>--}}

            {{--</div>--}}
        {{--</section>--}}
        {{--end of movies section--}}

        {{--start of tv section--}}
        {{--<section class="container-fluid tv-block">--}}

        {{--</section>--}}
        {{--end of tv section--}}

        {{--start of arts&culture section--}}
        {{--<section class="container-fluid culture-block contain-bg" style="background-position: center 55px; background-image: url(images/culture.png)">--}}
            {{--<div class="custom-container">--}}
                {{--<h1 class="section-title">arts & culture</h1>--}}
                {{--<div class="culture-block__wrapper">--}}
                    {{--<div class="explore-artculture">--}}
                        {{--<a href="/arts_culture">explore</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--end of arts and culture section--}}

        {{--footer--}}
        <footer class="container-fluid">
            <div class="custom-container">
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <div class="footer-logo">
                        <img src="images/footer-img.png">
                    </div>
                </div>
                    <div class="col-md-2 col-lg-2 col-xs-6 col-sm-6">
                        <div class="footer-list">
                            <ul>
                                <li><a href="#">about us</a></li>
                                <li><a href="#">contact us</a></li>
                                <li><a href="#">jobs</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xs-6 col-sm-6">
                        <div class="footer-list">
                            <ul>
                                <li><a href="#">privacy policy</a></li>
                                <li><a href="#">terms</a></li>
                                <li><a href="#">site map</a></li>
                            </ul>
                        </div>
                    </div>

                <div class="col-md-5 col-lg-5 col-xs-12 col-sm-12">
                    <form class="form-horizontal" v-on:submit.prevent="subscribe">
                        <label class="subscribe-label small">sign-up for newsletters</label>
                        <div class="form-group">
                            <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                <input type="text" placeholder="enter e-mail" class="form-control input-radius">
                            </div>
                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                <button class="btn btn-block btn-default btn-round">subscribe</button>
                            </div>
                        </div>
                    </form>
                    <div class="social-media">
                        <a href=""><i class="fa fa-facebook fa-2x"></i></a>
                        <a href=""><i class="fa fa-twitter fa-2x"></i></a>
                        <a href=""><i class="fa fa-google-plus fa-2x"></i></a>
                        <a href=""><i class="fa fa-vk fa-2x"></i></a>
                        <a href=""><i class="fa fa-youtube fa-2x"></i></a>
                        <a href=""><i class="fa fa-instagram fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </footer>
@endsection
 @section('scripts')
    <script src="/js/player.js"></script>
    <script>
        $(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:0,
                responsiveClass:true,
                navText: ["<img src='images/prev.png'>", "<img src='images/next.png'>"],
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:true
                    }
                }
            });

            $("#carousel").init();
            var play = new player({
                audio : 'audio',
                source : 'audioSource',
                playlist : $('.playlist-wiz')
            });

            $('.music-item__play .fa-play-circle').click(function(){
                $('.music-content .music-playlist').animate({
                    marginTop: '-60vh'
                });
                $(this).closest('.music-content').find('.music-playlist').animate({
                    marginTop: '0px'
                });
                play.changePlaylist($(this).closest('.music-content').find('.playlist'));
            });

            $('.music-playlist .fa-caret-up').click(function(){
                $(this).closest('.music-content').find('.music-playlist').animate({
                    marginTop: '-60vh'
                });
            });
        });

    </script>
    @endsection

