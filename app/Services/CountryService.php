<?php 

namespace App\Services;
use App\Models\CountriesStudioCount;
use App\Models\Studio;
use Illuminate\Support\Facades\Log;

class CountryService
{   
        // Retrieve names and ids of only countries with studios
    public function show_countries_with_studios()
    {   
        // country_id (foreign key) is pulled from CountriesStudioCount table and name
        // of country is pulled from Country table using relationship ('with' method)       
       try {
            return CountriesStudioCount::with('country:id,name')
                ->where('count', '>', 0)
                ->get()
                ->pluck('country');
            }

        catch (\Exception $e) {
            // Handle exception, e.g., log error   
            Log::error("Error retrieving countries with studios: " . $e->getMessage());
            // Deal with before deplyoyment
            return collect();
        }

    }

        // Retrieve studios by country ID  
    public function show_studios_by_country($country_id)
    { 
        try {

            return Studio::whereHas('city.country', function ($query) use ($country_id) {    
                $query->where('id', $country_id);})
                       ->with(['city.country:id,name'])
                       ->paginate(10);

        } catch (\Exception $e) {
            // Handle exception, e.g., log error
            Log::error("Error retrieving studios for country ID " . $country_id . ": " . $e->getMessage());
            return collect();
        }
    }

    // This class can be used to encapsulate country-related business logic
    public function getCountryNameById($id)
    {
        // Logic to retrieve country name by ID can be implemented here
    }
    public function getStudiosByCountryId($id)
    {
        // Logic to retrieve studios by country ID can be implemented here
    }

}