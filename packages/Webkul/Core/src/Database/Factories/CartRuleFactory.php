<?php

namespace Webkul\Core\Database\Factories;

<<<<<<< HEAD
use Illuminate\Support\Str;
use Webkul\CartRule\Models\CartRule;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Webkul\CartRule\Models\CartRule;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CartRuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CartRule::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     */
    public function definition(): array
    {
        return [
<<<<<<< HEAD
            'name' => Str::uuid(),
=======
            'name'                      => Str::uuid(),
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'description'               => $this->faker->sentence(),
            'starts_from'               => null,
            'ends_till'                 => null,
            'coupon_type'               => '1',
            'use_auto_generation'       => '0',
            'usage_per_customer'        => '100',
            'uses_per_coupon'           => '100',
            'times_used'                => '0',
            'condition_type'            => '2',
            'end_other_rules'           => '0',
            'uses_attribute_conditions' => '0',
            'discount_quantity'         => '0',
            'discount_step'             => '0',
            'apply_to_shipping'         => '0',
            'free_shipping'             => '0',
            'sort_order'                => '0',
            'status'                    => '1',
            'conditions'                => null,
        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
