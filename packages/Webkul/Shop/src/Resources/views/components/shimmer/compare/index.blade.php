@props(['attributeCount' => 3, 'productCount' => 3])

<div class="flex justify-between items-center">
    <h2 class="shimmer w-[200px] h-[39px]"></h2>

<<<<<<< HEAD
    <div class="shimmer w-[150px] h-[50px] rounded-[12px]"></div>
</div>

<div class="grid mt-[60px] overflow-auto journal-scroll">
    <!-- Single row -->
    <div class="flex items-center max-w-full border-b-[1px] border-[#E9E9E9] ">
=======
    <div class="shimmer w-[150px] h-[50px] rounded-xl"></div>
</div>

<div class="grid mt-16 overflow-auto journal-scroll">
    <!-- Single row -->
    <div class="flex items-center max-w-full border-b border-[#E9E9E9] ">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <div class="min-w-[304px] max-w-full max-sm:hidden">
            <p class="shimmer w-[55%] h-[21px]"></p>
        </div>

<<<<<<< HEAD
        <div class="flex gap-[12px] border-l-[1px] border-[#E9E9E9] max-sm:border-0">
            <x-shop::shimmer.products.cards.grid
                class="min-w-[311px] max-w-[311px] pt-0 pr-0 p-[20px] max-sm:pl-0"
=======
        <div class="flex gap-3 border-l-[1px] border-[#E9E9E9] max-sm:border-0">
            <x-shop::shimmer.products.cards.grid
                class="min-w-[311px] max-w-[311px] pt-0 ltr:pr-0 rtl:pl-0 p-5 max-sm:ltr:pl-0 max-sm:rtl:pr-0"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                count="3"
            ></x-shop::shimmer.products.cards.grid>
        </div>
    </div>

    <!-- Single row -->
    <x-shop::shimmer.compare.attribute
        :attributeCount="$attributeCount"
        :productCount="$productCount"
    ></x-shop::shimmer.compare.attribute>
</div>