<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/general', [\App\Http\Controllers\GeneralController::class, 'index']);

Route::delete('/inspection/force/{id}', [\App\Http\Controllers\InspectionController::class, 'destroyForce']);

Route::apiResource('inspection', \App\Http\Controllers\InspectionController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
