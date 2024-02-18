<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController; 
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/', [IndexController::class,'home'])->name('index');
Route::get('listing', [IndexController::class,'listing'])->name('listing');
Route::get('testimonial', [IndexController::class,'testimonial'])->name('testimonial');
Route::get('blog', [IndexController::class,'blog'])->name('blog');
Route::get('about', [IndexController::class,'about'])->name('about');
Route::get('contact', [ContactController::class,'create'])->name('contact');
Route::post('contact_mail', [ContactController::class,'store'])->name('contact_mail');
Route::get('single/{id}', [CarController::class,'show'])->name('single');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
Route::get('/register', function () {
   return view('auth.register');
})->name('register');

Route::get('/login', function () {
  return view('auth.login');
})->name('login');