<?php

namespace Webkul\Sales\Database\Factories;

<<<<<<< HEAD
use Webkul\Sales\Models\OrderPayment;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Sales\Models\OrderPayment;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class OrderPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderPayment::class;

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
            'method' => 'cashondelivery',
        ];
    }
}
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
