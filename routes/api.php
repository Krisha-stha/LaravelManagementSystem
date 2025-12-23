<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\StudentApiController;
use App\Http\Controllers\Api\CategoryApiController;

Route::get('/students', [StudentApiController::class, 'index']);
Route::get('/students/{id}', [StudentApiController::class, 'show']);
Route::post('/students', [StudentApiController::class, 'store']);
Route::put('/students/{id}', [StudentApiController::class, 'update']);
Route::delete('/students/{id}', [StudentApiController::class, 'destroy']);
Route::get('/students/search', [StudentApiController::class, 'search']); 

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/categories', [CategoryApiController::class, 'index']);
Route::get('/categories/{category}', [CategoryApiController::class, 'show']);
Route::post('/categories', [CategoryApiController::class, 'store']);
Route::put('/categories/{category}', [CategoryApiController::class, 'update']);
Route::delete('/categories/{category}', [CategoryApiController::class, 'destroy']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/{id}', [CartController::class, 'add']);
Route::patch('/cart/{id}/increase', [CartController::class, 'increase']);
Route::patch('/cart/{id}/decrease', [CartController::class, 'decrease']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);