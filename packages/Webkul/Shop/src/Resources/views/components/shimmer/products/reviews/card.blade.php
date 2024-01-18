@props(['count' => 0])

@for ($i = 0;  $i < $count; $i++)
<<<<<<< HEAD
    <div class="flex gap-[20px] p-[25px] border border-[#e5e5e5] rounded-[12px] max-sm:flex-wrap">
        <div class="min-h-[100px] min-w-[100px] max-sm:hidden">
            <div class="shimmer w-[100px] h-[100px] rounded-[12px]"></div>
=======
    <div class="flex gap-5 p-6 border border-[#e5e5e5] rounded-xl max-sm:flex-wrap">
        <div class="min-h-[100px] min-w-[100px] max-sm:hidden">
            <div class="shimmer w-[100px] h-[100px] rounded-xl"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        </div>

        <div class="">
            <div class="flex justify-between">
                <p class="shimmer w-[90px] h-[30px]"></p>
                
<<<<<<< HEAD
                <div class="flex items-center gap-[6px]">
                    <span class="shimmer w-[24px] h-[24px]"></span>
                    <span class="shimmer w-[24px] h-[24px]"></span>
                    <span class="shimmer w-[24px] h-[24px]"></span>
                    <span class="shimmer w-[24px] h-[24px]"></span>
                    <span class="shimmer w-[24px] h-[24px]"></span>
                </div>
            </div>

            <p class="shimmer mt-[10px] w-[130px] h-[21px]"></p>

            <div class="grid gap-[6px] mt-[20px] ">
=======
                <div class="flex items-center gap-1.5">
                    <span class="shimmer w-6 h-6"></span>
                    <span class="shimmer w-6 h-6"></span>
                    <span class="shimmer w-6 h-6"></span>
                    <span class="shimmer w-6 h-6"></span>
                    <span class="shimmer w-6 h-6"></span>
                </div>
            </div>

            <p class="shimmer mt-2.5 w-[130px] h-[21px]"></p>

            <div class="grid gap-1.5 mt-5 ">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <p class="shimmer w-[130px] h-[21px]"></p>
                <p class="shimmer w-[130px] h-[21px]"></p>
            </div>

<<<<<<< HEAD
            <div class="flex gap-2 flex-wrap mt-[10px]">
                <span class="shimmer rounded-[12px] w-[48px] h-[48px]"></span>
                <span class="shimmer rounded-[12px] w-[48px] h-[48px]"></span>
                <span class="shimmer rounded-[12px] w-[48px] h-[48px]"></span>
                <span class="shimmer rounded-[12px] w-[48px] h-[48px]"></span>
                <span class="shimmer rounded-[12px] w-[48px] h-[48px]"></span>
                <span class="shimmer rounded-[12px] w-[48px] h-[48px]"></span>
=======
            <div class="flex gap-2 flex-wrap mt-2.5">
                <span class="shimmer rounded-xl w-12 h-12"></span>
                <span class="shimmer rounded-xl w-12 h-12"></span>
                <span class="shimmer rounded-xl w-12 h-12"></span>
                <span class="shimmer rounded-xl w-12 h-12"></span>
                <span class="shimmer rounded-xl w-12 h-12"></span>
                <span class="shimmer rounded-xl w-12 h-12"></span>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            </div>
        </div>
    </div>
@endfor