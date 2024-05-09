@php
    $channels = core()->getAllChannels();

    $currentChannel = core()->getRequestedChannel();

    $currentLocale = core()->getRequestedLocale();
@endphp

<x-admin::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @if ($items = Arr::get($config->items, request()->route('slug') . '.children'))
            @foreach ($items as $key => $item)
                @if ( $key == request()->route('slug2'))
                    {{ $title = trans($item['name']) }}
                @endif
            @endforeach
        @endif
    </x-slot:title>

    <section class="content">
        <div class="container-fluid">
        </div>
    </section>



    <!-- jQuery -->
    <script src="/themes/manage/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/themes/manage/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</x-admin::layouts>
