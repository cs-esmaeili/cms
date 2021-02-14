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
<!--
    Additional Classes:
        .nk-page-boxed
-->

<body>
    @include('layout.header')
    <div class="nk-main">
        <div style="z-index: -1; position: absolute; top: -10px">
            <video width="100%" poster="http://emeral.ir/" autoplay muted playsinline loop>
                <source src={{ asset('system/header.mp4') }} type="video/mp4">
            </video>
        </div>
        <div id="my_header"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="nk-gap-2"></div>
        <div class="container" style="background-color: #171e22;">
            @yield('content')
        </div>
        <div class="nk-gap-4"></div>
        @include('layout.footer')
    </div>
    <!-- START: Page Background -->
    <img class="nk-page-background-top" src="assets/images/bg-top.png" alt="">
    <img class="nk-page-background-bottom" src="assets/images/bg-bottom.png" alt="">
    <!-- END: Page Background -->
    <!-- START: Search Modal -->
    <div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>
                    <h4 class="mb-0">Search</h4>
                    <div class="nk-gap-1"></div>
                    <form action="#" class="nk-form nk-form-style-1">
                        <input type="text" value="" name="search" class="form-control"
                            placeholder="Type something and press Enter" autofocus>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Search Modal -->
    <!-- START: Login Modal -->
    <div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>
                    <h4 class="mb-0"><span class="text-main-1">Sign</span> In</h4>
                    <div class="nk-gap-1"></div>
                    <form action="#" class="nk-form text-white">
                        <div class="row vertical-gap">
                            <div class="col-md-6">
                                Use email and password:
                                <div class="nk-gap"></div>
                                <input type="email" value="" name="email" class=" form-control" placeholder="Email">
                                <div class="nk-gap"></div>
                                <input type="password" value="" name="password" class="required form-control"
                                    placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                Or social account:
                                <div class="nk-gap"></div>
                                <ul class="nk-social-links-2">
                                    <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a>
                                    </li>
                                    <li><a class="nk-social-google-plus" href="#"><span
                                                class="fab fa-google-plus"></span></a></li>
                                    <li><a class="nk-social-twitter" href="#"><span class="fab fa-twitter"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-gap-1"></div>
                        <div class="row vertical-gap">
                            <div class="col-md-6">
                                <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-block">Sign In</a>
                            </div>
                            <div class="col-md-6">
                                <div class="mnt-5">
                                    <small><a href="#">Forgot your password?</a></small>
                                </div>
                                <div class="mnt-5">
                                    <small><a href="#">Not a member? Sign up</a></small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Login Modal -->
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
</body>

</html>
