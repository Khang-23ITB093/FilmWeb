@props(['url' => '#', 'type' => null])
@php
    $common_style = 'border-radius: 0px 16px; line-height: 0;';
    $common_class = 'font-bold rounded-lg flex justify-center items-center gap-2 flex-wrap';
    $common_class_responsive = 'px-[17px] py-2.5 h-11 max-sm:h-7 max-sm:px-3 max-sm:py-1.5 max-sm:h-10 max-sm:text-[10px] xxl:px-6 xxl:py-3 xxl:h-12 xxl:text-lg';

    if ($type == 'trailer') {
            $style = $common_style . 'background: var(--Glass, rgba(89, 77, 91, 0.20));';
            $class = $common_class . ' ' . $common_class_responsive;
            $image = 'resources/images/watch.svg';
        } elseif ($type == 'wishlist') {
            $style = $common_style . 'border: 1px solid var(--White, #FFF); background: var(--Transluse2, rgba(48, 0, 119, 0.30));';
            $class = 'bg-white text-sm text-black ' . $common_class . ' ' . $common_class_responsive . ' text-white';
            $image = 'resources/images/bookmark.svg';
        } elseif ($type == 'watch') {
            $style = $common_style . 'background: var(--Primary, #7300FF);';
            $class =  $common_class . ' ' . $common_class_responsive;
            $image = 'resources/images/watch.svg';
        }
        else {
            $style = $common_style . 'background: var(--Primary, #7300FF);';
            $class =  $common_class . ' px-3 py-2.5 ' . ' max-sm:px-4 max-sm:py-2 max-sm:h-10 max-sm:text-xs md:px-6 md:py-3 md:h-12 md:text-lg';
            $image = null;
        }
@endphp

<a href="{{ $url }}" {{$attributes->merge(['class' => $class])}} style="{{ $style }}">{!! $image ? '<img class="w-5 max-sm:w-3" src="' . Vite::asset($image) . '" >' : '' !!}{{ $slot }}</a>

