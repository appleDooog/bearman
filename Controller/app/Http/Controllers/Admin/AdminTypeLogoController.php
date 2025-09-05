<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Front\FrontHomeType\FrontTypeL;
use Illuminate\Http\Request;

class AdminTypeLogoController extends Controller
{
    /**
     * 列出所有 Logo 區塊 (含已綁定的品牌 Logo)
     */
    public function list()
    {
        $blocks = FrontTypeL::with('logos')->orderBy('createTime', 'desc')->get();
        return response()->json(['list' => $blocks]);
    }

    /**
     * 新增 Logo 區塊
     */
    public function insert(Request $req)
    {
        try {
            $block = FrontTypeL::create([
                'name' => $req->name ?? 'LOGO 區塊'
            ]);

            return response()->json(['success' => true, 'block' => $block]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * 綁定 Logos 到某個區塊
     * logo_ids = [1,2,3]
     */
    public function attach(Request $req, $blockId)
    {
        try {
            $block = FrontTypeL::findOrFail($blockId);

            $block->logos()->sync($req->logo_ids ?? []);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * 刪除區塊
     */
    public function delete($id)
    {
        try {
            $block = FrontTypeL::findOrFail($id);
            $block->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
