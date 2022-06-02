<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>One Sound</title>

    <!-- Favicon -->
    <link rel="icon" href="/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/style.css">

</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="{{route('home')}}" class="nav-brand"><img src="/img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <!-- Slide Img -->
            <div class="slide-img bg-img" style="background-image: url(/img/bg-img/bg-3.jpg);"></div>
            <!-- Slide Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <!-- Slide Img -->
            <div class="slide-img bg-img" style="background-image: url(/img/bg-img/bg-2.jpg);"></div>
            <!-- Slide Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h2 data-animation="fadeInUp" data-delay="300ms">One Sound <span>One Sound</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="miscellaneous-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div><div class="col-12 col-lg-8">
                <div class="new-hits-area mb-100">
                    <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <div align="center"><h2>New Hits</h2></div>
                    </div>
                    @foreach($music as $key)
                    <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                        <div class="first-part d-flex align-items-center">
                            <div class="thumbnail">
                                <img src="/public/musician_image/{{$key->musician_image}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>{{$key->music_solist}}</h6>
                                <b>{{$key->music_musician}}</b>
                                <h4>{{$key->music_name}}</h4>

                            </div>
                        </div>
                        <audio preload="auto" controls>
                            <source src="/public/music/{{$key->music}}">
                        </audio>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery-2.2.4 js -->
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="/js/active.js"></script>
</body>

</html>
