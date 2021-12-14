<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $currency = 
            Currency::all()->count() > 3 
            ? Currency::inRandomOrder()->first()
            : Currency::factory()->create();
        $user = 
            User::all()->count() > 3
            ? User::inRandomOrder()->first()
            : User::factory()->create();

        return [
            'title' => $this->faker->paragraph(1),
            'description' => $this->faker->paragraph(1),
            'content' => $this->faker->paragraph(1),
            'location' => $this->faker->city(),
            'number_bedroom' => 1,
            'number_bathrooms' => 1,
            'number_floor' => 1,
            'square' => 1,
            'price' => 30,
            'currency_id' => $currency->id,
            'city_id' => 1,
            'period' => 'day',
            'user_id' => $user->id,
            'type_id' => 1,
            'created_at' => Carbon::now(),
        ];
    }
}
