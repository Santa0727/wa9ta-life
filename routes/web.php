<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum', 'verified', 'checkStatus'])->group(function () {

    Route::name('dashboard')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index']);
        Route::post('/users/get_data', [UserController::class, 'get_users'])->name('.get_users');
        Route::post('/users', [UserController::class, 'store'])->name('.add_new_user');
        Route::post('/users/{id}', [UserController::class, 'update'])->name('.update_user');
        Route::put('/users/{id}', [UserController::class, 'active_user'])->name('.active_user');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('.delete_user');

        Route::get('/history/{id}', [HistoryController::class, 'index'])->name('.history');
        Route::post('/history/{id}', [HistoryController::class, 'get_history'])->name('.get_history');
        Route::post('/history/{user_id}/upsert', [HistoryController::class, 'store'])->name('.add_histtory');
        Route::post('/history/{user_id}/upsert/{id}', [HistoryController::class, 'update'])->name('.update_histtory');
        Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('.delete_histtory');
    });

    Route::name('admin')->prefix('admin')->group(function () {
        Route::get('users', [AdminController::class, 'index']);
        Route::post('/users/get_data', [AdminController::class, 'get_users'])->name('.get_users');
        Route::post('/users', [AdminController::class, 'store'])->name('.add_new_user');
        Route::post('/users/{id}', [AdminController::class, 'update'])->name('.update_user');
        Route::put('/users/{id}', [AdminController::class, 'active_user'])->name('.active_user');
        Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('.delete_user');
    });
});