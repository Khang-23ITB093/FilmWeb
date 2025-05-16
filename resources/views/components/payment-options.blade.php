<div class="p-4 rounded-md flex justify-center items-center gap-3" style="background-color: #161616;">
    <label class="relative flex items-center w-fit cursor-pointer" for="html12month">
        <!-- Outer radio circle -->
        <input value="shoppeepay" name="payment2" type="radio" class="peer mr-2 h-5 w-5 cursor-pointer appearance-none border-2  rounded-full checked:border-[#ff6500] border-[#3c3c3c] transition-all " id="html12month">

        <!-- Inner active state -->
        <span class="absolute bg-[#ff6500] w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-2.5 transform -translate-x-1/2 -translate-y-1/2"></span>
    </label>
    <img class="w-[50px] h-[50px]" src="{{ Vite::asset('resources/images/play_image/shopeepay.png') }}" alt="">
    <div class="">
        <span class="font-bold">Ví ShopeePay</span>
        <p class="text-sm text-gray-400">Giảm ngay 10% - Giảm tối đa 20.000Đ (đơn tối thiểu 20.000Đ) khi thanh toán qua ShopeePay.</p>
    </div>
</div>
