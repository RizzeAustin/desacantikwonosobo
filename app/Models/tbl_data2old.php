<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_data2old extends Model
{
    use HasFactory;

    protected $primaryKey = 'b4k2_nik';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];
}
