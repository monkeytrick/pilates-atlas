<?php

namespace App\Http\Controllers;

use App\Services\StudioService;
use App\Services\CountryService;
use App\Models\Studio;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudioViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StudioService $studios, CountryService $countries)
    {
        // Retrieve all studios with their associated city (separare table) using foreign key relationship
        $studios = $studios->show_all();

        // Retrieve countries that have at least one associated studio
        $countries = $countries->show_countries_with_studios();

        return view('index', compact('studios', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display a listing for a city.
     */
    public function showCity(Request $request) 
    {
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
