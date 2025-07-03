<?php

namespace App\Models\Front\FrontHomeType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontTypeS extends Model
{
    public $timestamps = false;
    protected $table = 'front_type_slide';
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'slidePic1',
        'slidePic2',
        'slidePic3',
        'slidePic4',
        'slidePic5',
        'slideUrl1',
        'slideUrl2',
        'slideUrl3',
        'slideUrl4',
        'slideUrl5',
        'createTime'
    ];
}
