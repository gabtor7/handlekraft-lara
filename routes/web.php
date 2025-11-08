<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    // vérifier si user est authentifié
    return response()->json(['message' => 'Welcome!']);
})->middleware('auth:sanctum');


// --- User/Auth routes --- //
Route::post('/authenticate', function (Request $request) {
    return $request->user();
});

// Route::post('/authenticate', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [LoginController::class, 'registerUser']);

// --- Task routes --- //
Route::get('/task', [TaskController::class, 'index']);

Route::get('/task/{id}', [TaskController::class, 'show'])->middleware('auth:sanctum');

Route::post('/task', [TaskController::class, 'store']);

Route::put('/task/{id}', [TaskController::class, 'update'])->middleware('auth:sanctum');

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->middleware('auth:sanctum');