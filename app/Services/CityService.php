<?php 

namespace App\Services;

use App\Models\City;
use Illuminate\Support\Facades\Log;

class CityService {

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
    
}