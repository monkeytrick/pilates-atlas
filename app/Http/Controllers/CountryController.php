<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use App\Services\CityService;
use Illuminate\Http\Request;
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
    public function show_studios_for_country(Request $request, CountryService $country, CityService $city)
    {   
        // Get country ID from query parameters
        $country_id = $request->query('id');

        // Get country name or set default error message
        $countryName = Country::find($country_id);
        $countryName = $country ? $countryName->name : "Error with country name";

        // Get studios for the specified country
        $studios = $country->show_studios_by_country($country_id);

        // Get city names for dropdown
        $cities = $city->getCitiesByCountryId($country_id);


        return view('country', compact('studios', 'countryName', 'cities'));  

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
