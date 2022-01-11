<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CurrencySeeder extends Seeder
{
   
    public function run()
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
            
    }
}
