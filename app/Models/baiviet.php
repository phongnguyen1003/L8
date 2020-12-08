<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baiviet extends Model
{
    use HasFactory;
    protected $table='BaiViet';

    // public function taikhoandd()
    // {
    // 	return $this->belongsTo('taikhoandd');
    // }

    // public function taikhoandd()
    // {
    // 	return $this->belongsToMany(taikhoandd::class);
    // }

    public function chitietbaiviet()
    {
        return $this->hasMany('chitietbaiviet');
    }

    public function quymo()
    {
    	return $this->belongsTo('quymo');
    }

    public function hinhthucgh()
    {
    	return $this->belongsTo('hinhthucgh');
    }

    public function loaitin()
    {
    	return $this->belongsTo('loaitin');
    }

    public function danhmuc()
    {
    	return $this->belongsTo('danhmuc');
    }

    public function hinhanh()
    {
        return $this->hasMany('hinhanh');
    }

}
