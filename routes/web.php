<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirplaneController;

Route::get('/', [AirplaneController::class, "index"])->name("home");
Route::get('/pageplanes/{page}', [AirplaneController::class, "get"])->name("page");
Route::get('/createplanes', [AirplaneController::class, "form"])->name("formplanes");
Route::post('/planes', [AirplaneController::class, "create"])->name("createPlanes");
Route::delete('/planes/{plane}', [AirplaneController::class, "destroy"])->name("remove");
Route::get('/{id}/edit', [AirplaneController::class, "goToUpdateForm"])->name("formupdate");
Route::put('/planes/{plane}', [AirplaneController::class, "update"])->name("updatePlane");