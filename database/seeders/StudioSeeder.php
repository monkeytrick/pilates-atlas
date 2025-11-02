<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Studio;
use App\Models\City;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $studios = require database_path('studio-data.php');

        foreach ($studios as $studio) {

            $city = City::firstOrCreate(['name' => trim($studio['city'])]);

            Studio::create([
                'name' => $studio['name'],
                'description' => $studio['description'],
                'area' => $studio['area'],
                'city_id' => $city->id,
                'website' => $studio['website'],
            ]);
        }


    }
}
