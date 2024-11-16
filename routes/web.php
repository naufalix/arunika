<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\DashCity;
use App\Http\Controllers\Dashboard\DashCultural;
use App\Http\Controllers\Dashboard\DashEncyclopedia;
use App\Http\Controllers\Dashboard\DashHome;
use App\Http\Controllers\Dashboard\DashTestimonial;
use App\Http\Controllers\Dashboard\DashTourism;
use App\Http\Controllers\Auth\AuthController;

// HOMEPAGE
Route::get('/', [HomeController::class, 'index']);

// ADMIN AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// ADMIN PAGE
Route::group(['prefix'=> 'dashboard','middleware'=>['auth']], function(){
  Route::get('/', [DashHome::class, 'index']);
  Route::get('/city', [DashCity::class, 'index']);
  Route::get('/cultural', [DashCultural::class, 'index']);
  Route::get('/dashboard', [DashHome::class, 'index']);
  Route::get('/encyclopedia', [DashEncyclopedia::class, 'index']);
  Route::get('/testimonial', [DashTestimonial::class, 'index']);
  Route::get('/tourism', [DashTourism::class, 'index']);
  
  Route::post('/city', [DashCity::class, 'postHandler']);
  Route::post('/cultural', [DashCultural::class, 'postHandler']);
  Route::post('/encyclopedia', [DashEncyclopedia::class, 'postHandler']);
  Route::post('/testimonial', [DashTestimonial::class, 'postHandler']);
  Route::post('/tourism', [DashTourism::class, 'postHandler']);
});

// API
Route::group(['prefix'=> 'api'], function(){
  Route::get('cities', [APIController::class, 'cities']);
  Route::get('city/{city:id}', [APIController::class, 'city']);
  Route::get('cultural/{cultural:id}', [APIController::class, 'cultural']);
  Route::get('encyclopedia/{encyclopedia:id}', [APIController::class, 'encyclopedia']);
  Route::get('testimonial/{testimonial:id}', [APIController::class, 'testimonial']);
  Route::get('tourism/{tourism:id}', [APIController::class, 'tourism']);
  
});
