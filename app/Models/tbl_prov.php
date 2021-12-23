<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_prov extends Model
{
    use HasFactory;

    protected $primaryKey = 'kd_prov';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    // public function tbl_kab(){
    //     return $this->hasMany(tbl_kab::class);
    // }
    // public function tbl_kec(){
    //     return $this->hasMany(tbl_kec::class);
    // }
    // public function tbl_desa(){
    //     return $this->hasMany(tbl_desa::class);
    // }
    // public function tbl_rt(){
    //     return $this->hasMany(tbl_rt::class);
    // }

    // public function tbl_data1(){
    //     return $this->hasMany(tbl_data1::class);
    // }
}
