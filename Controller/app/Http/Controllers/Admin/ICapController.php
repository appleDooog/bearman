<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ICap;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ICapController extends Controller
{
    public function list(){
        $list = ICap::get();
        return response()->json([$list]);
    }

    public function add(Request $req){
        $list = new ICap();
        $list->account = $req->account;
        $list->password = $req->password;
        $list->email = $req->email;
        $list->hobbit = $req->hobbit;
        $list->save();

        return response()->json([$list]);
    }
}
