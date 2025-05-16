<div class="bg-black text-white">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="h-[865px] bg-cover" style="background-image: url({{ Vite::asset('resources/images/upcoming_image/movies-main.jpg') }})">
        <div class="h-full bg-gradient-to-t from-black via-black/70 to-transparent">
            <div class="h-full flex mx-[120px]">
                <div class="flex justify-end items-end flex-1">
                    <div class="flex-1">
                        <div class="flex flex-col items-start p-0 font-poppins text-4xl font-bold leading-[55.2px] text-left">
                            Get Ready for Action: Upcoming Blockbusters You Can't Miss!
                        </div>
                        <div class="flex flex-col items-start font-poppins text-lg leading-7 text-left pt-2">
                            Prepare for an adrenaline-packed season with our upcoming blockbusters! From thrilling action
                            sequences to heart-pounding adventures, these movies will keep you on the edge of your seat.
                            Mark your calendars for an unforgettable cinematic experience!
                        </div>
                    </div>

                    <div class="flex justify-center items-center flex-1  ">
                        <div class=" w-full flex justify-end flex-wrap ">
                            <div id="dropdownButtonOptionforMovies" class="relative hover:cursor-pointer w-[151px] py-[10px] px-[22px] gap-2 border-2 border-white rounded-tr-[16px] rounded-bl-[16px] bg-[#3000774D] ml-[33px] mt-[10px]">
                                <div class="flex items-center justify-center font-poppins text-sm font-semibold leading-5 pt-0.5 text-[17px]">
                                    {{ $selected_genre ? $selected_genre->name:"Movies" }}
                                    
                                    <div class="w-[17px] h-[11px] ml-2">
                                        <img src="{{ Vite::asset('resources/images/upcoming_image/Vector 3.png') }}" alt="Icon" />
                                    </div>
                                </div>
                                <!-- Dropdown Menu -->
                                <div id="dropdownMenuOptionforMovies" class="absolute right-0 w-48 rounded shadow-lg hidden mt-5 left-[1px] " style="background-color: black">
                                    @foreach($genreMovies as $genre)
                                    <a href="?genre={{ $genre->id }}&year={{ $selected_year }}" class="block px-4 py-2 text-white hover:bg-sky-700 "> {{ $genre->name }}</a>
                                 @endforeach
                                </div>

                            </div>

                            <div id="dropdownButtonOptionforYears" class="relative hover:cursor-pointer w-[151px] py-[10px] px-[22px] gap-2 border-2 border-white rounded-tr-[16px] rounded-bl-[16px] bg-[#3000774D] ml-[33px] mt-[10px]">
                                <div class="flex items-center justify-center font-poppins text-sm font-semibold leading-5 pt-0.5 text-[17px]">
                                    {{ $selected_year }}
                                    <div class="w-[17px] h-[11px] ml-2">
                                        <img src="{{ Vite::asset('resources/images/upcoming_image/Vector 3.png') }}" alt="Icon" />
                                    </div>
                                </div>
                                <!-- Dropdown Menu -->
                                <div id="dropdownMenuOptionforYears" class="absolute right-0 mt-5 w-48 rounded shadow-lg hidden left-[1px]" style="background-color: black">
                                    @foreach ( $groupYearsMovies as $years )
                                    <a href="?year={{ $years->release_year }}{{ $selected_genre ? "&genre=".$selected_genre->id:"" }}" class="block px-4 py-2 text-white hover:bg-sky-700">{{ $years->release_year }}</a>
                                  
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="mx-[120px] mt-12 bg-black">
        <div class="font-poppins text-2xl font-semibold leading-[34.8px]">
            Upcoming Movies
        </div>

       @foreach($groupedMovies as $year_month => $movies) 
            <x-upcoming-month :item="['year_month' => $year_month, 'movies' => $movies]" />
        @endforeach

       
        <div class=" pb-8 mt-[7rem]">
            @if(request('show') != 'all')
            <div class="flex justify-center">
                <div class="w-[151px] py-[10px] px-[22px] gap-2 border-2 border-white rounded-tr-[16px] rounded-br-[16px] bg-[#3000774D]">
                    <div class="flex items-center justify-center font-poppins text-sm font-semibold leading-5 w-[100px] "> 
                        <a href="?show=all&year={{  $selected_year }}{{ $selected_genre ? "&genre=".$selected_genre->id:"" }}" > Show all</a>    
                        <div class="w-[17px] h-[11px] ml-2">
                            <img src="{{ Vite::asset('resources/images/upcoming_image/Vector 3.png') }}" alt="Icon" />
                        </div>
                    </div>
                </div>
            </div>
            @elseif (request('show') == 'all')
            <div class="flex justify-center">
                <div class="w-[151px] py-[10px] px-[22px] gap-2 border-2 border-white rounded-tr-[16px] rounded-br-[16px] bg-[#3000774D]">
                    <div class="flex items-center justify-center font-poppins text-sm font-semibold leading-5 w-[100px] "> 
                        <a href="?show=&year={{  $selected_year }}{{ $selected_genre ? "&genre=".$selected_genre->id:"" }}" > Show less</a>    
                        <div class="w-[17px] h-[11px] ml-2">
                            <img src="{{ Vite::asset('resources/images/upcoming_image/Vector 3.png') }}" alt="Icon" />
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        
    </div>
</div>