<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', function () {
    return "ola";
});


Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('auth.login');


Route::resource('users', 'App\Http\Controllers\UserController');

// Route::post('register', 'AuthController@register');
Route::middleware('auth:api')->group(function () {
    Route::get('me', 'AuthController@me');
    Route::post('logout', 'AuthController@logout');
});
