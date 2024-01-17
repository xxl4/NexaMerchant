<?php

namespace Webkul\Sales\Database\Factories;

<<<<<<< HEAD
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Models\CustomerAddress;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Sales\Models\Order;
use Webkul\Sales\Models\OrderAddress;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class OrderAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderAddress::class;

    /**
     * @var string[]
     */
    protected $states = [
        'shipping',
    ];

    /**
     * Define the model's default state.
<<<<<<< HEAD
     *
     * @return array
     */
    public function definition(): array
    {
        $customer = Customer::factory()->create();

        $customerAddress = CustomerAddress::factory()->make();

        return [
            'first_name'   => $customer->first_name,
            'last_name'    => $customer->last_name,
            'email'        => $customer->email,
            'address1'     => $customerAddress->address1,
            'country'      => $customerAddress->country,
            'state'        => $customerAddress->state,
            'city'         => $customerAddress->city,
            'postcode'     => $customerAddress->postcode,
            'phone'        => $customerAddress->phone,
=======
     */
    public function definition(): array
    {
        return [
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            'address_type' => OrderAddress::ADDRESS_TYPE_BILLING,
            'order_id'     => Order::factory(),
        ];
    }

    public function shipping(): void
    {
<<<<<<< HEAD
        $this->state(function (array $attributes) {
=======
        $this->state(function () {
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
            return [
                'address_type' => OrderAddress::ADDRESS_TYPE_SHIPPING,
            ];
        });
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
