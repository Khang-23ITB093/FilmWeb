@props(['actors'=>null])
<div class="flex w-full flex-col gap-8 mb-10" wire:ignore>
    <h2 class="font-medium text-[1.53125rem]">Cast</h2>
    <div class="swiper actor-swiper w-full">
        <div class="swiper-wrapper w-full relative">
            <!-- Cast Item -->
            <x-actor-card :actors="$actors"></x-actor-card>
        </div>
    </div>
</div>
