<?php

namespace Webkul\Customer\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
<<<<<<< HEAD
use Webkul\Core\Models\Channel;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Models\Wishlist;
use Webkul\Product\Models\Product;
=======
use Webkul\Customer\Models\Wishlist;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CustomerWishlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wishlist::class;

    /**
     * Define the model's default state.
     *
<<<<<<< HEAD
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @throws \Exception
     */
    public function definition(): array
    {
<<<<<<< HEAD
        return [
            'channel_id'  => Channel::factory(),
            'product_id'  => Product::factory(),
            'customer_id' => Customer::factory(),
        ];
=======
        return [];
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
    }
}
