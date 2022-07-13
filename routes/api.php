<?php

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

Route::post('zip-codes/import/txt', ZipCodes\ImportFromTxtController::class);
Route::get('zip-codes/{zip_code}', ZipCodes\GetZipCodeController::class)->where('zip_code', '[0-9]+');