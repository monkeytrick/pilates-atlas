<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Studio;
use App\Models\CountriesStudioCount;

class CountriesStudioCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                // Clear table first
            $rows = DB::table('countries')
                ->leftJoin('cities', 'cities.country_id', '=', 'countries.id')
                ->leftJoin('studios', 'studios.city_id', '=', 'cities.id')
                ->select('countries.id as country_id', DB::raw('COUNT(studios.id) as studio_count'))
                ->groupBy('countries.id')
                ->get();

            foreach ($rows as $row) {
                DB::table('countries_studio_counts')->insert([
                    'country_id'   => $row->country_id,
                    'count' => $row->studio_count,
                ]);
            }


    }
}
