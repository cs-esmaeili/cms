<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @php
            $data = $data['slider'];
        @endphp
        @for ($i = 0; $i < count($data); $i++)
            @if ($i == 0) <li data-target="#carouselExampleIndicators"
            data-slide-to="0" class="active"></li>
        @else
            <li data-target="#carouselExampleIndicators"
            data-slide-to={{ $i }}></li> @endif
        @endfor
    </ol>
    <div class="carousel-inner">
        @for ($i = 0; $i < count($data); $i++)
            @php
                $image = json_decode($data[$i]->value)->url;
                $url = json_decode($data[$i]->value)->url_target;
                // dd($image);
            @endphp

            @if ($i == 0) <div class="carousel-item active">
            <img class="d-block w-100" style="min-height: 30vh;"
            src={{ $image }}
            alt="emeral">
            </div>
        @else
            <div class="carousel-item">
            <img class="d-block w-100" style="min-height: 30vh;"
            src={{ $image }}
            alt="emeral">
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
