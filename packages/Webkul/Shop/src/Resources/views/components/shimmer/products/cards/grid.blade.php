@props(['count' => 0])

@for ($i = 0;  $i < $count; $i++)
    <div class="grid gap-2.5 relative w-full max-w-[291px] max-sm:grid-cols-1 {{ $attributes["class"] }}">
<<<<<<< HEAD
        <div class="shimmer relative w-full rounded-[4px]">
=======
        <div class="shimmer relative w-full rounded">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            <div class="relative after:content-[' '] after:block after:pb-[calc(100%+9px)]"></div>
        </div>

        <div class="grid gap-2.5 content-start">
<<<<<<< HEAD
            <p class="shimmer w-[75%] h-[24px]"></p>
            <p class="shimmer w-[55%] h-[24px]"></p>

            {{-- Needs to implement that in future --}}
            <div class="hidden flex gap-4 mt-[12px]">
=======
            <p class="shimmer w-3/4 h-6"></p>
            <p class="shimmer w-[55%] h-6"></p>

            <!-- Needs to implement that in future -->
            <div class="hidden flex gap-4 mt-3">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                <span class="shimmer w-[30px] h-[30px] block rounded-full"></span>
                <span class="shimmer w-[30px] h-[30px] block rounded-full"></span>
            </div>
        </div>
    </div>
@endfor
