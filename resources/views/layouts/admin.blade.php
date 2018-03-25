<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/images/footer-img.png" rel="icon" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{mix('/css/app.css')}}" rel="stylesheet">
</head>
<body>
    <div id="admin">
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Afrikaplustheworld</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/afrika/admin">Music/Album</a></li>
                        <li><a href="/events/create">Events</a></li>
                        <li><a href="/news/create">News</a></li>
                        <li><a href="/djmix/create">Dj mix</a></li>
                        <li><a href="/movies/create">Movies</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
        <script src="/js/app.js"></script>
        @yield('scripts')
        <div class="footer">
            <div class="container footer-text">
                <small>© 2015 DW Website by Tonycool</small>
            </div>
        </div>
</body>
