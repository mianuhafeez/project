<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;

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

use App\Http\Controllers\Api\TodoListApiController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TodoListApiController::class, 'index']);
    Route::post('/tasks', [TodoListApiController::class, 'store']);
});


