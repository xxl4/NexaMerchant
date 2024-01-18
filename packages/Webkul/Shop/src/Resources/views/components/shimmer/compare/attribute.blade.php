@props(['attributeCount' => 3, 'productCount' => 3])

@for ($i = 0;  $i < $attributeCount; $i++)
<<<<<<< HEAD
    <div class="flex items-center max-w-full border-b-[1px] border-[#E9E9E9] max-sm:border-0">
=======
    <div class="flex items-center max-w-full border-b border-[#E9E9E9] max-sm:border-0">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <div class="min-w-[304px] max-w-full max-sm:hidden">
            <p class="shimmer w-[55%] h-[21px]"></p>
        </div>
        
<<<<<<< HEAD
        <div class="flex gap-[12px] border-l-[1px] border-[#E9E9E9] max-sm:border-0">
            @for ($j = 0;  $j < $productCount; $j++)
                <div class="w-[311px] max-w-[311px] pr-0 p-[20px] max-sm:pl-0">
                    <div class="grid gap-[5px]">
=======
        <div class="flex gap-3 border-l-[1px] border-[#E9E9E9] max-sm:border-0">
            @for ($j = 0;  $j < $productCount; $j++)
                <div class="w-[311px] max-w-[311px] ltr:pr-0 rtl:pl-0 p-5 max-sm:ltr:pl-0 max-sm:rtl:pr-0">
                    <div class="grid gap-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        <p class="shimmer hidden w-[55%] h-[21px] max-sm:block"></p>
                        <p class="shimmer w-[55%] h-[21px]"></p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endfor