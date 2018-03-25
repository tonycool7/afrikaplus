@extends('layouts.shop')

@section('content')
    <div class="slider container">
        <div class="carousel slide" id="myCarousel" data-ride="carousel" data-interval="5000">

            <!-- <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol> -->

            <div class="carousel-inner">
                <div class="item active">
                    <div class="slider-image default-bg" style="background-image: url(images/shop/men_slider.jpg)">
                    </div>
                    <div class="carousel-caption">
                        <h1>Men clothings</h1>
                    </div>
                </div>

                <div class="item">
                    <div class="slider-image default-bg"  style="background-image: url(images/shop/women_slider.jpg)">
                    </div>
                    <div class="carousel-caption">
                        <h1>Women clothings</h1>
                    </div>
                </div>

                <div class="item">
                    <div class="slider-image default-bg"  style="background-image: url(images/shop/slider1.jpg)">
                    </div>
                    <div class="carousel-caption">
                        <h1>Fashion is power</h1>
                    </div>
                </div>

            </div>

            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>

    <div id="content" class="container">
        <br>
        <div class="row">

            <div style="top: 0px;  min-width: 240px;" class="col-xs-12 col-sm-12 col-md-4 col-lg-4" >
                <a href="/shop/men" class="homepromolink" target="_self">
                    <div class="infobanner" style="background-image: url(images/shop/men.jpg);">
                        <div class="home-message" style="height:220px;">
                            <h4>MEN</h4>
                            <h5>Shop Now</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div style="top: 0px; min-width: 240px;" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a href="/shop/women" class="homepromolink" target="_self">
                    <div class="infobanner" style="background-image: url(images/shop/women.jpg);">
                        <div class="home-message" style="height:220px;">
                            <h4>WOMEN</h4>
                            <h5>Shop Now</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div style="top: 0px; min-width: 240px;" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a href="/shop/product" class="homepromolink" target="_self">
                    <div class="infobanner" style="background-image: url(images/shop/fashion.jpg);">
                        <div class="home-message" style="height:220px;">
                            <h4>FASHION</h4>
                            <h5>Shop Now</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <center><h1 class="text-muted">Featured Products</h1></center>
                <center>
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        @foreach($products as $item)
                            <div class="item"><a class="default-bg" href="/shop/product/{{$item->id}}" style="background-image: url(/storage/images/{{$item->image}})"></a></div>
                        @endforeach
                    </div>
                </center>
            </div>

        </div>

        <hr style="background-color: #eeeeee;">

        <div class="row">
            <div class="row" >
                <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                    <center>
                        <i class="fa fa-shopping-bag fa-3x text-primary"></i>
                    </center>
                    <span><h2 class="text-center">Clothing variety</h2></span>

                    <div class="">
                        <p class="mute" style="padding: 10px">
                            Okay, so what is the trend of the latest fashion show? It can be different from one designer to another but there is this trend that we can find quite easily not only on the adults fashion but for the kids fashion clothes as well. There are plenty clothes especially that come up with love texts printed on the front or the back of the clothes that show their affection to certain person.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                    <center>
                        <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                    </center>
                    <span><h2 class="text-center">Fast delivery</h2></span>
                    <div class="">
                        <p class="mute" style="padding: 10px">
                            It was easy to find this kind of clothes that speak out loud about people feeling of love toward other people either it was their lover or family. Some example of this love statement is” I Love Mommy”, “When I’m with you I realize that Love is Real” and other kind of love statement. It was becoming a trend in its own way and some people wear this bold statement proudly.
                        </p>
                    </div>

                </div>

                <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4">
                    <center>
                        <i class="fa fa-money fa-3x text-primary"></i>
                    </center>
                    <h2 class="text-center">Payment and return</h2>
                    <div class="">
                        <p class="mute" style="padding: 10px">
                            Fashion trend does change from time to time and text is always has its own place on the fashion world. Of course it doesn’t always speak about love but also speak about many other things as well. It was how people try to speak up their mind for free and since it was printed on their clothes, it was a statement that can and will live forever.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:0,
                responsiveClass:true,
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
        });

    </script>
@endsection