@php
    $admin = auth()->guard('admin')->user();
@endphp

<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.dashboard.index.title')
    </x-slot:title>

    
</x-admin::layouts>
