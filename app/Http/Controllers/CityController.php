<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Studio;  
use Illuminate\Http\Request;
use App\Services\CityService;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    protected $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    // May be used several times to get city name by ID
    public function show_cityName($id) {

        return $this->cityService->show_city_name($id);
    }

    public function show_studios_for_city(Request $request)
    {
        Log::info("show_studios_for_city called with id: " . $request->query('id'));
        
        $studios = $this->cityService->show_studios_for_city($request->query('id'));

        $cityName = $this->show_cityName($request->query('id')); 

        return view('city-results', compact('studios', 'cityName'));
 
    }
}
