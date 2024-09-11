<?php

use App\Http\Controllers\Admin\AdminManagerController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin/manager"], function () {
    Route::get("code", [AdminManagerController::class, "code"]);
    Route::post("login", [AdminManagerController::class, "login"]);
});
