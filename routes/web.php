<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GetLocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HealthFacilitiesController;

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

Route::middleware('check.outh')->group(function () {
    Route::get('/', [GetLocationController::class, 'index']);
    Route::get('login', function(){
        return view('auth.login');
    });
    Route::post('loginPost', [AuthController::class, 'login']);
});

Route::middleware('check.auth')->group(function () {
    Route::resource('health-facilities', HealthFacilitiesController::class);
    Route::get('users', [UserController::class, 'index']);
    Route::post('logout', [AuthController::class, 'logout']);
});
