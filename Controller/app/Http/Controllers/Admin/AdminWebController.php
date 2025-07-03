<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Front\FrontHome;
use App\Models\Front\FrontHomeType\FrontTypeS;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class AdminWebController extends Controller
{
    public function web_list(){
        $list = (new FrontHome())->get();
        return response()->json(['list' => $list], 200);
    }

    public function web_insert(Request $req){
        $type = $req->input('type');
        $typeId = $req->typeId;

        switch ($type){
            case "T":
                $item = new FrontTypeT();
                $item->title = $req->title;
                $item->subtitle = $req->subtitle;
                $item->content = $req->content;
                $item->active = "Y";
                $item->save();

                $typeId = $item->id;

                break;

            case "S":
                $item = new FrontTypeS();
                $item->

        }

        
    }

}


