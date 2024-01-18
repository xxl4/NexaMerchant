@props(['count' => 0])

<<<<<<< HEAD
<div class="container mt-[60px] max-lg:px-[30px] max-sm:mt-[20px]">
    <div class="relative">
        <div class="flex gap-10 overflow-auto scrollbar-hide max-sm:gap-4">
            @for ($i = 0;  $i < $count; $i++)
                <div class="grid grid-cols-1 gap-[15px] justify-items-center min-w-[120px]">
=======
<div class="container mt-14 max-lg:px-8 max-sm:mt-5">
    <div class="relative">
        <div class="flex gap-10 overflow-auto scrollbar-hide max-sm:gap-4">
            @for ($i = 0;  $i < $count; $i++)
                <div class="grid grid-cols-1 gap-4 justify-items-center min-w-[120px]">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <div class="shimmer relative w-[110px] h-[110px] overflow-hidden rounded-full">
                        <img class="bg-[#F5F5F5] rounded-sm">
                    </div>

<<<<<<< HEAD
                    <p class="shimmer w-[90px] h-[27px] rounded-[18px]"></p>
=======
                    <p class="shimmer w-[90px] h-[27px] rounded-2xl"></p>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                </div>
            @endfor
        </div>

<<<<<<< HEAD
        <span class="shimmer flex absolute top-[37px] -left-[41px] w-[50px] h-[50px] rounded-full"></span>

        <span class="shimmer flex absolute top-[37px] -right-[22px] w-[50px] h-[50px] rounded-full"></span>
=======
        <span
            class="shimmer flex absolute top-9 -left-10 w-[50px] h-[50px] rounded-full"
            role="presentation"
        ></span>

        <span
            class="shimmer flex absolute top-9 -right-6 w-[50px] h-[50px] rounded-full"
            role="presentation"
        ></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    </div>
</div>
