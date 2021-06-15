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

Route::get('/home',[\App\Http\Controllers\SiteController::class, 'home'])->middleware('auth');


Route::middleware([ 'admin',])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index']);

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::resource('speakers', \App\Http\Controllers\Admin\SpeakerController::class);

    Route::resource('schedules', \App\Http\Controllers\Admin\ScheduleController::class);

    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);

    Route::resource('amenities', \App\Http\Controllers\Admin\AmenitiesController::class);

    Route::resource('sponsors', \App\Http\Controllers\Admin\SponsorsController::class);

});
