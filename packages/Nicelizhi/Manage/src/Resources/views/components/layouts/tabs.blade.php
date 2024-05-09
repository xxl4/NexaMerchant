<div class="tabs">
    @if ($items = Arr::get($menu->items, implode('.children.', array_slice(explode('.', $menu->currentKey), 0, 2)) . '.children'))
        
            @foreach ($items as $key => $item)
                <a href="{{ $item['url'] }}" >
                    <div class="{{  $menu->getActive($item) ? "btn-default" : '' }} btn btn-sm">
                        @lang($item['name'])
                    </div>
                </a>
            @endforeach
    @endif
</div>