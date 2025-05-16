<div class="w-full mt-16 aspect-video"
     style="background: url({{ $currentFilm->backgrounds[0] }}) no-repeat; background-size: cover;">
    <div class="h-full w-full"
         style="background: var(--Grad-black, linear-gradient(89deg, #000 9.23%, rgba(0, 0, 0, 0.47) 49.67%, rgba(0, 0, 0, 0.00) 61.08%));">
        <div class="w-full h-full flex flex-col">
            <div class="h-full w-full flex flex-col justify-between pl-24 max-sm:pl-6">
                <div class="self-stretch flex flex-col gap-6 md:gap-10 max-[420px]:gap-1 lg:gap-20 mt-auto">
                    <div class="self-start justify-start">
                        <h2 class="max-sm:text-[15px] max-md:text-xl max-lg:text-2xl max-[420px]:text-[10px] font-bold !leading-none">Explore Genres</h2>
                        <p class="max-md:hidden">See Wide Range of genres you like</p>
                    </div>
                    <x-content :film="$currentFilm"/>
                </div>

                <div class="swiper {{$name}}-swiper my-auto h-fit" style="width: 100%" wire:ignore>
                    <div class=" swiper-wrapper flex  items-center" style="height: fit-content;">
                        @foreach($genres as $genre)
                            <div wire:key="{{$genre->id}}" class="swiper-slide" style="width: fit-content;">
                                <div
                                    class="flex justify-center items-center font-bold text-2xl"
                                    style="background: url({{ Vite::asset(json_decode($genre->images,true)) }}) lightgray 0px 0px / 100% 100% no-repeat; border-radius: 15px;">
                                    <div class="w-full h-full content-center flex justify-center items-center font-bold text-2xl"
                                         style="background: rgba(0, 0, 0, 0.5); border-radius: 15px;aspect-ratio: 9/5">
                                        <h3 class="max-[500px]:text-[10px] text-[15px] text-center md:text-xl xl:text-2xl xxl:text-3xl">{{ $genre->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center items-center mx-auto gap-6 max-[420px]:gap-2 w-fit h-24 mt-16 max-xxl:hidden">
                        <x-swiper-button name="{{$name}}" type="prev"/>
                        <x-swiper-button name="{{$name}}" type="next"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
