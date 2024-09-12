<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ICap extends Model
{
    public $timestamps = false;
    protected $table = 'icap';
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'account',
        'password',
        'email',
        'hobbit',
    ];
}
