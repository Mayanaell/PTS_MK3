<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\pembayaranController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('pelanggan', PelangganController::class);
Route::apiResource('room', KamarController::class);
Route::apiResource('pembayaran', pembayaranController::class);