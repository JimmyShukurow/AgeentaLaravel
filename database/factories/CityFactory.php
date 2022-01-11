<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CityFactory extends Factory
{
    
    public function definition()
    {
        $city = $this->faker->city();
        return [
            'name' => $city,
            'slug' => Str::slug($city),
            'state_id' => rand(1,10),
            'country_id' => rand(1,10),
        ];
    }
}
