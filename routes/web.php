<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    // vérifier si user est authentifié
    return view('welcome');
})->middleware('auth');


// --- User/Auth routes --- //
Route::post('/authenticate', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/authenticate', [LoginController::class, 'authenticate']);

Route::post('/register', [LoginController::class, 'registerUser']);

// --- Task routes --- //
Route::get('/task', [TaskController::class, 'index'])->middleware('auth');

Route::get('/task/{id}', [TaskController::class, 'show'])->middleware('auth');

Route::post('/task', [TaskController::class, 'store'])->middleware('auth');

Route::put('/task/{id}', [TaskController::class, 'update'])->middleware('auth');

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->middleware('auth');