<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Photo\Resize;
use App\Models\Front\FrontHome;
use App\Models\Front\FrontHomeType\FrontTypeL;
use App\Models\Front\FrontHomeType\FrontTypeP;
use App\Models\Front\FrontHomeType\FrontTypeS;
use App\Models\Front\FrontHomeType\FrontTypeT;
use Illuminate\Support\Facades\File;
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
        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '-1');

        DB::beginTransaction();

        try {
            // 新增 front_home
            $home = new FrontHome();
            $home->title = $req->name;
            $home->seq = FrontHome::max('seq') + 1;
            $home->type = $req->type;

            if ($req->type === 'T') {
                // ===== 文案區塊 =====
                $item = new FrontTypeT();
                $item->title = $req->title;
                $item->subtitle = $req->subtitle;
                $item->content = $req->content;
                $item->save();
            } elseif ($req->type === 'S') {
                // ===== 輪播圖區塊 =====
                $imageData = [];
                for ($i = 0; $i < 5; $i++) {
                    if ($req->hasFile("images.$i")) {
                        $file = $req->file("images.$i");
                        $times = explode(' ', microtime());
                        $filename = "slide_" . strftime('%Y%m%d%H%M_', $times[1]) . substr($times[0], 2, 3) . "_$i." . $file->extension();
                        $savePath = public_path("images/slidePic/{$filename}");

                        new Resize(
                            $savePath,
                            $file->getRealPath(),
                            1920,
                            1080,
                            0,
                            0,
                            $file->extension()
                        );

                        $relativePath = "images/slidePic/" . $filename;
                        $imageData[] = [
                            'src' => $relativePath,
                            'url' => $req->input("urls.$i", ""),
                        ];
                    }
                }
                $item = new FrontTypeS();
                $item->image_data = json_encode($imageData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $item->save();
            } elseif ($req->type === 'P') {
                // ===== 拼圖區塊 =====
                $imageData = [];
                for ($i = 0; $i < 3; $i++) {
                    if ($req->hasFile("images.$i")) {
                        $file = $req->file("images.$i");
                        $times = explode(' ', microtime());
                        $filename = "pic_" . strftime('%Y%m%d%H%M_', $times[1]) . substr($times[0], 2, 3) . "_$i." . $file->extension();
                        $savePath = public_path("images/picBlock/{$filename}");

                        new Resize(
                            $savePath,
                            $file->getRealPath(),
                            800,
                            600,
                            0,
                            0,
                            $file->extension()
                        );

                        $relativePath = "images/picBlock/" . $filename;
                        $imageData[] = [
                            'src' => $relativePath,
                            'url' => $req->input("urls.$i", ""),
                        ];
                    }
                }
                $item = new FrontTypeP();
                $item->image_data = json_encode($imageData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                $item->save();
            } elseif ($req->type === 'L') {
                // ===== Logo 區塊 =====
                $item = new FrontTypeL();
                $item->name = $req->name ?? 'LOGO 區塊';
                $item->save();

                // 綁定品牌 IDs
                if ($req->has('logo_ids') && is_array($req->logo_ids)) {
                    $item->logos()->sync($req->logo_ids);
                }
            }

            $home->typeId = $item->id;
            $home->save();

            DB::commit();

            return response()->json(['success' => true], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    // 單筆資料 detail
    public function web_detail($id)
    {
        $item = FrontHome::findOrFail($id);

        switch ($item->type) {
            case 'T':
                $item->items = FrontTypeT::find($item->typeId);
                break;
            case 'S':
                $item->items = FrontTypeS::find($item->typeId);
                break;
            case 'P':
                $item->items = FrontTypeP::find($item->typeId);
                break;
            case 'L':
                $item->items = FrontTypeL::with('logos')->find($item->typeId);
                break;
            default:
                $item->items = null;
        }

        return response()->json([
            'success' => true,
            'data' => $item
        ], 200);
    }

    // 更新資料 update
    public function web_update(Request $req, $id)
    {

        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '-1');

        DB::beginTransaction();

        try {
            $home = FrontHome::findOrFail($id);
            $home->title = $req->name ?? $home->title;

            switch ($home->type) {
                case 'T': // 文案
                    $item = FrontTypeT::findOrFail($home->typeId);
                    $item->title = $req->title ?? $item->title;
                    $item->subtitle = $req->subtitle ?? $item->subtitle;
                    $item->content = $req->content ?? $item->content;
                    $item->save();
                    break;

                case 'S': // 輪播圖 (最多 5 張)
                    $item = FrontTypeS::findOrFail($home->typeId);
                    $oldImages = json_decode($item->image_data, true) ?? [];
                    $imageData = [];

                    for ($i = 0; $i < 5; $i++) {
                        if ($req->hasFile("images.$i")) {

                            // 有新圖 → 取代舊圖
                            $file = $req->file("images.$i");
                            $times = explode(' ', microtime());
                            $filename = "slide_" . strftime('%Y%m%d%H%M_', $times[1]) . substr($times[0], 2, 3) . "_$i." . $file->extension();
                            $savePath = public_path("images/slidePic/{$filename}");

                            new Resize(
                                $savePath,
                                $file->getRealPath(),
                                1920,
                                1080,
                                0,
                                0,
                                $file->extension()
                            );

                            // 有新圖 → 刪舊圖
                            if (!empty($oldImages[$i]['src'])) {
                                $oldPath = public_path($oldImages[$i]['src']);
                                if (File::exists($oldPath)) {
                                    File::delete($oldPath);
                                }
                            }

                            $relativePath = "images/slidePic/" . $filename;
                            $imageData[$i] = [
                                'src' => $relativePath,
                                'url' => $req->input("urls.$i", ""),
                            ];
                        } elseif ($req->has("oldImages.$i")) {
                            // 沒換圖 → 用舊圖
                            $imageData[$i] = [
                                'src' => $req->input("oldImages.$i"),
                                'url' => $req->input("urls.$i", ""),
                            ];
                        }
                    }

                    $item->image_data = json_encode($imageData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                    $item->save();
                    break;

                case 'P': // 拼圖 (lt / lb / right 三張)
                    $item = FrontTypeP::findOrFail($home->typeId);
                    $oldImages = json_decode($item->image_data, true) ?? [];
                    $imageData = [];

                    for ($i = 0; $i < 3; $i++) {
                        if ($req->hasFile("images.$i")) {
                            $file = $req->file("images.$i");
                            $times = explode(' ', microtime());
                            $filename = "pic_" . strftime('%Y%m%d%H%M_', $times[1]) . substr($times[0], 2, 3) . "_$i." . $file->extension();
                            $savePath = public_path("images/picBlock/{$filename}");

                            new Resize(
                                $savePath,
                                $file->getRealPath(),
                                800,
                                600,
                                0,
                                0,
                                $file->extension()
                            );

                            // 有新圖 → 刪舊圖
                            if (!empty($oldImages[$i]['src'])) {
                                $oldPath = public_path($oldImages[$i]['src']);
                                if (File::exists($oldPath)) {
                                    File::delete($oldPath);
                                }
                            }

                            $relativePath = "images/picBlock/" . $filename;
                            $imageData[$i] = [
                                'src' => $relativePath,
                                'url' => $req->input("urls.$i", ""),
                            ];
                        } elseif ($req->has("oldImages.$i")) {
                            // 沒換圖 → 用舊圖
                            $imageData[$i] = [
                                'src' => $req->input("oldImages.$i"),
                                'url' => $req->input("urls.$i", ""),
                            ];
                        }
                    }

                    $item->image_data = json_encode($imageData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                    $item->save();
                    break;

                case 'L': // Logo 區塊
                    $item = FrontTypeL::findOrFail($home->typeId);
                    if ($req->has('logo_ids')) {
                        $item->logos()->sync($req->logo_ids);
                    }
                    $item->save();
                    break;
            }

            $home->save();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => '更新成功',
                'data' => $home
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function web_delete(Request $req)
    {
        $frontHome = new FrontHome();
        $deleted = $frontHome->deleteItem($req->id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => '刪除成功'], 200);
        } else {
            return response()->json(['success' => false, 'message' => '找不到資料'], 404);
        }
    }
}
