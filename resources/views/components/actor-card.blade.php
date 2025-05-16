@props(['actors'=>null])


@foreach($actors as $actor)
    <div class="swiper-slide relative lg:!w-[12%] lg:!mr-[40px] md:!w-1/5 md:!mr-[20px] sm:!mr-[20px] sm:!w-1/5 max-sm:!w-1/5">
            <div class="relative ">
                <div class="relative pt-[100%] " style="list-style: none;">
                    <a href="javascript:void(0);"
                       class="rounded-full absolute top-0 right-0 left-0 bottom-0 w-full h-full text-white decoration-0 bg-transparent"
                       style="
                          background-image: url('{{ json_decode($actor->images)[0] }}');
                          background-position: 50%; background-repeat: no-repeat; background-size: cover"></a>
                </div>
                <h3 class="mt-4 text-center font-normal overflow-hidden whitespace-normal text-white text-[14px] leading-4"
                    style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical">{{ $actor->name }}</h3>
            </div>

    </div>
@endforeach
