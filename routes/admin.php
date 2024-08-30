<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\AdminAuthController;
use App\Http\Controllers\back\cpanel\CityController;
use App\Http\Controllers\back\cpanel\PostController;
use App\Http\Controllers\back\cpanel\RoleController;
use App\Http\Controllers\back\cpanel\AdminController;
use App\Http\Controllers\Back\cPanel\CpanelController;
use App\Http\Controllers\Back\cPanel\SettingController;
use App\Http\Controllers\back\cpanel\CategoryController;
use App\Http\Controllers\Back\cPanel\GovernorateController;
use App\Http\Controllers\back\cpanel\DonationRequestController;
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//admin login

Route::prefix('admin/')->controller(AdminAuthController::class)->name('admin.')->group(function () {

    //login
    Route::get('login', 'login' )->name('login');
    Route::post('login', 'checkLogin' )->name('checklogin');

    //logout

    Route::post('logout' , 'logout' )->name('logout');

});

    //cPanel Routes

        Route::prefix('admin/cpanel/')->middleware(['auth' ,'auto-check-permission'])->name('admin.cpanel.')
        ->group(function () {

    Route::get('home',[CpanelController::class,'home'] )->name('home');
    Route::resource('governorates' ,GovernorateController::class);
    Route::resource('cities' ,CityController::class);
    Route::resource('posts' ,PostController::class);
    Route::resource('categories' ,CategoryController::class);
    Route::resource('donation-requests' ,DonationRequestController::class);

    //site settings
    Route::get('site-settings' ,[SettingController::class , 'index'])->name('site-settings');
    Route::POST('site-settings' ,[SettingController::class , 'update'])->name('update-site-settings');

    //admins authentcations

    Route::resource('admins' , AdminController::class);
    Route::resource('roles' , RoleController::class);
});

Auth::routes();
