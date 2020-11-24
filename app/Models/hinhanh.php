<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hinhanh extends Model
{
    use HasFactory;
    protected $table='HinhAnh';

    public function baiviet()
    {
    	return $this->belongsTo('baiviet');
    }


}
