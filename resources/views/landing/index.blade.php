@extends('landing/layout.app')
@section('content')
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 logo">
                    <a href="cp-platinum.html" title="Cp Platinum">
                        <img class="light" src="{{ asset('assets/brand/logo-light.png') }}" alt="Cp Platinum">
                        <img class="dark" src="{{ asset('assets/brand/logo-dark.png') }}" alt="Cp Platinum">
                    </a>
                </div>
                <div class="col-sm-6 col-md-8 main-menu">
                    <div class="menu-icon">
                        <span class="top"></span>
                        <span class="middle"></span>
                        <span class="bottom"></span>
                    </div>
                    <nav class="onepage">
                        <ul>
                            <li class="active"><a href="{{ route('landing') }}">Home</a></li>
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="{{ route('user.dashboard') }}">Dashbord</a></li>
                            <li><a href="{{ route('user.support.create') }}">Support</a></li>
                            <li class="nav-btn"><a href="{{ route('register') }}">Create Account</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--Header End-->

    <!-- Content Section Start -->
    <div class="midd-container">
        <!-- Hero Section Start -->
        <div class="hero-main platinum-layout white-sec" style="background-image:url(landing/images/banner-5.jpg);">
            <div class="container">
                <div class="row row-reverse align-items-center">
                    <div class="col-sm-12 col-md-6" data-wow-delay="0.5s">
                        <div class="platinum-animation">
                            <div class="platinum-move-1"></div>
                            <div class="platinum-move-2"></div>
                            <div class="platinum-move-3"></div>
                            <div class="platinum-move-4"></div>
                            <div class="platinum-move-5"></div>
                            <div class="top-part">
                                <div class="coin-icon"></div>
                            </div>
                            <div class="millde-part">

                            </div>
                            <div class="base">
                                <div class="lines">
                                    <span class="l-1"></span>
                                    <span class="l-2"></span>
                                    <span class="l-3"></span>
                                    <span class="l-4"></span>
                                    <span class="l-5"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 mobile-center">
                        <h1>Cryptsence best academy to learn & earn through cryptocurrency</h1>
                        <p class="lead">We are the first ever crypto academy of being an educational organizational to incorporate cryptocurrency as well blockchain learning into an investment platform to educate and develop earnings through digitalization.</p>
                        <div class="hero-btns">
                            <a href="{{ route('register') }}" class="btn">SIGN UP TO JOIN</a>
                            <a href="{{ route('login') }}" class="btn btn3">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/coinMarquee.js"></script>
        <div id="coinmarketcap-widget-marquee" coins="1,1027,825,1839,3408,52,4172,74,5994,4687" currency="USD"
            theme="light" transparent="false" show-symbol-logo="true"></div>
        <!-- Hero Section End -->
        <!-- Exchange Section Start -->
        <div class="exchange-list-section light-gray-bg p-tb">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://s.tradingview.com/embed-widget/single-quote/?locale=en#%7B%22symbol%22%3A%22FOREXCOM%3ABTCUSD%22%2C%22width%22%3A%22100%25%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Atrue%2C%22height%22%3A126%2C%22utm_source%22%3A%22beeinto.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22single-quote%22%7D"
                            style="box-sizing: border-box; height: 126px; width: 100%;"></iframe>
                    </div>
                    <div class="col-md-4">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://s.tradingview.com/embed-widget/single-quote/?locale=en#%7B%22symbol%22%3A%22OANDA%3AXAUUSD%22%2C%22width%22%3A%22100%25%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Atrue%2C%22height%22%3A126%2C%22utm_source%22%3A%22beeinto.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22single-quote%22%7D"
                            style="box-sizing: border-box; height: 126px; width: 100%;"></iframe>
                    </div>
                    <div class="col-md-4">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://s.tradingview.com/embed-widget/single-quote/?locale=en#%7B%22symbol%22%3A%22CURRENCYCOM%3AOIL_CRUDE%22%2C%22width%22%3A%22100%25%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Atrue%2C%22height%22%3A126%2C%22utm_source%22%3A%22beeinto.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22single-quote%22%7D"
                            style="box-sizing: border-box; height: 126px; width: 100%;"></iframe>
                    </div>
                    <div class="col-md-4">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://s.tradingview.com/embed-widget/single-quote/?locale=en#%7B%22symbol%22%3A%22OANDA%3ASPX500USD%22%2C%22width%22%3A%22100%25%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Atrue%2C%22height%22%3A126%2C%22utm_source%22%3A%22beeinto.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22single-quote%22%7D"
                            style="box-sizing: border-box; height: 126px; width: 100%;"></iframe>
                    </div>
                    <div class="col-md-4">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://s.tradingview.com/embed-widget/single-quote/?locale=en#%7B%22symbol%22%3A%22NASDAQ%3AAAPL%22%2C%22width%22%3A%22100%25%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Atrue%2C%22height%22%3A126%2C%22utm_source%22%3A%22beeinto.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22single-quote%22%7D"
                            style="box-sizing: border-box; height: 126px; width: 100%;"></iframe>
                    </div>
                    <div class="col-md-4">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://s.tradingview.com/embed-widget/single-quote/?locale=en#%7B%22symbol%22%3A%22NASDAQ%3ATSLA%22%2C%22width%22%3A%22100%25%22%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Atrue%2C%22height%22%3A126%2C%22utm_source%22%3A%22beeinto.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22single-quote%22%7D"
                            style="box-sizing: border-box; height: 126px; width: 100%;"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="exchange-list-section light-gray-bg p-tb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="heading">
                            <h2>Why Choose {{ env('APP_NAME') }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="exchange-list">
                            <div class="item">
                                <div class="exchange-rate">4.3/5</div>
                                <div class="ex-company-icon"><img src="{{ asset('landing/images/ico-bench-icon.png') }}"
                                        alt="ico-bench" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="exchange-rate">4.6/5</div>
                                <div class="ex-company-icon"><img src="{{ asset('landing/images/ico-track-icon.png') }}"
                                        alt="ico-track" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="exchange-rate">3.9/5</div>
                                <div class="ex-company-icon"><img src="{{ asset('landing/images/ico-bazar-icon.png') }}"
                                        alt="ico-bazar" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="exchange-rate">3.8/5</div>
                                <div class="ex-company-icon"><img src="{{ asset('landing/images/ico-ranker-icon.png') }}"
                                        alt="ico-ranker" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Exchange Section End -->
        <div class="about-section p-tb white-bg" id="about">
            <div class="container">
                <div class="row row-reverse align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="platinum-img-box">
                            <img src="{{ asset('landing/images/about.jpg') }}" alt="About ICO">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <h2 class="section-heading">About {{ env('APP_NAME') }}</h2>
                        <p>We believe the future of finance is open, inclusive and empowering. The values that we carry also
                            makes us successful as a team. Coming together from across the world, we push the limits to
                            build a world where everyone has equal access to exciting financial services. We are looking for
                            you to make this dream become reality. Thousands of people from around the world, believe in
                            this change to save them time, and it’s hassle free every time they trade.</p>
                        <div class="button-wrapper">
                            <a class="btn" href="{{ route('register') }}">REGISTER NOW WITH CRYPTSENCE</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--About end -->
        <!--Video Section Start -->
        <div class="video-section">
            <img src="{{ asset('landing/images/video-bg.jpg') }}" alt="" />
            <div class="container">
                <div class="play-button">
                    <a class="fancybox-media play-btn" href="https://youtu.be/s4g1XFU8Gto"></a>
                </div>
            </div>
        </div>
        <!--Video Section End -->
        <!-- Benefits Start -->
        <div class="benefit-section platinum-layout white-bg p-t">
            <div class="container">
                <div class="cryptohopper-web-widget" data-id="1" data-numcoins="100" data-realtime="on"
                    data-table_length="10"></div>
            </div>
            <br>
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading">FUTURE OF CRYPTOCURRENCY AND CRYPTO TRADING</h2>
                </div>
                <div class="sub-txt mw-850 text-center">
                    <p>A CRYPTOCURRENCY is a Decentralized Digital Asset which works on Blockchain Technology since 2009.
                        A BLOCKCHAIN is a Decentralized ledger that records all peer-to-peer transactions. Members can make
                        transactions without the requirement for a central clearing authority using this technology. Fund
                        transfers, trade settlement, voting and a variety of other difficulties are all possible uses .we
                        are earning from NFT, Nods, Ai Arbitrage Trade. Margin, Futures, Spot Trading, iQ Option Trading,
                        POS Stable Token and Coins Staking.</p>
                </div>
                <div class="banafits-list-items">
                    <div class="banafits-item">
                        <div class="benefit-box text-center">
                            <div class="benefit-icon">
                                <img src="{{ asset('landing/images/benefit-icon-1.png') }}" alt="Safe and Secure">
                            </div>
                            <div class="text">
                                <h4>Safe and Secure</h4>
                                <p>Our System is Safe & Secure with the Advance Algorithm.</p>
                            </div>
                        </div>
                    </div>
                    <div class="banafits-item">
                        <div class="benefit-box text-center">
                            <div class="benefit-icon">
                                <img src="{{ asset('landing/images/benefit-icon-2.png') }}" alt="Instant Exchange">
                            </div>
                            <div class="text">
                                <h4>Instant Deposit/ Withdraw</h4>
                                <p>We Provide Instant Deposit / Withdraw</p>
                            </div>
                        </div>
                    </div>
                    <div class="banafits-item">
                        <div class="benefit-box text-center">
                            <div class="benefit-icon">
                                <img src="{{ asset('landing/images/benefit-icon-5.png') }}" alt="Strong Network">
                            </div>
                            <div class="text">
                                <h4>Register</h4>
                                <p>Open new Account for the first step .</p>
                            </div>
                        </div>
                    </div>
                    <div class="banafits-item">
                        <div class="benefit-box text-center">
                            <div class="benefit-icon">
                                <img src="{{ asset('landing/images/benefit-icon-4.png') }}" alt="Mobile Apps">
                            </div>
                            <div class="text">
                                <h4>Mobile Apps</h4>
                                <p>Download our MObile App to manage your account</p>
                            </div>
                        </div>
                    </div>

                    <div class="banafits-item">
                        <div class="benefit-box text-center">
                            <div class="benefit-icon">
                                <img src="{{ asset('landing/images/benefit-icon-6.png') }}" alt="Margin Trading">
                            </div>
                            <div class="text">
                                <h4>Support System</h4>
                                <p>If you have any Problem, or Issue, you can Contact Support</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banafits-circle">
                    <div class="icon">
                        <img src="{{ asset('landing/images/service.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Benefits End -->
        <div class="featured-product-sec p-tb white-sec dark-gray-bg-tone-2" id="featured-product">
            <div id="gold-tech-bg"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 ipad-center">
                        <img src="{{ asset('landing/images/forex.jpg') }}" alt="Featured Product">
                    </div>
                    <div class="col-lg-6 mobile-center ipad-center">
                        <h2 class="section-heading">Back Business of {{ env('APP_NAME') }}</h2>
                        <div class="sub-txt">
                            <p>We standby our motto "To inspire & nurture leaders of tomorrow" where we diligently focus on
                                educating our members on the specifics knowledge of blockchain as well as cryptocurrency.
                                Let us have the oppurtunity to aspire you through this journey where we will breakdown the
                                theories of digital technologies.
                            </p>
                        </div>
                        <div class="button-wrapper">
                            <a class="btn" href="#">Read More</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="counter" class="cicle-milestine light-gray-bg p-tb">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col">
                        <div class="progressbar" data-animate="false">
                            <div class="circle" data-percent="75">
                                <div></div>
                                <p>Active Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="progressbar" data-animate="false">
                            <div class="circle" data-percent="68">
                                <div></div>
                                <p>Share Profit</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="progressbar" data-animate="false">
                            <div class="circle" data-percent="50">
                                <div></div>
                                <p>Worldwide</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="progressbar" data-animate="false">
                            <div class="circle" data-percent="40">
                                <div></div>
                                <p>Global Traders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ Section start-->
        <div class="faq-section p-tb light-gray-bg" id="faq">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading">Frequently Asked Questions</h2>
                </div>
                <div class="sub-txt text-center">
                    <p>We are looking for you to make this dream become reality. Thousands of people from around the world,
                        believe in this change to save them time, and it’s hassle free every time they trade.</p>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="tab-section">
                            <div class="tab-content">
                                <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <!--Accordion wrapper-->
                                    <div class="accordion md-accordion style-3" id="accordionGeneral" role="tablist"
                                        aria-multiselectable="true">
                                        <!-- Accordion card -->
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingOne1">
                                                <a data-toggle="collapse" data-parent="#accordionGeneral"
                                                    href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                                    <h5 class="mb-0">
                                                        Can i Open my Account for free? <i
                                                            class="fas fa-caret-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <!-- Card body -->
                                            <div id="collapseOne1" class="collapse show" role="tabpanel"
                                                aria-labelledby="headingOne1" data-parent="#accordionGeneral">
                                                <div class="card-body">
                                                    Yes, you can open new account without any fund, but in order to earn
                                                    money, you must have a successful deposit and activate plan
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion card -->
                                        <!-- Accordion card -->
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingTwo2">
                                                <a class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionGeneral" href="#collapseTwo2"
                                                    aria-expanded="false" aria-controls="collapseTwo2">
                                                    <h5 class="mb-0">
                                                        Is it possible for the citizens or residents of the US to
                                                        participate in the {{ env('APP_NAME') }}? <i
                                                            class="fas fa-caret-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <!-- Card body -->
                                            <div id="collapseTwo2" class="collapse" role="tabpanel"
                                                aria-labelledby="headingTwo2" data-parent="#accordionGeneral">
                                                <div class="card-body">
                                                    Anyone from the World can Join the {{ env('APP_NAME') }}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion card -->
                                        <!-- Accordion card -->
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingThree3">
                                                <a class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionGeneral" href="#collapseThree3"
                                                    aria-expanded="false" aria-controls="collapseThree3">
                                                    <h5 class="mb-0">
                                                        Is there a KYC process involved? <i
                                                            class="fas fa-caret-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <!-- Card body -->
                                            <div id="collapseThree3" class="collapse" role="tabpanel"
                                                aria-labelledby="headingThree3" data-parent="#accordionGeneral">
                                                <div class="card-body">
                                                    No, there is no KYC process involved.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion card -->
                                        <!-- Accordion card -->
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingFive5">
                                                <a class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionGeneral" href="#collapseFive5"
                                                    aria-expanded="false" aria-controls="collapseFive5">
                                                    <h5 class="mb-0">
                                                        Which cryptocurrencies can I use to participate in the
                                                        {{ env('APP_NAME') }}? <i
                                                            class="fas fa-caret-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <!-- Card body -->
                                            <div id="collapseFive5" class="collapse" role="tabpanel"
                                                aria-labelledby="headingFive5" data-parent="#accordionGeneral">
                                                <div class="card-body">
                                                    You can use any cryptocurrency to participate in the
                                                    {{ env('APP_NAME') }}, Mostly Bitcoin, USDT, BUSD and others.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Accordion card -->
                                    </div>
                                    <!-- Accordion wrapper -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </div>
        <!-- FAQ Section end-->

        <!-- blog section -->
        <div class="blog-section white-bg p-tb blog-grid-layout" id="press">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading">Recent News</h2>
                </div>
                <div class="sub-txt text-center">
                    <p>We are looking for you to make this dream become reality. Thousands of people from around the world,
                        believe in this change to save them time, and it’s hassle free every time they trade.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="article-item">
                            <div class="article-img" style="background-image:url('landing/images/blog-img1.jpg');"><a
                                    href="cp-platinum-single-post-with-no-sidebar.html"></a></div>
                            <div class="article-details">
                                <h2 class="heading-title"><a href="cp-platinum-single-post-with-no-sidebar.html">What is
                                        Cryptocurrency ?</a>
                                </h2>
                                <p>Forex is a portmanteau of foreign currency and exchange. Foreign exchange is the process
                                    of changing one currency into another for a variety of reasons, usually for commerce,
                                    trading, or tourism. According to a 2019 triennial report from the Bank for
                                    International Settlements (a global bank for national central banks), the daily t.....
                                </p>
                            </div>
                            <div class="footer-meta">
                                <span class="entry-date">{{ date('Y-m-d m:i:s') }}</span>
                                <span class="entry-category">
                                    <a href="#">{{ env('APP_NAME') }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="article-item">
                            <div class="article-img" style="background-image:url('landing/images/blog-img3.jpg');"><a
                                    href="cp-platinum-single-post-with-right-sidebar.html"></a></div>
                            <div class="article-details">
                                <h2 class="heading-title"><a href="cp-platinum-single-post-with-right-sidebar.html">What
                                        is Forex
                                        ?</a></h2>
                                <p>A CRYPTOCURRENCY is a Decentralized Digital Asset which works on Blockchain Technology
                                    since 2009.
                                    A BLOCKCHAIN is a Decentralized ledger that records all peer-to-peer transactions.
                                    Members can make transactions without the requirement for a central clearing authority
                                    using this technology. Fund transfers, trade settlement, voting and a variety of other
                                    difficulties are all possible uses .
                                </p>
                            </div>
                            <div class="footer-meta">
                                <span class="entry-date">{{ date('Y-m-d m:i:s') }}</span>
                                <span class="entry-category">
                                    <a href="#">{{ env('APP_NAME') }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog section End -->
        <!-- Brand logo slider -->
        <div class="partners-logo-section p-tb light-gray-bg">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading">Our Partners</h2>
                </div>
                <div class="brand-logos owl-carousel">
                    <div class="item"><img src="{{ asset('landing/images/brand-logo-dark1.png') }}"
                            alt="Brand Logo 1" /></div>
                    <div class="item"><img src="{{ asset('landing/images/brand-logo-dark2.png') }}"
                            alt="Brand Logo 2" /></div>
                    <div class="item"><img src="{{ asset('landing/images/brand-logo-dark5.png') }}"
                            alt="Brand Logo 5" /></div>
                    <div class="item"><img src="{{ asset('landing/images/brand-logo-dark4.png') }}"
                            alt="Brand Logo 4" /></div>
                    <div class="item"><img src="{{ asset('landing/images/brand-logo-dark3.png') }}"
                            alt="Brand Logo 3" /></div>
                </div>
            </div>
        </div>
        <!-- Brand logo end -->
    </div>
    <!-- Content Section End -->
    <div class="clear"></div>
    <!--footer Start-->
    <footer class="platinum-footer">
        <div class="footer-widget-area text-center">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-8">
                        <div class="widget-area">
                            <div class="widget widget-html">
                                <div class="footer-logo">
                                    <a href="#" title=""><img src="{{ asset('assets/brand/logo-dark-golden.png') }}"
                                            alt="Cp Platinum"></a>
                                </div>
                                <div class="text">
                                    <p>We are looking for you to make this dream become reality. Thousands of people from
                                        around the world,
                                        believe in this change to save them time, and it’s hassle free every time they
                                        trade.</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-area">
                            <div class="widget">
                                <ul class="footer-menu horizontal-menu onepage">
                                    <li><a href="{{ route('register') }}">Open new Account</a></li>
                                    <li><a href="{{ route('login') }}">Sign in</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget-area">
                            <div class="widget widget-html">
                                <h2 class="widget-title">Newsletter</h2>
                                <div class="text">
                                    <p>Keep to date with our progress. Subscribe for e-mail updates.</p>
                                </div>
                                <div class="newsletter">
                                    <form method="post">
                                        <input type="email" name="Email" placeholder="Your email address">
                                        <button class="btn" name="subscribe">subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="widget-area">
                            <div class="widget widget-html text-center">
                                <div class="socials">
                                    <ul>
                                        <li><a href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://telegram.org/"><i class="fab fa-telegram-plane"></i></a></li>
                                        <li><a href="https://bitcoin.com/"><i class="fab fa-btc"></i></a></li>
                                        <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copy-text">© Copyrights {{ env('APP_NAME') }}
                            {{ date('Y') }}, All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://www.cryptohopper.com/widgets/js/script"></script>
    <!--footer end-->
@endsection
