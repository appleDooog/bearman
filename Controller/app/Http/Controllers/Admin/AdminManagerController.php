<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminManagerController extends Controller
{


    public function code()
    {
        $code = app('captcha')->create('flat', true);
        return Response::json(['state' => 'success', 'code' => 101, 'data' => $code], 200);
    }



    public function login(Request $req)
    {

        $rules = ['userKey' => 'required|captcha_api:' . request('captchaKey') . ", flat"];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'invalid captcha',
            ]);
        }

        $manager = (new Manager())->getAdmin($req->username, $req->password);

        if (empty($manager)) {
            return Response::json(["message" => "username or password wrong"]);
        }
        return Response::json(['message'=>'success']);
    }
}
