<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TripController;


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

Route::get('/gettimer', [TripController::class, 'time']);
Route::get('/getDrivers', [UserController::class, 'drivers']);
Route::get('/getPassengers', [UserController::class, 'passengers']);
Route::get('/getAll', [UserController::class, 'all']);
Route::get('/getRecentlyTrips', [TripController::class, 'recentlytrips']);
Route::get('/getCurrentlyTrips', [TripController::class, 'currentlytrips']);
Route::get('/getUpcomingTrips', [TripController::class, 'upcomingtrips']);

Route::get('/test', function () {
    return view('test');
});

Route::get('/upload/{Data}/{mail}',[UserController::class, 'upload']);

Route::get('/storeUser/{FirstName}/{LastName}/{Address}/{Number}/{Type}/{Password}', [UserController::class, 'storeUser']);
Route::get('/storeCar/{Type}/{Color}/{Number}/{User_id}', [UserController::class, 'storeCar']);
Route::get('/login/{username}/{password}',[UserController::class, 'login']);
Route::get('/check',[UserController::class, 'check']);