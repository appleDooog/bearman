<?php

use App\Http\Controllers\Admin\AdminManagerController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"admin/member"],function(){
    Route::get("list",[AdminManagerController::class,"list"]);
});