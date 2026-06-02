<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\BedroomController;
use App\Http\Controllers\Api\BathroomController;
use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/{id}', [PropertyController::class, 'show']);
Route::get('/search/properties', [PropertyController::class, 'search']);

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | AUTH
    |--------------------------------------------------------------------------
    */

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    /*
    |--------------------------------------------------------------------------
    | PROPERTY IMAGES
    |--------------------------------------------------------------------------
    */

    Route::post('/properties/{id}/upload-image', [ImageController::class, 'upload']);
    Route::delete('/images/{id}', [ImageController::class, 'delete']);

    /*
    |--------------------------------------------------------------------------
    | BEDROOMS
    |--------------------------------------------------------------------------
    */

    Route::post('/properties/{id}/bedrooms', [BedroomController::class, 'store']);
    Route::delete('/bedrooms/{id}', [BedroomController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | BATHROOMS
    |--------------------------------------------------------------------------
    */

    Route::post('/properties/{id}/bathrooms', [BathroomController::class, 'store']);
    Route::delete('/bathrooms/{id}', [BathroomController::class, 'destroy']);

    /*
    |--------------------------------------------------------------------------
    | AGENT ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:agent')->group(function () {

        Route::get('/agent/properties', [PropertyController::class, 'myProperties']);

        Route::post('/properties', [PropertyController::class, 'store']);

        Route::put('/properties/{id}', [PropertyController::class, 'update']);

        Route::delete('/properties/{id}', [PropertyController::class, 'destroy']);
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        Route::get('/admin/users', [UserController::class, 'index']);

        Route::get('/admin/users/{id}', [UserController::class, 'show']);

        Route::post('/admin/users/{id}/approve', [UserController::class, 'approve']);

        Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);

        Route::get('/admin/stats', [AdminDashboardController::class, 'stats']);

        Route::get('/admin/properties', [PropertyController::class, 'adminProperties']);
    });
});