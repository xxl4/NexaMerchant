<?php

namespace Webkul\Sales\Database\Factories;

use Webkul\Sales\Models\OrderDispute;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDisputeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderDispute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'method' => 'cashondelivery',
        ];
    }
}

