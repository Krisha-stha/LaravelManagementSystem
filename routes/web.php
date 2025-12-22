<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProductController;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::post('/upload', [HomeController::class, 'upload']);

Route::get('/view', [HomeController::class, 'view']);

Route::get('/delete/{id}', [HomeController::class, 'delete']);

Route::get('/update_view/{id}', [HomeController::class, 'update_view']);

Route::post('/update/{id}', [HomeController::class, 'update']);

Route::get('/search', [HomeController::class,'search']);

Route::get('/editcategory/{id}', [AdminController::class, 'editCategory'])->name('admin.editcategory');

Route::put('/updatecategory/{id}', [AdminController::class, 'updateCategory'])->name('admin.updatecategory');

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/', [HomeController::class, 'welcome']);

Route::get('/dashboard', [UserController::class, 'Dashboard'])->middleware(['auth', 'verified']) -> name('dashboard');

Route::middleware(['auth', 'admin'])->group(function(){
  Route::get('/addcategory', [AdminController::class, 'addcategory'])->name('admin.addcategory');
  Route::post('/addcategory', [AdminController::class, 'postaddcategory'])->name('admin.postaddcategory'); 
  Route::get('/admin/view-category', [AdminController::class, 'viewCategory'])
    ->name('admin.viewcategory');

  Route::get('/editcategory/{id}', [AdminController::class, 'editCategory'])->name('admin.editcategory');
  Route::put('/updatecategory/{id}', [AdminController::class, 'updateCategory'])->name('admin.updatecategory');
  Route::delete('/deletecategory/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deletecategory');
 
});

Route::middleware('auth')->group(function(){
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');       
  Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');     
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});



require __DIR__.'/auth.php';

