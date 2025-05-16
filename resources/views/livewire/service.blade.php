    <div class="flex max-w-5xl mx-auto p-8 md:flex gap-9 sm:block ">
        <div class="w-full  md:grid-cols-2 gap-8">

            <div class="space-y-4 w-full">
                <h2 class="text-xl font-bold mb-4">Month</h2>

                <!-- Payment Option 1 -->
                <div class="p-4 rounded-md flex items-center gap-3 w-full cursor-pointer" style="background-color: #161616;">
                    <label class="relative flex items-center justify-self-start w-full cursor-pointer" for="html1month">
                        <!-- Outer radio circle -->
                        <input wire:model="month" value="1 month" wire:click="$set('month', '1 month')" name="month" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none border-2  rounded-full checked:border-[#ff6500] border-[#3c3c3c] transition-all" id="html1month">

                        <!-- Inner active state -->
                        <span class="absolute bg-[#ff6500] w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-2.5 transform -translate-x-1/2 -translate-y-1/2"></span>
                        <div class="ml-3">
                            <span class="font-bold text-white">1 Month</span>
                        </div>
                    </label>


                </div>


                <div class="p-4 rounded-md flex justify-self-start items-center gap-3 w-full cursor-pointer" style="background-color: #161616;">
                    <label class="relative flex items-center w-full cursor-pointer" for="html3month">
                        <!-- Outer radio circle -->
                        <input wire:model="month" wire:click="$set('month', '3 months')" value="3 months" name="month" type="radio" class="peer mr-2 h-5 w-5 cursor-pointer appearance-none border-2  rounded-full checked:border-[#ff6500] border-[#3c3c3c] transition-all" id="html3month">

                        <!-- Inner active state -->
                        <span class="absolute bg-[#ff6500] w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-2.5 transform -translate-x-1/2 -translate-y-1/2"></span>
                        <div class="ml-3">
                            <span class="font-bold text-white">3 Month</span>
                        </div>
                    </label>

                </div>

                <div class="p-4 rounded-md flex justify-self-start items-center gap-3 w-full cursor-pointer" style="background-color: #161616;">
                    <label class="relative flex items-center w-full cursor-pointer" for="html6month">
                        <!-- Outer radio circle -->
                        <input wire:model="month" wire:click="$set('month', '6 months')" value="6 months" name="month" type="radio" class="peer mr-2 h-5 w-5 cursor-pointer appearance-none border-2  rounded-full checked:border-[#ff6500] border-[#3c3c3c] transition-all" id="html6month">

                        <!-- Inner active state -->
                        <span class="absolute bg-[#ff6500] w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-2.5 transform -translate-x-1/2 -translate-y-1/2"></span>
                        <div class="ml-3">
                            <span class="font-bold text-white">6 Month</span>
                        </div>
                    </label>

                </div>

                <div class="p-4 rounded-md flex justify-self-start items-center gap-3 w-full cursor-pointer" style="background-color: #161616;">
                    <label class="relative flex items-center w-full cursor-pointer" for="html12month">
                        <!-- Outer radio circle -->
                        <input wire:model="month" wire:click="$set('month', '12 months')" value="12 months" name="month" type="radio" class="peer mr-2 h-5 w-5 cursor-pointer appearance-none border-2  rounded-full checked:border-[#ff6500] border-[#3c3c3c] transition-all" id="html12month">

                        <!-- Inner active state -->
                        <span class="absolute bg-[#ff6500] w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-2.5 transform -translate-x-1/2 -translate-y-1/2"></span>
                        <div class="ml-3">
                            <span class="font-bold text-white">12 Month</span>
                        </div>
                    </label>

                </div>

            </div>
            <!-- Left Section - Payment Methods -->
            <div class="space-y-4 w-full">
                <h2 class="text-xl font-bold mb-4">Select Payment Method</h2>

                <!-- Payment Option 1 -->
                <div class="p-4 rounded-md flex justify-self-start items-center gap-3 w-full cursor-pointer" style="background-color: #161616;">
                    <label class="relative flex items-center w-full cursor-pointer" for="vn-pay">
                        <!-- Outer radio circle -->
                        <input wire:model="option" wire:click="$set('option', 'VNBANK')" value="VNBANK" name="option" type="radio" class="peer mr-2 h-5 w-5 cursor-pointer appearance-none border-2  rounded-full checked:border-[#ff6500] border-[#3c3c3c] transition-all" id="vn-pay">

                        <!-- Inner active state -->
                        <span class="absolute bg-[#ff6500] w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-2.5 transform -translate-x-1/2 -translate-y-1/2"></span>
                        <div class="ml-3">
                            <span class="font-bold text-white">Domestic payment</span>
                        </div>
                    </label>

                </div>




                <div class="p-4 rounded-md flex justify-self-start items-center gap-3 w-full cursor-pointer" style="background-color: #161616;">
                    <label class="relative flex items-center w-full cursor-pointer" for="int-card">
                        <!-- Outer radio circle -->
                        <input wire:model="option" wire:click="$set('option', 'INTCARD')" value="INTCARD" name="option" type="radio" class="peer mr-2 h-5 w-5 cursor-pointer appearance-none border-2  rounded-full checked:border-[#ff6500] border-[#3c3c3c] transition-all" id="int-card">

                        <!-- Inner active state -->
                        <span class="absolute bg-[#ff6500] w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-2.5 transform -translate-x-1/2 -translate-y-1/2"></span>
                        <div class="ml-3">
                            <span class="font-bold text-white">International payment</span>
                        </div>
                    </label>

                </div>


            </div>
        </div>

        <!-- Right Section - Payment Details -->
        <div class="w-full rounded-md min-h-full" style="background-color: #161616;">
            <h2 class="text-xl font-bold mb-6">Payment Details</h2>
            <div class="space-y-4 p-5">
                <div class="flex justify-between">
                    <span>Email:</span>
                    <span>{{$emailUser}}</span>
                </div>
                <div class="flex justify-between">
                    <span>Package Name:</span>
                    <span class="uppercase">{{$name}}</span>
                </div>
                <div class="flex justify-between">
                    <span>Duration:</span>
                    <span>{{$month}}</span>
                </div>
                <div class="flex justify-between">
                    <span>Service:</span>
                    <span>Service Package</span>
                </div>
                <div class="flex justify-between">
                    <span>Package Price:</span>
                    <span>{{$price}}</span>
                </div>
                <div class="flex justify-between">
                    <span>Discount:</span>
                    <span>{{$discountAmount}}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold text-lg">Total Payment:</span>
                    <span class="font-bold text-lg">{{$this->getTotalPrice()}}</span>
                </div>

                <!-- Apply promo code section -->
                <div class="mt-4 flex relative w-[100%]">
                    <input wire:model="discountCode" type="text" placeholder="Promo Code" class="p-[14px_16px] placeholder:font-bold  text-gray-400 w-[68%]"
                           style="border-radius:8px;border: none !important; outline: none !important;box-shadow: none !important;font-weight: 300; line-height: 150%;color: #fff;background: #0f0f0f;">
                    <button wire:click="applyDiscount" class="absolute right-0 p-[12px_24px] bg-orange-500 text-white rounded-md " style="background-color: #2c2c2e !important; border-radius: 8px;color: #616161;font-weight: 500;font-size: 16px;line-height: 150%;white-space: nowrap;">Apply</button>
                </div>

                <!-- Payment Button -->
                <form action="{{url('vnpay')}}"  method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id_user }}">
                    <input type="hidden" name="name" value="{{ $name }}">
                    <input type="hidden" name="amount" value="{{ $this->getTotalPrice() }}">
                    <input type="hidden" name="option" value="{{$option}}">
                    <input type="hidden" name="month" value="{{$month}}">

                    <button type="submit" name="redirect" class="bg-orange-600 text-white w-full mt-4 py-2 rounded-md">Thanh toán</button>
                </form>


            </div>
        </div>
    </div>
