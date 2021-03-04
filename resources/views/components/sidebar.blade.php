<aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
    @include('components.social_links')
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title" style="text-align: right"><span
                style="padding-left: 23px; padding-right: 0px;"><span class="text-main-1"> آخرین </span>ویدیو</span>
        </h4>
        <div class="nk-widget-content">
            @if (count($data['lastVideo']) != 0)
                <a href={{ $data['lastVideo']['url_target'] }}>
                    <img class="img-fluid" src={{ $data['lastVideo']['url'] }} alt="">
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
                    <h3 class="nk-post-title" style="direction: ltr;"><a
                            href={{ route('postPageView', ['post_id' => $item->post_id]) }}>{{ $item->title }}</a>
                    </h3>
                    <a href="blog-article.html" class="nk-post-image">
                        <img src={{ $item->image }} alt="">
                    </a>
                    <div class="nk-post-date">
                        @component('components.time', ['data' => $item])@endcomponent
                    </div>
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
