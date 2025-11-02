<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Studio;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    //
    public function show_studios(Request $request) 
    {
        //
        Log::info("showCity called with id: " . $request->query('id'));

        $id = $request->query('id');

        $city = City::find($id)->name;

        Log::info("City is " . $city);
        
        if (!$city) {
            Log::warning("City not found with id: " . $id);
            // Handle city not found, e.g., redirect or show error
            return;
        }

        // Retrieve studios by city ID
        $studios = Studio::whereHas('city', function ($query) use ($id) {    
            $query->where('id', $id);
        })->with('city')->get();

        Log::info("Number of studios found: " . $studios->count());

        return view('city', compact('studios', 'city'));    
    }
}
