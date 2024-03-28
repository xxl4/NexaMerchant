<?php

namespace Webkul\User;

class BouncerManage
{
    /**
     * Checks if user allowed or not for certain action
     *
     * @param  string  $permission
     * @return void
     */
    public function hasPermission($permission)
    {
        if (
            auth()->guard('manage')->check()
            && auth()->guard('manage')->user()->role->permission_type == 'all'
        ) {
            return true;
        } else {
            if (
                ! auth()->guard('manage')->check()
                || ! auth()->guard('manage')->user()->hasPermission($permission)
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Checks if user allowed or not for certain action
     *
     * @param  string  $permission
     * @return void
     */
    public static function allow($permission)
    {
        if (
            ! auth()->guard('manage')->check()
            || ! auth()->guard('manage')->user()->hasPermission($permission)
        ) {
            abort(401, 'This action is unauthorized');
        }
    }
}