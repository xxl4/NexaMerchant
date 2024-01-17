<?php

namespace Webkul\Core\Database\Factories;

<<<<<<< HEAD
use Webkul\Core\Models\Locale;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Core\Models\Locale;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class LocaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Locale::class;

    /**
     * @var string[]
     */
    protected $states = [
        'rtl',
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
        do {
            $languageCode = $this->faker->languageCode;
        } while (Locale::query()
<<<<<<< HEAD
                       ->where('code', $languageCode)
                       ->exists());
=======
            ->where('code', $languageCode)
            ->exists());
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

        return [
            'code'      => $languageCode,
            'name'      => $this->faker->country,
            'direction' => 'ltr',
        ];
    }

    public function rtl(): LocaleFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'direction' => 'rtl',
            ];
        });
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
