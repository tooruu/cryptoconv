<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CryptoConverterController;
use App\Http\Controllers\Api\V1\CurrencyController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::get('/get-btc-value/{coin}', [CryptoConverterController::class, 'getBtcValue']);
    Route::apiResource('/currencies', CurrencyController::class);
});
