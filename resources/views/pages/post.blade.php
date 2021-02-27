@extends('partials.main')
@section('content')
    @php
    $item = $data['post'];
    @endphp
    <!-- START: Breadcrumbs -->
    <div class="nk-gap-1"></div>
    <div class="container">
        <ul class="nk-breadcrumbs">


            {{-- <li><a href="index.html">Home</a></li>


                <li><span class="fa fa-angle-right"></span></li>

                <li><a href="#">Blog</a></li> --}}


            {{-- <li><span class="fa fa-angle-right"></span></li> --}}

            <li><span style="padding-right: 0"></span></li>

        </ul>
    </div>
    <div class="nk-gap-1"></div>
    <!-- END: Breadcrumbs -->
    <div class="container">
        <div class="row vertical-gap">
            <div class="col-lg-8">
                <!-- START: Post -->
                <div class="nk-blog-post nk-blog-post-single">
                    <!-- START: Post Text -->
                    <div class="nk-post-text mt-0">
                        <div class="nk-post-img">
                            <img src={{ $item['image'] }} alt={{ $item['title'] }}>
                        </div>
                        <div class="nk-gap-1"></div>
                        <h1 class="nk-post-title h4">{{ $item['title'] }}</h1>
                        <div class="nk-post-by" style="text-align: right">
                            <img src={{ $item['person']['image'] }} alt="Witch Murder" class="rounded-circle" width="35">
                            by <a href="https://nkdev.info">{{ $item['person']['name'] }}</a> in {{ $item['time'] }}
                            <div class="nk-post-categories">
                                <span class="bg-main-1">{{ $item['category']->name }}</span>
                            </div>
                        </div>

                        <div style="margin-top: 20px; margin-bottom: 10px; text-align: right; direction: rtl;">
                            {{ $item['person']['description'] }}
                        </div>

                        <div style="border-bottom: 4px solid #dd163b;">

                        </div>

                        <div style="margin-top: 20px">
                            {!! $item['body'] !!}
                        </div>
                    </div>
                    <!-- END: Post Text -->

                    @if (count($data['oferPosts']) == 2)
                        <!-- START: Similar Articles -->
                        <div class="nk-gap-2"></div>
                        <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Similar</span> Articles</span></h3>
                        <div class="nk-gap"></div>
                        <div class="row">
                            <div class="col-md-6">
                                @component('components.post_card_v', ['data' => $data['oferPosts'][0]])@endcomponent
                            </div>
                            <div class="col-md-6">
                                @component('components.post_card_v', ['data' => $data['oferPosts'][1]])@endcomponent
                            </div>
                        </div>
                        <!-- END: Similar Articles -->
                    @endif
                </div>
                <!-- END: Post -->
            </div>
            <div class="col-lg-4">
                @include('components.sidebar')
            </div>
        </div>
    </div>

@endsection
