<?php

use App\Http\Controllers\Admin\AdminManagerController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin/manager"], function () {
    Route::post("code", [AdminManagerController::class, "code"]);
    Route::post("login", [AdminManagerController::class, "login"]);
    Route::middleware(['auth:sanctum'])->group( function() {
        Route::post("/", [AdminManagerController::class, "list"]);
        Route::post("/{id}", [AdminManagerController::class, "show"]);
        Route::put("/", [AdminManagerController::class, "insert"]);
        Route::patch("/", [AdminManagerController::class, "update"]);
        Route::delete("/", [AdminManagerController::class, "delete"]);
    });
    
});
