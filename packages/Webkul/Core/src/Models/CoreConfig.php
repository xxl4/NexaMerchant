<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Core\Contracts\CoreConfig as CoreConfigContract;

class CoreConfig extends Model implements CoreConfigContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'core_config';

    /**
     * Fillable for mass assignment
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'value',
        'channel_code',
        'locale_code',
    ];

    /**
     * Hidden properties
     *
     * @var array
     */
    protected $hidden = ['token'];
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
