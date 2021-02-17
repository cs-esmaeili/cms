<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EMERAL</title>
    <meta name="description" content="Emeral for gamers!">
    <meta name="keywords" content="game, gaming, گیم , امرال, مرجع تخصصی گیم">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- START: Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet"
        type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href={{ asset('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}>

    <!-- FontAwesome -->
    <script defer src={{ asset('assets/vendor/fontawesome-free/js/all.js') }}></script>
    <script defer src={{ asset('assets/vendor/fontawesome-free/js/v4-shims.js') }}></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href={{ asset('assets/vendor/ionicons/css/ionicons.min.css') }}>

    <!-- Flickity -->
    <link rel="stylesheet" href={{ asset('assets/vendor/flickity/dist/flickity.min.css') }}>

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href={{ asset('assets/vendor/photoswipe/dist/photoswipe.css') }}>
    <link rel="stylesheet" type="text/css"
        href={{ asset('assets/vendor/photoswipe/dist/default-skin/default-skin.css') }}>

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href={{ asset('assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css') }}>

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href={{ asset('assets/vendor/summernote/dist/summernote-bs4.css') }}>

    <!-- GoodGames -->
    <link rel="stylesheet" href={{ asset('assets/css/goodgames.css') }}>

    <!-- Custom Styles -->
    <link rel="stylesheet" href={{ asset('assets/css/custom.css') }}>

    <!-- END: Styles -->

    <!-- jQuery -->
    <script src={{ asset('assets/vendor/jquery/dist/jquery.min.js') }}></script>

</head>

<body>
    @include('layout.background')
    @include('layout.header')

    @if (Route::currentRouteNamed('indexPageView'))
        @include('templates.index_template')
    @elseif(Route::currentRouteNamed('postPage'))
        @include('templates.post_template')
    @endif



    @include('layout.footer')
</body>
<!-- START: Scripts -->
<!-- Object Fit Polyfill -->
<script src={{ asset('assets/vendor/object-fit-images/dist/ofi.min.js') }}></script>

<!-- GSAP -->
<script src={{ asset('assets/vendor/gsap/src/minified/TweenMax.min.js') }}></script>
<script src={{ asset('assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js') }}></script>

<!-- Popper -->
<script src={{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}></script>

<!-- Bootstrap -->
<script src={{ asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}></script>

<!-- Sticky Kit -->
<script src={{ asset('assets/vendor/sticky-kit/dist/sticky-kit.min.js') }}></script>

<!-- Jarallax -->
<script src={{ asset('assets/vendor/jarallax/dist/jarallax.min.js') }}></script>
<script src={{ asset('assets/vendor/jarallax/dist/jarallax-video.min.js') }}></script>

<!-- imagesLoaded -->
<script src={{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}></script>

<!-- Flickity -->
<script src={{ asset('assets/vendor/flickity/dist/flickity.pkgd.min.js') }}></script>

<!-- Photoswipe -->
<script src={{ asset('assets/vendor/photoswipe/dist/photoswipe.min.js') }}></script>
<script src={{ asset('assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js') }}></script>

<!-- Jquery Validation -->
<script src={{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}></script>

<!-- Jquery Countdown + Moment -->
<script src={{ asset('assets/vendor/jquery-countdown/dist/jquery.countdown.min.js') }}></script>
<script src={{ asset('assets/vendor/moment/min/moment.min.js') }}></script>
<script src={{ asset('assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js') }}></script>

<!-- Hammer.js -->
<script src={{ asset('assets/vendor/hammerjs/hammer.min.js') }}></script>

<!-- NanoSroller -->
<script src={{ asset('assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js') }}></script>

<!-- SoundManager2 -->
<script src={{ asset('assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js') }}></script>

<!-- Seiyria Bootstrap Slider -->
<script src={{ asset('assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js') }}></script>

<!-- Summernote -->
<script src={{ asset('assets/vendor/summernote/dist/summernote-bs4.min.js') }}></script>

<!-- WWW.MELLATWEB.COM Share -->
<script src={{ asset('assets/plugins/nk-share/nk-share.js') }}></script>

<!-- GoodGames -->
<script src={{ asset('assets/js/goodgames.min.js') }}></script>
<script src={{ asset('assets/js/goodgames-init.js') }}></script>
<!-- END: Scripts -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
@yield('script')

</html>
