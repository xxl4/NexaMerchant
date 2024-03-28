<?php

namespace Webkul\User\Facades;

use Illuminate\Support\Facades\Facade;

class BouncerManage extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bouncer_manage';
    }
}