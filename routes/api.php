<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/**
 * Crud Sample Module
 * Created by Phpstorm
 * User : aldiansyahrpl2@gmail.com
 * @author aldiasyah <aldiansyahrpl2@gmail.com>
 */
Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['middleware' => ['auth:api']], function (){
        Route::get('/logout', [AuthController::class, 'logout']);

        /**
         * User Controller
         */
        Route::group(['prefix' => 'user'], function (){
            Route::get('/', [UserController::class, 'all']);
            Route::get('/paginate', [UserController::class, 'paginate']);
            Route::post('/create', [UserController::class, 'create']);
            Route::get('/show/{id}', [UserController::class, 'show']);
            Route::post('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'delete']);
        });

        /**
         * Category Controller
         */
        Route::group(['prefix' => 'category'], function (){
            Route::get('/', [CategoryController::class, 'all']);
            Route::get('/paginate', [CategoryController::class, 'paginate']);
            Route::post('/create', [CategoryController::class, 'create']);
            Route::get('/show/{id}', [CategoryController::class, 'show']);
            Route::post('/update/{id}', [CategoryController::class, 'update']);
            Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
        });

        /**
         * Galery Controller
         */
        Route::group(['prefix' => 'galery'], function (){
            Route::post('/create', [GalleryController::class, 'uploadPhoto']);
        });
    });
});
