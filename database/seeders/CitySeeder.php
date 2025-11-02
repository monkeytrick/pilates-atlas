<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Country;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
        //
        $cities = [
            "New York" => "USA",
            "Brooklyn" => "USA",
            "Los Angeles" => "USA",
            "London" => "UK",
            "Paris" => "France",
            "Tokyo" => "Japan",
            "Sydney" => "Australia",
            "Berlin" => "Germany",
            "Toronto" => "Canada",
            "San Francisco" => "USA",
            "Chicago" => "USA",
            "Barcelona" => "Spain",
            "Rome" => "Italy",
            "Amsterdam" => "Netherlands",
            "Singapore" => "Singapore",
            "Hong Kong" => "Hong Kong",
            "Dubai" => "UAE"
        ];

        foreach($cities as $city => $country) {

            // Get country id from countries table
            $country = Country::where('name', $country)->first();

            City::factory()->create([
                'name' => $city,
                'country_id' => $country->id
            ]);     
        }
    }
}
