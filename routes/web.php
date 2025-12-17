<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/dashbaord', [UserController::class, 'dashbaord'])->middleware(['auth', 'verified']) -> name('dashboard');

Route::get('/', function () {
    return view('welcome');
});
