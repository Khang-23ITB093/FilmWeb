<div class="h-[100%] mt-[100px] p-20" style="color: rgb(255, 255, 255)">
    <div class="">
        <div class="inline-block w-[100%] text-center leading-6" style="font-size: 30px" >Profile User</div>
        {{--        settings-detail--}}
        <div class="mt-5">
            {{--            form-ground--}}
            <div class="mb-5" style="color: rgb(255, 255, 255);">
                <div class="leading-4 mb-3" style="font-size: 14px;color: rgb(130, 131, 135);">Info</div>
                {{--                portrait-container--}}
                <div class="flex items-center justify-between p-4 bg-gray-800 rounded-lg text-white">
                    <!-- Avatar and Info -->
                    <div class="flex items-center space-x-4">
                        <!-- Avatar -->
                        <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold">
                            <img class="rounded-full" src="{{ url('storage/' . $user->avatar)}}" alt="">                        </div>
                        <!-- Detailed info -->
                        <div>
                            <div class="font-semibold text-lg">{{ $user->name }}</div>
                            <div class="text-sm text-gray-400">
                                Gender:<span class="mr-4 text-white font-bold"> Not set</span>
                                Birthday: <span class="mr-4 text-white font-bold">2002-01-31</span>
                                UID:<span class="text-white mr-4 font-bold"> {{$user->id}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Edit button -->
                    <button class="text-white font-bold hover:text-white text-sm ">
                        Edit
                    </button>
                </div>
            </div>

            <div class="w-full bg-gray-900 text-white">
                <!-- Personal info -->

                <!-- VIP Section -->
                <div class="leading-5 mb-3 font-bold" style="font-size: 16px; color: rgb(130, 131, 135);">VIP</div>

                <div class="text-black p-6 rounded mb-6" style="background-image: linear-gradient(134deg, rgb(255, 222, 173) 0%, rgb(230, 176, 115) 100%);">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold">{{$subscription_name}}</h3>
                        </div>

                    </div>
                </div>

                <!-- Account and Security -->
                <div class="space-y-4">
                    <div class="flex justify-between p-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.15);">
                        <div class="">
                            <span class="text-gray-400">Email</span>
                            <span class="text-white font-bold ml-2.5">{{$user->email}}</span>
                        </div>
                        <button class="text-white font-bold">Activate</button>
                    </div>
                    <div class="flex justify-between p-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.15);">
                        <div class="">
                            <span class="text-gray-400">Phone Number</span>
                            <span class="text-white font-bold ml-2.5">{{$user->phone}}</span>
                        </div>

                        <button class="text-white font-bold">Settings</button>
                    </div>
                    <div class="flex justify-between p-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.15);">
                        <div class="">
                            <span class="text-gray-400">Password</span>
                            <span class="text-white font-bold ml-2.5">Not set</span></div>

                        <button class="text-white font-bold">Settings</button>
                    </div>
                    <div class="flex justify-between p-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.15);">
                        <div class="">
                            <span class="mr-2.5 text-gray-400">Delete Account</span>
                            <span class="text-white font-bold ml-2.5">Delete current account</span>

                        </div>

                        <button class="text-red-500 font-bold">Delete</button>
                    </div>
                    <div class="flex justify-end p-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.15);">
                        <a href="/logout" class="text-red-500 font-bold">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
