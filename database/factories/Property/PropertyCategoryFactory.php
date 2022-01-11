<?php

namespace Database\Factories\Property;

use App\Models\Property\PropertyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyCategoryFactory extends Factory
{
  

    protected $model = PropertyCategory::class;

    public function definition()
    {
        return [
            
            'name' => 'Apartman',
            'slug' => 'Apartman',
            'description' => $this->faker->paragraph(1),

        ];
    }
}
