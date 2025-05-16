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

        <!-- Khối đăng nhập -->
        <div class="flex w-full max-w-[320px] sm:max-w-[400px] p-4 md:max-w-[500px] md:h-auto justify-center items-center gap-3 flex-shrink-0" style="border-radius: 30px; border: 2px solid rgba(255, 255, 255, 0.10); background: var(--Glass, rgba(89, 77, 91, 0.20)); backdrop-filter: blur(24.5px);">
            <div class="flex w-full sm:w-[320px] md:w-[408px] flex-col items-center gap-3 flex-shrink-0">
                <div class="flex w-full flex-col items-center gap-3">
                    <!-- Khối Login/Signup -->
                    <div class="flex flex-col items-center self-stretch gap-4">
                        <div class="login-signup flex items-center gap-3 justify-center">
                            <p class="text-white font-poppins text-base sm:text-lg md:text-[24px] font-bold">Login</p>
                            <div class="w-[1px] h-[24px] sm:h-[32px] md:h-[42px]" style="background: #FFF;"></div>
                            <a href="/register" class="font-poppins font-light text-base sm:text-lg md:text-[22px] decoration-0" style="color:#A473FF;">Signup</a>
                        </div>
                        <p class="self-stretch text-center font-poppins text-xs sm:text-sm md:text-base text-white opacity-70">
                            Register Now to watch your favourite shows
                        </p>
                    </div>

                    <!-- Nội dung form -->
                    <p class="self-stretch text-white text-center font-poppins leading-[120%] font-semibold text-xs sm:text-base md:text-lg">
                        Or
                    </p>

                    <form wire:submit.prevent="save" class="w-full">
                        <div class="flex flex-col items-start gap-3 w-full">
                            @if(session('error'))
                                <div class="w-full p-3 mb-4 text-sm text-red-800 bg-red-50 rounded-lg" role="alert">
                                    <span class="font-medium">{{session('error')}}</span>
                                </div>
                            @endif

                            <!-- Email -->
                            <div class="justify-between email-login flex p-3 sm:p-4 md:p-[15px_30px] items-center gap-3 w-full" style="border-radius: 8px;border: 1px solid #A473FF;background: rgba(48, 0, 119, 0.10);">
                                <input type="email" id="email" wire:model="email"
                                       class="text-white font-poppins leading-[120%] bg-transparent border-none focus:outline-none text-sm sm:text-base md:text-lg"
                                       placeholder="Email Address">
                                <img src="{{ Vite::asset('resources/images/play_image/iconamoon_profile-thin.svg') }}" alt="">
                            </div>
                            @error('email')
                            <div class="p-1 mb-1 text-sm text-red-800 bg-red-50 rounded-lg" role="alert">
                                <span class="font-medium">{{$message}}</span>
                            </div>
                            @enderror

                            <!-- Password -->
                            <div class="password-login justify-between flex p-3 sm:p-4 md:p-[15px_30px] items-center gap-3 w-full" style="border-radius: 8px;border: 1px solid #A473FF;background: rgba(48, 0, 119, 0.10);">
                                <input type="password" id="password" wire:model="password"
                                       class="flex-grow text-white font-poppins leading-[120%] bg-transparent border-none focus:outline-none text-sm sm:text-base md:text-lg"
                                       placeholder="Password">
                                <img src="{{ Vite::asset('resources/images/play_image/tabler_lock-filled.svg') }}" alt="">
                            </div>
                            @error('password')
                            <div class="p-1 mb-1 text-sm text-red-800 bg-red-50 rounded-lg" role="alert">
                                <span class="font-medium">{{$message}}</span>
                            </div>
                            @enderror

                            <!-- Remember Me và quên mật khẩu -->
                            <div class="flex items-center gap-2 w-full">
                                <!-- Radio button tùy chỉnh -->
                                <div class="flex items-center relative">
                                    <!-- Radio button -->
                                    <input type="radio" id="rememberMe" name="remember" class="peer appearance-none w-6 h-6 rounded-full border border-white focus:outline-none" />

                                    <!-- Vòng tròn với chấm bên trong khi radio được chọn -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-3 h-3 bg-white rounded-full scale-0 peer-checked:scale-100 transition-transform duration-200"></div>
                                    </div>
                                </div>

                                <label for="rememberMe" class="text-white font-poppins text-xs sm:text-sm font-normal ml-2">Remember Me</label>

                                <!-- Forgot password -->
                                <a href="{{ route('password.request') }}" class="sm:ml-[120px] md:ml-[170px] text-white font-poppins text-xs font-normal">Forgot password</a>
                            </div>

                        </div>

                        <!-- Nút Sign Up -->
                        <div class="flex flex-col items-center gap-6 mt-6">
                            <button type="submit" class="w-full h-[48px] sm:h-[53px] flex justify-center items-center gap-3" style="border-radius: 8px;background: #7300FF;">
                                <p class="text-white font-poppins font-bold text-sm sm:text-lg">Log in</p>
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
</div>
