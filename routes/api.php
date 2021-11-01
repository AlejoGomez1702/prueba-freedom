<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CorralController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/animals', [AnimalController::class, 'createAnimal']);
Route::post('/corrals', [CorralController::class, 'createCorral']);
Route::get('/corrals', [CorralController::class, 'getAllCorrals']);
Route::get('/corrals/{id}/avg', [CorralController::class, 'getAnimalsAvg']);






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
