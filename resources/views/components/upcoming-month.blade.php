<div class="my-12">
    <div class="font-poppins text-2xl font-semibold leading-9 text-left">
        {{ $this->convertYearMonthToMonthName($item['year_month']) }}
        <hr class="border-[#A473FF] border-1 my-6">

        <div class="flex">
            <div class="flex flex-wrap flex-row flex-1">

                @foreach ($item['movies'] as $movie)
                    <x-upcoming-film-info :movie="$movie" />
                @endforeach

            </div>
        </div>
    </div>
</div>
