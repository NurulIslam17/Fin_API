<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    Log::info("Okk! Working.");
    return response()->json([
        'status' => true,
        'message' => 'It is OK',
    ], 200);
});

// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get("/users", [UserController::class, "getAll"]);
    Route::delete("/user/{id}", [UserController::class, 'deleteById']);

    Route::post("/customer", [CustomerController::class, "addCustomer"]);
});
