<<<<<<< HEAD
{{-- Total Orders Shimmer --}}
<div class="flex-1 relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-[16px]">
=======
<!-- Total Orders Shimmer -->
<div class="flex-1 relative p-4 bg-white dark:bg-gray-900 rounded box-shadow">
    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        <div class="shimmer w-[150px] h-[17px]"></div>

        <div class="shimmer w-[79px] h-[21px]"></div>
    </div>

<<<<<<< HEAD
    <div class="grid gap-[16px]">
        <div class="flex gap-[16px] items-center  justify-between">
            <div class="shimmer w-[120px] h-[36px]"></div>
            <div class="shimmer w-[75px] h-[17px]"></div>
        </div>

        <div class="shimmer w-[120px] h-[20px]"></div>
    
        {{-- Graph Shimmer --}}
        <x-admin::shimmer.reporting.graph/>
=======
    <div class="grid gap-4">
        <div class="flex gap-4 items-center  justify-between">
            <div class="shimmer w-[120px] h-9"></div>
            <div class="shimmer w-[75px] h-[17px]"></div>
        </div>

        <div class="shimmer w-[120px] h-5"></div>
    
        <!-- Graph Shimmer -->
        <x-admin::shimmer.reporting.graph :count=15/>

        <!-- Date Range -->
        <div class="flex gap-5 justify-center">
            <div class="flex gap-1 items-center">
                <div class="shimmer w-3.5 h-3.5 rounded-md"></div>
                <div class="shimmer w-[143px] h-[17px]"></div>
            </div>
            
            <div class="flex gap-1 items-center">
                <div class="shimmer w-3.5 h-3.5 rounded-md"></div>
                <div class="shimmer w-[143px] h-[17px]"></div>
            </div>
        </div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    </div>
</div>