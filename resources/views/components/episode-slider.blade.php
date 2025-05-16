@props(['name' => 'episodes', 'episodes' => null])


<div class="swiper {{ $name }}-swiper" style="width: 100%; position: relative;">
    <div class="swiper-wrapper">
        @if($episodes)
            @foreach($episodes as $ep)
                <x-episode-card :episode="$ep"/>
            @endforeach
        @endif
    </div>
</div>

