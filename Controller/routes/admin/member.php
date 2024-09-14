<?php

use App\Http\Controllers\Admin\AdminMemberController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->prefix('admin/member')->group(function(){
    Route::post("list",[AdminMemberController::class,"list"]);
    Route::post("insert",[AdminMemberController::class,"insert"]);
    Route::post("edit/{id}",[AdminMemberController::class,"edit"]);
    Route::put("update",[AdminMemberController::class,"update"]);
});