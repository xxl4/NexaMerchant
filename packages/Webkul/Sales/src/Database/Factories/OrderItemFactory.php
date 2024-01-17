<?php

namespace Webkul\Sales\Database\Factories;

<<<<<<< HEAD
use Webkul\Sales\Models\Order;
use Webkul\Product\Models\Product;
use Webkul\Sales\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Product\Models\Product;
use Webkul\Sales\Models\OrderItem;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array
     */
    public function definition(): array
    {
        $now = date("Y-m-d H:i:s");

        if (isset($attributes['product_id'])) {
            $product = Product::query()
                ->where('id', $attributes['product_id'])
                ->first();
        } else {
            $product = Product::factory()
                ->simple()
                ->create();
        }
=======
     */
    public function definition(): array
    {
        $now = date('Y-m-d H:i:s');
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        $fallbackPrice = $this->faker->randomFloat(4, 0, 1000);

        return [
<<<<<<< HEAD
            'sku'          => $product->sku,
            'type'         => $product->type,
            'name'         => $product->name,
            'price'        => $product->price ?? $fallbackPrice,
            'base_price'   => $product->price ?? $fallbackPrice,
            'total'        => $product->price ?? $fallbackPrice,
            'base_total'   => $product->price ?? $fallbackPrice,
            'product_id'   => $product->id,
=======
            'price'        => $fallbackPrice,
            'base_price'   => $fallbackPrice,
            'total'        => $fallbackPrice,
            'base_total'   => $fallbackPrice,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'qty_ordered'  => 1,
            'qty_shipped'  => 0,
            'qty_invoiced' => 0,
            'qty_canceled' => 0,
            'qty_refunded' => 0,
            'additional'   => [],
<<<<<<< HEAD
            'order_id'     => Order::factory(),
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'created_at'   => $now,
            'updated_at'   => $now,
            'product_type' => Product::class,
        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
