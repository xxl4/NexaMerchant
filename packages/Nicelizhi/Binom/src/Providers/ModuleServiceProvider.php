<?php

namespace Nicelizhi\Binom\Providers;

use Webkul\Core\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    protected $models = [
        \Nicelizhi\Binom\Models\BinomLog::class
    ];
}