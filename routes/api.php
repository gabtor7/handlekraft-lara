<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// --- User/Auth routes --- //
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- Task routes --- //
Route::get('/task', [TaskController::class, 'index']);

Route::get('/task/{id}', [TaskController::class, 'show']);

Route::post('/task', [TaskController::class, 'store']);

Route::put('/task/{id}', [TaskController::class, 'update']);

Route::delete('/task/{id}', [TaskController::class, 'destroy']);