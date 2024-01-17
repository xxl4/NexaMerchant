{!! view_render_event('bagisto.admin.catalog.product.edit.form.images.before', ['product' => $product]) !!}

<<<<<<< HEAD
<div class="relative p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
    <!-- Panel Header -->
    <div class="flex gap-[20px] justify-between mb-[16px]">
        <div class="flex flex-col gap-[8px]">
            <p class="text-[16px] text-gray-800 dark:text-white font-semibold">
                @lang('admin::app.catalog.products.edit.images.title')
            </p>

            <p class="text-[12px] text-gray-500 dark:text-gray-300 font-medium">
=======
<div class="relative p-4 bg-white dark:bg-gray-900 rounded box-shadow">
    <!-- Panel Header -->
    <div class="flex gap-5 justify-between mb-4">
        <div class="flex flex-col gap-2">
            <p class="text-base text-gray-800 dark:text-white font-semibold">
                @lang('admin::app.catalog.products.edit.images.title')
            </p>

            <p class="text-xs text-gray-500 dark:text-gray-300 font-medium">
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
                @lang('admin::app.catalog.products.edit.images.info')
            </p>
        </div>
    </div>

    <!-- Image Blade Component -->
    <x-admin::media.images
        name="images[files]"
        allow-multiple="true"
        show-placeholders="true"
        :uploaded-images="$product->images"
    >
    </x-admin::media.images>
</div>

{!! view_render_event('bagisto.admin.catalog.product.edit.form.images.after', ['product' => $product]) !!}