@php
$pageCount = ceil($data['postsCount'] / $data['perPage']);
$current = $data['currentPage'];
$moreItems = 3;
@endphp
<div class="nk-pagination nk-pagination-center">
    @if ($current > 1)
        <a href={{ route('categoryPageView', ['category_id' => $data['category_id'], 'page_number' => $current - 1]) }}
            class="nk-pagination-prev">
            <span class="ion-ios-arrow-back"></span>
        </a>
    @endif
    <nav>
        @for ($i = 1; $i <= $pageCount; $i++)
            @php
                $link = route('categoryPageView', ['category_id' => $data['category_id'], 'page_number' => $i]);
                $activeNumber = "<a href=\"$link\" class=\"nk-pagination-current\">$i</a>";
                $normalNumber = "<a href=\"$link\">$i</a>";
                if ($i == 1 && !($i >= $current - $moreItems)) {
                    echo $current == $i ? $activeNumber : $normalNumber;
                    if ($i != $current - ($moreItems + 1)) {
                        echo '<span>...</span>';
                    }
                }
                if ($i <= $current + $moreItems && $i >= $current - $moreItems) {
                    echo $current == $i ? $activeNumber : $normalNumber;
                }
                if ($i == $pageCount && $i != $i <= $current + $moreItems) {
                    if ($i != $current + ($moreItems + 1)) {
                        echo '<span>...</span>';
                    }
                    echo $current == $i ? $activeNumber : $normalNumber;
                }
            @endphp
        @endfor
    </nav>
    @if ($current < $pageCount)
        <a href={{ route('categoryPageView', ['category_id' => $data['category_id'], 'page_number' => $current + 1]) }}
            class="nk-pagination-next">
            <span class="ion-ios-arrow-forward"></span>
        </a>
    @endif
</div>
