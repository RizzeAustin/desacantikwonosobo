<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tbl_desa;

class TblDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tbl_desa::create(
            [
                'kd_prov' => '33',
                'kd_kab' => '07',
                'kd_kec' => '010',
                'kd_desa' => '001',
                'desa' => 'Kaligowong',
            ],
        );
    }
}
