@props(['films'])
<div class="shrink-0 relative swiper home-swiper">
    <div class="swiper-wrapper">
        @for($i = 0; $i < 5; $i++)
            <x-home-card :film="$films[$i]"/>
        @endfor
    </div>

    <!-- Pagination -->
    <div class="swiper-pagination swiper-pagination-home"></div>
</div>
