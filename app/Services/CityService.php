<?php 

namespace App\Services;

use App\Models\City;
use App\Models\Studio;
use Illuminate\Support\Facades\Log;

class CityService {

    public function show_city_name($city_id) {
        try {
           Log::info("Retrieving city for ID: " . $city_id);
            $city = City::find($city_id, ['name'])->name;

            Log::info("City found: " . $city);

            return $city;
        } 
        catch (\Exception $e) {

            Log::error("Error retrieving city for ID {$city_id}: " . $e->getMessage());
            return collect();

        }


    }



         // Retrieve cities by country ID (foreign key)
    public function getCitiesByCountryId($country_id)
    {
        try {
            $cities = City::where('country_id', $country_id)
                ->orderBy('name')
                ->get(['id', 'name']);

            Log::info("Number of cities found: " . $cities->count());

            return $cities;
        } 
        catch (\Exception $e) {
            Log::error("Error retrieving cities for country ID {$country_id}: " . $e->getMessage());
            return collect();
        }
    }
        // Retrieve studios by city ID
    public function show_studios_for_city($city_id)
    {
        try {
            return Studio::whereHas('city', function ($query) use ($city_id) {
                $query->where('id', $city_id);
            })
            ->with(['city:id,name'])
            ->paginate(10);
        } catch (\Exception $e) {
            Log::error("Error retrieving studios for city ID " . $city_id . ": " . $e->getMessage());
            return collect();
        }
    }
    
}