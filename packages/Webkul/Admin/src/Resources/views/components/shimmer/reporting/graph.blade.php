<<<<<<< HEAD
<div class="flex gap-[5px]">
=======
@props(['count' => 30])

<div class="flex gap-1.5">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <div class="grid">
        @foreach (range(1, 10) as $i)
            <div class="shimmer w-[39px] h-[15px]"></div>
        @endforeach
    </div>

<<<<<<< HEAD
    <div class="w-full grid gap-[5px]">
        <div class="flex items-end w-full pl-[10px] border-l-[1px]  border-b-[1px] aspect-[3.23/1]">
            <div class="w-full flex gap-[20px] justify-between items-end aspect-[3.23/1] max-lg:gap-[15px] max-sm:gap-[10px]">
                @foreach (range(1, 30) as $i)
=======
    <div class="w-full grid gap-1.5">
        <div class="flex items-end w-full pl-2.5 border-l border-b dark:border-gray-800 aspect-[3.23/1]">
            <div class="flex gap-5 justify-between items-end w-full aspect-[3.23/1] max-lg:gap-4 max-sm:gap-2.5">
                @foreach (range(1, $count) as $i)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    <div
                        class="flex shimmer w-full"
                        style="height: {{ rand(10, 100) }}%"
                    ></div>
                @endforeach
            </div>
        </div>

<<<<<<< HEAD
        <div class="flex gap-[20px] justify-between pl-[10px] max-lg:gap-[15px] max-sm:gap-[10px]">
            @foreach (range(1, 30) as $i)
=======
        <div class="flex gap-5 justify-between pl-2.5 max-lg:gap-4 max-sm:gap-2.5">
            @foreach (range(1, $count) as $i)
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <div class="shimmer flex w-full h-[15px]"></div>
            @endforeach
        </div>
    </div>
<<<<<<< HEAD
</div>

<div class="flex gap-[20px] justify-center">
    <div class="flex gap-[4px] items-center">
        <div class="shimmer w-[14px] h-[14px] rounded-[3px]"></div>
        <div class="shimmer w-[143px] h-[17px]"></div>
    </div>
    
    <div class="flex gap-[4px] items-center">
        <div class="shimmer w-[14px] h-[14px] rounded-[3px]"></div>
        <div class="shimmer w-[143px] h-[17px]"></div>
    </div>
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
</div>