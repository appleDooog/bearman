<?php

namespace App\Models\Front;

use App\Models\Front\FrontHomeType\FrontTypeL;
use App\Models\Front\FrontHomeType\FrontTypeP;
use App\Models\Front\FrontHomeType\FrontTypeS;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontHome extends Model
{

    public $timestamps = false;
    protected $table = 'front_home';
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'title',
        'seq',
        'type',
        'typeId',
        'active'
    ];

    public function getList()
    {
        $list = self::where('active', 'Y')
            ->select('id','title', 'seq', 'type','typeId','active', 'createTime')
            ->orderBy('seq', 'asc')
            ->get();

        foreach ($list as $item) {
            switch ($item->type) {
                case 'T':
                    $item->items = FrontTypeT::where('active', 'Y')
                        ->where('id', $item->typeId)
                        ->select('title','subtitle', 'content')
                        ->get()
                        ->toArray();
                    break;
                case 'P':
                    $item->items = FrontTypeP::where('active', 'Y')
                        ->where('id', $item->typeId)
                        ->get()
                        ->toArray();
                    break;
                case 'S':
                    $item->items = FrontTypeS::where('active', 'Y')
                        ->where('id', $item->typeId)
                        ->get()
                        ->toArray();
                    break;
                case 'L':
                    $item->items = FrontTypeL::where('active', 'Y')
                        ->where('id', $item->typeId)
                        ->get()
                        ->toArray();
                    break;
                default:
                    $item->items = [];
                    break;
            }
        }
        return $list;
    }
}
