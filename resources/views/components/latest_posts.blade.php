<h3 class="nk-decorated-h-2"><span><span class="text-main-1"> آخرین </span> مطالب</span></h3>
<div class="nk-gap"></div>
<div class="nk-blog-grid">
    <div class="row">
        @for ($i = 0; $i < count($data['latestPosts']); $i++)
            <div class="col-md-6">
                @component('components.post_card_v', ['data' => $data['latestPosts'][$i]])@endcomponent
            </div>
        @endfor
    </div>
</div>
