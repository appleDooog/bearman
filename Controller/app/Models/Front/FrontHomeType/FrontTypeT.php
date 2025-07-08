<?php

namespace App\Models\Front\FrontHomeType;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontTypeT extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $table = 'front_type_text';
    protected $primaryKey = "id";
    protected $fillable = [
        'title',
        'subtitle',
        'content',
    ];

    public function getList(){
        $list = self::all();
        return $list;
    }
}
