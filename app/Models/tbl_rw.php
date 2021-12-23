<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_rw extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['tbl_rt'];

    public function tbl_dusun(){
        return $this->belongsTo(tbl_dusun::class);
    }

    public function tbl_rt(){
        return $this->hasMany(tbl_rt::class);
    }
}
