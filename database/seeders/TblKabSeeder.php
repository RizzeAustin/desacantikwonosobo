<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tbl_kab;

class TblKabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tbl_kab::create([
            'kd_prov' => '33',
            'kd_kab' => '07',
            'kab' => 'Wonosobo',
        ]);
    }
}
