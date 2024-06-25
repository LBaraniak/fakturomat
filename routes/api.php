<?php

use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\RatesController;
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

Route::get('/rates/', [RatesController::class, 'getRates']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/klienci', [CustomersController::class, 'index']);
Route::middleware('auth:sanctum')->get('/klienci/{customer}', [CustomersController::class, 'show']);
Route::middleware('auth:sanctum')->post('/klienci/zapisz', [CustomersController::class, 'store']);
Route::middleware('auth:sanctum')->put('/klienci/zmien/{id}', [CustomersController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/klienci/usun/{customer}', [CustomersController::class, 'destroy']);
