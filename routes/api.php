<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('api')->group(function(){

    Route::get('governorates' , [MainController::class, 'governorates']);
    Route::get('cities' , [MainController::class, 'cities']);
    Route::post('register' , [AuthController::class, 'register']);
    Route::post('login' , [AuthController::class, 'login']);
    Route::post('passwordReset' , [AuthController::class, 'passwordReset']);
    Route::post('newPassword' , [AuthController::class, 'newPassword']);


Route::middleware('auth:api')->group(function(){

    Route::get('posts' , [MainController::class, 'posts']);
    Route::post('profile' , [AuthController::class, 'profile']);
    Route::post('donation-request/create' , [MainController::class, 'createDonationRequests']);
    Route::post('donation-request/send' , [MainController::class, 'sendDonationRequests']);   
    Route::post('contact' , [MainController::class, 'contact']);
    Route::post('report' , [MainController::class, 'report']);
    Route::post('show-notitfication-settings' , [AuthController::class, 'showNotitficationSettings']);
    Route::post('edit-notitfication-settings' , [AuthController::class, 'editNotitficationSettings']);
    Route::post('register-token' , [AuthController::class, 'registerToken']);
    Route::post('remove-token' , [AuthController::class, 'removeToken']);
    Route::get('post-favourite' , [MainController::class, 'postFavourite']);
    Route::post('show-post-favorite' , [MainController::class, 'showpostFavorite']);


});
});






