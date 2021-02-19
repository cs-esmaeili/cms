<div class="nk-blog-post">
    <a href={{ route('postPageView', ['post_id' => $data->post_id]) }} class="nk-post-img">
        <img src={{ $data->image }}>
        {{-- <span class="nk-post-comments-count">5</span> --}}

        <span class="nk-post-categories">
            <span class="bg-main-5">{{ $data->category->name }}</span>
        </span>

    </a>
    <div class="nk-gap"></div>
    <h2 class="nk-post-title h4" style="text-align: right"><a
            href={{ route('postPageView', ['post_id' => $data->post_id]) }}>{{ $data->title }}</a></h2>
    <div class="nk-post-text" style="text-align: right">
        <p>{{ $data->description }}</p>
    </div>
    <div class="nk-gap"></div>
    <a href={{ route('postPageView', ['post_id' => $data->post_id]) }}
        class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">ادامه
        مطلب</a>
    <div class="nk-post-date float-right"><svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true"
            data-prefix="fa" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512" data-fa-i2svg="">
            <path fill="currentColor"
                d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z">
            </path>
        </svg><!-- <span class="fa fa-calendar"></span> --> Jul 23, 2018</div>
</div>
