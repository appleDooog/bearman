<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logos;
use Illuminate\Http\Request;

class AdminLogosController extends Controller
{
    public function list()
    {
        $logos = Logos::orderBy('createTime', 'desc')->get();
        return response()->json(['list' => $logos]);
    }


    public function insert(Request $req)
    {
        try {
            $item = new Logos();
            $item->name = $req->name;
            $item->url = $req->url ?? null;
            $item->active = $req->active ?? 'Y';

            if ($req->hasFile('image')) {
                $file = $req->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images/logos', $filename, 'public');
                $item->image = $path;
            }

            $item->save();

            return response()->json(['success' => true, 'data' => $item]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $item = Logos::findOrFail($id);

            $item->name = $req->name;
            $item->url = $req->url ?? null;
            $item->active = $req->active ?? 'Y';

            if ($req->hasFile('image')) {
                $file = $req->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images/logos', $filename, 'public');
                $item->image = $path;
            }

            $item->save();

            return response()->json(['success' => true, 'data' => $item]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function delete($id)
    {
        try {
            $item = Logos::find($id);

            // 刪圖片檔案
            if ($item->image && file_exists(public_path($item->image))) {
                unlink(public_path($item->image));
            }

            $item->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
