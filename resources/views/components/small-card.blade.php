@props(['film' => null])
<div class="swiper-slide md:w-[30%] max-[1400px]:!w-1/5 max-[920px]:!w-[30%] max-[545px]:!w-[60%]" style="width: calc(16.7% - 40px)">
    <div class="w-full">
        <a href="{{ '/film/' . $film->slug }}">
            <img class="w-full" src="{{ $film->posters[0] }}" alt="{{ $film->title .'-poster' }}" style="border-radius: 0px 28px; aspect-ratio: 0.78125; object-fit: cover">
            <h3 class="mt-5 text-2xl w-full overflow-hidden" style="-webkit-line-clamp: 1; display: -webkit-box;-webkit-box-orient: vertical;">{{ $film->title }}</h3>
            <p class="text-violet-400 text-sm w-full overflow-hidden" style="text-overflow: ellipsis;display: -webkit-box; line-clamp: 1; -webkit-line-clamp: 1; -webkit-box-orient: vertical;">{{ $film->genres->pluck('name')->join(' • ') }}</p>
        </a>
    </div>

</div>
