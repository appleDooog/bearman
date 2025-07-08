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
            ->select('id', 'title', 'seq', 'type', 'typeId', 'active', 'createTime')
            ->orderBy('seq', 'asc')
            ->get();


        foreach ($list as $item) {
            switch ($item->type) {
                case 'T':
                    $item->items = FrontTypeT::select('title', 'subtitle', 'content')
                        ->where('id', $item->typeId)
                        ->first();
                    break;
                case 'P':
                    $item->items = FrontTypeP::find($item->typeId);
                    break;
                case 'S':
                    $item->items = FrontTypeS::find($item->typeId);
                    break;
                case 'L':
                    $item->items = FrontTypeL::find($item->typeId);
                    break;
                default:
                    $item->items = null;
                    break;
            }
        }

        return $list;
    }
}
