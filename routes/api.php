<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => "api"], function () {

    Route::prefix('{lang}/auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    });
    Route::prefix("{lang}")->middleware('auth:api')->group(function () {
        Route::resource('users', UserController::class);
        Route::get('report/last/{id}', [HistoryController::class, 'get_last_report']);
    });

});