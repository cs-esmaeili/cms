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
                    @if ($i == 0) <div
                    class="nk-news-box-item nk-news-box-item-active">
                    <div class="nk-news-box-item-img">
                    <img src={{ $item->image }} alt={{ $item->title }} />
                    </div>
                    <img src={{ $item->image }} alt="Emeral"
                    class="nk-news-box-item-full-img">
                    <h3 style="direction: rtl;"
                    class="nk-news-box-item-title">{{ $item->title }}</h3>

                    <span class="nk-news-box-item-categories">
                    <span
                    class="bg-main-4">{{ json_decode($data['posts'][0])->category->name }}</span>
                    </span>
                    <div class="nk-news-box-item-text">
                    <p>{{ $item->description }}</p>
                    </div>
                    <a href={{ route('postPageView', ['post_id' => $item->post_id]) }}
                    class="nk-news-box-item-url">ادامه مطلب</a>
                    <div class="nk-news-box-item-date">
                    @component('components.time', ['data' => $item])@endcomponent
                    </div>
                    </div>
                @else
                    <div class='nk-news-box-item'>
                    <div class="nk-news-box-item-img">
                    <img src={{ $item->image }} alt={{ $item->title }} />
                    </div>
                    <img src={{ $item->image }} alt="Emeral"
                    class="nk-news-box-item-full-img">
                    <h3 style="direction: rtl;"
                    class="nk-news-box-item-title">{{ $item->title }}</h3>

                    <span class="nk-news-box-item-categories">
                    <span
                    class="bg-main-4">{{ json_decode($data['posts'][0])->category->name }}</span>
                    </span>
                    <div class="nk-news-box-item-text">
                    <p>{{ $item->description }}</p>
                    </div>
                    <a href={{ route('postPageView', ['post_id' => $item->post_id]) }}
                    class="nk-news-box-item-url">ادامه مطلب</a>
                    <div class="nk-news-box-item-date">
                    @component('components.time', ['data' => $item])@endcomponent
                    </div>
                    </div> @endif
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
                    <h3 style="direction: rtl;" class="nk-news-box-item-title">{{ $item->title }}</h3>
                    <div class="nk-news-box-item-text">
                        <p>{{ $item->description }}</p>
                    </div>
                    <a href={{ route('postPageView', ['post_id' => $item->post_id]) }}
                         class="nk-news-box-item-more">Read More</a>
                    <div class="nk-news-box-item-date">
                        @component('components.time', ['data' => $item])@endcomponent
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
