<?php

namespace App\Imports;

use App\Models\tbl_data1;
use App\Models\tbl_data2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;

class TblData2Import implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithUpserts
{

    private $tbl1;

    public function __construct()
    {
        $this->tbl1 = tbl_data1::select('id', 'b1r7')->get();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $tbl_data1 = $this->tbl1->where('b1r7', $row['no_kk'])->first();

        $kk = $row['no_kk'];
        $nik = $row['nik'];
        $nama = $row['nama'];
        $jk = $row['jenis_kelamin'];
        $agama = $row['agama'];
        $statuskawin = $row['status_kawin'];
        $pekerjaan = $row['pekerjaan'];
        $hubkeluarga = $row['status_hub_keluarga'];
        $pendidikan = $row['pendidikan_akhir'];
        $ijazah = $row['pendidikan_akhir'];

        switch ($hubkeluarga) {
            case 'KEPALA KELUARGA': $hubkeluarga = '1'; break;
            case 'ISTRI': $hubkeluarga = '2'; break;
            case 'SUAMI': $hubkeluarga = '2'; break;
            case 'ANAK': $hubkeluarga = '3'; break;
            case 'MENANTU': $hubkeluarga = '4'; break;
            case 'CUCU': $hubkeluarga = '5'; break;
            case 'ORANG TUA': $hubkeluarga = '6'; break;
            case 'MERTUA': $hubkeluarga = '6'; break;
            case 'LAINNYA': $hubkeluarga = '8'; break;
            case 'FAMILI LAIN': $hubkeluarga = '8'; break;
            default: $hubkeluarga = null; break;
        }
        switch ($jk) {
            case 'LAKI-LAKI': $jk = '1'; break;
            case 'PEREMPUAN': $jk = '2'; break;
            default: $jk = null; break;
        }
        switch ($statuskawin) {
            case 'BELUM KAWIN': $statuskawin = '1'; break;
            case 'KAWIN': $statuskawin = '2'; break;
            case 'CERAI HIDUP': $statuskawin = '3'; break;
            case 'CERAI MATI': $statuskawin = '4'; break;
            default: $statuskawin = null; break;
        }
        switch ($pendidikan) {
            case 'TIDAK/BELUM SEKOLAH': $pendidikan = null; break;
            case 'TIDAK TAMAT SD/SEDERAJAT': $pendidikan = '01'; break;
            case 'TAMAT SD/SEDERAJAT': $pendidikan = '01'; break;
            case 'SLTP/SEDERAJAT': $pendidikan = '04'; break;
            case 'SLTA/SEDERAJAT': $pendidikan = '07'; break;
            case 'DIPLOMA I/II': $pendidikan = '10'; break;
            case 'AKADEMI/DIPLOMA III/S.MUDA': $pendidikan = '10'; break;
            case 'DIPLOMA IV/STRATA I': $pendidikan = '10'; break;
            case 'STRATA II': $pendidikan = '10'; break;
            default: $pendidikan = null; break;
        }
        switch ($ijazah) {
            case 'TIDAK/BELUM SEKOLAH': $ijazah = '0'; break;
            case 'TIDAK TAMAT SD/SEDERAJAT': $ijazah = '0'; break;
            case 'TAMAT SD/SEDERAJAT': $ijazah = '1'; break;
            case 'SLTP/SEDERAJAT': $ijazah = '2'; break;
            case 'SLTA/SEDERAJAT': $ijazah = '3'; break;
            case 'DIPLOMA I/II': $ijazah = '4'; break;
            case 'AKADEMI/DIPLOMA III/S.MUDA': $ijazah = '4'; break;
            case 'DIPLOMA IV/STRATA I': $ijazah = '5'; break;
            case 'STRATA II': $ijazah = '6'; break;
            default: $ijazah = null; break;
        }
        switch ($pekerjaan) {
            case 'BELUM/TIDAK BEKERJA': $pekerjaan = '2'; break;
            default: $pekerjaan = '1'; break;
        }
        switch ($agama) {
            case 'ISLAM': $agama = '1'; break;
            case 'KRISTEN': $agama = '2'; break;
            default: $agama = '1'; break;
        }

        return new tbl_data2([
            'parent_id' => $tbl_data1->id ?? NULL,
            'b1r7' => $kk,
            'b4k2_nama' => $nama,
            'b4k2_nik' => $nik,
            'b4k3' => $hubkeluarga,
            'b4k4' => $jk,
            'b4k6' => $statuskawin,
            'b4k16' => $pendidikan,
            'b4k18' => $ijazah,
            'b4k20' => $pekerjaan,
            'b4k23' => $agama,
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
