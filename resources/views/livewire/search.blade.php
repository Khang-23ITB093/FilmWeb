<div>
    <div class="pr-5 pt-32 mx-auto max-w-[1200px] w-full min-h-[700px]" x-data="{ open: false }">
        <div class="relative max-w-[800px] mx-auto text-white mb-10">
            <!-- Search Input and Button -->
            <div class="flex items-center w-full text-center border-r-0 rounded-[40px]"
                 style="border-color: hsl(0,0%,18.82%); background-color: hsl(0,0%,15%);">
                <input
                    type="text"
                    class="h-[50px] w-full px-4 bg-transparent border-none focus:border-none focus:outline-none text-white rounded-l-md"
                    placeholder="Search for your favorite movie or TV show..."
                    wire:model.live.debounce.300ms="searchInput"
                    wire:model="searchInput"
                    wire:keydown.enter="searchFilm"
                    @focus="open = true"
                    @click.outside="open = false"
                >
                <div class="items-center flex shrink-0 self-stretch">
                    <div wire:click="clearInput" class="p-2 cursor-pointer hover:opacity-80 duration-150 ease-out" id="clear-input" style="display: block;">
                        <svg height="20" width="20" viewBox="0 0 20 20" class="fill-current text-white">
                            <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-2.651-3.03-2.651 3.029c-0.469 0.469-1.229 0.469-1.697 0-0.469-0.469-0.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-0.469-0.469-0.469-1.228 0-1.697s1.228-0.469 1.697 0l2.652 3.031 2.651-3.031c0.469-0.469 1.228-0.469 1.697 0s0.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c0.469 0.469 0.469 1.229 0 1.698z"></path>
                        </svg>
                    </div>
                </div>
                <button
                    class="h-[50px] bg-blue-600 text-white px-4 rounded-r-md hover:bg-blue-700 focus:outline-none"
                    style="border-radius: 0 40px 40px 0"
                    wire:click="searchFilm"
                >
                    <div class="w-full h-full items-center flex justify-center">
                        <img src="{{ Vite::asset('resources/images/search-interaction.svg') }}" alt="">
                    </div>
                </button>
            </div>

            <!-- Suggestions Dropdown -->
            <div
                class="absolute bg-[#212121] text-white w-full shadow-lg z-10 rounded-xl py-2 mt-1 items-center border-none"
                style="box-shadow: 0 2px 4px rgba(0, 0, 0, .15);"
                x-show="open && $wire.suggestions.length > 0"
                x-transition
            >
                <ul>
                    @foreach($suggestions as $suggestion)
                        <li
                            class="px-4 hover:bg-gray-700 cursor-pointer h-8"
                            @click="open = false"
                            wire:click="selectSuggestion('{{ $suggestion }}')"
                        >
                            {{ $suggestion }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        @if($films->isEmpty())
            <h2 class="text-3xl font-bold text-violet-400">Sorry, Results not found!</h2>
        @endif
        <div class="h-auto overflow-auto md:gap-5 gap-2.5 flex mb-12" style="flex-flow: row wrap">
            @foreach($films as $film)
                <x-explore-card :film="$film"/>
            @endforeach
        </div>
        @if($films->hasMorePages())
            <div class="h-56" x-intersect="$wire.loadMore()"></div>
        @endif
    </div>
</div>
