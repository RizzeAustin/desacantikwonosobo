<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spasial_tabel23 extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tbl_dusun(){
        return $this->belongsTo(tbl_dusun::class);
    }
    public function tbl_rw(){
        return $this->belongsTo(tbl_rw::class);
    }
    public function tbl_rt(){
        return $this->belongsTo(tbl_rt::class);
    }
}
