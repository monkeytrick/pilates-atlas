<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController; 
use App\Http\Controllers\CityController;
use App\Http\Controllers\StudioViewController;

Route::get('/', [StudioViewController::class, 'index'])->name('home');

// Return studios for a specific country
Route::get('/country', [CountryController::class, 'show_studios_for_country'])->name('country.show_studios');

// Return studios for a specific city   
Route::get('/city', [CityController::class, 'show_studios_for_city'])->name('city.show_studios');

//Test results are returned for all countries.


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
