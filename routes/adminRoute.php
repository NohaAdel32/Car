<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;


Route::prefix('admin')->middleware('verified')->group(function () {

    //contact us
    
    Route::get('message', [ContactController::class,'index'])->name('message');
    Route::get('showMessage/{id}', [ContactController::class,'show']);
    Route::get('deleteMessage/{id}', [ContactController::class,'destroy']);

    //testimonials
    Route::get('addTesti', [TestimonialController::class,'create'])->name('addTesti');
    Route::post('storeTesti', [TestimonialController::class,'store'])->name('storeTesti');
    Route::get('Testi', [TestimonialController::class,'index'])->name('Testi');
    Route::get('updateTestimonial/{id}', [TestimonialController::class,'edit']);
    Route::put('updateTesti/{id}', [TestimonialController::class,'update'])->name('updateTesti');
    Route::get('deleteTestimonial/{id}', [TestimonialController::class,'destroy']);

    //categories
    Route::get('addCategory', [CategoryController::class,'create'])->name('addCategory');
    Route::post('storeCat', [CategoryController::class,'store'])->name('storeCat');
    Route::get('category', [CategoryController::class,'index'])->name('category');
    Route::get('updateCategory/{id}', [CategoryController::class,'edit']);
    Route::put('updateCat/{id}', [CategoryController::class,'update'])->name('updateCat');
    Route::get('deleteCategory/{id}', [CategoryController::class,'destroy']);

    //cars
    Route::get('addCar', [CarController::class,'create'])->name('addCar');
    Route::post('storeCar', [CarController::class,'store'])->name('storeCar');
    Route::get('car', [CarController::class,'index'])->name('car');
    Route::get('updateCar/{id}', [CarController::class,'edit']);
    Route::put('updateCars/{id}', [CarController::class,'update'])->name('updateCars');
    Route::get('deleteCar/{id}', [CarController::class,'destroy']);

    //users
    Route::get('addUser', [UserController::class,'create'])->name('addUser');
    Route::post('storeUser', [UserController::class,'store'])->name('storeUser');
    Route::get('user', [UserController::class,'index'])->name('user');
    Route::get('updateUser/{id}', [UserController::class,'edit']);
    Route::put('updateUs/{id}', [UserController::class,'update'])->name('updateUs');
});
Route::post('login', [LoginController::class, 'login'])->name('login');

Auth::routes(['verify'=>true]);

