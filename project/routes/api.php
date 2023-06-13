<?php

use App\Http\Controllers\API\ChidoanController;
use App\Http\Controllers\API\DoanvienController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('sodoan', SoDoanController::class);
    Route::resource('doanvien', DoanvienController::class);
    Route::resource('chidoan', ChidoanController::class);

}); 
