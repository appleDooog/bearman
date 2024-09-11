<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminManagerController extends Controller
{

    // code寫一支, login寫一支


    public function code(){
        $code = app('captcha')->create('flat', true);
        return Response::json(['state'=>'success', 'code'=>101 ,'data'=>$code], 200);
    }



    public function login(Request $req){

        if(captcha_check($req->code) == false){

            return back()->withInput()->withErrors(["code"=>"驗證碼錯誤"]);
            exit;

        }

        $manager = (new Manager())->getAdmin($req->username, $req->password);

        if(empty($manager)){
            return back()->withInput()->withErrors(["error"=>"帳號或密碼錯誤"]);
            exit;
        }
        session()->put("manager", $manager->userId);
        return redirect("/admin/home");
    }
}
