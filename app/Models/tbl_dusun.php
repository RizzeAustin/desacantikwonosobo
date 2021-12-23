<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_dusun extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $with = ['tbl_rw', 'tbl_rt'];

    public function tbl_rw(){
        return $this->hasMany(tbl_rw::class);
    }

    public function tbl_rt(){
        return $this->hasMany(tbl_rt::class);
    }
}
