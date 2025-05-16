<div>
    <div class="pr-5 pt-32 mx-auto max-w-[1200px] w-full min-h-[700px]" >
        <div class="flex justify-between max-md:flex-col mb-6">
            <div class="text-[24px] leading-8 text-white max-md:mb-5">Explore {{ $type === 'show' ? 'Shows' : 'Movies'}}</div>
            <div class="flex gap-2.5 shrink-0 flex-row max-md:flex-col items-center" wire:ignore>
                <!-- Genres dropdown -->
                <div class="flex flex-1 rounded-[20px] min-h-7 h-fit max-md:w-full" style="background: #3C0753">
                    <div class="md:max-w-[500px] w-full relative max-md:min-w-0" id="genres-container">
                        <select id="genres" multiple class="text-violet-400"
                                @change="$wire.updateGenres(Array.from($event.target.selectedOptions).map(option => option.value))">
                            @if($type === 'show')
                                <option value="Animation">Animation</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Crime">Crime</option>
                                <option value="Documentary">Documentary</option>
                                <option value="Drama">Drama</option>
                                <option value="Family">Family</option>
                                <option value="Kids">Kids</option>
                                <option value="Mystery">Mystery</option>
                                <option value="News">News</option>
                                <option value="Reality">Reality</option>
                                <option value="Sci-Fi & Fantasy">Sci-Fi & Fantasy</option>
                                <option value="Soap">Soap</option>
                                <option value="Talk">Talk</option>
                                <option value="War & Politics">War & Politics</option>
                                <option value="Western">Western</option>
                            @else
                                <option value="Action">Action</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Animation">Animation</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Crime">Crime</option>
                                <option value="Documentary">Documentary</option>
                                <option value="Drama">Drama</option>
                                <option value="Family">Family</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="History">History</option>
                                <option value="Horror">Horror</option>
                                <option value="Music">Music</option>
                                <option value="Mystery">Mystery</option>
                                <option value="Romance">Romance</option>
                                <option value="Science Fiction">Science Fiction</option>
                                <option value="TV Movie">TV Movie</option>
                                <option value="Thriller">Thriller</option>
                                <option value="War">War</option>
                                <option value="Western">Western</option>
                            @endif
                        </select>
                    </div>
                    <div class="items-center flex shrink-0 self-stretch">
                        <!-- SVG dấu "x" để xóa các mục đã chọn -->
                        <div x-show="Array.from(document.getElementById('genres').selectedOptions).length > 0" class="p-2 cursor-pointer hover:opacity-80 duration-150 ease-out" id="clear-selection">
                            <svg height="20" width="20" viewBox="0 0 20 20" class="fill-current text-white">
                                <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-2.651-3.03-2.651 3.029c-0.469 0.469-1.229 0.469-1.697 0-0.469-0.469-0.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-0.469-0.469-0.469-1.228 0-1.697s1.228-0.469 1.697 0l2.652 3.031 2.651-3.031c0.469-0.469 1.228-0.469 1.697 0s0.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c0.469 0.469 0.469 1.229 0 1.698z"></path>
                            </svg>
                        </div>

                        <span class="self-stretch w-[1px] my-2 bg-gray-200/50"></span>
                        <!-- SVG để hiển thị các tùy chọn -->
                        <div class="p-2 cursor-pointer hover:opacity-80 duration-150 ease-out" id="toggle-dropdown-genres">
                            <svg height="20" width="20" viewBox="0 0 20 20" class="fill-current text-white">
                                <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                {{--Sort by dropdown--}}
                <div class="flex gap-2.5 shrink-0 h-fit flex-row md:flex-row rounded-[20px] min-h-7 max-md:w-full" style="background: #3C0753">
                    <div class="md:max-w-[500px] w-full relative max-md:min-w-0" id="sortBy-container">
                        <select id="sortBy" class="text-violet-400" @change="$wire.updateSortBy($event.target.value)" >
                            <option value="rating">Rating</option>
                            <option value="a-z">Title (A-Z)</option>
                            <option value="z-a">Title (Z-A)</option>
                        </select>
                    </div>
                    <div class="items-center flex shrink-0 self-stretch">
                        <!-- SVG dấu "x" để xóa các mục đã chọn -->
                        <div class="p-2 cursor-pointer hover:opacity-80 duration-150 ease-out hidden" id="clear-sort">
                            <svg height="20" width="20" viewBox="0 0 20 20" class="fill-current text-white">
                                <path d="M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-2.651-3.03-2.651 3.029c-0.469 0.469-1.229 0.469-1.697 0-0.469-0.469-0.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-0.469-0.469-0.469-1.228 0-1.697s1.228-0.469 1.697 0l2.652 3.031 2.651-3.031c0.469-0.469 1.228-0.469 1.697 0s0.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c0.469 0.469 0.469 1.229 0 1.698z"></path>
                            </svg>
                        </div>
                        <span class="self-stretch w-[1px] my-2 bg-gray-200/50"></span>
                        <!-- SVG để hiển thị các tùy chọn -->
                        <div class="p-2 cursor-pointer hover:opacity-80 duration-150 ease-out" id="toggle-dropdown-sortBy">
                            <svg height="20" width="20" viewBox="0 0 20 20" class="fill-current text-white">
                                <path d="M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
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

