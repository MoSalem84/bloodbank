<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController ;
use App\Http\Controllers\Front\ClientAuthController;

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


Route::get('/', [HomeController::class , 'home'])->name('home');

Route::get('donation-requests', [HomeController::class, 'donationRequests'])->name('donation-requests');

Route::prefix('client/')->controller(ClientAuthController::class)->name('client.')->group(function () {

    //login
    Route::get('/login', 'login')->name('login');
    Route::post('/login','checklogin')->name('checklogin');

    //register

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('registerstore');

    //logout

    Route::POST('logout' , 'logout' )->name('logout');
});

Route::prefix('client/')->middleware('auth:client')->name('client.')->group(function () {

    Route::post('post-favourite' , [HomeController::class , 'postFavourite'])->name('post-favourite') ;
});

Auth::routes();
