<?php

use App\Http\Controllers\Admin\AdminWebController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('admin/settings')->group(function(){
    Route::post("web",[AdminWebController::class,"web_list"]);
    Route::post("typeT", [AdminWebController::class,"typeTList"]);
});