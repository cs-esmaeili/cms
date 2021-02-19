@php
// dd($data);
@endphp
<div class="nk-blog-post">
    <div class="row vertical-gap">
        <div class="col-md-5 col-lg-6">
            <a href={{ route('postPageView', ['post_id' => $data->post_id]) }} class="nk-post-img">
                <img src={{ $data->image }} alt="Smell magic in the air. Or maybe barbecue">
                {{-- <span class="nk-post-comments-count">4</span> --}}
            </a>
        </div>
        <div class="col-md-7 col-lg-6">
            <h2 class="nk-post-title h4"><a
                    href={{ route('postPageView', ['post_id' => $data->post_id]) }}>{{ $data->title }}</a></h2>

            <div class="nk-post-text">
                <p>{{ $data->description }}</p>
            </div>

            <div class="nk-post-by">
                <img src={{ $data->person['image'] }} alt={{ $data->person['name'] }} class="rounded-circle"
                    width="35">
                by <a href={{ $data->person['image'] }}>{{ $data->person['name'] }}</a> in {{ $data->time }}
            </div>
        </div>
    </div>
</div>
