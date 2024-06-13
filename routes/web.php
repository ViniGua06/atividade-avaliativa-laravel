<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirplaneController;

Route::get('/', [AirplaneController::class, "index"])->name("home");
Route::get('/planes', [AirplaneController::class, "get"])->name("planes");
Route::get('/createplanes', [AirplaneController::class, "form"])->name("formplanes");
Route::post('/planes', [AirplaneController::class, "create"])->name("createPlanes");
Route::delete('/planes/{plane}', [AirplaneController::class, "destroy"])->name("remove");
