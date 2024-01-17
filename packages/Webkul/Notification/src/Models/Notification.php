<?php

namespace Webkul\Notification\Models;

<<<<<<< HEAD
use Webkul\Sales\Models\OrderProxy;
use Illuminate\Database\Eloquent\Model;
use Webkul\Notification\Contracts\Notification as NotificationContract;
=======
use Illuminate\Database\Eloquent\Model;
use Webkul\Notification\Contracts\Notification as NotificationContract;
use Webkul\Sales\Models\OrderProxy;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class Notification extends Model implements NotificationContract
{
    protected $fillable = [
        'type',
        'read',
<<<<<<< HEAD
        'order_id'
=======
        'order_id',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    ];

    /**
     * Get Order Details.
     */
    public function order()
    {
        return $this->belongsTo(OrderProxy::modelClass());
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
