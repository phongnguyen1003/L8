<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    use HasFactory;
    protected $table='NguoiDung';


    public function taikhoandd()
    {
        return $this->hasMany('taikhoandd');
    }
    public function baiviet()
    {
        return $this->hasMany('baiviet');
    }
}
