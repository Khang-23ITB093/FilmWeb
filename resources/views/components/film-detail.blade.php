@props(['film' => null, 'episode' => null])
@php($rating = \App\Models\Rating::where('film_id', $film->id)->where('user_id', Auth::id())->first() ? \App\Models\Rating::where('film_id', $film->id)->where('user_id', Auth::id())->first()->rating : 0)
<div
    class="p-0 lg:max-w-[58.33333333%] lg:flex-[0_0_58.33333333%] md:max-w-full md:flex-[0_0_100%] sm:max-w-full sm:flex-[0_0_100%]" wire:ignore.self>
    {{-- title --}}
    <div>
        <h1 class="text-2xl text-white font-semibold">
            {{ $film->title }}
        </h1>
    </div>
    {{-- rating --}}
    <div class="flex items-center flex-wrap gap-4 mb-3 min-[1650px]:gap-3">
        <div class="flex items-center ">
            <div
                style="background-color: rgb(44, 44, 44); padding: 2px 8px; background-position: center; background-repeat: no-repeat; background-size: cover; white-space: nowrap;"
                class="w-fit flex h-8 items-center rounded-lg">
                <img class="mr-2" src=" {{ Vite::asset('resources/images/rate-star.png') }}"
                     alt="icon">
                <span
                    class="text-white font-semibold leading-[150%] mr-1 min-[1650px]:text-[16px] text-[18px]">{{ $film->average_rating }}</span>
                <span style="color: #616161"
                      class="font-semibold leading-[150%] mr-1 min-[1650px]:text-[14px] text-[16px]">({{ $film->total_ratings() }})</span>
            </div>
        </div>
        <div class="flex">
            <!-- Rating star -->
            <div class="flex items-center gap-1 {{ $rating == 0 ? '' : 'hidden'}}" id="rating-container">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="item relative" data-value="{{ $i }}">
                        <img
                            src="{{ ($i <= $rating) ? Vite::asset('resources/images/rate-star.png') : Vite::asset('resources/images/non-rate-star.png') }}"
                            data-active-src="{{ Vite::asset('resources/images/rate-star.png') }}"
                            data-inactive-src="{{ Vite::asset('resources/images/non-rate-star.png') }}"
                            class="cursor-pointer transition-all duration-200 rating-star"
                            wire:click="selectRating({{ $i }})"
                            alt="star">
                    </div>
                @endfor
            </div>

            <div class="flex items-center w-fit h-8 hidden change-display">
                <div class="h-1 w-1 rounded-[50%] mt-0 mx-3"
                     style="background: rgba(255,255,255,.38)"></div>
                <span id="cancelRating-button" class="cursor-pointer text-red-500 font-medium
                                         text-[14px] flex items-center justify-center leading-4 h-8 py-0 px-1.5 ">Cancel</span>
            </div>

        </div>
        {{--Show rating history and change button--}}
        <div class="flex items-center w-fit h-8 rating-display {{ $rating == 0 ? 'hidden' : ''}}">
            <img class="mr-2" src=" {{ Vite::asset('resources/images/rate-star.png') }}" alt="icon">
            <span>{{ $rating }}</span>
            <div class="h-1 w-1 rounded-[50%] mt-0 mx-3"
                 style="background: rgba(255,255,255,.38)"></div>
            <span id="changeRating-button" class="cursor-pointer text-red-500 font-medium
                                     text-[14px] flex items-center justify-center leading-4 h-8 py-0 px-1.5 ">Change</span>
        </div>


    </div>
    {{-- information --}}
    <div class="mb-3 items-center flex ">
        <div class="items-center flex ">
            <div class="font-normal text-[14px] leading-4" style="color: rgba(255,255,255,.87)">
                {{ $film->date() }}
            </div>
            <div class="h-[3px] w-[3px] rounded-[50%] mt-0 mx-3"
                 style="background: rgba(255,255,255,.38)"></div>
        </div>
        <div class="items-center flex ">
            <div class="font-normal text-[14px] leading-4" style="color: rgba(255,255,255,.87)">
{{ $film->isShow() ? $episode->episode_number . '/' . $episode->season->episodes_count : floor($film->duration / 60) . 'h ' . ($film->duration % 60) . 'm' }}
            </div>
        </div>
    </div>
    {{-- description --}}
    <div class="relative text-xs leading-5 mb-3 text-container pb-[23px]" style="color: #d2d2d2; overflow: hidden;">
        <p class="overflow-hidden text-justify" style="text-overflow: inherit; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
            {{ $film->isShow() ? $episode->description : $film->description }}
        </p>
        <div>
            <div class="absolute right-0 font-medium text-[14px] leading-4 read-more-open text-white transition bottom-[25px] bg-black-theme cursor-pointer">...More</div>
            <div class="absolute right-0 font-medium text-[14px] leading-4 read-more-close text-white transition bottom-0.5 bg-black-theme cursor-pointer" style="display: none; color: #616161;">Hide</div>
        </div>
    </div>

</div>
