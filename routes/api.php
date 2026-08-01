<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
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

    Route::get("account/types", [AccountController::class, 'getAccountTypes']);


    // Configuration

    Route::get("configuration/roles", [ConfigurationController::class, 'getRoles']);
    Route::get("configuration/permissions", [ConfigurationController::class, 'getPermissions']);
    Route::post("configuration/permissions", [ConfigurationController::class, 'addPermissions']);
    Route::post("configuration/permissions-sync", [ConfigurationController::class, 'rolePermissionsSync']);
});
