@for ($j = 0; $j < 3; $j++)
    <div>
        <!-- Group Container -->
        <div class="flex items-center">
            <!-- Toggle -->
<<<<<<< HEAD
            <div class="shimmer w-[16px] h-[16px] mr-[4px]"></div>

            <!-- Group Name -->
            <div class="group_node flex gap-[6px] max-w-max py-[6px] ltr:pr-[6px] rtl:pl-[6px]">
                <div class="shimmer w-[20px] h-[21px]"></div>

                <div class="shimmer w-[20px] h-[21px]"></div>
=======
            <div class="shimmer w-4 h-4 mr-1"></div>

            <!-- Group Name -->
            <div class="group_node flex gap-1.5 max-w-max py-1.5 ltr:pr-1.5 rtl:pl-1.5">
                <div class="shimmer w-5 h-[21px]"></div>

                <div class="shimmer w-5 h-[21px]"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                
                <div class="shimmer w-[105px] h-[21px]"></div>
            </div>
        </div>

        <!-- Group Attributes -->
<<<<<<< HEAD
        <div class="ltr:ml-[43px] rtl:mr-[43px]">
            @for ($k = 0; $k < 5; $k++)
                <div class="flex gap-[6px] max-w-max py-[6px] ltr:pr-[6px] rtl:pl-[6px]">
                    <div class="shimmer w-[20px] h-[21px]"></div>

                    <div class="shimmer w-[20px] h-[21px]"></div>
=======
        <div class="ltr:ml-11 rtl:mr-11">
            @for ($k = 0; $k < 5; $k++)
                <div class="flex gap-1.5 max-w-max py-1.5 ltr:pr-1.5 rtl:pl-1.5">
                    <div class="shimmer w-5 h-[21px]"></div>

                    <div class="shimmer w-5 h-[21px]"></div>
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                    
                    <div class="shimmer w-[105px] h-[21px]"></div>
                </div>
            @endfor
        </div>
    </div>
@endfor