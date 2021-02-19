<aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title" style="text-align: right"><span
                style="padding-left: 23px; padding-right: 0px;"><span class="text-main-1"> ما </span>اجتماعی
                هستیم</span></h4>
        <div class="nk-widget-content">

            <ul class="nk-social-links-3 nk-social-links-cols-4">
                <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a>
                </li>
                <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a>
                </li>
                <li><a class="nk-social-facebook" href="#"><span class="fab fa-facebook"></span></a>
                </li>
                <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a>
                </li>
                <li><a class="nk-social-twitter" href="https://twitter.com/nkdevv" target="_blank"><span
                            class="fab fa-twitter"></span></a></li>
                <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a>
                </li>
                <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
            </ul>
        </div>
    </div>
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title" style="text-align: right"><span
                style="padding-left: 23px; padding-right: 0px;"><span class="text-main-1"> آخرین </span>ویدیو</span>
        </h4>
        <div class="nk-widget-content">
            @if (count($data['lastVideo']) != 0)
                <a href={{ $data['lastVideo']['url_target'] }}>
                    <img style="max-width: 302px; max-height: 169px;" src={{ $data['lastVideo']['url'] }} alt="">
                </a>
            @endif
        </div>
    </div>
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title" style="text-align: right"><span
                style="padding-left: 23px; padding-right: 0px;"><span class="text-main-1"> مطالب </span>پیشنهادی</span>
        </h4>
        <div class="nk-widget-content">
            @for ($i = 0; $i < count($data['oferPosts']); $i++)
                @php
                    $item = json_decode($data['oferPosts'][$i]);
                @endphp
                <div class="nk-widget-post">
                    <h3 class="nk-post-title"><a
                            href={{ route('postPageView', ['post_id' => $item->post_id]) }}>{{ $item->title }}</a></h3>
                    <a href="blog-article.html" class="nk-post-image">
                        <img src={{ $item->image }} alt="">
                    </a>
                    <div class="nk-post-date"><span class="fa fa-calendar"></span>{{ $item->time }}</div>
                </div>
            @endfor
        </div>
    </div>
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title" style="text-align: right"><span
                style="padding-left: 23px; padding-right: 0px;"><span class="text-main-1"> آخرین </span> اسکرین شات
                ها</span>
        </h4>
        <div class="nk-widget-content">
            <div class="nk-popup-gallery">
                <div class="row sm-gap vertical-gap">
                    @for ($i = 0; $i < count($data['lastScreenShots']); $i++)
                        @php
                            $item = json_decode($data['lastScreenShots'][$i]);
                        @endphp
                        <div class="col-sm-6">
                            <div class="nk-gallery-item-box">
                                <a href={{ $item->url }} class="nk-gallery-item" data-size="1016x572">
                                    <div class="nk-gallery-item-overlay"><span class="ion-eye"></span>
                                    </div>
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
        </div>
    </div>
</aside>
