<div class="container-subscription-page flex flex-col items-center gap-44 pt-[10%] pb-[10%] md:pt-[5%] md:pb-[5%]">
    <!-- Title and Subtitle -->
    <div class="flex flex-col items-center gap-11 self-stretch">
        <div class="flex flex-col items-center gap-5">
            <p class="self-stretch text-white text-center font-poppins text-[80px] md:text-[50px] font-bold leading-[120%]">
                Choose Your Plan
            </p>
            <p class="self-stretch text-white text-center font-poppins text-[37px] md:text-[24px] font-normal leading-[120%]">
                Choose your plan to enjoy unlimited access to your Favourite Movies and Shows
            </p>
        </div>
    </div>

    <!-- Plan Selection Section -->
    <div class="flex w-[489px] flex-col items-center md:w-[90%]" style="gap: -4px">
        <x-button type="">
            Most Popular
        </x-button>
        <div class="plan-sub flex flex-wrap items-center gap-20 md:gap-10 justify-center">
            @foreach($services as $service)
                <div class="basic-sub flex w-[489px] h-[708px] md:w-[320px] md:h-auto p-[48px_56px] md:p-5 items-center gap-2" style="border-radius: 0px 42px; border: 4px solid #7300FF;">
                    <div class="feature-sub flex w-[376px] flex-col items-center gap-20 md:w-full">
                        <div class="flex w-[299px] md:w-full flex-col items-center gap-5">
                            <p class="self-stretch text-center font-poppins text-[29px] md:text-[20px] font-semibold capitalize" style="color: #7300FF;">
                                {{$service->name}}
                            </p>
                            <div class="flex flex-col items-end gap-6 self-stretch">
                                <p class="self-stretch text-center text-white font-poppins font-bold text-[64px] leading-[120%] md:text-3xl">
                                    ${{$service->price}}
                                    <span class="text-white font-poppins leading-[120%] text-2xl md:text-lg font-bold">/ month</span>
                                </p>
                                <div class="w-[299px] h-[1px] md:w-full" style="background: #8A3BFF;"></div>
                            </div>
                        </div>

                        <div class="sub-feature flex flex-col items-end gap-7 self-stretch">
                            @foreach($service->endow as $en)
                                @if(is_array($en) && isset($en['value']))
                                    <div class="flex items-start gap-3 self-stretch">
                                        <img src="{{ Vite::asset('resources/images/play_image/teenyicons_tick-circle-solid.svg') }}" alt="">
                                        <p class="w-[411px] md:w-full text-white font-poppins font-normal leading-[120%]" style="font-size: 19px; font-weight: 400;">
                                            {{ $en['value'] }}
                                        </p>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <x-button type="" url="/subscription-page/{{$service->name}}">Get Started</x-button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
