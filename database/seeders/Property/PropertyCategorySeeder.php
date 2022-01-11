<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Apartman', 'Daire', 'Villa', 'Dukkan', 'şüğçe'];
        foreach($categories as $category ){
            PropertyCategory::factory()->create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
        
        
        
    }
}
