<div class="nk-gap"></div>
<h2 class="nk-decorated-h-2 h3"><span><span class="text-main-1"> آخرین </span> تصاویر </span></h2>
<div class="nk-gap"></div>
<div class="nk-popup-gallery">
    <div class="row vertical-gap">
        @for ($i = 0; $i < count($data['lastPictures']); $i++)
            @php
                $item = json_decode($data['lastPictures'][$i]);
            @endphp
            <div class="col-lg-4 col-md-6">
                <div class="nk-gallery-item-box">
                    <a href={{ $item->url }} class="nk-gallery-item" data-size="1016x572">
                        <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
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
