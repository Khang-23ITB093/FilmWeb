@props(['film' => null, 'type' => ''])
@php
    if ($type == 'homePage'){
        $class = 'flex flex-col items-start gap-4 self-stretch';
        $style = 'width: 35vw';
    }
    elseif ($type == 'genre'){
        $class = 'flex flex-col items-start gap-4 self-stretch mt-16';
    }
    else{
        $class = 'flex flex-col items-start gap-4 self-stretch max-sm:gap-2 ';
    }
@endphp

<div class="{{ $class }}">
    <div class="flex flex-col items-start gap-3.5 max-md:gap-2 max-sm:gap-1 self-stretch max-sm:w-[52vw] w-[48vw] max-w-[850px]">
        <div class="w-full">
            <span class="leading-none text-[20px] text-white/85 font-light leading-10 max-[700px]:hidden">{{ $film->releaseYear() }}</span>
            <h1 class="font-extrabold text-5xl w-full max-sm:text-[18px] max-md:text-3xl max-lg:text-4xl overflow-hidden whitespace-nowrap">{{ $film->title }}</h1>
        </div>
        <span
            class="w-full flex font-bold max-sm:text-[8px] max-sm:leading-none max-md:text-xl text-[20px] overflow-hidden whitespace-nowrap">{{($film->isShow() ? ($film->seasons->count() > 1 ? $film->seasons->count() . '  Seasons • ' : '') : (floor($film->duration / 60) . ' hr ' . ($film->duration % 60) . ' min • ')) . $film->genres->pluck('name')->join(' • ') }}</span>
        <p class="overflow-hidden max-sm:text-[8px] w-full self-stretch description"
           style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical">
            {{ $film->description }}
        </p>
    </div>
    <div class="flex md:gap-6 sm:gap-5 ">
        <x-button type="watch" url="{{ '/film/' . $film->slug }}" >Watch Now</x-button>
        <x-button type="trailer" class="max-[1145px]:hidden ">Watch Trailer</x-button>
        <x-button type="wishlist" class="max-[728px]:hidden">Add to Wishlist</x-button>
    </div>
</div>
