@props(['film'])
<div class="movieCard rating-card" wire:ignore.self data-rating="{{$film->average_rating}}" x-init="initRatingCard($el)" >
    <a href="{{ '/watch/' . $film->slug }}">
        <div class="posterBlock relative w-full bg-cover bg-center flex items-end justify-between p-2.5 mb-7 e" style="aspect-ratio: 1/1.5;transition: transform .5s ease-out;">
        <span class="text-transparent inline-block absolute top-0 left-0 w-full h-full rounded-xl overflow-hidden transition blur-0" style="transition: transform .5s ease-out;">
            <img class="w-full h-full object-cover object-center transition opacity-100" src="{{ $film->posters[0] }}" alt style="transition: transform .5s ease-out;">
        </span>
            <div class="circleRating">
                <svg class="progress-circle" viewBox="0 0 100 100">
                    <path class="CircularProgressbar-trail" d="M 50,50 m 0,-46 a 46,46 0 1 1 0,92 a 46,46 0 1 1 0,-92" stroke-width="8" fill-opacity="0" style="stroke-dasharray: 289.027px, 289.027px; stroke-dashoffset: 0;"></path>
                    <path class="CircularProgressbar-path" d="M 50,50 m 0,-46 a 46,46 0 1 1 0,92 a 46,46 0 1 1 0,-92" stroke-width="8" fill-opacity="0" style="stroke: orange; stroke-dasharray: 289.027px, 289.027px; stroke-dashoffset: 104.05px;"></path>
                    <text class="rating-text text-[34px] fill-white font-bold " x="50" y="50" style="dominant-baseline: middle; text-anchor: middle">
                        {{ $film->average_rating }}</text>
                </svg>
            </div>
            <div class="genres flex justify-end relative gap-[5px] items-end" style="flex-flow: wrap-reverse">
                @foreach($film->genres as $genre)
                    <div class="genre">{{$genre->name}}</div>
                @endforeach
            </div>
        </div>
        <div class="flex !flex-row justify-between text-white ">
            <div>
                <span class="title">{{ $film->title }}</span>
                <span class="date">{{ $film->date() }}</span>
            </div>
        </div>
    </a>
</div>

