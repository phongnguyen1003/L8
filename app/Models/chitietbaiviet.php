<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietbaiviet extends Model
{
    use HasFactory;
    protected $table='ChiTietBaiViet';


    public function baiviet()
    {
    	return $this->belongsTo('baiviet');
    }

    public function taikhoandd()
    {
    	return $this->belongsTo('taikhoandd');
    }

}
