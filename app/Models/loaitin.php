<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    use HasFactory;
    protected $table='LoaiTin';

    public function baiviet()
    {
        return $this->hasMany('baiviet');
    }
}
