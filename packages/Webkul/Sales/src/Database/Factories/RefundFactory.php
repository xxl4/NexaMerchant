<?php

namespace Webkul\Sales\Database\Factories;

<<<<<<< HEAD
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\Refund;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\Refund;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class RefundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Refund::class;

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
            'order_id' => Order::factory(),
        ];
    }
}
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
