<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use App\Builders\Computer;
use App\Builders\Conceptual;
use Illuminate\Http\Request;
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
Route::apiResource('users',UserController::class);
Route::get('/computer', [Computer::class, 'computer']);
Route::get('/conceptual', [Conceptual::class, 'conceptual']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () 
{
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('directors',DirectorController::class);
    Route::apiResource('titles',TitleController::class);


});