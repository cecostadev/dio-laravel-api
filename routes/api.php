<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Band Routes
|--------------------------------------------------------------------------
|
*/
Route::get('bands', ['App\Http\Controllers\BandsController', 'getBands']);
Route::get('bands/{id}', ['App\Http\Controllers\BandsController', 'getBandById']);
Route::post('bands', ['App\Http\Controllers\BandsController', 'store']);
Route::delete('bands/{id}', ['App\Http\Controllers\BandsController', 'delete']);