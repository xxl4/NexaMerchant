<div class="tabs">
    @if ($items = Arr::get($menu->items, implode('.children.', array_slice(explode('.', $menu->currentKey), 0, 2)) . '.children'))
<<<<<<< HEAD
        <div class="flex gap-[15px] mb-[15px] pt-[8px] border-b-[2px] max-sm:hidden dark:border-gray-800">
            @foreach ($items as $key => $item)
                <a href="{{ $item['url'] }}">
                    <div class="{{  $menu->getActive($item) ? "mb-[-1px] border-blue-600 border-b-[2px] transition" : '' }} pb-[14px] px-[10px] text-[16px] font-medium text-gray-600 dark:text-gray-300 cursor-pointer">
=======
        <div class="flex gap-4 mb-4 pt-2 border-b-2 max-sm:hidden dark:border-gray-800">
            @foreach ($items as $key => $item)
                <a href="{{ $item['url'] }}">
                    <div class="{{  $menu->getActive($item) ? "-mb-px border-blue-600 border-b-2 transition" : '' }} pb-3.5 px-2.5 text-base  font-medium text-gray-600 dark:text-gray-300 cursor-pointer">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                        @lang($item['name'])
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>