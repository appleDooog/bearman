<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\type;

class AdminMemberController extends Controller
{
    public function list(Request $req)
    {

        $list = Member::get();
        $count = $list->count();
        // return response()->json($req);

        if($req->type == 'list'){    
            return response()->json(['list' => $list]);
        }else if($req->type == 'count'){
            return response()->json(['count' => $count]);
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
        
        return response()->json(['state'=>'新增成功']);
    }
}
