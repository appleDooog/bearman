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
        'title',
        'seq',
        'type',
        'active'
    ];

    public function getList()
    {
        $list = self::where('active', 'Y')
            ->select('title', 'seq', 'type',)
            ->orderBy('seq', 'asc')
            ->get();

        foreach ($list as $item) {
            switch ($item->type) {
                case 'T':
                    $item->items = FrontTypeT::where('active', 'Y')
                        ->where('home_seq', $item->seq)
                        ->select('title','subtitle', 'content')
                        ->get()
                        ->toArray();
                    break;
                case 'P':
                    $item->items = FrontTypeP::where('active', 'Y')
                        ->where('home_seq', $item->seq)
                        ->get()
                        ->toArray();
                    break;
                case 'S':
                    $item->items = FrontTypeS::where('active', 'Y')
                        ->where('home_seq', $item->seq)
                        ->get()
                        ->toArray();
                    break;
                case 'L':
                    $item->items = FrontTypeL::where('active', 'Y')
                        ->where('home_seq', $item->seq)
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
