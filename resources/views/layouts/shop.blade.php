<!DOCTYPE html>
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
    <meta name="description" content="Afrikaplus shop, buy fashionable dresses">
    <meta name="keywords" content="Afrikaplus shop, buy clothes in saint petersburg, afrikaplustheworld">
    <meta name="robots" content="index/follow"/>
    <meta name="DC.title" content="Afrikaplustheworld shop"/>
    <link href="/images/footer-img.png" rel="icon" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name')}}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/shop.css" rel="stylesheet">
</head>
<body>
<div id="shop">
    <div class="container-fluid topNav">
        <div class="container">
            <a href="/shop/account">My Account</a>
            <a href="/shop/cart" style="margin-left: -5px;"><i class="fa fa-shopping-cart"></i> Your Cart - <b id="total"> {{\Session::get('cart')->totalPrice ?? 0}}</b> Rubles</a>
            @if(!\Auth::guard('shopUser')->guest())
            <div class="pull-right">
                <a href="javascript:$('#logout_form').submit()"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
            @endif
            <form action="/shop/logout" id="logout_form" method="post">
                {{csrf_field()}}
            </form>
        </div>

    </div>
    <br><br>
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a href="/shop" class="navbar-brand">DW</a>
                <button class="navbar-toggle" data-target=".navCollapseHeader" data-toggle="collapse">
                    <h4 style="float: left;">Menu</h4>
                    <div style="float: right; position: relative; top: 10px">
                        <span class="icon-bar" style="background-color: black"></span>
                        <span class="icon-bar" style="background-color: black"></span>
                        <span class="icon-bar" style="background-color: black"></span>
                    </div>
                </button>
            </div>

            <div class="collapse  navbar-collapse navCollapseHeader">
                <div class="container">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/shop" class="active">Home</a></li>
                        <li><a href="/shop/product">Shop</a></li>
                        <li><a href="/shop/contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
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
</html>
