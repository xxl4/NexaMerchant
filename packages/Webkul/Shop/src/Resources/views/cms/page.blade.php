<<<<<<< HEAD
{{-- SEO Meta Content --}}
=======
<!-- SEO Meta Content -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
@push('meta')
    <meta name="title" content="{{ $page->meta_title }}" />

    <meta name="description" content="{{ $page->meta_description }}" />

    <meta name="keywords" content="{{ $page->meta_keywords }}" />
@endPush

<<<<<<< HEAD
{{-- Page Layout --}}
<x-shop::layouts>
    {{-- Page Title --}}
=======
<!-- Page Layout -->
<x-shop::layouts>
    <!-- Page Title -->
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    <x-slot:title>
        {{ $page->meta_title }}
    </x-slot>

<<<<<<< HEAD
    {{-- Page Content --}}
    <div class="container mt-[30px] px-[60px] max-lg:px-[30px]">
        {!! Blade::render($page->html_content) !!}
=======
    <!-- Page Content -->
    <div class="container mt-8 px-[60px] max-lg:px-8">
        {!! $page->html_content !!}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    </div>
</x-shop::layouts>