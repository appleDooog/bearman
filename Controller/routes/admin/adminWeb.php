<?php

use App\Http\Controllers\Admin\AdminWebController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('admin/settings')->group(function () {
    Route::post("web", [AdminWebController::class, "web_list"]);
    Route::patch("web/active", [AdminWebController::class, "active_toggle"]);
    Route::patch("web/seq", [AdminWebController::class, "drag_seq"]);
    Route::post("web/insert", [AdminWebController::class, "web_insert"]);
    Route::post("typeT", [AdminWebController::class, "typeTList"]);
    Route::delete("web/{id}", [AdminWebController::class, "web_delete"]);
});
