<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $countries = [
            "USA",          // New York, Brooklyn, Los Angeles, San Francisco, Chicago
            "UK",           // London
            "France",       // Paris
            "Japan",        // Tokyo
            "Australia",    // Sydney
            "Germany",      // Berlin
            "Canada",       // Toronto
            "Spain",        // Barcelona
            "Italy",        // Rome
            "Netherlands",  // Amsterdam
            "Singapore",    // Singapore
            "Hong Kong",    // Hong Kong
            "UAE"           // Dubai
        ];

        foreach($countries as $country_name) {
            Country::factory()->create([
                'name' => $country_name
            ]);     
        }
    }
}
