<?php

use App\Http\Controllers\Admin\AdminLogosController;
use App\Http\Controllers\Admin\AdminTypeLogoController;
use App\Http\Controllers\Admin\AdminWebController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('admin/settings')->group(function () {
    // 首頁版塊
    Route::post("web", [AdminWebController::class, "web_list"]);
    Route::patch("web/active", [AdminWebController::class, "active_toggle"]);
    Route::patch("web/seq", [AdminWebController::class, "drag_seq"]);
    Route::post("web/insert", [AdminWebController::class, "web_insert"]);
    Route::delete("web/{id}", [AdminWebController::class, "web_delete"]);
    // 編輯首頁版塊
    Route::get("web/{id}", [AdminWebController::class, "web_detail"]);   // 讀取單一版塊
    Route::post("web/{id}", [AdminWebController::class, "web_update"]);   // 更新單一版塊

    // 品牌 Logo CRUD
    Route::get("logos", [AdminLogosController::class, "list"]);
    Route::post("logos", [AdminLogosController::class, "insert"]);
    Route::post("logos/{id}", [AdminLogosController::class, "update"]);
    Route::delete("logos/{id}", [AdminLogosController::class, "delete"]);

    // Logo 區塊管理
    Route::get("logo-blocks", [AdminTypeLogoController::class, "list"]);
    Route::post("logo-blocks", [AdminTypeLogoController::class, "insert"]);
    Route::post("logo-blocks/{id}/attach", [AdminTypeLogoController::class, "attach"]);
    Route::delete("logo-blocks/{id}", [AdminTypeLogoController::class, "delete"]);
});
