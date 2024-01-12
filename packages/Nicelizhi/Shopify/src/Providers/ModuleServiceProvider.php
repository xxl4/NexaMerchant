<?php

namespace Nicelizhi\Shopify\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    protected $models = [
        \Nicelizhi\Shopify\Models\Product::class
    ];
}