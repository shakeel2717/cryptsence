<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} {{ env('APP_DESC') }}</title>
    <link rel="shortcut icon" href="{{ asset('landing/images/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
</head>

<body>
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">Preloader Close</div>
        </div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>
        <div class="layer layer-three"><span class="overlay"></span></div>
    </div>
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="offcanvas-brand text-center mb-40">
                            <img src="{{ asset('assets/brand/logo-dark.png') }}" alt="">
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="{{ route('landing') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="{{ route('register') }}">Create Account</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="{{ route('login') }}">Sign In</a>
                                </li>
                                <li class="menu-item-has-children active">
                                    <a href="{{ route('user.plan.index') }}">Pricing</a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-widget-info">
                            <ul class="text-start text-left">
                                <li><a href="#"><i class="fal fa-envelope"></i> {{ env('APP_EMAIL') }}</a></li>
                                <li><a href="#"><i class="fal fa-phone"></i> {{ env('APP_PHONE') }}</a></li>
                                <li><a href="#"><i class="fal fa-map-marker-alt"></i> {{ env('APP_ADDRESS') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="appie-header-area appie-header-2-area appie-sticky">
        <div class="container">
            <div class="header-nav-box">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-4 col-sm-5 col-6 order-1 order-sm-1">
                        <div class="appie-logo-box">
                            <a href="{{ route('landing') }}">
                                <img src="{{ asset('assets/brand/logo-dark.png') }}" alt="{{ env('APP_NAME') }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-1 col-sm-1 order-3 order-sm-2">
                        <div class="appie-header-main-menu">
                            <ul>
                                <li><a href="{{ route('landing') }}">Home</a></li>
                                <li><a href="{{ route('register') }}">Create new Account</a></li>
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="{{ route('user.plan.index') }}">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-7 col-sm-6 col-6 order-2 order-sm-3">
                        <div class="appie-btn-box text-right">
                            <a class="main-btn ml-30" href="{{ route('register') }}">Create Free Account</a>
                            <div class="toggle-btn ml-30 canvas_open d-lg-none d-block">
                                <i class="fa fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="appie-hero-area-2 mb-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="appie-hero-content-2">
                        <h1 class="appie-title">{{ env('APP_DESC') }}</h1>
                        <p>{{ env('APP_DESC') }}</p>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('register') }}" class="btn btn-dark btn-block btn-lg">
                                    <span>Create new Account</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                    <span>Sign in</span>
                                </a>
                            </div>
                        </div>
                        <div class="hero-users">
                            <img src="{{ asset('landing/images/hero-mans.png') }}" alt="">
                            <span>2k <span> Investors</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="appie-hero-thumb-3 wow animated fadeInRight" data-wow-duration="2000ms" data-wow-delay="400ms">
            <img src="landing/images/hero-thumb-3.png" alt="">
        </div>
        <div class="hero-shape-1">
            <img src="landing/images/shape/shape-9.png" alt="">
        </div>
        <div class="hero-shape-2">
            <img src="landing/images/shape/shape-10.png" alt="">
        </div>
        <div class="hero-shape-3">
            <img src="landing/images/shape/shape-11.png" alt="">
        </div>
        <div class="hero-shape-4">
            <img src="landing/images/shape/shape-12.png" alt="">
        </div>
    </section>
    <section class="appie-services-2-area pb-100" id="service">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-8">
                    <div class="appie-section-title">
                        <h3 class="appie-title">How does it work</h3>
                        <p>The full monty spiffing good time no biggie cack grub fantastic. </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4">
                    <div class="appie-section-title text-right">
                        <a class="main-btn" href="{{ route('register') }}">Get Started Today <i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 mt-30 wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="200ms">
                        <div class="icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4 class="title">Fast and intuitive</h4>
                        <p>Oxford posh bevvy give us a bell gutted mate spend a penny quaint cockup plastered.</p>
                        <a href="#">Read Mor <i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 item-2 mt-30 wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="400ms">
                        <div class="icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h4 class="title">Fast and intuitive</h4>
                        <p>Oxford posh bevvy give us a bell gutted mate spend a penny quaint cockup plastered.</p>
                        <a href="#">Read Mor <i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="appie-single-service-2 item-3 mt-30 wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="600ms">
                        <div class="icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <h4 class="title">Fast and intuitive</h4>
                        <p>Oxford posh bevvy give us a bell gutted mate spend a penny quaint cockup plastered.</p>
                        <a href="#">Read Mor <i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div
                        style="height:100vh; background-color: #FFFFFF; overflow:scroll; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: 100%;">
                        <div style="height:5959px; padding:0px; margin:0px; width: 100%;"><iframe
                                src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=100&pref_coin_id=1505&graph=yes"
                                width="100%" height="5955px" scrolling="auto" marginwidth="0" marginheight="0"
                                frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div>
                        <div
                            style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;">
                            <a href="https://coinlib.io" target="_blank"
                                style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Cryptocurrency
                                Prices</a>&nbsp;by Coinlib
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="appie-about-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-about-box wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="200ms">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="about-thumb">
                                    <img src="landing/images/about-thumb.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="appie-about-content">
                                    <span>About {{ env('APP_NAME') }}</span>
                                    <h3 class="title">{{ env('APP_DESC') }}</h3>
                                    <p>{{ env('APP_DESC') }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="appie-about-service mt-30">
                                            <div class="icon">
                                                <i class="fal fa-check"></i>
                                            </div>
                                            <h4 class="title">Carefully designed</h4>
                                            <p>Mucker plastered bugger all mate morish are.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="appie-about-service mt-30">
                                            <div class="icon">
                                                <i class="fal fa-check"></i>
                                            </div>
                                            <h4 class="title">Choose a App</h4>
                                            <p>Mucker plastered bugger all mate morish are.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="appie-features-area-2 pt-90 pb-100" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="appie-section-title appie-section-title-2 text-center">
                        <h3 class="appie-title">{{ env('APP_DESC') }}</h3>
                        <p>{{ env('APP_DESC') }} </p>
                    </div>
                </div>
            </div>
            <div class="row mt-30 align-items-center">
                <div class="col-lg-6">
                    <div class="appie-features-boxes">
                        <div class="appie-features-box-item">
                            <h4 class="title">Create Account</h4>
                            <p>The bee's knees chancer car boot absolutely.</p>
                        </div>
                        <div class="appie-features-box-item item-2">
                            <h4 class="title">Activate Plan</h4>
                            <p>The bee's knees chancer car boot absolutely.</p>
                        </div>
                        <div class="appie-features-box-item item-3">
                            <h4 class="title">Instant Withdraw</h4>
                            <p>The bee's knees chancer car boot absolutely.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appie-features-thumb wow animated fadeInRight" data-wow-duration="2000ms"
                        data-wow-delay="200ms">
                        <img src="landing/images/features-thumb-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="features-shape-1">
            <img src="landing/images/shape/shape-15.png" alt="">
        </div>
        <div class="features-shape-2">
            <img src="landing/images/shape/shape-14.png" alt="">
        </div>
        <div class="features-shape-3">
            <img src="landing/images/shape/shape-13.png" alt="">
        </div>
    </section>
    <section class="appie-counter-area pt-90 pb-190">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-section-title">
                        <h3 class="appie-title">How does it work</h3>
                        <p>The full monty spiffing good time no biggie cack grub fantastic. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="appie-single-counter mt-30 wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="200ms">
                        <div class="counter-content">
                            <div class="icon">
                                <img src="landing/images/icon/counter-icon-1.svg" alt="">
                            </div>
                            <h3 class="title"><span class="counter-item">1</span>k+</h3>
                            <p>All Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="appie-single-counter mt-30 item-2 wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="400ms">
                        <div class="counter-content">
                            <div class="icon">
                                <img src="landing/images/icon/counter-icon-2.svg" alt="">
                            </div>
                            <h3 class="title"><span class="counter-item">25</span>+</h3>
                            <p>Countries</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="appie-single-counter mt-30 item-4 wow animated fadeInUp" data-wow-duration="2000ms"
                        data-wow-delay="800ms">
                        <div class="counter-content">
                            <div class="icon">
                                <img src="landing/images/icon/counter-icon-4.svg" alt="">
                            </div>
                            <h3 class="title"><span class="counter-item">725</span>k+</h3>
                            <p>Happy Client</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="appie-video-player-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="appie-video-player-item">
                        <div class="thumb">
                            <img src="{{ asset('landing/images/btc.jpg') }}" alt="">
                            <div class="video-popup">
                                <a class="appie-video-popup" href="https://www.youtube.com/watch?v=EE7NqzhMDms"><i
                                        class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="title">What is Bitcon?</h3>
                            <p>Bitcoin is a decentralized digital currency created in January 2009. It follows the ideas
                                set out in a white paper by the mysterious and pseudonymous Satoshi Nakamoto.</p>
                            <a class="main-btn" href="{{ route('register') }}">Start Business in Crypto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="appie-video-player-slider">
                        <div class="item">
                            <img src="{{ asset('landing/images/btc-land.jpg') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('landing/images/btc-blue.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="appie-download-area pt-150 pb-160">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="appie-download-content">
                        <span>Download Our App</span>
                        <h3 class="title">Company Profile Available to <br> Download</h3>
                        <p>{{ env('APP_DESC') }}</p>
                        <ul>
                            <li>
                                <a href="{{ asset('pdf/cryptsence.pdf') }}">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                    <span>Download <span>PDF</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="download-shape-1">
            <img src="landing/images/shape/shape-15.png" alt="">
        </div>
        <div class="download-shape-2">
            <img src="landing/images/shape/shape-14.png" alt="">
        </div>
        <div class="download-shape-3">
            <img src="landing/images/shape/shape-13.png" alt="">
        </div>
    </section>
    {{-- <section class="appie-pricing-2-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="appie-section-title text-center">
                        <h3 class="appie-title">Simple pricing for Everyone</h3>
                        <p>The full monty spiffing good time no biggie cack grub fantastic. </p>
                        <div class="appie-pricing-tab-btn">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                        href="#pills-home" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Monthly</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                        href="#pills-profile" role="tab" aria-controls="pills-profile"
                                        aria-selected="false">Yearly</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 wow animated fadeInLeft">
                                        <div class="pricig-heading">
                                            <h6>Fresh</h6>
                                            <div class="price-range"><sup>$</sup> <span>04</span>
                                                <p>/month</p>
                                            </div>
                                            <p>Get your 14 day free trial</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> 15 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div
                                        class="pricing-one__single pricing-one__single_2 active wow animated fadeInUp">
                                        <div class="pricig-heading">
                                            <h6>Sweet</h6>
                                            <div class="price-range"><sup>$</sup> <span>16</span>
                                                <p>/month</p>
                                            </div>
                                            <p>Billed $276 per website annually.</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> 50 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                            <div class="pricing-rebon">
                                                <span>Most Popular</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div
                                        class="pricing-one__single pricing-one__single_2 item-2 wow animated fadeInRight">
                                        <div class="pricig-heading">
                                            <h6>Juicy</h6>
                                            <div class="price-range"><sup>$</sup> <span>27</span>
                                                <p>/month</p>
                                            </div>
                                            <p>Billed $276 per website annually.</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> Data security</li>
                                                <li><i class="fal fa-check"></i> 100 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 animated fadeInLeft">
                                        <div class="pricig-heading">
                                            <h6>Fresh</h6>
                                            <div class="price-range"><sup>$</sup> <span>32</span>
                                                <p>/Yearly</p>
                                            </div>
                                            <p>Get your 14 day free trial</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> 15 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 active animated fadeInUp">
                                        <div class="pricig-heading">
                                            <h6>Sweet</h6>
                                            <div class="price-range"><sup>$</sup> <span>116</span>
                                                <p>/Yearly</p>
                                            </div>
                                            <p>Billed $276 per website annually.</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> 50 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                            <div class="pricing-rebon">
                                                <span>Most Popular</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="pricing-one__single pricing-one__single_2 item-2 animated fadeInRight">
                                        <div class="pricig-heading">
                                            <h6>Juicy</h6>
                                            <div class="price-range"><sup>$</sup> <span>227</span>
                                                <p>/Yearly</p>
                                            </div>
                                            <p>Billed $276 per website annually.</p>
                                        </div>
                                        <div class="pricig-body">
                                            <ul>
                                                <li><i class="fal fa-check"></i> 60-day chat history</li>
                                                <li><i class="fal fa-check"></i> Data security</li>
                                                <li><i class="fal fa-check"></i> 100 GB cloud storage</li>
                                                <li><i class="fal fa-check"></i> 24/7 Support</li>
                                            </ul>
                                            <div class="pricing-btn mt-35">
                                                <a class="main-btn" href="#">Choose plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="appie-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-about-widget footer-about-widget-2">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('assets/brand/logo-dark.png') }}" alt="Logo"></a>
                        </div>
                        <p>{{ env('APP_DESC') }}</p>
                        <a href="{{ route('register') }}">Get Started <i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-widget-info">
                        <h4 class="title">Get In Touch</h4>
                        <ul>
                            <li><a href="#"><i class="fal fa-envelope"></i> {{ env('APP_EMAIL') }}</a></li>
                            <li><a href="#"><i class="fal fa-phone"></i> {{ env('APP_PHONE') }}</a></li>
                            <li><a href="#"><i class="fal fa-map-marker-alt"></i> {{ env('APP_ADDRESS') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright d-flex align-items-center justify-content-between pt-35">
                        <div class="apps-download-btn">
                            <ul>
                                <li><a href="{{ asset('pdf/cryptsence.pdf') }}">
                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                        Download PDF</a></li>
                            </ul>
                        </div>
                        <div class="copyright-text">
                            <p>Copyright © {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="back-to-top back-to-top-2">
        <a href="#"><i class="fal fa-arrow-up"></i></a>
    </div>
    <script src="{{ asset('landing/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/wow.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('landing/js/slick.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/main.js') }}"></script>
</body>

</html>
