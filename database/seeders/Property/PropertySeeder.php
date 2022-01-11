<?php

namespace Database\Seeders\Property;

use App\Models\Property\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory()->count(10)->create();
    }
}
