<?php

namespace App\Models\Front;

use App\Models\Front\FrontHomeType\FrontTypeL;
use App\Models\Front\FrontHomeType\FrontTypeP;
use App\Models\Front\FrontHomeType\FrontTypeS;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

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
                    $item->items = FrontTypeL::find($item->typeId);
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
     * 共用刪圖方法
     */
    private function deleteImages(?string $jsonData, string $typeName = '')
    {
        if (empty($jsonData)) return;

        try {
            $images = json_decode($jsonData, true);
            if (is_array($images)) {
                foreach ($images as $image) {
                    if (!empty($image['src'])) {
                        $path = public_path($image['src']);
                        if (File::exists($path)) {
                            File::delete($path);
                            Log::info("已刪除 {$typeName} 檔案: {$path}");
                        } else {
                            Log::warning("找不到 {$typeName} 檔案: {$path}");
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error("刪除 {$typeName} 檔案失敗: " . $e->getMessage());
        }
    }

    /**
     * 刪除指定區塊，包含對應資料與檔案
     */
    public function deleteItem($id)
    {
        $item = self::find($id);
        if (!$item) return false;

        DB::transaction(function () use ($item) {
            switch ($item->type) {
                case 'T':
                    $typeT = FrontTypeT::find($item->typeId);
                    if ($typeT) $typeT->delete();
                    break;

                case 'P': // 拼圖區塊
                    $typeP = FrontTypeP::find($item->typeId);
                    if ($typeP) {
                        $this->deleteImages($typeP->image_data, '拼圖');
                        $typeP->delete();
                    }
                    break;

                case 'S': // 輪播圖區塊
                    $typeS = FrontTypeS::find($item->typeId);
                    if ($typeS) {
                        $this->deleteImages($typeS->image_data, '輪播圖');
                        $typeS->delete();
                    }
                    break;

                case 'L': // Logo 區塊
                    $typeL = FrontTypeL::find($item->typeId);
                    if ($typeL) {
                        $typeL->logos()->detach(); // 先清關聯
                        $typeL->delete();
                    }
                    break;
            }

            // 最後刪掉 front_home 主表
            $item->delete();
        });

        return true;
    }
}
