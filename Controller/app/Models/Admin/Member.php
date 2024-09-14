<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $table = 'memberlist';
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'password',
        'address',
        'tel',
        'email',
        'level',
        'active',
        'remark',
        'createTime'
    ];

    protected $hidden = ['createTime'];


}
