<?php

namespace Database\Seeders;

use Database\Seeders\Property\PropertyCategorySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\Property\PropertySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PropertySeeder::class,
            // CurrencySeeder::class,
            PropertyCategorySeeder::class,
            CitySeeder::class,
        ]);
    }

}
