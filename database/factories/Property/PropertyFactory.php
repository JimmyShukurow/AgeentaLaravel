<?php

namespace Database\Factories\Property;

use App\Models\Currency;
use App\Models\Property\Property;
use App\Models\Property\PropertyCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    
    protected $model = Property::class;

    public function definition()
    {
        $currency = 
            Currency::all()->count() > 1 
            ? Currency::inRandomOrder()->first()
            : $this->makeCurrency();
        $user = 
            User::all()->count() > 3
            ? User::inRandomOrder()->first()
            : User::factory()->create();

        return [
            'title' => $this->faker->paragraph(1),
            'slug' => 'test',
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

    public function makeCurrency()
    {
        $currencies = [ 'USD' => '$',  'TL' => '₺'];
        foreach( $currencies as $title => $symbol){
            Currency::factory()->create([
                'title' => $title,
                'slug' => Str::slug($title),
                'symbol' => $symbol,
                ]
            );
        }

        return Currency::inRandomOrder()->first();
    }
}
