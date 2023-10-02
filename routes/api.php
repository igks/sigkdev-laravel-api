<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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

// Auth routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

    // Books routes
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    Route::post('/books', [BookController::class, 'store']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
});
