<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoanphiController;
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

Route::get('/login', [AuthController::class, 'view'])->name('login');
Route::post('/login', [AuthController::class, 'submit']);

Route::get('/logout', [AuthController::class, 'remove']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/doanphi', [DoanphiController::class, 'view']);
    Route::post('/doanphi/data', [DoanphiController::class, 'getData']);
    Route::post('/doanphi/entry', [DoanphiController::class, 'update']);


});
