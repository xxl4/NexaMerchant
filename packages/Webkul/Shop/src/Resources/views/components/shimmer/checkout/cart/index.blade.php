@props(['count' => 0])

<<<<<<< HEAD
<div class="flex flex-wrap gap-[75px] mt-[30px] max-1060:flex-col">
    <div class="grid gap-y-[25px] flex-1">
        <!-- Cart Action -->
        <div class="flex justify-between items-center pb-[10px] border-b-[1px] border-[#E9E9E9] max-sm:block">
            <div class="flex select-none items-center">
                <div class="shimmer w-[24px] h-[25px] rounded-[4px]"></div>

                <div class="shimmer ml-[10px] w-[165px] h-[30px]"></div>
            </div>

            <div class="shimmer w-[222px] h-[23px] max-sm:ml-[35px] max-sm:mt-[10px]"></div>
=======
<div class="flex flex-wrap gap-20 mt-8 max-1060:flex-col">
    <div class="grid gap-y-6 flex-1">
        <!-- Cart Action -->
        <div class="flex justify-between items-center pb-2.5 border-b border-[#E9E9E9] max-sm:block">
            <div class="flex select-none items-center">
                <div class="shimmer w-6 h-[25px] rounded"></div>

                <div class="shimmer ltr:ml-2.5 rtl:mr-2.5 w-[165px] h-[30px]"></div>
            </div>

            <div class="shimmer w-[222px] h-[23px] max-sm:ltr:ml-9 max-sm:rtl:mr-9 max-sm:mt-2.5"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        </div>

        <!-- Cart Items -->
        @for ($i = 0; $i < $count; $i++)
<<<<<<< HEAD
            <div class="flex gap-x-[10px] justify-between pb-[18px] border-b-[1px] border-[#E9E9E9]">
                <div class="flex gap-x-[20px]">
                    <div class="select-none mt-[43px]">
                        <div class="shimmer w-[24px] h-[25px] rounded-[4px]"></div>
                    </div>

                    <div>
                        <div class="shimmer w-[110px] h-[110px] rounded-[12px]"></div>
                    </div>

                    <div class="grid gap-y-[10px]">
                        <div class="shimmer w-[200px] h-[24px]"></div>

                        <div class="shimmer w-[100px] h-[24px]"></div>

                        <div class="hidden gap-[10px] place-content-start max-sm:grid">
=======
            <div class="flex gap-x-2.5 justify-between pb-5 border-b border-[#E9E9E9]">
                <div class="flex gap-x-5">
                    <div class="select-none mt-11">
                        <div class="shimmer w-6 h-[25px] rounded"></div>
                    </div>

                    <div>
                        <div class="shimmer w-[110px] h-[110px] rounded-xl"></div>
                    </div>

                    <div class="grid gap-y-2.5">
                        <div class="shimmer w-[200px] h-6"></div>

                        <div class="shimmer w-[100px] h-6"></div>

                        <div class="hidden gap-2.5 place-content-start max-sm:grid">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                            <div class="shimmer w-[100px] h-[27px]"></div>

                            <div class="shimmer w-[100px] h-[23px]"></div>
                        </div>

<<<<<<< HEAD
                        <div class="shimmer w-[108px] h-[36px] rounded-[54px]"></div>
                    </div>
                </div>

                <div class="grid gap-[10px] place-content-start max-sm:hidden">
=======
                        <div class="shimmer w-[108px] h-9 rounded-[54px]"></div>
                    </div>
                </div>

                <div class="grid gap-2.5 place-content-start max-sm:hidden">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <div class="shimmer w-[100px] h-[21px]"></div>

                    <div class="shimmer w-[100px] h-[21px]"></div>
                </div>
            </div>
        @endfor

<<<<<<< HEAD
        <div class="flex flex-wrap gap-[30px] justify-end">
            <div class="shimmer w-[217px] h-[56px] rounded-[18px]"></div>

            <div class="shimmer w-[161px] h-[56px] rounded-[18px]"></div>
=======
        <div class="flex flex-wrap gap-8 justify-end">
            <div class="shimmer w-[217px] h-14 rounded-2xl"></div>

            <div class="shimmer w-[161px] h-14 rounded-2xl"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        </div>
    </div>

    <div class="w-[418px] max-w-full">

<<<<<<< HEAD
        <p class="shimmer w-[40%] h-[39px]"></p>

        <div class="grid gap-[15px] mt-[25px]">
            <div class="flex justify-between text-right">
                <p class="shimmer w-[30%] h-[24px]"></p>

                <p class="shimmer w-[30%] h-[24px]"></p>
            </div>

            <div class="flex justify-between text-right">
                <p class="shimmer w-[40%] h-[24px]"></p>

                <p class="shimmer w-[36%] h-[24px]"></p>
            </div>

            <div class="flex justify-between text-right">
                <p class="shimmer w-[30%] h-[24px]"></p>

                <p class="shimmer w-[31%] h-[24px]"></p>
            </div>

            <div class="flex justify-between text-right">
                <p class="shimmer w-[33%] h-[24px]"></p>
                
                <p class="shimmer w-[38%] h-[24px]"></p>
            </div>
            <div class="shimmer block place-self-end w-[60%] h-[46px] mt-[15px] rounded-[18px]"></div>
=======
        <p class="shimmer w-2/5 h-[39px]"></p>

        <div class="grid gap-4 mt-6">
            <div class="flex justify-between text-right">
                <p class="shimmer w-[30%] h-6"></p>

                <p class="shimmer w-[30%] h-6"></p>
            </div>

            <div class="flex justify-between text-right">
                <p class="shimmer w-2/5 h-6"></p>

                <p class="shimmer w-[36%] h-6"></p>
            </div>

            <div class="flex justify-between text-right">
                <p class="shimmer w-[30%] h-6"></p>

                <p class="shimmer w-[31%] h-6"></p>
            </div>

            <div class="flex justify-between text-right">
                <p class="shimmer w-[33%] h-6"></p>
                
                <p class="shimmer w-[38%] h-6"></p>
            </div>
            <div class="shimmer block place-self-end w-3/5 h-[46px] mt-4 rounded-2xl"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        </div>
    </div>
</div>