<?php

namespace Webkul\Customer\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Webkul\Core\Models\Address;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Customer\Database\Factories\CustomerAddressFactory;
use Webkul\Customer\Contracts\CustomerAddress as CustomerAddressContract;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Webkul\Core\Models\Address;
use Webkul\Customer\Contracts\CustomerAddress as CustomerAddressContract;
use Webkul\Customer\Database\Factories\CustomerAddressFactory;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CustomerAddress extends Address implements CustomerAddressContract
{
    use HasFactory;

    public const ADDRESS_TYPE = 'customer';

    /**
     * @var array default values
     */
    protected $attributes = [
        'address_type' => self::ADDRESS_TYPE,
    ];

    /**
     * The "booted" method of the model.
<<<<<<< HEAD
     *
     * @return void
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    protected static function boot(): void
    {
        static::addGlobalScope('address_type', static function (Builder $builder) {
            $builder->where('address_type', self::ADDRESS_TYPE);
        });

        parent::boot();
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
        return CustomerAddressFactory::new();
    }
}
