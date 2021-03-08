<div class="nk-blog-post">
    <a href={{ route('postPageView', ['post_id' => $data->post_id]) }} style="text-decoration:none ; color: #7f8b92;">
        <div class="nk-post-img">
            <img src={{ $data->image }}>
            {{-- <span class="nk-post-comments-count">5</span> --}}
            <span class="nk-post-categories">
                <span class="bg-main-5">{{ $data->category->name }}</span>
            </span>
        </div>
        <div class="nk-gap"></div>
        <h2 class="nk-post-title h4" style="text-align: right; direction: rtl;">{{ $data->title }}</h2>
        <div class="nk-post-text" style="text-align: right">
            <p>{{ $data->description }}</p>
        </div>
        <div class="nk-gap"></div>
        <a href={{ route('postPageView', ['post_id' => $data->post_id]) }}
            class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">ادامه
            مطلب</a>
        <div class="nk-post-date float-right" style="direction: rtl;">
            @component('components.time', ['data' => $data])@endcomponent
        </div>
    </a>
</div>
