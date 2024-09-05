<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Member;
use Illuminate\Http\Request;

class AdminMemberController extends Controller
{
    public function list()
    {
        $list = Member::get();
        $count = $list->count();
        return response()->json(['list' => $list, 'count' => $count]);
    }

    public function insert(Request $req)
    {
        $list = new Member();
        $list->name = $req->name;
        $list->password = $req->password;
        $list->address = $req->address;
        $list->tel = $req->tel;
        $list->email = $req->email;
        $list->save();

    }
}
