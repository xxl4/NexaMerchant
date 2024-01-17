<?php

namespace Webkul\Core\Database\Factories;

<<<<<<< HEAD
use Faker\Generator as Faker;
use Webkul\Core\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Core\Models\Currency;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class CurrencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Currency::class;

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
            'code' => $this->faker->unique()->currencyCode,
            'name' => $this->faker->word,
        ];
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
