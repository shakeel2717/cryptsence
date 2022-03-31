<!DOCTYPE html>
<html lang="en" xml:lang="en">

<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Cryptsence best academy to learn & earn through cryptocurrency">
    <meta name="keywords" content="{{ env('APP_KEYWORDS') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }} {{ env('APP_DESC') }}</title>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/brand/favi.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/brand/favi.png') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landing/css/fontawesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('landing/css/fancybox/jquery.fancybox.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}" type="text/css" />

</head>

<body>
    <div class="wrapper" id="top">
        @yield('content')
    </div>
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/circle-progress.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/onpagescroll.js') }}"></script>
    <script src="{{ asset('landing/js/wow.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('landing/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('landing/js/slick.min.js') }}"></script>
    <script src="{{ asset('landing/js/Chart.js') }}"></script>
    <script src="{{ asset('landing/js/chart-function.js') }}"></script>
    <script src="{{ asset('landing/js/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('landing/js/script.js') }}"></script>
    <script src="{{ asset('landing/js/particles.js') }}"></script>
    <script src="{{ asset('landing/js/gold-app.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            setTimeout(function() {
                jQuery('.platinum-animation').addClass('start-animation');
            }, 1000);
            setTimeout(function() {
                jQuery('.platinum-animation .lines').addClass('active');
            }, 2000);
        });
    </script>
</body>

</html>
