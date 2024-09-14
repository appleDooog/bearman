<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Member;
use Illuminate\Http\Request;


class AdminMemberController extends Controller
{
    public function list(Request $req)
    {

        $list = Member::orderBy('id', 'DESC')->get();
        $count = $list->count();

        if($req->type == 'list'){    
            return response()->json(['list' => $list], 200);
        }else if($req->type == 'count'){
            return response()->json(['count' => $count], 200);
        }
        
    }

    public function insert(Request $req)
    {
        $list = new Member();
        $list->name = $req->name;
        $list->password = $req->password;
        $list->address = $req->address;
        $list->tel = $req->tel;
        $list->email = $req->email;
        if(!empty($req->remark)){
            $list->remark = $req->remark;
        }
        $list->save();
        
        return response()->json(['state'=>'true'], 201);
    }

    public function edit(Request $req)
    {
        $list = Member::find($req->id);
        return response()->json(['state'=>'true', 'list'=>$list], 200);
    }

    public function update(Request $req)
    {
        $list = Member::find($req->id);
        $list->update($req->all());

        return response()->json(['state'=>'true', 'list'=>$list], 204);
    }
}
