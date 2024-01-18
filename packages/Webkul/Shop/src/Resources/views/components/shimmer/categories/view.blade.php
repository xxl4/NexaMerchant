<<<<<<< HEAD
<div class="container px-[60px] max-lg:px-[30px] max-sm:px-[15px]">
    <div class="flex gap-[40px] md:mt-[40px] items-start max-lg:gap-[20px]">
        {{-- Desktop Filter Shimmer Effect --}}
=======
<div class="container px-[60px] max-lg:px-8 max-sm:px-4">
    <div class="flex gap-10 md:mt-10 items-start max-lg:gap-5">
        <!-- Desktop Filter Shimmer Effect -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <div class="max-md:hidden">
            <x-shop::shimmer.categories.filters/>
        </div>

        <div class="flex-1">
<<<<<<< HEAD
            {{-- Desktop Toolbar Shimmer Effect --}}
=======
            <!-- Desktop Toolbar Shimmer Effect -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <div class="max-md:hidden">
                <x-shop::shimmer.categories.toolbar/>
            </div>

<<<<<<< HEAD
            {{-- Product Card Container --}}
            @if(request()->query('mode') =='list')
                <div class="grid grid-cols-1 gap-[25px] mt-[30px]">
                    <x-shop::shimmer.products.cards.list count="12"></x-shop::shimmer.products.cards.list>
                </div>
            @else
                <div class="grid grid-cols-3 gap-8 mt-[30px] max-sm:mt-[20px] max-1060:grid-cols-2 max-sm:justify-items-center max-sm:gap-[16px]">
                    {{-- Product Card Shimmer Effect --}}
=======
            <!-- Product Card Container -->
            @if(request()->query('mode') =='list')
                <div class="grid grid-cols-1 gap-6 mt-8">
                    <x-shop::shimmer.products.cards.list count="12"></x-shop::shimmer.products.cards.list>
                </div>
            @else
                <div class="grid grid-cols-3 gap-8 mt-8 max-sm:mt-5 max-1060:grid-cols-2 max-sm:justify-items-center max-sm:gap-4">
                    <!-- Product Card Shimmer Effect -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <x-shop::shimmer.products.cards.grid count="12"></x-shop::shimmer.products.cards.grid> 
                </div> 
            @endif

<<<<<<< HEAD
            <button class="shimmer block w-[171.516px] h-[48px] mt-[60px] mx-auto py-[11px] rounded-[18px]"></button>
=======
            <button class="shimmer block w-[171.516px] h-12 mt-14 mx-auto py-3 rounded-2xl"></button>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        </div>
    </div>
</div>