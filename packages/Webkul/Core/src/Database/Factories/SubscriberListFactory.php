<?php

namespace Webkul\Core\Database\Factories;

<<<<<<< HEAD
use Webkul\Core\Models\SubscribersList;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Core\Models\SubscribersList;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class SubscriberListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubscribersList::class;

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
            'email'         => $this->faker->safeEmail,
            'is_subscribed' => $this->faker->boolean,
            'channel_id'    => 1,
        ];
    }
}

=======
            'email'         => $this->faker->email,
            'channel_id'    => core()->getCurrentChannel()->id,
            'is_subscribed' => 1,
            'token'         => uniqid(),
        ];
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
