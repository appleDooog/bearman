<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Front\FrontHome;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Http\Request;

class AdminWebController extends Controller
{
    public function web_list(){
        $list = (new FrontHome())->get();
        return response()->json(['list' => $list], 200);
    }

    public function typeTList(){
        $list = (new FrontTypeT())->get();
        return response()->json(['list' => $list], 200);
    }

}


