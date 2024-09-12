<?php


use App\Http\Controllers\Admin\ICapController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin/icap"], function () {
    Route::get("list", [ICapController::class, "list"]);
    Route::post("add", [ICapController::class, "add"]);
});