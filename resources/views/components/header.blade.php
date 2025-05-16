<nav class="w-full sm:h-0 sticky top-0 z-50">
    <div class="bg-transparent mx-auto w-full align-middle "
         style="transition: background-color 0.5s linear;" x-data="{ openMenu: false }">
        <div class="mx-auto w-full flex items-center sm:px-10 lg:px-12 h-full mt-0 relative align-top px-14 justify-between">
            <div class="relative flex h-16 items-center justify-between w-full">
                <div class="flex items-center">
                    <div class="flex shrink-0 items-center">
                        <div class="title flex cursor-pointer" x-on:click="window.location.href = '/'">
                            <p
                                style="color:#7300FF;font-family: BlackChancery;font-size: 40px;font-style: normal;font-weight: 5;line-height: 25px;text-transform: capitalize;">
                                L
                            <p
                                style="color: #FFF;font-family: BlackChancery;font-size: 22px;font-style: normal;font-weight: 5;line-height: 25px;text-transform: capitalize;">
                                U</p>
                            <p
                                style="color: #FFF;font-family: BlackChancery;font-size: 27px;font-style: normal;font-weight: 5;line-height: 25px;text-transform: capitalize;">
                                K</p>
                            <p
                                style="color: #FFF;font-family: BlackChancery;font-size: 22px;font-style: normal;font-weight: 5;line-height: 25px;text-transform: capitalize;">
                                A</p>
                        </div>
                    </div>

                    <!-- Links section -->
                    <div class="hidden lg:ml-10 lg:block">
                        <div class="flex space-x-4">

                            <a href="/"
                               class="{{ request()->is('/') ? 'px-3 py-2 rounded-md text-sm font-bold text-white' : 'hover:text-white px-3 py-2 rounded-md text-sm font-medium text-white/50'}}"
                               aria-current="page" x-state:on="Current" x-state:off="Default"
                               >Home</a>

                            <a href="/explore/show"
                               class="{{ request()->is('explore/show') ? 'px-3 py-2 rounded-md text-sm font-bold text-white' : 'hover:text-white px-3 py-2 rounded-md text-sm font-medium text-white/50'}}"
                               >Explore Shows</a>

                            <a href="/explore/movie"
                               class="{{ request()->is('explore/movie') ? 'px-3 py-2 rounded-md text-sm font-bold text-white' : 'hover:text-white px-3 py-2 rounded-md text-sm font-medium text-white/50'}}"
                               >Explore Movies</a>

                            <a href="/subscription"
                               class="{{ request()->is('subscription') ? 'px-3 py-2 rounded-md text-sm font-bold text-white' : 'hover:text-white px-3 py-2 rounded-md text-sm font-medium text-white/50'}}"
                               >Subscriptions</a>

                        </div>
                    </div>
                </div>

                <div class="flex flex-1 justify-center px-2 lg:ml-6 lg:justify-end">
                    <!-- Search section -->
                    <div class="w-full max-w-lg lg:max-w-xs">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative text-gray-400 focus-within:text-gray-500">
                            <div class="cursor-pointer absolute inset-y-0 left-0 flex items-center pl-3" @click="window.location.href = '/search/' + document.getElementById('search').value">
                                <svg class="h-5 w-5" x-description="Heroicon name: mini/magnifying-glass"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                id="search"
                                class="block w-full rounded-md focus:border border-gray-300 bg-gray-700 focus:bg-white py-2 pl-10 pr-3 leading-5 text-black placeholder-gray-500 focus:border-purple-500 focus:placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-purple-500 sm:text-sm"
                                placeholder="Search"
                                type="search"
                                name="search"
                                x-data
                                @keydown.enter.window="window.location.href = '/search/' + $event.target.value"
                            /></div>
                    </div>
                </div>
                <div class="flex lg:hidden w-10">
                    <button type="button"
                            class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-900 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                            aria-controls="mobile-menu" @click="openMenu = !openMenu" aria-expanded="false"
                            x-bind:aria-expanded="openMenu.toString()"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" :class="{ 'hidden': openMenu, 'block': !openMenu }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                        <svg class="hidden h-6 w-6" :class="{ 'block': openMenu, 'hidden': !openMenu }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Actions section -->
                <div class="hidden lg:ml-4 lg:block">
                    <div class="flex items-center">

                        <!-- Profile dropdown -->
                        <button type="button"
                                class="flex-shrink-0 rounded-full hover:bg-white/10 focus:bg-gray-800 p-1 text-gray-400 hover:text-gray-500
                            focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
                            </svg>
                        </button>
                        <div x-data="{ open: false }" class="relative ml-3 flex-shrink-0">
                            <div>
                                <button type="button"
                                        class="flex rounded-full bg-gray-800 text-sm text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                                        id="user-menu-button" @click="open = !open"
                                        aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                         src="{{ Auth::check() ? url('storage/' . Auth::user()->avatar) : Vite::asset('resources/images/avatar.png') }}"
                                         alt="">
                                </button>
                            </div>

                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                                @if(Auth::check())
                                    <a href="/profile/{{ Auth::id() }}" class="block py-2 px-4 text-sm text-gray-700"
                                       role="menuitem">Your Profile</a>
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700" role="menuitem">Settings</a>
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700" role="menuitem"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                        out</a>
                                    <form id="logout-form" action="/logout" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                @else
                                    <a href="/login" class="block py-2 px-4 text-sm text-gray-700" role="menuitem">Login</a>
                                    <a href="/register" class="block py-2 px-4 text-sm text-gray-700" role="menuitem">Register</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="openMenu" x-transition class="border-b border-gray-200 bg-gray-800 lg:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="/" class="bg-gray-900 block px-3 py-2 rounded-md font-medium text-white"
                   aria-current="page">Home</a>
                <a href="/explore/show" class="hover:bg-gray-900 block px-3 py-2 rounded-md font-medium text-white">Explore
                    Shows</a>
                <a href="/explore/movie" class="hover:bg-gray-900 block px-3 py-2 rounded-md font-medium text-white">Explore
                    Movies</a>
                <a href="/subscription" class="hover:bg-gray-900 block px-3 py-2 rounded-md font-medium text-white">Subscriptions</a>
            </div>
            <div class="border-t border-gray-200 pt-4 pb-3">
                @if(Auth::check())
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="{{ Auth::check() ? url('storage/' . Auth::user()->avatar) : Vite::asset('resources/images/avatar.png') }}"
                                 alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">{{Auth::user()->name}}</div>
                            <div class="text-sm font-medium text-gray-500">{{Auth::user()->email}}</div>
                        </div>
                        <button type="button"
                                class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="mt-b space-y-1 px-2">
                        <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-900">Your
                            Profile</a>
                        <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-900">Settings</a>
                        <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-900"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                        <form id="logout-form" action="/logout" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="mt-b space-y-1 px-2">
                        <a href="/login"
                           class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-900">Login</a>
                        <a href="/register"
                           class="block rounded-md py-2 px-3 text-base font-medium text-white hover:bg-gray-900">Register</a>
                    </div>
            </div>
            @endif
        </div>

    </div>
</nav>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navElement = document.querySelector('nav > div'); // Chọn div bên trong nav
            const threshold = 10; // Khoảng cách scroll để thay đổi background (có thể tùy chỉnh)

            window.addEventListener('scroll', function () {
                if (window.scrollY > threshold) {
                    navElement.classList.add('nav-background'); // Thêm class khi scroll xuống
                } else {
                    navElement.classList.remove('nav-background'); // Xóa class khi ở trên cùng
                }
            });
        });;
    </script>
@endpush
