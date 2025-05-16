<div>
    <div class="mx-auto lg:max-w-[960px] min-[1280px]:max-w-[1180px] min-[1024px]:max-w-[960px] min-[1600px]:max-w-[75%] mt-10 px-[15px]">

        <div class="video-container aspect-video relative w-full h-auto mb-7">
            <video class="w-full h-full object-cover m-0" controls style="transform: none; border: none; border-radius: 0">
                <source src="{{ $film->isMovie() ? $film->video()[0] : $episode->video_path[0] }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div>
            <div class="relative mt-0 mb-6">
                <div class="flex flex-wrap">
                    <x-film-detail :film="$film" :episode="$episode" />
                    <div class="relative flex-1 px-4"></div>
                    <div class="text-white p-0 sm:max-w-full sm:flex-[0_0_100%] md:flex-[0_0_100%] md:max-w-full lg:flex-[0_0_33.33333333%] lg:max-w-[33.33333333%] ">
                        <div class="text-xs leading-5 mb-4 flex flex-wrap" style="color: #d2d2d2">
                            <button id="follow-heart"
                                    data-active-src="{{ Vite::asset('/resources/images/heart-fill.png') }}"
                                    data-inactive-src="{{ Vite::asset('/resources/images/heart.png') }}"
                                    class="mr-8 p-0 font-medium text-[14px] border-none flex flex-wrap text-white text-center align-middle leading-[1.35]" style="background: none; box-shadow: none">
                                <img src="{{ Vite::asset('/resources/images/heart.png') }}">
                                <span class="ml-2 font-medium text-[14px] text-white pt-1">Follow</span>
                            </button>
                            <button class="p-0 font-medium text-[14px] border-none flex flex-wrap text-white text-center align-middle leading-[1.35]" style="background: none; box-shadow: none">
                                <img class="pt-1" src="{{ Vite::asset('/resources/images/share.png') }}" lazy="loaded">
                                <span class="ml-2 font-medium text-[14px] text-white pt-1">Share</span>
                            </button>
                        </div>
                        <div class="flex flex-wrap ">
                            <div class="w-1/4 font-light text-[14px] leading-[17px] py-1" style="color: #d2d2d2">Actors:</div>
                            <div class="w-3/4 font-light text-[14px] leading-[17px] py-1">{{ $film->actors->pluck('name')->join(', ') }}</div>
                            <div class="w-1/4 font-light text-[14px] leading-[17px] py-1" style="color: #d2d2d2">Genres:</div>
                            <div class="w-3/4 font-light text-[14px] leading-[17px] py-1">{{ $film->genres->pluck('name')->join(' • ') }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @if($this->film->isShow() )
            <div>
                <div class="flex justify-between">
                    @if($this->film->hasManySeasons())
                        <h2 class="font-medium text-[1.53125rem] mb-6">Seasons</h2>
                        <x-dropdown-button :season_number="$film->seasons()->count()"/>
                    @else
                        <h2 class="font-medium text-[1.53125rem] mb-6">Episode</h2>
                    @endif
                </div>
                <x-episode-slider :films="$films" :episodes="$episodes" title="Related Content" />
            </div>
        @endif

        <x-series-slider :films="$films" title="Related content"/>

        <x-actor-slider :actors="$film->actors" />

        <x-comment :comments="$comments"/>
    </div>
</div>
