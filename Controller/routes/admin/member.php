<?php

use App\Http\Controllers\Admin\AdminMemberController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('admin/member')->group(function(){
    Route::post("/",[AdminMemberController::class,"list"]);
    Route::put("/",[AdminMemberController::class,"insert"]);
    Route::post("/{id}",[AdminMemberController::class,"edit"]);
    Route::patch("/",[AdminMemberController::class,"update"]);
    Route::delete("/{id}",[AdminMemberController::class,"delete"]);
});