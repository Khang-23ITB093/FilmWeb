<div>
    {{-- Be like water. --}}

    <div class="bg-black">
        <div class="flex flex-wrap justify-center items-start w-full pt-[306px] pb-[226px]">
            <div class="flex flex-col items-start  lg:w-[50%] w-full pl-[40px]">
                <div class="text-white text-[46px] font-semibold leading-[120%] pb-[14px]">
                    We are here for you whenever you need!
                </div>
                <div class="text-[#C0A6FF] text-[19px] font-normal leading-[120%] pb-[50px]">
                    We're here to help you with any problems you may be have while using Cine Sphere.
                </div>

                <div
                    class="w-[95%] h-[911px] lg:w-[500px] lg:h-[549px] p-[10px] bg-black rounded-[27px] border-[12px] border-[#1A0B28] overflow-hidden inline-flex relative justify-start items-start gap-[10px]">
                    <div
                        class="w-[100%] h-[483px] transform rotate-[-18.72deg] origin-[0_0] flex flex-col justify-start items-start gap-[23px] absolute lg:right-[250px] right-[300px] top-[-16px] pr-[33px]">


                        @foreach(range(0, 3) as $i) {{-- Loop for 4 rows --}}
                        <div class="flex gap-6">
                            @foreach(range(0, 4) as $j) {{-- Loop for 5 images per row --}}
                            @php
                            $index = $i * 5 + $j;
                            $imageSrc = $items->count() > $index ? Vite::asset($items[$index]->links) :
                            'resources/images/support-images/135x168.png';
                            @endphp
                            <img class="card-support lg:w-[130px] w-[200px] object-cover" src="{{ $imageSrc }}" />
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-black lg:w-[50%] w-full ">
                <div
                    class="mr-10 ml-10 p-[50px] rounded-tl-[60px] rounded-br-[60px] border-2 border-[#7300FF] inline-flex flex-col justify-start items-start">

                    <div class=" justify-start items-start inline-flex w-full flex-wrap ">
                        <div
                            class="flex flex-col justify-start items-start gap-[10px] lg:w-[50%] w-full lg:pr-[20px] pt-[50px]">
                            <div class="text-white text-[19px] font-semibold leading-[22.8px]">First Name</div>
                            <input type="text" placeholder="Enter First Name"
                                class="bg-black p-[20px] rounded-[8px] border-2 border-[#8A3BFF] text-[#DACDFF] text-[19px] font-normal leading-[22.8px] w-full box-border">
                        </div>
                        <div
                            class="flex flex-col justify-start items-start gap-[10px] lg:w-[50%] w-full lg:pl-[20px] pt-[50px]">
                            <div class="text-white text-[19px] font-semibold leading-[22.8px]">Last Name</div>
                            <input type="text" placeholder="Enter Last Name"
                                class="bg-black p-[20px] rounded-[8px] border-2 border-[#8A3BFF] text-[#DACDFF] text-[19px] font-normal leading-[22.8px] w-full box-border">
                        </div>
                    </div>
                    <div class=" justify-start items-start inline-flex w-full flex-wrap">
                        <div
                            class="flex flex-col justify-start items-start gap-[10px]  lg:w-[50%] w-full lg:pr-[20px] pt-[50px]">
                            <div class="text-white text-[19px] font-semibold leading-[22.8px]">Email</div>
                            <input type="email" placeholder="Enter Your Email"
                                class="bg-black p-[20px] rounded-[8px] border-2 border-[#8A3BFF] text-[#DACDFF] text-[19px] font-normal leading-[22.8px] w-full box-border">
                        </div>
                        <div
                            class="flex flex-col justify-start items-start gap-[16px]  lg:w-[50%] w-full lg:pl-[20px] pt-[50px]">
                            <div class="text-white text-[19px] font-semibold leading-[22.8px]">Phone Number</div>
                            <div class="flex justify-start items-center gap-[10px]">
                                <div class="w-[94px] p-[12px] rounded-[8px] border-2 border-[#8A3BFF] flex justify-between items-center cursor-pointer"
                                    style="    width: 25%;">
                                    <img src="{{ Vite::asset("resources/images/support-images/flag.png") }}" alt=""
                                        style="    width: 70%;">
                                    <img src="{{ Vite::asset("resources/images/support-images/Vector3.png") }}" alt=""
                                        style="    width: 20%;">
                                </div>
                                <div
                                    class="flex-1 h-[63px] p-[20px] rounded-[8px] border-2 border-[#8A3BFF] flex items-center">
                                    <input type="text" placeholder="Enter Phone Number"
                                        class="w-full text-[#DACDFF] text-[19px] font-normal border-none outline-none bg-transparent leading-[22.8px]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-start items-start gap-[16px] h-[202px] pt-[50px]"
                        style="width: 100%; ">
                        <div class="text-white text-[19px] font-semibold leading-[22.8px]">Message</div>
                        <div class="h-[163px] p-[20px] rounded-[8px] border-2 border-[#8A3BFF] flex items-start"
                            style="    width: 100%;">
                            <textarea placeholder="Enter your query"
                                class="w-full h-full text-[#DACDFF] text-[19px] font-normal border-none outline-none resize-none bg-transparent leading-[22.8px]"></textarea>
                        </div>
                    </div>

                    <div class=" justify-start items-center inline-flex  w-full flex-wrap">
                        <div class="flex justify-start items-center gap-[10px] lg:w-[50%] w-full pt-[50px]">
                            <input type="checkbox" id="terms" class="custom-checkbox">
                            <label for="terms" class="checkbox-label">I agree with Terms of Use and Privacy
                                Policy</label>
                        </div>
                        <div class="lg:w-[50%] w-full lg:pl-[20px] pt-[50px]"
                            style="display: flex;justify-content: right;">
                            <div
                                class=" w-full lg:w-[170px] h-[67px] bg-[#7300FF] p-[10px] px-[22px] rounded-[20px] flex justify-center items-center">
                                <button class="text-white text-[23px] font-semibold leading-[27.6px]">Button</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Frequently asked questions --}}
    <div class="flex flex-col justify-start items-center gap-[87px] w-full pb-[226px]" style="background-color: black ">
        <div class="text-white text-[48px] font-semibold leading-[57.6px] text-center">
            Frequently asked questions
        </div>
        <div class=" justify-start items-center  inline-flex w-full flex-wrap flex-wrap:wrap">
            <div class="w-full flex flex-row flex-wrap justify-start items-start">
                <div class="w-full lg:w-1/2 p-[35px]">
                    <div
                        class="lg:h-56 xl:h-32 bg-[rgba(48,0,119,0.30)] p-5 rounded-2xl flex flex-col justify-center items-center gap-12 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center w-full px-7 p-2 rounded-lg hover:bg-gradient-to-r cursor-pointer transition-all duration-300"
                            onclick="document.getElementById('question_1').classList.toggle('hidden');var imagest = document.getElementById('image_question1').style.transform;if (imagest === 'scaleY(-1)') { imagest = 'scaleY(1)'; } else { imagest ='scaleY(-1)';}">
                            <div
                                class="flex-1 text-white text-4xl font-normal leading-tight transition-all duration-300">
                                What is Cine Sphere?
                            </div>
                            <div
                                class="w-20 h-20 p-2.5 bg-gray-800 rounded-full flex justify-center items-center shadow-xl hover:scale-105 transition-all duration-300">
                                <img id="image_question1"
                                    src="{{ Vite::asset('resources/images/support-images/Vector3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="question_1"
                        class="mt-4 rounded-lg  shadow-md hidden transition-all duration-300 bg-purple-800 p-12">
                        <p class=" text-lg text-custom-light text-yellow-100  ">Cine Sphere is a premier online streaming platform that offers
                            a vast library of movies, TV series, and original productions. Designed to deliver
                            high-quality, on-demand entertainment, Cine Sphere allows users to stream their favorite
                            content anytime, anywhere, on any device.</p>
                    </div>
                </div>


                <div class="w-full lg:w-1/2 p-[35px]">
                    <div
                        class="lg:h-56 xl:h-32 bg-[rgba(48,0,119,0.30)] p-5 rounded-2xl flex flex-col justify-center items-center gap-12 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center w-full px-7 p-2 rounded-lg hover:bg-gradient-to-r cursor-pointer transition-all duration-300"
                            onclick="document.getElementById('question_2').classList.toggle('hidden');var imagest = document.getElementById('image_question2').style.transform;if (imagest === 'scaleY(-1)') { imagest = 'scaleY(1)'; } else { imagest ='scaleY(-1)';}">
                            <div
                                class="flex-1 text-white text-4xl font-normal leading-tight transition-all duration-300">
                                Can I download movies and shows to watch offline?
                            </div>
                            <div
                                class="w-20 h-20 p-2.5 bg-gray-800 rounded-full flex justify-center items-center shadow-xl hover:scale-105 transition-all duration-300">
                                <img id="image_question2"
                                    src="{{ Vite::asset('resources/images/support-images/Vector3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="question_2"
                        class="mt-4 rounded-lg  shadow-md hidden transition-all duration-300 bg-purple-800 p-12">
                        <p class=" text-lg text-custom-light text-yellow-100 ">Yes, Cine Sphere allows you to download movies and shows for
                            offline viewing.
                            This feature lets you enjoy your favorite content without an internet connection, perfect
                            for traveling or when you're on the go. Simply look for the download option next to the
                            title you want, and it will be saved to your device for later viewing.</p>
                    </div>
                </div>

                {{-- --}}
                <div class="w-full lg:w-1/2 p-[35px]">
                    <div
                        class="lg:h-56 xl:h-32 bg-[rgba(48,0,119,0.30)] p-5 rounded-2xl flex flex-col justify-center items-center gap-12 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center w-full px-7 p-2 rounded-lg hover:bg-gradient-to-r cursor-pointer transition-all duration-300"
                            onclick="document.getElementById('question_3').classList.toggle('hidden');var imagest = document.getElementById('image_question3').style.transform;if (imagest === 'scaleY(-1)') { imagest = 'scaleY(1)'; } else { imagest ='scaleY(-1)';}">
                            <div
                                class="flex-1 text-white text-4xl font-normal leading-tight transition-all duration-300">
                                Can I share my account with others?
                            </div>
                            <div
                                class="w-20 h-20 p-2.5 bg-gray-800 rounded-full flex justify-center items-center shadow-xl hover:scale-105 transition-all duration-300">
                                <img id="image_question3"
                                    src="{{ Vite::asset('resources/images/support-images/Vector3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="question_3"
                        class="mt-4 rounded-lg  shadow-md hidden transition-all duration-300 bg-purple-800 p-12">
                        <p class=" text-lg text-custom-light text-yellow-100  ">If you forget your Cine Sphere password, don’t worry! You can reset it easily: <br>
                            Go to the Cine Sphere login page. <br>
                            1. Click on the “Forgot Password?” link. <br>
                            2. Enter the email address associated with your account and submit. <br>
                            3. Check your email for a password reset link. Click the link and follow the instructions to create a new password. <br>
                            If you don’t receive the email within a few minutes, check your spam or junk folder. For further assistance, you can always contact Cine Sphere’s support team.</p>
                    </div>
                </div>
                {{-- --}}
                <div class="w-full lg:w-1/2 p-[35px]">
                    <div
                        class="lg:h-56 xl:h-32 bg-[rgba(48,0,119,0.30)] p-5 rounded-2xl flex flex-col justify-center items-center gap-12 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center w-full px-7 p-2 rounded-lg hover:bg-gradient-to-r cursor-pointer transition-all duration-300"
                            onclick="document.getElementById('question_4').classList.toggle('hidden');var imagest = document.getElementById('image_question4').style.transform;if (imagest === 'scaleY(-1)') { imagest = 'scaleY(1)'; } else { imagest ='scaleY(-1)';}">
                            <div
                                class="flex-1 text-white text-4xl font-normal leading-tight transition-all duration-300">
                                What subscription plans does Cine Sphere offer?
                            </div>
                            <div
                                class="w-20 h-20 p-2.5 bg-gray-800 rounded-full flex justify-center items-center shadow-xl hover:scale-105 transition-all duration-300">
                                <img id="image_question4"
                                    src="{{ Vite::asset('resources/images/support-images/Vector3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="question_4"
                        class="mt-4 rounded-lg  shadow-md hidden transition-all duration-300 bg-purple-800 p-12">
                        <p class=" text-lg text-custom-light text-yellow-100 ">Cine Sphere offers a range of subscription plans tailored to your viewing preferences and budget: <br>
                            1. Basic Plan <br>
                            Features: Standard Definition (SD) quality, single-device streaming. <br>
                            Best For: Individual users on a budget. <br>
                            2. Premium Plan <br>
                            Features: Ultra High Definition (4K) quality, streaming on up to 4 devices simultaneously. <br>
                            Best For: Families or groups who want the best viewing experience. <br>
                            Each plan includes access to the full Cine Sphere library of movies, TV shows, and exclusive content. You can switch or cancel your plan anytime directly through your account settings.</p>
                    </div>
                </div>
                {{--  --}}
                <div class="w-full lg:w-1/2 p-[35px]">
                    <div
                        class="lg:h-56 xl:h-32 bg-[rgba(48,0,119,0.30)] p-5 rounded-2xl flex flex-col justify-center items-center gap-12 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center w-full px-7 p-2 rounded-lg hover:bg-gradient-to-r cursor-pointer transition-all duration-300"
                            onclick="document.getElementById('question_5').classList.toggle('hidden');var imagest = document.getElementById('image_question5').style.transform;if (imagest === 'scaleY(-1)') { imagest = 'scaleY(1)'; } else { imagest ='scaleY(-1)';}">
                            <div
                                class="flex-1 text-white text-4xl font-normal leading-tight transition-all duration-300">
                                How do I cancel my subscription?
                            </div>
                            <div
                                class="w-20 h-20 p-2.5 bg-gray-800 rounded-full flex justify-center items-center shadow-xl hover:scale-105 transition-all duration-300">
                                <img id="image_question5"
                                    src="{{ Vite::asset('resources/images/support-images/Vector3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="question_5"
                        class="mt-4 rounded-lg  shadow-md hidden transition-all duration-300 bg-purple-800 p-12">
                        <p class="text-lg text-custom-light text-yellow-100 ">Canceling your Cine Sphere subscription is quick and easy. Here’s how you can do it: <br>
                           1. Log in to your account: Go to the Cine Sphere website and sign in with your credentials. <br>
                           2. Access your account settings: Click on your profile icon and select Account Settings from the dropdown menu. <br>
                           3. Navigate to the subscription section: Locate the Subscription or Membership option. <br>
                           4. Cancel your plan: Click on Cancel Subscription and follow the prompts to confirm your cancellation.
                            What happens after cancellation? <br>
                           1. You’ll retain access to Cine Sphere until the end of your current billing cycle. <br>
                           2. You can reactivate your subscription anytime if you change your mind! <br>
                           3. For further assistance, feel free to contact Cine Sphere’s customer support team.</p>
                    </div>
                </div>
                {{--  --}}
                <div class="w-full lg:w-1/2 p-[35px]">
                    <div
                        class="lg:h-56 xl:h-32 bg-[rgba(48,0,119,0.30)] p-5 rounded-2xl flex flex-col justify-center items-center gap-12 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center w-full px-7 p-2 rounded-lg hover:bg-gradient-to-r cursor-pointer transition-all duration-300"
                            onclick="document.getElementById('question_6').classList.toggle('hidden');var imagest = document.getElementById('image_question6').style.transform;if (imagest === 'scaleY(-1)') { imagest = 'scaleY(1)'; } else { imagest ='scaleY(-1)';}">
                            <div
                                class="flex-1 text-white text-4xl font-normal leading-tight transition-all duration-300">
                                How do I create a Fan Art Creator Profile?
                            </div>
                            <div
                                class="w-20 h-20 p-2.5 bg-gray-800 rounded-full flex justify-center items-center shadow-xl hover:scale-105 transition-all duration-300">
                                <img id="image_question6"
                                    src="{{ Vite::asset('resources/images/support-images/Vector3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="question_6"
                        class="mt-4 rounded-lg shadow-md hidden transition-all duration-300 bg-purple-800 p-12">
                        <p class=" text-lg text-custom-light text-yellow-100 ">Creating a Fan Art Creator Profile on Cine Sphere is simple and opens the door for you to showcase your creative talents. Here’s how you can do it: <br>

                            Steps to Create Your Fan Art Creator Profile. <br>
                            Log In to Your Account. <br>
                            
                            Visit the Cine Sphere website and sign in with your account credentials. If you don’t have an account, sign up first. <br>
                            Navigate to the Creator Hub.</p> 
                    </div>
                </div>
                {{--  --}}
                <div class="w-full lg:w-1/2 p-[35px]">
                    <div
                        class="lg:h-56 xl:h-32 bg-[rgba(48,0,119,0.30)] p-5 rounded-2xl flex flex-col justify-center items-center gap-12 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex justify-between items-center w-full px-7 p-2 rounded-lg hover:bg-gradient-to-r cursor-pointer transition-all duration-300"
                            onclick="document.getElementById('question_7').classList.toggle('hidden');var imagest = document.getElementById('image_question7').style.transform;if (imagest === 'scaleY(-1)') { imagest = 'scaleY(1)'; } else { imagest ='scaleY(-1)';}">
                            <div
                                class="flex-1 text-white text-4xl font-normal leading-tight transition-all duration-300">
                                How do I report an issue with the platform?
                            </div>
                            <div
                                class="w-20 h-20 p-2.5 bg-gray-800 rounded-full flex justify-center items-center shadow-xl hover:scale-105 transition-all duration-300">
                                <img id="image_question7"
                                    src="{{ Vite::asset('resources/images/support-images/Vector3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div id="question_7"
                        class="mt-4 rounded-lg  shadow-md hidden transition-all duration-300 bg-purple-800 p-12">
                        <p class=" text-lg space-y-4 text-custom-light text-yellow-100 ">
                            Reporting an issue on Cine Sphere is straightforward to ensure you get the help you need: <br>
                            Steps to Report an Issue <br>
                            Log in to Your Account <br>
                            Visit the Cine Sphere website or app and sign in with your credentials. <br>
                            Access the Help Center <br>
                            Click on your profile icon and select Help Center from the dropdown menu. <br>
                            Choose “Report an Issue” <br>
                          </p>
                          
                    </div>
                </div>
                {{--  --}}
               
            </div>
        </div>
    </div>
</div>