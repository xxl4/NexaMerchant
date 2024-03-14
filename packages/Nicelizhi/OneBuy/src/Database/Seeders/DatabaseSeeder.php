<?php

namespace Nicelizhi\Onebuy\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Event;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ProductAttrTableSeeder::class);

    }
}
