<?php

namespace Nicelizhi\Lp\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    protected $models = [
        \Nicelizhi\Lp\Models\Lp::class,
    ];
}