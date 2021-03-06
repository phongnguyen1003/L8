<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taikhoandd extends Model
{
    use HasFactory;
    protected $table='TaiKhoanDD';

    // public function baiviet()
    // {
    //     return $this->hasMany('baiviet');
    // }

    public function nguoidung()
    {
    	return $this->belongsTo('nguoidung');
    }

    public function chitietbaiviet()
    {
        return $this->hasMany('chitietbaiviet');
    }

    // public function baiviet()
    // {
    //     return $this->belongsToMany(baiviet::class);
    // }

    // public function diendan()
    // {
    // 	return $this->belongsTo('diendan');
    // }

}
