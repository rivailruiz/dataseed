<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordRecoveryController;



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

//AUTH
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('logout', [AuthController::class, 'logout']);



//USER
Route::get('/user', [UserController::class, 'getUserData'])->middleware('jwt');
Route::put('/user', [UserController::class, 'updateUserData'])->middleware('jwt');
Route::delete('/user', [UserController::class, 'deleteUser'])->middleware('jwt');


//PASSWORD RECOVERY
Route::post('/password/recovery', [PasswordRecoveryController::class, 'sendRecoveryEmail']);
