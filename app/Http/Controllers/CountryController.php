<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Studio;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

        /**
     * Display a listing of the resource.
     */
    public function show_studios(Request $request) 
    {

        Log::info("showCountry called with id: " . $request->query('id'));

        $id = $request->query('id');

        $country = Country::find($id)->name;

        Log::info("Country is " . $country);
        
        if (!$country) {
            Log::warning("Country not found with id: " . $id);
            // Handle country not found, e.g., redirect or show error
            return;
        }

        // Retrieve studios by country ID
        $studios = Studio::whereHas('city.country', function ($query) use ($id) {    
            $query->where('id', $id);
            })
            ->with('city')
            ->paginate(10)
            ->appends(['id' => $id]); // Preserve query parameter in pagination links
        
        // Cities for dropdown
        $cities = City::where('country_id', $id)
                 ->orderBy('name')
                 ->get(['id', 'name']);

        Log::info("Number of studios found: " . $studios->count());

        return view('country', compact('studios', 'country', 'cities'));  
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
