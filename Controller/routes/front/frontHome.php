<?php

use App\Http\Controllers\Front\FrontHomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('front/')->group(function(){
    Route::post("/",[FrontHomeController::class,"home"]);
});