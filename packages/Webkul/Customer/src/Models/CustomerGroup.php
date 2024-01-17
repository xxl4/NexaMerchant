<?php

namespace Webkul\Customer\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Customer\Database\Factories\CustomerGroupFactory;
use Webkul\Customer\Contracts\CustomerGroup as CustomerGroupContract;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Webkul\Customer\Contracts\CustomerGroup as CustomerGroupContract;
use Webkul\Customer\Database\Factories\CustomerGroupFactory;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CustomerGroup extends Model implements CustomerGroupContract
{
    use HasFactory;

    protected $table = 'customer_groups';

    protected $fillable = [
        'name',
        'code',
        'is_user_defined',
    ];

    /**
     * Get the customers for this group.
     */
    public function customers(): HasMany
    {
        return $this->hasMany(CustomerProxy::modelClass());
    }

    /**
     * Create a new factory instance for the model
<<<<<<< HEAD
     *
     * @return Factory
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected static function newFactory(): Factory
    {
        return CustomerGroupFactory::new();
    }
}
