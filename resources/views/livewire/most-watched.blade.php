<div class="w-full mt-16 relative aspect-video"
     style="background: url({{  $currentFilm->backgrounds[0] }}) no-repeat; background-size: cover; ">
    <div class="h-full w-full absolute top-0 left-0"
         style="background: var(--Grad-black, linear-gradient(89deg, #000 9.23%, rgba(0, 0, 0, 0.47) 49.67%, rgba(0, 0, 0, 0.00) 61.08%));">
        <div class="w-full h-full flex-col">
            <div class="h-full w-full" style=" display: flex; flex-direction: row">
                <div class="self-stretch flex flex-col gap-6 md:gap-14 max-[420px]:gap-1 lg:gap-40 max-md:mr-8 mx-24 max-sm:ml-6 my-auto">
                    <div class="self-start justify-start">
                        <h2 class="max-sm:text-[15px] max-md:text-xl max-lg:text-2xl max-[420px]:text-[10px] font-bold !leading-none" >This month's most watched</h2>
                        <p class="max-sm:text-xs max-[420px]:hidden">Watch this month's most Watched Shows</p>
                    </div>
                    <x-content :film="$currentFilm" />
                </div>
                <div class="swiper {{$name}}-swiper my-auto" style="width: 100%" wire:ignore>
                    <div class=" swiper-wrapper w-full" style="height: fit-content">
                        @foreach($films as $film)
                            <div wire:key="{{$film->id}}" class="swiper-slide swiper-slide-most-watched lg:mr-9 mr-4 xxl:!w-fit max-lg:!w-[89%]" style="width: calc(75% - 36px)" >
                                <div class="xxl:w-[377px] w-full max-"
                                     style="aspect-ratio: 39/50; background: lightgray; border: 5px solid var(--Primary, #7300FF); border-radius: 0px 35px; overflow: hidden;">
                                    <div style="width: 100%; height: 100%; background-image: url({{ $film->posters[0] }}); background-size: cover; background-position: center;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div  class="flex justify-end items-end pr-[10%] gap-6 max-[420px]:gap-2 -right-4 -bottom-16 w-full mt-[10%]">
                        <x-swiper-button name="{{$name}}" type="prev" />
                        <x-swiper-button name="{{$name}}" type="next"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



