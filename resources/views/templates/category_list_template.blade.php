<div class="nk-main">
    <!-- START: Breadcrumbs -->
    <div class="nk-gap-1"></div>
    <div class="container">
        <ul class="nk-breadcrumbs">
            {{-- <li><a href="index.html">Home</a></li>
            <li><span class="fa fa-angle-right"></span></li>
            <li><a href="#">Blog</a></li>
            <li><span class="fa fa-angle-right"></span></li> --}}
            @php
                // dd();
            @endphp
            <li><span>{{ $data['posts'][0]['category']['name']}}</span></li>
        </ul>
    </div>
    <div class="nk-gap-1"></div>
    <!-- END: Breadcrumbs -->
    <div class="container">
        <div class="row vertical-gap">
            <div class="col-lg-8">
                <!-- START: Posts List -->
                <div class="nk-blog-list">
                    @yield('content')

                </div>
                <!-- END: Posts List -->

            </div>
            <div class="col-lg-4">
                @include('components.sidebar')
            </div>
        </div>
    </div>
</div>
