<?php

namespace App\Imports;

use App\Models\tbl_data2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;

class VaksinImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithUpserts
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $nik = $row['nik'];
        $dosis = $row['dosis'];
        $desa = $row['desakel'];
        
        return new tbl_data2([
            'b4k2_nik' => $nik,
            'vaksinCovid' => $dosis,
        ]);

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
        return 'b4k2_nik';
    }
}
