<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_desa extends Model
{
    use HasFactory;

    protected $primaryKey = 'kd_desa';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    // protected $with = ['tbl_prov', 'tbl_kab', 'tbl_kec'];

    // public function tbl_prov(){
    //     return $this->belongsTo(tbl_prov::class);
    // }
    // public function tbl_kab(){
    //     return $this->belongsTo(tbl_kab::class);
    // }
    // public function tbl_kec(){
    //     return $this->belongsTo(tbl_kec::class);
    // }

    // public function tbl_rt(){
    //     return $this->hasMany(tbl_rt::class);
    // }

    // public function tbl_data1(){
    //     return $this->hasMany(tbl_data1::class);
    // }
}
