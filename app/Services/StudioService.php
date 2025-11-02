<?php 

namespace App\Services;

use App\Models\Studio;
use Illuminate\Support\Facades\Log;

class StudioService
{   

    public function show_all()
    {
        // Retrieve all studios with their associated city (separare table) 
        // using foreign key relationship
        try {

            return Studio::with('city:id,name')->get();

        } catch (\Exception $e) {
            // Handle exception, e.g., log error
            Log::error("Error retrieving studios: " . $e->getMessage());

             // Return an empty collection so the app doesn't crash
            return collect();
        }
    }

    // This class can be used to encapsulate studio-related business logic
    public function getStudiosWithCities()
    {
        // Logic to retrieve studios with their associated cities can be implemented here
    }

    public function getCountriesWithStudios()
    {
        // Logic to retrieve countries that have at least one associated studio can be implemented here
    }
}