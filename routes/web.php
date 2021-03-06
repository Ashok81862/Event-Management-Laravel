<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [\App\Http\Controllers\SiteController::class , 'index'])->name('index');

Route::get('/home',[\App\Http\Controllers\SiteController::class, 'home'])->middleware('auth');


Route::middleware([ 'admin',])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('password', [\App\Http\Controllers\Admin\AdminController::class, 'password']);

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::resource('speakers', \App\Http\Controllers\Admin\SpeakerController::class);

    Route::resource('schedules', \App\Http\Controllers\Admin\ScheduleController::class);

    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);

    Route::resource('amenities', \App\Http\Controllers\Admin\AmenitiesController::class);

    Route::resource('sponsors', \App\Http\Controllers\Admin\SponsorController::class);

    Route::get('prices/{price}/amenities', [\App\Http\Controllers\Admin\PriceController::class, 'amenities'])->name('prices.amenities');
    Route::put('prices/{price}/amenities', [\App\Http\Controllers\Admin\PriceController::class, 'addAmenity'])->name('prices.amenities.store');
    Route::delete('prices/{price}/amenities', [\App\Http\Controllers\Admin\PriceController::class, 'removeAmenity'])->name('prices.amenities.remove');
    Route::post('prices/{price}/messages', [\App\Http\Controllers\Admin\PriceController::class, 'message'])->name('prices.message');

    Route::resource('prices', \App\Http\Controllers\Admin\PriceController::class);

    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);

    Route::resource('venues', \App\Http\Controllers\Admin\VenueController::class);

    Route::resource('hotels', \App\Http\Controllers\Admin\HotelController::class);
});
