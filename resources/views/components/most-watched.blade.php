@props(['movies', 'title', 'name' => 'most-watched'])

<div class="h-[904px] pl-36 pt-48">
    <div class="h-full">
        <div class="w-2/5 self-stretch flex flex-col h-full">
            <div class="self-start justify-start">
                <h2>This month's most watched</h2>
                <p>Watch this month's most Watched Shows</p>
            </div>
            <div class="flex flex-col items-start gap-4 self-stretch">
                <span class="text-[22px] font-light leading-10">2022</span>
                <span class="font-extrabold text-5xl">Money Heist</span>
                <span class="flex justify-center font-bold">5 Seasons • Action •Thriller</span>
                <p>
                    Batman is called to intervene when the mayor of Gotham City is murdered.
                    Soon, his investigation leads him to uncover a web of corruption, linked to his own dark past.
                </p>
                <div class="flex gap-8">
                    <x-button type="watch">Play Now</x-button>
                    <x-button type="trailer">Watch Trailer</x-button>
                    <x-button type="wishlist">Add to Wishlist</x-button>
                </div>
            </div>
        </div>
        <div>
            <div>

            </div>
            <div>

            </div>
        </div>
    </div>
</div>
