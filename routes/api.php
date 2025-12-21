<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentApiController;

Route::get('/students', [StudentApiController::class, 'index']);
Route::get('/students/{id}', [StudentApiController::class, 'show']);
Route::post('/students', [StudentApiController::class, 'store']);
Route::put('/students/{id}', [StudentApiController::class, 'update']);
Route::delete('/students/{id}', [StudentApiController::class, 'destroy']);
Route::get('/students/search', [StudentApiController::class, 'search']); 

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// api/V1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
});