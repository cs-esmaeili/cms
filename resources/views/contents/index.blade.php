@extends('layout.main')
@section('content')
    <!-- START: Image Slider -->

    {{-- <div class="nk-image-slider" data-autoplay="8000">
        @foreach ($data['slider'] as $item)
            <div class="nk-image-slider-item">
                @php
                    $image = json_decode($item->value)->url;
                @endphp
                <img src={{ $image }} alt="" class="nk-image-slider-img" data-thumb={{ $image }}>
                <div class="nk-image-slider-content">
                    <h3 class="h4">As we Passed, I remarked</h3>
                    <p class="text-white">As we passed, I remarked a beautiful church-spire rising above some old
                        elms in the park; and before them, in the midst of a lawn, chimneys covered with ivy, and
                        the windows shining in the sun.</p>
                    <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-white nk-btn-hover-color-main-1">Read
                        More</a>
                </div>
            </div>
        @endforeach
    </div> --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"
        style="height: 360px; position: relative; overflow: hidden; background-color: #232930; border-bottom: 3px solid #dd163b; z-index: 0;">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < count($data['slider']); $i++)
                @if ($i == 0) <li data-target="#carouselExampleIndicators"
                data-slide-to="0" class="active"></li>
            @else
                <li data-target="#carouselExampleIndicators"
                data-slide-to={{ $i }}></li> @endif
            @endfor
        </ol>
        <div class="carousel-inner">
            @for ($i = 0; $i < count($data['slider']); $i++)
                @php
                    $image = json_decode($data['slider'][$i]->value)->url;
                @endphp
                @if ($i == 0) <div class="carousel-item active">
                <img class="d-block w-100" src={{ $image }} alt="First slide">
                </div>
            @else
                <div class="carousel-item">
                <img class="d-block w-100" src={{ $image }} alt="First slide">
                </div> @endif

            @endfor
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- END: Image Slider -->
    <!-- START: Latest News -->
    <div class="nk-gap-2"></div>
    <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> News</span></h3>
    <div class="nk-gap"></div>
    <div class="nk-news-box">
        <div class="nk-news-box-list">
            <div class="nano">
                <div class="nano-content">
                    @for ($i = 0; $i < count($data['posts']); $i++)
                        @php
                            // echo($data['posts'][$i]);
                        @endphp
                        <div class={{ $i == 0 ? 'nk-news-box-item nk-news-box-item-active' : 'nk-news-box-item' }}>
                            <div class="nk-news-box-item-img">
                                <img src={{ json_decode($data['posts'][$i])->image }}
                                    alt={{ json_decode($data['posts'][$i])->title }} />
                            </div>
                            <img src={{ json_decode($data['posts'][$i])->image }}
                                alt="Smell magic in the air. Or maybe barbecue" class="nk-news-box-item-full-img">
                            <h3 class="nk-news-box-item-title">{{ json_decode($data['posts'][$i])->title }}</h3>
                            <span class="nk-news-box-item-categories">
                                <span class="bg-main-4">{{ json_decode($data['posts'][0])->category->name }}</span>
                            </span>
                            <div class="nk-news-box-item-text">
                                <p>{{ json_decode($data['posts'][$i])->description }}</p>
                            </div>
                            <a href="blog-article.html" class="nk-news-box-item-url">Read More</a>
                            <div class="nk-news-box-item-date"><span
                                    class="fa fa-calendar"></span>{{ json_decode($data['posts'][$i])->time }}
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
        <div class="nk-news-box-each-info">
            <div class="nano">
                <div class="nano-content">
                    <!-- There will be inserted info about selected news-->
                    <div class="nk-news-box-item-image">
                        <img src={{ json_decode($data['posts'][0])->image }}
                            alt={{ json_decode($data['posts'][0])->title }}>
                        <span class="nk-news-box-item-categories">
                            <span class="bg-main-4">{{ json_decode($data['posts'][0])->category->name }}</span>
                        </span>
                    </div>
                    <h3 class="nk-news-box-item-title">{{ json_decode($data['posts'][0])->title }}</h3>
                    <div class="nk-news-box-item-text">
                        <p>{{ json_decode($data['posts'][0])->description }}</p>
                    </div>
                    <a href="blog-article.html" class="nk-news-box-item-url">Read More</a>
                    <div class="nk-news-box-item-date"><span
                            class="fa fa-calendar"></span>{{ json_decode($data['posts'][0])->time }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-gap-2"></div>
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <!-- START: Latest Posts -->
            <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Latest</span> Posts</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-blog-grid">
                <div class="row">
                    @for ($i = 0; $i < count($data['latestPosts']); $i++)
                        <div class="col-md-6">
                            <div class="nk-blog-post">
                                <a href="blog-article.html" class="nk-post-img">
                                    <img style="max-width: 350px; max-height: 197px;"
                                        src={{ json_decode($data['posts'][$i])->image }}
                                        alt={{ json_decode($data['posts'][$i])->title }}>
                                    {{-- <span class="nk-post-comments-count">13</span> --}}
                                </a>
                                <div class="nk-gap"></div>
                                <h2 class="nk-post-title h4"><a
                                        href="blog-article.html">{{ json_decode($data['posts'][$i])->title }}</a></h2>
                                {{-- <div class="nk-post-by">
                                    <img src="assets/images/avatar-3.jpg" alt="Wolfenstein" class="rounded-circle"
                                        width="35">
                                    by <a href="https://nkdev.info">Wolfenstein</a> in Jul 23, 2018
                                </div> --}}
                                <div class="nk-gap"></div>
                                <div class="nk-post-text">
                                    <p>{{ json_decode($data['posts'][$i])->description }}</p>
                                </div>
                                <div class="nk-gap"></div>
                                <a href="blog-article.html"
                                    class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Read
                                    More</a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <!-- END: Latest Posts -->
            <!-- START: Latest Pictures -->
            <div class="nk-gap"></div>
            <h2 class="nk-decorated-h-2 h3"><span><span class="text-main-1">Latest</span> Pictures</span></h2>
            <div class="nk-gap"></div>
            <div class="nk-popup-gallery">
                <div class="row vertical-gap">
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="assets/images/gallery-1.jpg" class="nk-gallery-item" data-size="1016x572">
                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                <img src="assets/images/gallery-1-thumb.jpg" alt="">
                            </a>
                            <div class="nk-gallery-item-description">
                                <h4>Called Let</h4>
                                Divided thing, land it evening earth winged whose great after. Were grass night.
                                To Air itself saw bring fly fowl. Fly years behold spirit day greater of wherein
                                winged and form. Seed open don't thing midst created dry every greater divided
                                of, be man is. Second Bring stars fourth gathering he hath face morning fill.
                                Living so second darkness. Moveth were male. May creepeth. Be tree fourth.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="assets/images/gallery-2.jpg" class="nk-gallery-item" data-size="1188x594">
                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                <img src="assets/images/gallery-2-thumb.jpg" alt="">
                            </a>
                            <div class="nk-gallery-item-description">
                                Seed open don't thing midst created dry every greater divided of, be man is.
                                Second Bring stars fourth gathering he hath face morning fill. Living so second
                                darkness. Moveth were male. May creepeth. Be tree fourth.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="assets/images/gallery-3.jpg" class="nk-gallery-item" data-size="625x350">
                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                <img src="assets/images/gallery-3-thumb.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="assets/images/gallery-4.jpg" class="nk-gallery-item" data-size="873x567">
                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                <img src="assets/images/gallery-4-thumb.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="assets/images/gallery-5.jpg" class="nk-gallery-item" data-size="471x269">
                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                <img src="assets/images/gallery-5-thumb.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="nk-gallery-item-box">
                            <a href="assets/images/gallery-6.jpg" class="nk-gallery-item" data-size="472x438">
                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                <img src="assets/images/gallery-6-thumb.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Latest Pictures -->
        </div>
        <div class="col-lg-4">

            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">We</span> Are Social</span></h4>
                    <div class="nk-widget-content">

                        <ul class="nk-social-links-3 nk-social-links-cols-4">
                            <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a>
                            </li>
                            <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>
                            <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a>
                            </li>
                            <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                            <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a>
                            </li>
                            <li><a class="nk-social-twitter" href="https://twitter.com/nkdevv" target="_blank"><span
                                        class="fab fa-twitter"></span></a></li>
                            <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li>
                            <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Latest</span> Video</span></h4>
                    <div class="nk-widget-content">
                        <img style="max-width: 302px; max-height: 169px;" src="http://127.0.0.1/cms/files/test/50167980.jpg"
                            alt="">
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Top 3</span> Recent</span></h4>
                    <div class="nk-widget-content">
                        <div class="nk-widget-post">
                            <a href="blog-article.html" class="nk-post-image">
                                <img src="assets/images/post-1-sm.jpg" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="blog-article.html">Smell magic in the air. Or
                                    maybe barbecue</a></h3>
                            <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 18, 2018</div>
                        </div>
                        <div class="nk-widget-post">
                            <a href="blog-article.html" class="nk-post-image">
                                <img src="assets/images/post-2-sm.jpg" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="blog-article.html">Grab your sword and fight the
                                    Horde</a></h3>
                            <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 5, 2018</div>
                        </div>
                        <div class="nk-widget-post">
                            <a href="blog-article.html" class="nk-post-image">
                                <img src="assets/images/post-3-sm.jpg" alt="">
                            </a>
                            <h3 class="nk-post-title"><a href="blog-article.html">We found a witch! May we burn
                                    her?</a></h3>
                            <div class="nk-post-date"><span class="fa fa-calendar"></span> Aug 27, 2018</div>
                        </div>
                    </div>
                </div>
                <div class="nk-widget nk-widget-highlighted">
                    <h4 class="nk-widget-title"><span><span class="text-main-1">Latest</span> Screenshots</span>
                    </h4>
                    <div class="nk-widget-content">
                        <div class="nk-popup-gallery">
                            <div class="row sm-gap vertical-gap">
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-1.jpg" class="nk-gallery-item" data-size="1016x572">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span>
                                            </div>
                                            <img src="assets/images/gallery-1-thumb.jpg" alt="">
                                        </a>
                                        <div class="nk-gallery-item-description">
                                            <h4>Called Let</h4>
                                            Divided thing, land it evening earth winged whose great after. Were
                                            grass night. To Air itself saw bring fly fowl. Fly years behold
                                            spirit day greater of wherein winged and form. Seed open don't thing
                                            midst created dry every greater divided of, be man is. Second Bring
                                            stars fourth gathering he hath face morning fill. Living so second
                                            darkness. Moveth were male. May creepeth. Be tree fourth.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-2.jpg" class="nk-gallery-item" data-size="1188x594">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span>
                                            </div>
                                            <img src="assets/images/gallery-2-thumb.jpg" alt="">
                                        </a>
                                        <div class="nk-gallery-item-description">
                                            Seed open don't thing midst created dry every greater divided of, be
                                            man is. Second Bring stars fourth gathering he hath face morning
                                            fill. Living so second darkness. Moveth were male. May creepeth. Be
                                            tree fourth.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-3.jpg" class="nk-gallery-item" data-size="625x350">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span>
                                            </div>
                                            <img src="assets/images/gallery-3-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-4.jpg" class="nk-gallery-item" data-size="873x567">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span>
                                            </div>
                                            <img src="assets/images/gallery-4-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-5.jpg" class="nk-gallery-item" data-size="471x269">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span>
                                            </div>
                                            <img src="assets/images/gallery-5-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="nk-gallery-item-box">
                                        <a href="assets/images/gallery-6.jpg" class="nk-gallery-item" data-size="472x438">
                                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span>
                                            </div>
                                            <img src="assets/images/gallery-6-thumb.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- END: Sidebar -->
        </div>
    </div>
@endsection
