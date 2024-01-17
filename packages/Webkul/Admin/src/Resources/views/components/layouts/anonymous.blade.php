<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ core()->getCurrentLocale()->direction }}">

<head>
    <title>{{ $title ?? '' }}</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    <meta name="csrf-token" content="{{ csrf_token() }}">
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <meta name="base-url" content="{{ url()->to('/') }}">
    <meta name="currency-code" content="{{ core()->getCurrentCurrencyCode() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

    @stack('meta')

    @bagistoVite(['src/Resources/assets/css/app.css', 'src/Resources/assets/js/app.js'])

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap"
        rel="stylesheet"
    />

<<<<<<< HEAD
    @if ($favicon = core()->getConfigData('general.design.admin_logo.favicon', core()->getCurrentChannelCode()))
        <link 
            type="image/x-icon"
            href="{{ Storage::url($favicon) }}" 
=======
    @if ($favicon = core()->getConfigData('general.design.admin_logo.favicon'))
        <link
            type="image/x-icon"
            href="{{ Storage::url($favicon) }}"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            rel="shortcut icon"
            sizes="16x16"
        >
    @else
<<<<<<< HEAD
        <link 
            type="image/x-icon"
            href="{{ bagisto_asset('images/favicon.ico') }}" 
=======
        <link
            type="image/x-icon"
            href="{{ bagisto_asset('images/favicon.ico') }}"
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            rel="shortcut icon"
            sizes="16x16"
        />
    @endif

    @stack('styles')

    <style>
        {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!}
    </style>

<<<<<<< HEAD
    {!! view_render_event('bagisto.shop.layout.head') !!}
</head>

<body>
    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <div id="app">
        {{-- Flash Message Blade Component --}}
        <x-admin::flash-group />

        {!! view_render_event('bagisto.shop.layout.content.before') !!}

                {{-- Page Content Blade Component --}}
                {{ $slot }}

        {!! view_render_event('bagisto.shop.layout.content.after') !!}
    </div>

    {!! view_render_event('bagisto.shop.layout.body.after') !!}
=======
    {!! view_render_event('bagisto.admin.layout.head') !!}
</head>

<body>
    {!! view_render_event('bagisto.admin.layout.body.before') !!}

    <div id="app">
        <!-- Flash Message Blade Component -->
        <x-admin::flash-group />

        {!! view_render_event('bagisto.admin.layout.content.before') !!}

                <!-- Page Content Blade Component -->
                {{ $slot }}

        {!! view_render_event('bagisto.admin.layout.content.after') !!}
    </div>

    {!! view_render_event('bagisto.admin.layout.body.after') !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

    @stack('scripts')

    <script type="text/javascript">
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>
</body>

</html>
