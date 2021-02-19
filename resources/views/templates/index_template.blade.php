<div style="height: 500px;"></div>
<div class="content_background" style="width: 100%">
    <div class="container">
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
        <div style="height: 10px;"></div>
        <div id="carouselExampleIndicators" class="carousel slide mt-2" data-ride="carousel"
            style="height: 360px; position: relative; overflow: hidden; background-color: #232930; border-bottom: 3px solid #dd163b; z-index: 0;">
            <ol class="carousel-indicators">
                @for ($i = 0; $i < count($data['slider']); $i++)
                    @if ($i == 0) <li
                    data-target="#carouselExampleIndicators"
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
        <h3 class="nk-decorated-h-2"><span><span class="text-main-1"> مطالب </span>پربازدید</span></h3>
        <div class="nk-gap"></div>
        <div class="nk-news-box">
            <div class="nk-news-box-list">
                <div class="nano">
                    <div class="nano-content">
                        @for ($i = 0; $i < count($data['posts']); $i++)
                            @php
                                $item = json_decode($data['posts'][$i]);
                            @endphp
                            <div
                                class={{ $i == 0 ? 'nk-news-box-item nk-news-box-item-active' : 'nk-news-box-item' }}>
                                <div class="nk-news-box-item-img">
                                    <img src={{ $item->image }} alt={{ $item->title }} />
                                </div>
                                <img src={{ $item->image }} alt="Smell magic in the air. Or maybe barbecue"
                                    class="nk-news-box-item-full-img">
                                <h3 class="nk-news-box-item-title">{{ $item->title }}</h3>
                                <span class="nk-news-box-item-categories">
                                    <span
                                        class="bg-main-4">{{ json_decode($data['posts'][0])->category->name }}</span>
                                </span>
                                <div class="nk-news-box-item-text">
                                    <p>{{ $item->description }}</p>
                                </div>
                                <a href={{ route('postPageView', ['post_id' => $item->post_id]) }}
                                    class="nk-news-box-item-url">ادامه مطلب</a>
                                <div class="nk-news-box-item-date"><span
                                        class="fa fa-calendar"></span>{{ $item->time }}
                                </div>
                            </div>
                        @endfor

                    </div>
                </div>
            </div>
            <div class="nk-news-box-each-info">
                <div class="nano">
                    @if (count($data['posts']) != null)
                        @php
                            $item = json_decode($data['posts'][0]);
                        @endphp
                        <div class="nano-content">
                            <!-- There will be inserted info about selected news-->
                            <div class="nk-news-box-item-image">
                                <img src={{ $item->image }} alt={{ $item->title }}>
                                <span class="nk-news-box-item-categories">
                                    <span class="bg-main-4">{{ $item->category->name }}</span>
                                </span>
                            </div>
                            <h3 class="nk-news-box-item-title">{{ $item->title }}</h3>
                            <div class="nk-news-box-item-text">
                                <p>{{ $item->description }}</p>
                            </div>
                            <a href={{ route('postPageView', ['post_id' => $item->post_id]) }}
                                class="nk-news-box-item-url">ادامه مطلب</a>
                            <div class="nk-news-box-item-date"><span class="fa fa-calendar"></span>{{ $item->time }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="nk-gap-2"></div>
        <div class="row vertical-gap">
            <div class="col-lg-8">
                @yield('content')
            </div>
            <div class="col-lg-4">
                @include('components.sidebar')
            </div>
        </div>
    </div>
</div>
