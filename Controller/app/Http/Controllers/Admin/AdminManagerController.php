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
        return Response::json(['state' => 'success', 'data' => $code], 200);
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

        $manager->tokens()->delete();

        $token = $manager->createToken('AUTH TOKEN')->plainTextToken;
        
        return Response::json(['message'=>'success', 'token'=>$token, 'job'=>$manager->job]);
    }

    
    public function list(){
        $list = Manager::where('id', "!=", "1")->orderBy('id', 'DESC')->get();
        return Response::json(['state' => 'success', 'list' => $list], 200);
    }

    public function show(Request $req){
        $list = Manager::find($req->id);
        return response()->json(['state'=>'true', 'list'=>$list], 200);
    }

    public function insert(Request $req){
        Manager::created($req->all);
        return response()->json(['state'=>'true'], 201);
    }

    public function update(Request $req){
        $list = Manager::find($req->id);
        $list->update($req->all());

        return response()->json(['state'=>'true', 'list'=>$list], 204);
    }

    public function delete(Request $req){
        $list = Manager::find($req->id);
        $list->delete();

        return response()->json(['message'=>'success'], 204);
    
    }
}
