<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('refreshtoken',[LoginController::class,'refreshToken']);

Route::group(['middleware'=>['admin','auth'],'prefix' => 'user'], function () {
    Route::get('', [UserController::class,'index']);
    Route::post('', [UserController::class,'store']);
    Route::post('{id}', [UserController::class,'update']);
    Route::delete('{id}', [UserController::class,'delete']);
    Route::get('fetch',[LoginController::class,'getUser']);
});
