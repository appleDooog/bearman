<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'manager';
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'username',
        'password',
        'job',
        'createTime',
    ];


    public function getAdmin($username, $password){
        $manager = self::where("username",$username)->where("password",$password)->first();
        return $manager;
    }
}