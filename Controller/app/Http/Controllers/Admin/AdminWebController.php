<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Photo\Resize;
use App\Models\Front\FrontHome;
use App\Models\Front\FrontHomeType\FrontTypeS;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AdminWebController extends Controller
{
    public function web_list()
    {
        $list = (new FrontHome())->orderBy('seq', 'asc')->get();
        return response()->json(['list' => $list], 200);
    }

    public function active_toggle(Request $req)
    {
        $home = FrontHome::find($req->id);
        if ($home) {
            $home->active = $req->active === 'Y' ? 'Y' : ''; // 僅允許 Y / 空字串
            $home->save();
            return response()->json(['success' => true, 'message' => '狀態已更新', 'status' => $home->active]);
        } else {
            return response()->json(['success' => false, 'message' => '找不到該筆資料'], 404);
        }
    }

    public function drag_seq(Request $req)
    {
        $home = FrontHome::find($req->id);

        return response()->json(['success' => true, 'message' => '狀態已更新', 'status' => $home->active]);
    }



    public function web_insert(Request $req)
    {
        DB::beginTransaction();

        try {

            // 新增 front_home
            $home = new FrontHome();
            $home->title =  $req->name;
            $home->seq = FrontHome::max('seq') + 1;
            $home->type = $req->type;

            if ($req->type === 'T') { // 新增 typeT
                $item = new FrontTypeT();
                $item->title = $req->title;
                $item->subtitle = $req->subtitle;
                $item->content = $req->content;
                $item->save();
            } elseif ($req->type === 'S') {
                $imageData = [];

                // 限制五張圖片
                for ($i = 0; $i < 5; $i++) {
                    if ($req->hasFile("images.$i")) {
                        $file = $req->file("images.$i");

                        // 檔名處理
                        $times = explode(' ', microtime());
                        $filename = "slide_" . strftime('%Y%m%d%H%M_', $times[1]) . substr($times[0], 2, 3) . "_$i." . $file->extension();
                        $savePath = public_path("images/slidePic/{$filename}");

                        // 使用 Resize 類別處理圖片尺寸（1920x1080 可依需求調整）
                        new Resize(
                            $savePath,
                            $file->getRealPath(),
                            1920,
                            1080,
                            0, // 不裁圖
                            0, // 不放大
                            $file->extension()
                        );

                        // 儲存圖片路徑與空連結
                        $fullUrl = url("images/slidePic/" . $filename);
                        $imageData[] = [
                            'src' => $fullUrl,
                            'url' => $req->input("urls.$i", ""), // 如果未來有設連結
                        ];
                    }
                }
                $item = new FrontTypeS();
                $item->image_data = json_encode($imageData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $item->save();

                $home->typeId = $item->id;
            }

            $home->save();

            DB::commit(); // 所有資料成功才送出

            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            DB::rollBack(); // 發生錯誤 → 回滾所有動作
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
