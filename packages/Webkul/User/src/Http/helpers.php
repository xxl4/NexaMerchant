<?php
    if (! function_exists('bouncer')) {
        function bouncer()
        {
            return app()->make(\Webkul\User\Bouncer::class);
        }
    }

    if (! function_exists('bouncer_manage')) {
        function bouncer_manage()
        {
            return app()->make(\Webkul\User\BouncerManage::class);
        }
    }
    
?>