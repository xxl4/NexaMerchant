<?php

namespace Webkul\Sales\Database\Factories;

<<<<<<< HEAD
use Webkul\Inventory\Models\InventorySource;
use Webkul\Sales\Models\OrderAddress;
use Webkul\Sales\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Sales\Models\OrderAddress;
use Webkul\Sales\Models\Shipment;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class ShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipment::class;

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
        $address = OrderAddress::factory()->create();

        return [
            'total_qty'           => $this->faker->numberBetween(1, 20),
            'order_id'            => $address->order_id,
            'order_address_id'    => $address->id,
            'inventory_source_id' => InventorySource::factory(),
        ];
    }
}
<<<<<<< HEAD

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
