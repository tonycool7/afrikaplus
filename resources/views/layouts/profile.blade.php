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
    <meta name="keywords" content="Afrikaplus profile, AfrikaPlus, afrikaplus, listen, music, online, audio, songs, afrikaplustheworld, shop,entertainment,afrikaplustheworld,news,dance, events, africanmusic, parties, entertainment,culture, art "/>
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
    <link href="{{mix('/css/profile.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">--}}
    @yield('styling')
    <link href="/images/footer-img.png" rel="icon" type="image/png">
</head>
<body>
<div id="app">
    @yield('content')
</div>
</body>
<script src="{{mix("/js/app.js")}}"></script>
@yield('scripts')
</html>