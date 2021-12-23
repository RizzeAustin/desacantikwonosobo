<?php

namespace App\Imports;

use App\Models\tbl_data1;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;

class TblData1Import implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kd_prov = env('KD_PROV', '33');
        $kd_kab = env('KD_KAB', '07');
        $kd_kec = env('KD_KEC', '070');
        $kd_desa = env('KD_DESA', '013');
        
        $kk = $row['no_kk'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $rw = $row['rw'];
        $rt = $row['rt'];
        $hubkeluarga = $row['status_hub_keluarga'];

        if ($hubkeluarga=='KEPALA KELUARGA') {
            return new tbl_data1([
                'kd_prov' => $kd_prov,
                'kd_kab' => $kd_kab,
                'kd_kec' => $kd_kec,
                'kd_desa' => $kd_desa,
                'b1r7' => $kk,
                'b1r8' => $nama,
                'nm_dusun' => $alamat,
                'nm_rw' => $rw,
                'nm_rt' => $rt,
                'alamat' => 'RT '.$rt.' RW '.$rw.' DUSUN '.$alamat,
            ]);
        } else {
            return;
        }

    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'b1r7';
    }
}
