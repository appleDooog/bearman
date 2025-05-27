<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\FrontHome;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function home(){
        $list = (new FrontHome())->getList();
        return response()->json(['list' => $list], 200);
    }
}
