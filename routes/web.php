<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/divisional-secretariats', [HomeController::class, 'divisionalSecretariats']);
Route::get('/local-authorities', [HomeController::class, 'localAuthorities']);
Route::get('/local-hospitals', [HomeController::class, 'localHospitals']);
Route::get('/gn-divisions', [HomeController::class, 'gnDivisions']);
Route::get('/documentation', [HomeController::class, 'documentation']);

Route::prefix('get')->group(function () {
    Route::get('/faculty/university/{name}', [HomeController::class, 'getFaculties']);
    Route::get('/degree/faculty/{name}', [HomeController::class, 'getDegrees']);
    Route::get('/district/province/{name}', [HomeController::class, 'getDivisionalSecretariatsDistricts']);
    Route::get('/authority/district/{name}', [HomeController::class, 'getDivisionalSecretariatAuthority']);
    
    Route::get('/local/district/province/{name}', [HomeController::class, 'getLocalAuthoritiesDistricts']);
    Route::get('/local/authority/district/{name}', [HomeController::class, 'getLocalAuthoritiesAuthority']);
    Route::get('/local/district/province/{name}', [HomeController::class, 'getLocalHospitalsDistricts']);
    Route::get('/local/authority/district/{name}', [HomeController::class, 'getLocalHospitals']);
    Route::get('/local/district/{name}', [HomeController::class, 'getDivisionalSecretariats']);
    Route::get('/local/secretariat/{name}', [HomeController::class, 'getDivisions']);
});


