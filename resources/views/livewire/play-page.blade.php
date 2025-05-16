<div class="bg-black">
    <div class="relative">
        <div class="h-full bg-cover bg-no-repeat bg-center sm:bg-lightgray sm:bg-50% md:bg-lightgray md:bg-50% custom-gradient"
             style="background: url({{ $film->backgrounds[0] }}) lightgray 50% / cover no-repeat;">
            <div class="flex flex-col sm:flex-row
             p-8  items-end justify-between bg-gradient-to-r from-black
              via-black/70 to-transparent pt-[36%]">
                <div name='content' class="flex flex-col gap-4 w-full sm:w-[500px] md:w-[757px]">
                    <div class="info1 flex flex-col items-start gap-[-24px]">
                        <p class="text-white text-base sm:text-lg md:text-lg font-light leading-[2]">
                            {{ $film->releaseYear() }}
                        </p>
                        <h2 class="text-white text-3xl sm:text-4xl md:text-5xl font-semibold leading-[1.2]">
                            {{ $film->title }}
                        </h2>
                    </div>

                    <p class="text-white text-sm sm:text-md md:text-lg font-semibold leading-[1.2]">
                        {{ $film->genres->pluck('name')->join(' • ') }}
                    </p>

                    <div class="watch flex flex-row sm:flex-row items-center gap-4 max-sm:items-start">
                        <x-button type="watch" url="{{ $film->isMovie() ? '/watch/' . $film->slug: ($film->hasManySeasons() ? '/watch/'.$film->slug.'/season/1/episode/1' : '/watch/'.$film->slug.'/episode/1') }}">Watch Now</x-button>
                        <x-button type="wishlist">Add to Wishlist</x-button>
                    </div>
                </div>

                <div class="link flex flex-col sm:flex-row md:flex-row items-center gap-4 mt-4 md:mt-0 max-[860px]:hidden">
                    <x-button class="w-full sm:w-auto md:w-auto flex items-center justify-center py-2 px-4 text-white rounded-md">
                        <svg width="21" height="20" class="mr-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="akar-icons:download">
                                <path id="Vector" d="M10.4993 12.5V2.5M10.4993 12.5L7.16602 9.16667M10.4993 12.5L13.8327 9.16667M2.16602 14.1667L2.68352 16.2375C2.77364 16.5981 2.9817 16.9182 3.27462 17.1469C3.56755 17.3757 3.92852 17.4999 4.30018 17.5H16.6985C17.0702 17.4999 17.4312 17.3757 17.7241 17.1469C18.017 16.9182 18.2251 16.5981 18.3152 16.2375L18.8327 14.1667" stroke="#F8F8F8" stroke-width="1.17" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                        <span class="text-sm font-semibold">Download</span>
                    </x-button>

                    <x-button class="w-full sm:w-auto md:w-auto flex items-center justify-center py-2 px-4 text-white rounded-md">
                        <svg width="20" height="20" class="mr-2" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="material-symbols:share">
                                <path id="Vector" d="M15 18.3334C14.3056 18.3334 13.7153 18.0904 13.2292 17.6042C12.7431 17.1181 12.5 16.5279 12.5 15.8334C12.5 15.7362 12.5069 15.6354 12.5208 15.5309C12.5347 15.4265 12.5556 15.3329 12.5833 15.2501L6.70833 11.8334C6.47222 12.0417 6.20833 12.2051 5.91667 12.3234C5.625 12.4417 5.31944 12.5006 5 12.5001C4.30556 12.5001 3.71528 12.257 3.22917 11.7709C2.74306 11.2848 2.5 10.6945 2.5 10.0001C2.5 9.30564 2.74306 8.71536 3.22917 8.22925C3.71528 7.74314 4.30556 7.50008 5 7.50008C5.31944 7.50008 5.625 7.55925 5.91667 7.67758C6.20833 7.79591 6.47222 7.95897 6.70833 8.16675L12.5833 4.75008C12.5556 4.66675 12.5347 4.57314 12.5208 4.46925C12.5069 4.36536 12.5 4.26453 12.5 4.16675C12.5 3.4723 12.7431 2.88203 13.2292 2.39591C13.7153 1.9098 14.3056 1.66675 15 1.66675C15.6944 1.66675 16.2847 1.9098 16.7708 2.39591C17.2569 2.88203 17.5 3.4723 17.5 4.16675C17.5 4.86119 17.2569 5.45147 16.7708 5.93758C16.2847 6.42369 15.6944 6.66675 15 6.66675C14.6806 6.66675 14.375 6.60786 14.0833 6.49008C13.7917 6.3723 13.5278 6.20897 13.2917 6.00008L7.41667 9.41675C7.44444 9.50008 7.46528 9.59397 7.47917 9.69841C7.49306 9.80286 7.5 9.90341 7.5 10.0001C7.5 10.0972 7.49306 10.1977 7.47917 10.3022C7.46528 10.4066 7.44444 10.5001 7.41667 10.5834L13.2917 14.0001C13.5278 13.7912 13.7917 13.6279 14.0833 13.5101C14.375 13.3924 14.6806 13.3334 15 13.3334C15.6944 13.3334 16.2847 13.5764 16.7708 14.0625C17.2569 14.5486 17.5 15.1389 17.5 15.8334C17.5 16.5279 17.2569 17.1181 16.7708 17.6042C16.2847 18.0904 15.6944 18.3334 15 18.3334Z" stroke="#F8F8F8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                        <span class="text-sm font-semibold">Share</span>
                    </x-button>
                </div>
            </div>
        </div>
    </div>



{{-- Container --}}
    <div class="inline-flex w-full flex-col gap-20 pl-10 pr-[20px] pb-[50px]">
        <!-- Synopsis Section -->
        <div class="synopsis flex flex-col items-start gap-8 text-container">
            <h4 class="self-stretch text-white font-poppins text-[37px] font-semibold leading-[120%] md:text-[25px] mt-6">Synopsis</h4>
            <p class="self-stretch overflow-hidden text-justify text-white font-poppins text-[23px] font-normal leading-[120%] md:text-[17px]" style="text-overflow: inherit; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                {{ $film->description }}
                <span class="text-[#7300ff] font-semibold cursor-pointer hidden read-more-open">More</span>
                <span class="text-[#7300ff] font-semibold cursor-pointer hidden read-more-close">Hide</span>
            </p>
        </div>

        <!-- Cast Section -->
        <div class="flex w-full flex-col gap-8">
            <h4 class="self-stretch text-white font-poppins text-[37px] font-semibold leading-[120%] md:text-[25px] sm:text-[20px]">Cast</h4>
            <div class="swiper actor-swiper w-full">
                <div class="swiper-wrapper w-full">
                    <!-- Cast Item -->
                    <x-actor-card :actors="$actors"></x-actor-card>
                </div>
            </div>
        </div>

        <!-- Movie Card Section -->
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
    </div>

</div>
