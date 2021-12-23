<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_data1 extends Model
{
    use HasFactory;

    // protected $primaryKey = 'b1r7';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $guarded = ['id'];

    // protected $with = ['tbl_prov', 'tbl_kab', 'tbl_kec', 'tbl_desa','tbl_rt'];
    protected $with = ['tbl_data2', 'tbl_data3', 'tbl_data4'];

    public function tbl_data2(){
        return $this->hasMany(tbl_data2::class, 'parent_id');
    }

    public function tbl_data3(){
        return $this->hasMany(tbl_data3::class, 'parent_id');
    }

    public function tbl_data4(){
        return $this->hasMany(tbl_data4::class, 'parent_id');
    }

    // public function tbl_prov(){
    //     return $this->belongsTo(tbl_prov::class, 'kd_prov');
    // }
    // public function tbl_kab(){
    //     return $this->belongsTo(tbl_kab::class, 'kd_kab');
    // }
    // public function tbl_kec(){
    //     return $this->belongsTo(tbl_kec::class, 'kd_kec');
    // }
    // public function tbl_desa(){
    //     return $this->belongsTo(tbl_desa::class, 'kd_desa')->where('kd_kec', '=', $this['kd_kec']);
    // }
    // public function tbl_rt(){
    //     return $this->belongsTo(tbl_rt::class, 'nm_rt');
    // }
}
