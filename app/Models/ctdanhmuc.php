<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctdanhmuc extends Model
{
    use HasFactory;
    protected $table='CTDanhMuc';

    public function danhmuc()
    {
    	return $this->belongsTo('danhmuc');
    }


}
