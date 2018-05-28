<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114227719-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-114227719-1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta name="format-detection" content="telephone=no">--}}
    <meta http-equiv="Content-Language" content="en-US">
    <meta name="keywords" content="Afrikaplus, AfrikaPlus, afrikaplus, listen, music, online, audio, songs, afrikaplustheworld, shop,entertainment,afrikaplustheworld,news,dance, events, africanmusic, parties, entertainment,culture, art "/>
    <meta name="robots" content="index/follow"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="DC.title" content="Afrikaplustheworld"/>

    <meta name="description" content="Afrikaplustheworld is a world where you relax, enjoy the afrikan sound, get updates on events, listen to music, create your playlist and enjoy the african culture.">
    <meta name="news_keywords" content="Afrikaplus,AfrikaPlus, African entertainment,music, songs, listen,dance,afrikaplustheworld, afrikaplus african news, african events, african music, african parties" />

    <meta itemprop="name" content="Afrikaplustheworld entertainment">
    <meta itemprop="description" content="Abundance of african music and sounds - african events and parties">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Afrikaplustheworld - African Music - African Sounds - African Dances and videos.">
    <meta name="twitter:description" content="Afrikaplustheworld - African Music - African Sounds - African Dances and videos.">
    <meta name="twitter:site" content="afrikaplustheworld.com">

    <meta name="og:title" content="Punch Newspaper - Breaking News, Nigerian News & Multimedia">
    <meta name="og:description" content="Afrikaplustheworld - African Music - African Sounds - African Dances and videos.">
    <meta name="og:url" content="http://afrikaplustheworld.com/">
    <meta name="og:site_name" content="Afrikaplustheworld">
    <meta name="og:locale" content="en_US">
    <meta name="og:type" content="website">

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="{{mix('/css/app.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('/css/africa.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">--}}
    @yield('styling')
    <link href="/images/footer-img.png" rel="icon" type="image/png">
</head>
<body>
<div id="app">
    {{--Page header--}}
    <header>
        <nav class="navbar navbar-black navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" v-on:click="toggleResposiveMenu" data-toggle="" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/images/footer-img.png">
                        <span>AFRIKA+</span>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="/events">Events</a><span class="item-focus"></span></li>
                        <li><a href="/videos">Videos</a><span class="item-focus"></span></li>
                        <li class="active"><a href="/music">Music</a><span class="item-focus"></span></li>
                        <li><a href="/movies">Movies</a><span class="item-focus"></span></li>
                        <li><a href="/news">Inside Afrika</a><span class="item-focus"></span></li>
                        <li><a href="/album">Album</a><span class="item-focus"></span></li>
                        {{--<li><a href="/album">Messages</a><span class="item-focus"></span></li>--}}
                        <li><a href="/djmix">DJ mix</a><span class="item-focus"></span></li>
                        <li><a href="/shop" target="_blank">Shop</a><span class="item-focus"></span></li>
                        {{--<li><a href="/discovery">Discovery</a><span class="item-focus"></span></li>--}}
                        @if(\Auth::guard()->check())
                        <li><form action="/logout" method="post" style="display: none" id="logout">{{csrf_field()}}</form><a href="javascript:(document.getElementById('logout').submit());">logout</a></li>
                        @endif
                    </ul>
                    <div class="navbar-form navbar-right">
                        <a href="/profile"><i class="fa fa-user"></i> Profile</a>
                    </div>

                </div>

                <div class="responsive-nav">
                    <div class="container">
                        <div class="row">
                            <a href="/events" class="africa-col-4 menu menu-events">
                                <span>events</span>
                                <i class="fa fa-calendar fa-4x"></i>
                            </a>
                            <a href="/djmix" class="africa-col-4 menu menu-dj-mix ">
                                <span>dj mix</span>
                                <i class="fa fa-headphones fa-4x"></i>
                            </a>
                            <a href="/news" class="africa-col-4 menu menu-news">
                                <span>news</span>
                                <i class="fa fa-newspaper-o fa-4x"></i>
                            </a>
                        </div>
                        <div class="row">
                            <a href="/videos" class="africa-col-4 menu menu-video" >
                                <span>video</span>
                                <i class="fa fa-video-camera fa-4x"></i>
                            </a>
                            <a href="/music" class="africa-col-4 menu menu-music">
                                <span>music</span>
                                <i class="fa fa-music fa-4x"></i>
                            </a>
                            <a href="/shop" target="_blank" class="africa-col-4 menu menu-tv" >
                                <span>Shop</span>
                                <i class="fa fa-shopping-bag fa-4x"></i>
                            </a>
                        </div>
                        <div class="row">
                            <div class="africa-col-4"></div>
                            <a href="/album" class="africa-col-4 menu menu-movies">
                                <span>Album</span>
                                <i class="fa fa-play-circle-o fa-4x"></i>
                            </a>
                            <div class="africa-col-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div>
        @yield('content')
    </div>

</div>
</body>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="/js/Carousel.js"></script>
<script>
    $(function(){
        Carousel.init($("#carousel"));
        $("#carousel").init();
    });
</script>
<script src="{{mix('/js/app.js')}}"></script>
<script>
    new Vue({
        el: '#welcome',
        data(){
            return {
                search: false,
                msg: 'Hello, there',
                showRespNav: false
            }
        },
        methods: {
            toggleSearch: function(){
                this.search = !this.search;
            },
            toggleResposiveMenu(){
                this.showRespNav = !this.showRespNav;
                if(this.showRespNav){
                    $('.responsive-nav').animate({
                        height: "450px"
                    }, 500);
                }else{
                    $('.responsive-nav').animate({
                        height: "0px"
                    }, 500);
                }
            },
            displayPlaylist : function(el){
                console.log(el);
//                    $(el).closest('.music-item').css('margin-top', '400px');
            },
            scrollTo(el){
                $('body, html').animate({
                    scrollTop: $(el).offset().top
                }, 1000);
                this.showRespNav = true;
                this.toggleResposiveMenu();
            }
        }
    });

</script>
@yield('scripts')
</html>