<?php

namespace App\Models\Front\FrontHomeType;

use Illuminate\Database\Eloquent\Model;

class FrontTypeL extends Model
{
    protected $table = 'front_type_logo';
    public $timestamps = false;

    protected $fillable = ['name', 'createTime'];

    public function logos()
    {
        return $this->belongsToMany(
            \App\Models\Logos::class,           // 使用 Logos model
            'front_type_logo_items',            // 關聯表
            'front_type_logo_id',               // 關聯表對應本表的欄位
            'logo_id'                           // 關聯表對應 logos 表的欄位
        )
        ->where('logos.active', 'Y')           // ✅ 自動只撈啟用的
        ->select('logos.id', 'logos.name', 'logos.image', 'logos.url'); // ✅ 限制欄位
    }
}
