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
        'image_data',
        'createTime'
    ];
}
