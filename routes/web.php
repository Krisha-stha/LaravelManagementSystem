<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function(){
//     return view('home');
// });

Route::view('/home', 'home');

Route::view('/about', 'home');

Route::get('/about/{name}', function($name){
    echo $name;
    return view('about', ['name'=>$name]);
});

Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware(['auth', 'verified']) -> name('dashboard');

Route::middleware('auth', 'admin')->group(function(){
   
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/addcategory', [AdminController::class, 'addcategory'])->name('admin.addcategory');
    Route::post('/addcategory', [AdminController::class, 'postaddcategory'])->name('admin.postaddcategory');  
});


Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');       
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');     
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});

require __DIR__.'/auth.php';

