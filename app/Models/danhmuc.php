<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $table='DanhMuc';

    public function baiviet()
    {
        return $this->hasMany('baiviet');
    }

    public function ctdanhmuc()
    {
        return $this->hasMany('ctdanhmuc');
    }
}
