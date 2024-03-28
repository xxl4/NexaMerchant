<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Nicelizhi\Manage\Database\Seeders\DatabaseSeeder as BagistoDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BagistoDatabaseSeeder::class);
    }
}
