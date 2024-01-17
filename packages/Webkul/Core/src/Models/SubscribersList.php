<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Webkul\Customer\Models\CustomerProxy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Database\Factories\SubscriberListFactory;
use Webkul\Core\Contracts\SubscribersList as SubscribersListContract;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Core\Contracts\SubscribersList as SubscribersListContract;
use Webkul\Core\Database\Factories\SubscriberListFactory;
use Webkul\Customer\Models\CustomerProxy;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class SubscribersList extends Model implements SubscribersListContract
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    protected $table = 'subscribers_list';

    protected $fillable = [
        'email',
        'is_subscribed',
        'token',
        'customer_id',
        'channel_id',
    ];

    protected $hidden = ['token'];

    /**
     * Get the customer associated with the subscription.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(CustomerProxy::modelClass());
    }

    /**
     * Create a new factory instance for the model.
<<<<<<< HEAD
     *
     * @return Factory
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected static function newFactory(): Factory
    {
        return SubscriberListFactory::new();
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
