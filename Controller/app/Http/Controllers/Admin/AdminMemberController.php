<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Member;
use Illuminate\Http\Request;

class AdminMemberController extends Controller
{
    public function list(){
        $list = Member::all();
        return response()->json($list);
    }
}
