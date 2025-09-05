<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logos extends Model
{
    protected $table = 'logos';
    public $timestamps = false;

    protected $fillable = [
        'name', 'image', 'url', 'active', 'createTime'
    ];
}
