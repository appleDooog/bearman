<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminManagerController extends Controller
{
    public function list(){
        $list = Manager::get();
        return Response::json($list, 200);
    }
}
