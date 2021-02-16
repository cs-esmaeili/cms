@extends('layout.main')
@section('content')
    <!-- START: Latest Posts -->
    <h3 class="nk-decorated-h-2"><span><span class="text-main-1"> آخرین </span> مطالب</span></h3>
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
                                href="blog-article.html">{{ json_decode($data['posts'][$i])->title }}</a>
                        </h2>
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
    <h2 class="nk-decorated-h-2 h3"><span><span class="text-main-1"> آخرین </span> تصاویر </span></h2>
    <div class="nk-gap"></div>
    <div class="nk-popup-gallery">
        <div class="row vertical-gap">
            @for ($i = 0; $i < count($data['lastPictures']); $i++)
                @php
                    $item = json_decode($data['lastPictures'][$i]);
                @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="nk-gallery-item-box">
                        <a href={{ $item->url }} class="nk-gallery-item" data-size="1016x572">
                            <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                            <img src={{ $item->url }} alt="">
                        </a>
                        <div class="nk-gallery-item-description">
                            {{ $item->description }}
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <!-- END: Latest Pictures -->
@endsection
