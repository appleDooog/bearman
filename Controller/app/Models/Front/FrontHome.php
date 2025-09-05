<?php

namespace App\Models\Front;

use App\Models\Front\FrontHomeType\FrontTypeL;
use App\Models\Front\FrontHomeType\FrontTypeP;
use App\Models\Front\FrontHomeType\FrontTypeS;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; // 引入 File Facade
use Illuminate\Support\Facades\Log; // 引入 Log Facade

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

    /**
     * 取得前台顯示用的區塊清單
     */
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
                    $item->items = FrontTypeL::with('logos')->find($item->typeId);
                    break;

                default:
                    $item->items = null;
                    break;
            }
        }

        return $list;
    }

    /**
     * 刪除指定區塊，包含對應資料與檔案
     */
    public function deleteItem($id)
{
    $item = self::find($id);
    if (!$item) {
        return false;
    }

    DB::transaction(function () use ($item) {
        switch ($item->type) {
            case 'T':
                FrontTypeT::where('id', $item->typeId)->delete();
                break;

            case 'P':
                FrontTypeP::where('id', $item->typeId)->delete();
                break;

            case 'S':
                $typeSData = FrontTypeS::find($item->typeId);

                if ($typeSData && !empty($typeSData->image_data)) {
                    try {
                        $images = json_decode($typeSData->image_data, true);
                        if (is_array($images)) {
                            foreach ($images as $image) {
                                if (!empty($image['src'])) {
                                    $path = public_path($image['src']);
                                    if (File::exists($path)) {
                                        File::delete($path);
                                    }
                                }
                            }
                        }
                    } catch (\Exception $e) {
                        Log::error("刪除檔案失敗 (FrontTypeS ID: {$typeSData->id}): " . $e->getMessage());
                    }
                }

                if ($typeSData) {
                    $typeSData->delete();
                }
                break;

            case 'L':
                $typeL = FrontTypeL::find($item->typeId);
                if ($typeL) {
                    // ✅ 清掉關聯
                    $typeL->logos()->detach();
                    // ✅ 刪掉區塊本身
                    $typeL->delete();
                }
                break;
        }

        // 最後刪掉 front_home 主表記錄
        $item->delete();
    });

    return true;
}

}
