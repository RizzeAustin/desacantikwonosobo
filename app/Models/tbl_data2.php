<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_data2 extends Model
{
    use HasFactory;

    // protected $primaryKey = 'b4k2_nik';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $guarded = ['id'];

    // protected $with = ['tbl_data1'];

    public function tbl_data1(){
        return $this->belongsTo(tbl_data1::class, 'parent_id');
    }
}
