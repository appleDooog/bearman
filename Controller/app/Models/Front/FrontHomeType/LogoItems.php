<?php

namespace App\Models\Front\FrontHomeType;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoItems extends Model
{
    protected $table = 'front_type_logo_items';
    public $timestamps = false;

    protected $fillable = [
        'front_type_logo_id',
        'logo_id',
    ];
}
