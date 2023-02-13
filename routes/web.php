<?php

use App\Http\Controllers\FacebookSocialiteController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CampaignController;


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


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('//', function () {
    return redirect('/welcome');
})->name('home');


Route::get('/dashboard', [DashboardController::class, 'get'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/campaign', [CampaignController::class, 'get'])
    ->middleware('auth', 'verified')->name('campaign');

Route::post('/campaign', [CampaignController::class, 'create'])
    ->middleware('auth', 'verified')->name('campaign.create');

Route::get('/payment', function () {
    return view('payment');
})->middleware(['auth', 'verified'])->name('payment');

Route::get('/report', function () {
    return view('report');
})->middleware(['auth', 'verified'])->name('report');
Route::get('/support', function () {
    return view('support');
})->middleware(['auth', 'verified'])->name('support');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Facebook Login URL

Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB'])->name('auth.facebook');
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);
//Route::get('callback/facebook',function () {
//    return view('welcome');
//});

Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('callback/google', 'handleGoogleCallback');
});


require __DIR__ . '/auth.php';
