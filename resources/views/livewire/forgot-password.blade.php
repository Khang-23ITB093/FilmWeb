<div class="flex w-full h-screen p-4 sm:p-[20px] md:p-[104px_90px] justify-center items-center bg-cover bg-no-repeat" style="background: url({{ Vite::asset('resources/images/play_image/background.jpg') }}) lightgray 50% / cover no-repeat;">
    <div class="flex w-full flex-col md:flex-row md:max-w-[1440px] justify-center items-center gap-4 md:gap-0">
        <!-- Khối tiêu đề -->
        <div class="flex w-full sm:w-auto flex-col items-center gap-4 sm:gap-6 md:gap-12 flex-shrink-0 mb-8 md:mb-0">
            <p class="text-center font-poppins leading-[120%] text-2xl sm:text-3xl md:text-6xl font-bold" style="color:#7300FF;">
                Cine Sphere
            </p>
            <p class="self-stretch text-white text-center font-poppins leading-[120%] text-sm sm:text-lg md:text-4xl font-bold">
                The world’s Largest Movie Library
            </p>
        </div>

        <div class="flex w-full max-w-[320px] sm:max-w-[400px] p-4 md:max-w-[500px] md:h-auto justify-center items-center gap-3 flex-shrink-0" style="border-radius: 30px; border: 2px solid rgba(255, 255, 255, 0.10); background: var(--Glass, rgba(89, 77, 91, 0.20)); backdrop-filter: blur(24.5px);">
            <div class="flex w-full sm:w-[320px] md:w-[408px] flex-col items-center gap-3 flex-shrink-0">
                <div class="flex w-full flex-col items-center gap-3">
                    <div class="flex flex-col items-center gap-9 self-stretch">
                        <div class="flex flex-col items-center self-stretch gap-4">
                            <div class="login-signup flex items-center gap-3 justify-center">

                                <p class="text-white font-poppins leading-[120%]" style="font-size: 37px;font-weight: 700;">Forgot Password</p>

                            </div>
                            <p class="self-stretch text-center font-poppins font-normal leading-[120%]" style="font-weight: 400;font-size: 19px;color: rgba(255, 255, 255, 0.70);">Register Now to watch your favourite shows</p>
                        </div>
                        <p class="self-stretch text-white text-center font-poppins leading-[120%]" style="font-size: 19px;font-weight: 600;">Or</p>
                    </div>
                </div>
                <form wire:submit.prevent="save" class="w-full">
                    <div class="flex flex-col items-start gap-3 w-full">
                        @if(session('success'))
                            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{session('success')}}</span>
                                </div>
                            </div>
                            @endsession

                        <!-- Email -->
                        <div class="justify-between email-login flex p-3 sm:p-4 md:p-[15px_30px] items-center gap-3 w-full" style="border-radius: 8px;border: 1px solid #A473FF;background: rgba(48, 0, 119, 0.10);">
                            <input type="email" id="email" wire:model="email"
                                   class="text-white font-poppins leading-[120%] bg-transparent border-none focus:outline-none text-lg"
                                   style="font-size: 20px; font-weight: 400;"
                                   placeholder="Email Address"
                                   required>
                            <img src="{{ Vite::asset('resources/images/play_image/iconamoon_profile-thin.svg') }}" alt="">
                        </div>

                    </div>

                    <!-- Nút Sign Up -->
                    <div class="flex flex-col items-center gap-6 mt-6">
                        <button type="submit" class="w-full h-[48px] sm:h-[53px] flex justify-center items-center gap-3" style="border-radius: 8px;background: #7300FF;">
                            <p class="text-white font-poppins font-bold text-sm sm:text-lg">Submit</p>
                        </button>
                        <div class="flex items-center gap-3">
                            <img src="{{ Vite::asset('resources/images/play_image/ri_facebook-fill.svg') }}" alt="">
                            <img src="{{ Vite::asset('resources/images/play_image/twitter.svg') }}" alt="">
                            <img src="{{ Vite::asset('resources/images/play_image/mage_instagram-circle.svg') }}" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
