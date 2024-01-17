@props(['isMultiRow' => false])

@if (! $isMultiRow)
<<<<<<< HEAD
    <div class="row grid grid-cols-6 gap-[10px] items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800">
        <!-- Mass Actions -->
        <div class="shimmer w-[24px] h-[26px]"></div>
=======
    <div class="row grid grid-cols-6 gap-2.5 items-center px-4 py-2.5 border-b dark:border-gray-800">
        <!-- Mass Actions -->
        <div class="shimmer w-6 h-[26px]"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        <div class="shimmer w-[100px] h-[17px]"></div>

        <div class="shimmer w-[100px] h-[17px]"></div>

        <div class="shimmer w-[100px] h-[17px]"></div>

        <div class="shimmer w-[100px] h-[17px]"></div>

<<<<<<< HEAD
        <div class="shimmer w-[100px] h-[17px] col-start-[none]"></div>
    </div>
@else
    <div class="row grid grid-cols-[2fr_1fr_1fr] gap-[10px] items-center px-[16px] py-[10px] border-b-[1px] dark:border-gray-800 tems-center">
        <!-- Mass Actions -->
        <div class="flex gap-[10px] items-center">
            <div class="shimmer w-[24px] h-[24px]"></div>
=======
        <div class="shimmer w-[100px] h-[17px] place-self-end"></div>
    </div>
@else
    <div class="row grid grid-cols-[2fr_1fr_1fr] gap-2.5 items-center px-4 py-2.5 border-b dark:border-gray-800 tems-center">
        <!-- Mass Actions -->
        <div class="flex gap-2.5 items-center">
            <div class="shimmer w-6 h-6"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

            <div class="shimmer w-[200px] h-[17px]"></div>
        </div>

        <div class="shimmer w-[200px] h-[17px]"></div>

        <div class="shimmer w-[200px] h-[17px]"></div>
    </div>
@endif