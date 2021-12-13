<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskIndexesController;
use App\Http\Controllers\TaskListController;
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

//Route::group(['prefix' => 'auth'], function() {
//    require __DIR__.'/auth.php';
//});


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('boards', BoardController::class);
    Route::apiResource('task-list', TaskListController::class);

    Route::post('tasks/update-indexes', [TaskController::class, 'updateIndexes'])->name('tasks.update-indexes');
    Route::apiResource('tasks', TaskController::class);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [RegisterController::class, 'store'])->name('auth.register');

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('user', [AuthController::class, 'user'])->name('auth.user');
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});
