<?php

namespace Webkul\Sales\Database\Factories;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\Factory;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Illuminate\Support\Facades\DB;
use Webkul\Core\Models\Channel;
use Webkul\Customer\Models\Customer;
use Webkul\Sales\Models\Order;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * @var string[]
     */
    protected $states = [
        'pending',
        'completed',
        'closed',
    ];

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
        $lastOrder = DB::table('orders')
            ->orderBy('id', 'desc')
            ->select('id')
            ->first()->id ?? 0;

<<<<<<< HEAD

        $customer = Customer::factory()->create();

=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        return [
            'increment_id'              => $lastOrder + 1,
            'status'                    => 'pending',
            'channel_name'              => 'Default',
            'is_guest'                  => 0,
<<<<<<< HEAD
            'customer_id'               => $customer->id,
            'customer_email'            => $customer->email,
            'customer_first_name'       => $customer->first_name,
            'customer_last_name'        => $customer->last_name,
=======
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'is_gift'                   => 0,
            'total_item_count'          => 1,
            'total_qty_ordered'         => 1,
            'base_currency_code'        => 'EUR',
            'channel_currency_code'     => 'EUR',
            'order_currency_code'       => 'EUR',
<<<<<<< HEAD
            'grand_total'               => 0.0000,
            'base_grand_total'          => 0.0000,
            'grand_total_invoiced'      => 0.0000,
            'base_grand_total_invoiced' => 0.0000,
            'grand_total_refunded'      => 0.0000,
            'base_grand_total_refunded' => 0.0000,
            'sub_total'                 => 0.0000,
            'base_sub_total'            => 0.0000,
            'sub_total_invoiced'        => 0.0000,
            'base_sub_total_invoiced'   => 0.0000,
            'sub_total_refunded'        => 0.0000,
            'base_sub_total_refunded'   => 0.0000,
=======
            'grand_total'               => $grandTotal = rand(0, 9999),
            'base_grand_total'          => $grandTotal,
            'grand_total_invoiced'      => $grandTotal,
            'base_grand_total_invoiced' => $grandTotal,
            'grand_total_refunded'      => $grandTotal,
            'sub_total'                 => $grandTotal,
            'base_sub_total'            => $grandTotal,
            'sub_total_invoiced'        => $grandTotal,
            'base_sub_total_invoiced'   => $grandTotal,
            'sub_total_refunded'        => $grandTotal,
            'base_sub_total_refunded'   => $grandTotal,
            'base_grand_total_refunded' => 0.0000,
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'customer_type'             => Customer::class,
            'channel_id'                => 1,
            'channel_type'              => Channel::class,
            'cart_id'                   => 0,
            'shipping_method'           => 'free_free',
            'shipping_title'            => 'Free Shipping',
        ];
    }

    public function pending(): OrderFactory
    {
<<<<<<< HEAD
        return $this->state(function (array $attributes) {
=======
        return $this->state(function () {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            return [
                'status' => 'pending',
            ];
        });
    }

    public function completed(): OrderFactory
    {
<<<<<<< HEAD
        return $this->state(function (array $attributes) {
=======
        return $this->state(function () {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            return [
                'status' => 'completed',
            ];
        });
    }

    public function closed(): OrderFactory
    {
<<<<<<< HEAD
        return $this->state(function (array $attributes) {
=======
        return $this->state(function () {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            return [
                'status' => 'closed',
            ];
        });
    }
}
