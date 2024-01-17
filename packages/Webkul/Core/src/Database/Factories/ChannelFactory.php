<?php

namespace Webkul\Core\Database\Factories;

<<<<<<< HEAD
use Faker\Generator as Faker;
use Webkul\Category\Models\Category;
use Webkul\Core\Models\Channel;
use Webkul\Core\Models\Currency;
use Webkul\Core\Models\Locale;
use Illuminate\Database\Eloquent\Factories\Factory;
=======
use Illuminate\Database\Eloquent\Factories\Factory;
use Webkul\Core\Models\Channel;
use Webkul\Core\Models\Currency;
use Webkul\Core\Models\Locale;
use Webkul\Inventory\Models\InventorySource;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61

class ChannelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Channel::class;

    /**
<<<<<<< HEAD
     * Define the model's default state.
     *
     * @return array
=======
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->hasAttached(Currency::inRandomOrder()->limit(1)->get())
            ->hasAttached(Locale::inRandomOrder()->limit(1)->get())
            ->hasAttached(InventorySource::inRandomOrder()->limit(1)->get(), [], 'inventory_sources')
            ->hasTranslations();
    }

    /**
     * Define the model's default state.
     *
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
     * @throws \JsonException
     */
    public function definition(): array
    {
<<<<<<< HEAD
        $seoTitle = $this->faker->word;
        $seoDescription = $this->faker->words(10, true);
        $seoKeywords = $this->faker->words(3, true);

        $seoData = [
            'meta_title'       => $seoTitle,
            'meta_description' => $seoDescription,
            'meta_keywords'    => $seoKeywords,
        ];

        return [
            'code'              => $this->faker->unique()->word,
            'name'              => $this->faker->word,
            'default_locale_id' => Locale::factory(),
            'base_currency_id'  => Currency::factory(),
            'root_category_id'  => Category::factory(),
            'home_seo'          => json_encode($seoData, JSON_THROW_ON_ERROR),
        ];
    }
}
=======
        return [
            'code'              => $code = $this->faker->unique()->word(),
            'theme'             => $code,
            'hostname'          => 'http://' . $this->faker->ipv4(),
            'root_category_id'  => 1,
            'default_locale_id' => 1,
            'base_currency_id'  => 1,
        ];
    }
}
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
