<div class="flex w-full h-screen p-4 sm:p-[20px] md:p-[104px_90px] justify-center items-center bg-cover bg-no-repeat" style="background: url({{ Vite::asset('resources/images/play_image/background.jpg') }}) lightgray 50% / cover no-repeat;">
    <div class="flex w-full flex-col md:flex-row md:max-w-[1440px] justify-center items-center gap-4 md:gap-0">
        <!-- Khối tiêu đề -->
        <div class="flex w-full sm:w-auto flex-col items-center gap-4 sm:gap-6 md:gap-12 flex-shrink-0 mb-8 md:mb-0">
            <p class="text-center font-poppins leading-[120%] text-xl sm:text-2xl md:text-6xl font-bold" style="color:#7300FF;">
                Cine Sphere
            </p>
            <p class="self-stretch text-white text-center font-poppins leading-[120%] text-sm sm:text-lg md:text-4xl font-bold">
                The world’s Largest Movie Library
            </p>
        </div>

        <!-- Form Section -->
        <div class="flex w-full max-w-[320px] sm:max-w-[400px] p-4 sm:p-6 md:max-w-[500px] md:h-auto justify-center items-center gap-3 flex-shrink-0" style="border-radius: 30px; border: 2px solid rgba(255, 255, 255, 0.10); background: var(--Glass, rgba(89, 77, 91, 0.20)); backdrop-filter: blur(24.5px);">
            <div class="flex w-full sm:w-[320px] md:w-[408px] flex-col items-center gap-3 flex-shrink-0">
                <div class="flex w-full flex-col items-center gap-3">
                    <div class="flex flex-col items-center self-stretch gap-4">
                        <div class="login-signup flex items-center gap-3 justify-center">
                            <a href="/login" class="decoration-0 text-white font-poppins font-light text-base sm:text-lg md:text-[24px] font-bold">Login</a>
                            <div class="w-[1px] h-[24px] sm:h-[32px] md:h-[42px]" style="background: #FFF;"></div>
                            <p class="font-poppins font-bold text-base sm:text-lg md:text-[22px] " style="color:#A473FF;">Signup</p>
                        </div>
                        <p class="self-stretch text-center font-poppins text-xs sm:text-sm md:text-base text-white opacity-70">
                            Register Now to watch your favourite shows
                        </p>
                    </div>
                </div>

                <!-- Signup Form -->
                <form wire:submit.prevent="save">
                    <div class="flex flex-col items-start gap-8 self-stretch max-w-md mx-auto">
                        <div class="flex flex-col items-start gap-3 self-stretch">
                            <div class="flex flex-col items-start gap-4 self-stretch">
                                <!-- User Name -->
                                <div class="email-login flex p-6 md:p-3.5 sm:p-2.5 flex-col items-start gap-3 self-stretch"
                                     style="border-radius: 8px; border: 1px solid var(--Electric-Violet-400, #A473FF); background: rgba(48, 0, 119, 0.10);">
                                    <div class="flex justify-between items-center self-stretch">
                                        <input type="text" id="name" wire:model="name"
                                               class="text-white font-poppins leading-[120%] bg-transparent border-none focus:outline-none text-base sm:text-[10px]"
                                               style="font-size: 18px; font-weight: 400;" placeholder="User Name">
                                        <img src="{{ Vite::asset('resources/images/play_image/iconamoon_profile-thin.svg') }}" alt="">
                                    </div>
                                </div>
                                @error('name')
                                <div class="p-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                     role="alert">
                                    <span class="font-medium">{{$message}}</span>
                                </div>
                                @enderror

                                <!-- Email -->
                                <div class="password-login flex p-6 md:p-3.5 sm:p-2.5 flex-col items-start gap-3 self-stretch"
                                     style="border-radius: 8px; border: 1px solid var(--Electric-Violet-400, #A473FF); background: rgba(48, 0, 119, 0.10);">
                                    <div class="flex justify-between items-center self-stretch">
                                        <input type="email" id="email" wire:model="email"
                                               class="text-white font-poppins leading-[120%] bg-transparent border-none focus:outline-none"
                                               style="font-size: 18px; font-weight: 400;" placeholder="Email Address">
                                        <img src="{{ Vite::asset('resources/images/play_image/ic_baseline-email.svg') }}" alt="">
                                    </div>
                                </div>
                                @error('email')
                                <div class="p-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                     role="alert">
                                    <span class="font-medium">{{$message}}</span>
                                </div>
                                @enderror

                                <!-- Password -->
                                <div class="password-login flex p-6 md:p-3.5 sm:p-2.5 flex-col items-start gap-3 self-stretch"
                                     style="border-radius: 8px; border: 1px solid var(--Electric-Violet-400, #A473FF); background: rgba(48, 0, 119, 0.10);">
                                    <div class="flex justify-between items-center self-stretch">
                                        <input type="password" id="password" wire:model="password"
                                               class="flex-grow text-white font-poppins leading-[120%] bg-transparent border-none focus:outline-none"
                                               style="font-size: 18px; font-weight: 400;" placeholder="Password">
                                        <img src="{{ Vite::asset('resources/images/play_image/tabler_lock-filled.svg') }}" alt="">
                                    </div>
                                </div>
                                @error('password')
                                <div class="p-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                     role="alert">
                                    <span class="font-medium">{{$message}}</span>
                                </div>
                                @enderror

                                <!-- Confirm Password -->
                                <div class="password-login flex p-6 md:p-3.5 sm:p-2.5 flex-col items-start gap-3 self-stretch"
                                     style="border-radius: 8px; border: 1px solid var(--Electric-Violet-400, #A473FF); background: rgba(48, 0, 119, 0.10);">
                                    <div class="flex justify-between items-center self-stretch">
                                        <input type="password" id="password_confirmation" wire:model="password_confirmation"
                                               class="flex-grow text-white font-poppins leading-[120%] bg-transparent border-none focus:outline-none"
                                               style="font-size: 18px; font-weight: 400;" placeholder="Confirm Password">
                                        <img src="{{ Vite::asset('resources/images/play_image/tabler_lock-filled.svg') }}" alt="">
                                    </div>
                                </div>
                                @error('password-confirmation')
                                <div class="p-2 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                     role="alert">
                                    <span class="font-medium">{{$message}}</span>
                                </div>
                                @enderror
                            </div>

                            <!-- Privacy Policy -->
                            <div class="flex items-center gap-3">
                                <div class="flex w-[24px] h-[24px] p-[6px] items-center gap-3"
                                     style="border-radius: 12px; border: 1px solid #FFF;">
                                    <img src="{{ Vite::asset('resources/images/play_image/Ellipse 12.svg') }}" alt="">
                                </div>
                                <p class="text-white font-poppins text-sm font-normal leading-[120%]">I agree to the privacy policy & Terms and conditions</p>
                            </div>
                        </div>

                        <!-- Sign Up Button -->
                        <div class="flex flex-col items-center gap-6 self-stretch">
                            <button type="submit"
                                    class="flex h-[53px] p-4 sm:p-2.5 sm:px-6 justify-center items-center gap-3 self-stretch"
                                    style="border-radius: 8px; background: #7300FF;">
                                <p class="text-white font-poppins text-base font-bold leading-[120%]">Sign Up</p>
                            </button>

                            <!-- Social Icons -->
                            <div class="flex items-center gap-3">
                                <img src="{{ Vite::asset('resources/images/play_image/ri_facebook-fill.svg') }}" alt="">
                                <img src="{{ Vite::asset('resources/images/play_image/twitter.svg') }}" alt="">
                                <img src="{{ Vite::asset('resources/images/play_image/mage_instagram-circle.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
