<div class="nk-blog-post">
    <a href={{ route('postPageView', ['post_id' => $data->post_id]) }} style="text-decoration:none ; color: #7f8b92;">
        <div class="row vertical-gap custom_hover">
            <div class="col-md-5 col-lg-6">
                <div class="nk-post-img">
                    <img src={{ $data->image }} alt={{ $data->title }}>
                </div>
            </div>
            <div class="col-md-7 col-lg-6">
                <h2 class="nk-post-title h4" style="text-align: right; direction: rtl;">{{ $data->title }}</h2>
                <div class="nk-post-text" style="text-align: right; direction: rtl;">
                    <p>{{ $data->description }}</p>
                </div>
                <div class="nk-post-by">
                    <img src={{ $data->person['image'] }} alt={{ $data->person['name'] }} class="rounded-circle"
                        width="35">
                    by {{ $data->person['name'] }} in {{ $data->time }}
                </div>
            </div>
        </div>
    </a>
</div>
