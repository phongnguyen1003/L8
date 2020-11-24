<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hinhthucgh extends Model
{
    use HasFactory;
    protected $table='HinhThucGH';

    public function baiviet()
    {
        return $this->hasMany('baiviet');
    }
}
