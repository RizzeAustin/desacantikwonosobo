@extends('layouts.main')

@section('container')

@if ($title == 'Tabel 1') <h1 class="mt-4" id="judulTabel">Tabel 1 Jumlah Penduduk Menurut Kelompok Umur di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 2') <h1 class="mt-4" id="judulTabel">Tabel 2 Status Penguasaan Bangunan Tempat Tinggal yang Ditempati di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 3') <h1 class="mt-4" id="judulTabel">Tabel 3 Jumlah Keluarga Menurut Luas Lantai di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 4') <h1 class="mt-4" id="judulTabel">Tabel 4 Jumlah Keluarga Menurut Jenis Lantai Terluas di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 5') <h1 class="mt-4" id="judulTabel">Tabel 5 Jumlah Keluarga Menurut Jenis Dinding Terluas di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 6') <h1 class="mt-4" id="judulTabel">Tabel 6 Jumlah Keluarga Menurut Jenis Atap Terluas di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 7') <h1 class="mt-4" id="judulTabel">Tabel 7 Jumlah Keluarga Menurut Sumber Air Minum di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 8') <h1 class="mt-4" id="judulTabel">Tabel 8 Jumlah Keluarga Menurut Cara Memperoleh Air Minum di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 9') <h1 class="mt-4" id="judulTabel">Tabel 9 Jumlah Keluarga Menurut Sumber Penerangan Utama di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 10') <h1 class="mt-4" id="judulTabel">Tabel 10 Jumlah Keluarga Menurut Daya Terpasang Sumber Penerangan Listrik PLN di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 11') <h1 class="mt-4" id="judulTabel">Tabel 11 Jumlah Keluarga Menurut Bahan Bakar/Energi Utama untuk Memasak di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 12') <h1 class="mt-4" id="judulTabel">Tabel 12 Jumlah Keluarga Menurut Penggunaan Fasilitas Tempat Buang Air Besar di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 13') <h1 class="mt-4" id="judulTabel">Tabel 13 Jumlah Keluarga Menurut Jenis Kloset di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 14') <h1 class="mt-4" id="judulTabel">Tabel 14 Jumlah Keluarga Menurut Tempat Pembuangan Akhir Tinja di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 15') <h1 class="mt-4" id="judulTabel">Tabel 15 Jumlah Penduduk Menurut Status Perkawinan, Kelompok Umur dan Jenis Kelamin di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 16') <h1 class="mt-4" id="judulTabel">Tabel 16 Jumlah Penduduk Menurut Kepemilikan Kartu Identitas di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 17') <h1 class="mt-4" id="judulTabel">Tabel 17 Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Status Kehamilan di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 18') <h1 class="mt-4" id="judulTabel">Tabel 18 Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Penggunaan Alat KB di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 19') <h1 class="mt-4" id="judulTabel">Tabel 19 Jumlah Penduduk Menurut Jenis Cacat di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 20') <h1 class="mt-4" id="judulTabel">Tabel 20 Jumlah Penduduk Menurut Penyakit Kronis/Menahun di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 21') <h1 class="mt-4" id="judulTabel">Tabel 21 Jumlah Penduduk Menurut Golongan Darah di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 22') <h1 class="mt-4" id="judulTabel">Tabel 22 Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Partisipasi Sekolah di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 23') <h1 class="mt-4" id="judulTabel">Tabel 23 Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Ijazah Tertinggi yang Dimiliki di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 24') <h1 class="mt-4" id="judulTabel">Tabel 24 Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Lapangan Usaha di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 25') <h1 class="mt-4" id="judulTabel">Tabel 25 Jumlah Keluarga Menurut Aset Bergerak di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 26') <h1 class="mt-4" id="judulTabel">Tabel 26 Jumlah Ternak Menurut Jenis Ternak di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 27') <h1 class="mt-4" id="judulTabel">Tabel 27 Jumlah Penduduk Disabilitas Menurut Umur di Desa/Kelurahan {{ $desa->desa }}</h1> @endif
@if ($title == 'Tabel 28') <h1 class="mt-4" id="judulTabel">Tabel 28 Jumlah Keluarga Menurut Rata-Rata Pendapatan per Bulan di Desa/Kelurahan {{ $desa->desa }}</h1> @endif

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $lokasi[0] }} > {{ $lokasi[1] }} > {{ $lokasi[2] }} > {{ $lokasi[3] }}</li>
    <li class="breadcrumb-item active">Desa/Kelurahan {{ $desa->desa }}</li>
</ol>

<span class="me-2">Tabel:</span>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel1') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Menurut Kelompok Umur di Desa/Kelurahan {{ $desa->desa }}"> 1 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel2') }}" class="btn btn-info" data-toggle="tooltip" title="Status Penguasaan Bangunan Tempat Tinggal yang Ditempati di Desa/Kelurahan {{ $desa->desa }}"> 2 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel3') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Luas Lantai di Desa/Kelurahan {{ $desa->desa }}"> 3 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel4') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Jenis Lantai Terluas di Desa/Kelurahan {{ $desa->desa }}"> 4 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel5') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Jenis Dinding Terluas di Desa/Kelurahan {{ $desa->desa }}"> 5 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel6') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Jenis Atap Terluas di Desa/Kelurahan {{ $desa->desa }}"> 6 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel7') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Sumber Air Minum di Desa/Kelurahan {{ $desa->desa }}"> 7 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel8') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Cara Memperoleh Air Minum di Desa/Kelurahan {{ $desa->desa }}"> 8 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel9') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Sumber Penerangan Utama di Desa/Kelurahan {{ $desa->desa }}"> 9 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel10') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Daya Terpasang Sumber Penerangan Listrik PLN di Desa/Kelurahan {{ $desa->desa }}"> 10 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel11') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Bahan Bakar/Energi Utama untuk Memasak di Desa/Kelurahan {{ $desa->desa }}"> 11 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel12') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Penggunaan Fasilitas Tempat Buang Air Besar di Desa/Kelurahan {{ $desa->desa }}"> 12 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel13') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Jenis Kloset di Desa/Kelurahan {{ $desa->desa }}"> 13 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel14') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Tempat Pembuangan Akhir Tinja di Desa/Kelurahan {{ $desa->desa }}"> 14 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel15') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Menurut Status Perkawinan, Kelompok Umur dan Jenis Kelamin di Desa/Kelurahan {{ $desa->desa }}"> 15 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel16') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Menurut Kepemilikan Kartu Identitas di Desa/Kelurahan {{ $desa->desa }}"> 16 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel17') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Status Kehamilan di Desa/Kelurahan {{ $desa->desa }}"> 17 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel18') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Penggunaan Alat KB di Desa/Kelurahan {{ $desa->desa }}"> 18 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel19') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Menurut Jenis Cacat di Desa/Kelurahan {{ $desa->desa }}"> 19 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel20') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Menurut Penyakit Kronis/Menahun di Desa/Kelurahan {{ $desa->desa }}"> 20 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel21') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Menurut Golongan Darah di Desa/Kelurahan {{ $desa->desa }}"> 21 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel22') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Partisipasi Sekolah di Desa/Kelurahan {{ $desa->desa }}"> 22 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel23') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Ijazah Tertinggi yang Dimiliki di Desa/Kelurahan {{ $desa->desa }}"> 23 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel24') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Lapangan Usaha di Desa/Kelurahan {{ $desa->desa }}"> 24 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel25') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Aset Bergerak di Desa/Kelurahan {{ $desa->desa }}"> 25 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel26') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Ternak Menurut Jenis Ternak di Desa/Kelurahan {{ $desa->desa }}"> 26 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel27') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Penduduk Disabilitas Menurut Umur di Desa/Kelurahan {{ $desa->desa }}"> 27 </a>
<a href="{{ url('tabel/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel28') }}" class="btn btn-info" data-toggle="tooltip" title="Jumlah Keluarga Menurut Rata-Rata Pendapatan per Bulan di Desa/Kelurahan {{ $desa->desa }}"> 28 </a>


<div class="mt-4" style="overflow-x: auto">
    @if ($title == 'Tabel 1')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="3">0-4 Tahun</th>
                    <th colspan="3">5-9 Tahun</th>
                    <th colspan="3">10-14 Tahun</th>
                    <th colspan="3">15-19 Tahun</th>
                    <th colspan="3">20-24 Tahun</th>
                    <th colspan="3">25-29 Tahun</th>
                    <th colspan="3">30-34 Tahun</th>
                    <th colspan="3">35-39 Tahun</th>
                    <th colspan="3">40-44 Tahun</th>
                    <th colspan="3">45-49 Tahun</th>
                    <th colspan="3">50-54 Tahun</th>
                    <th colspan="3">55-59 Tahun</th>
                    <th colspan="3">60-64 Tahun</th>
                    <th colspan="3">65-69 Tahun</th>
                    <th colspan="3">70-74 Tahun</th>
                    <th colspan="3">75+ Tahun</th>
                </tr>
                <tr>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                    <td>(14)</td>
                    <td>(15)</td>
                    <td>(16)</td>
                    <td>(17)</td>
                    <td>(18)</td>
                    <td>(19)</td>
                    <td>(20)</td>
                    <td>(21)</td>
                    <td>(22)</td>
                    <td>(23)</td>
                    <td>(24)</td>
                    <td>(25)</td>
                    <td>(26)</td>
                    <td>(27)</td>
                    <td>(28)</td>
                    <td>(29)</td>
                    <td>(30)</td>
                    <td>(31)</td>
                    <td>(32)</td>
                    <td>(33)</td>
                    <td>(34)</td>
                    <td>(35)</td>
                    <td>(36)</td>
                    <td>(37)</td>
                    <td>(38)</td>
                    <td>(39)</td>
                    <td>(40)</td>
                    <td>(41)</td>
                    <td>(42)</td>
                    <td>(43)</td>
                    <td>(44)</td>
                    <td>(45)</td>
                    <td>(46)</td>
                    <td>(47)</td>
                    <td>(48)</td>
                    <td>(49)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $r)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($r as $agerange => $g)
                            <td>
                                @foreach ($g as $gender => $d)
                                    @if ($gender=='1') {{ $d }} @break @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($g as $gender => $d)
                                    @if ($gender=='2') {{ $d }} @break @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($g as $gender => $d)
                                    @if ($gender=='jumlah') {{ $d }} @break @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $agerange => $d)
                        <td>
                            @foreach ($d as $key => $t)
                                @if ($key=='1') {{ $t }} @break @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($d as $key => $t)
                                @if ($key=='2') {{ $t }} @break @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($d as $key => $t)
                                @if ($key=='jumlah') {{ $t }} @break @endif
                            @endforeach
                        </td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 2')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="5">Status penguasaan bangunan tempat tinggal</th>
                </tr>
                <tr>
                    <th>Milik Sendiri</th>
                    <th>Kontrak/Sewa</th>
                    <th>Bebas Sewa</th>
                    <th>Dinas</th>
                    <th>Lainnya</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $t)
                        <td>{{ $t }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 3')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="3">Luas Lantai</th>
                </tr>
                <tr>
                    <th>< 50 m2</th>
                    <th>50-100 m2</th>
                    <th>> 100 m2</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $t)
                        <td>{{ $t }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 4')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="10">Jenis Lantai Terluas</th>
                </tr>
                <tr>
                    <th>Marmer/Granit</th>
                    <th>Keramik</th>
                    <th>Parket/Vinil/Permadani</th>
                    <th>Ubin/Tegel/Teraso</th>
                    <th>Kayu/Papan Kualitas Tinggi</th>
                    <th>Semen/Bata Merah</th>
                    <th>Bambu</th>
                    <th>Kayu/Papan Kualitas Rendah</th>
                    <th>Tanah</th>
                    <th>Lainnya</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 5')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="7">Jenis Dinding Terluas</th>
                </tr>
                <tr>
                    <th>Tembok</th>
                    <th>Plesteran Anyaman Bambu/Kawat</th>
                    <th>Kayu</th>
                    <th>Anyaman Bambu</th>
                    <th>Batang Kayu</th>
                    <th>Bambu</th>
                    <th>Lainnya</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 6')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="10">Jenis Atap Terluas</th>
                </tr>
                <tr>
                    <th>Beton/Genteng Beton</th>
                    <th>Genteng Keramik</th>
                    <th>Genteng Metal</th>
                    <th>Genteng Tanah Liat</th>
                    <th>Asbes</th>
                    <th>Seng</th>
                    <th>Sirap</th>
                    <th>Bambu</th>
                    <th>Jerami/Ijuk/Daun Daunan/Rumbia</th>
                    <th>Lainnya</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 7')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="12">Sumber Air Minum</th>
                </tr>
                <tr>
                    <th>Air Kemasan Bermerk</th>
                    <th>Air Isi Ulang</th>
                    <th>Leding Meteran</th>
                    <th>Leding Eceran</th>
                    <th>Sumur Bor/Pompa</th>
                    <th>Sumur Terlindung</th>
                    <th>Sumur Tak Terlindung</th>
                    <th>Mata Air Terlindung</th>
                    <th>Mata Air Tak Terlindung</th>
                    <th>Air Sungai/Danau/Waduk</th>
                    <th>Air Hujan</th>
                    <th>lainnya</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 8')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="3">Cara Memperoleh Air Minum</th>
                </tr>
                <tr>
                    <th>Memebeli Eceran</th>
                    <th>Langganan</th>
                    <th>Tidak Memebeli</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 9')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="3">Sumber Penerangan Utama</th>
                </tr>
                <tr>
                    <th>Listrik PLN</th>
                    <th>Listrik Non PLN</th>
                    <th>Bukan Listrik</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 10')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="6">Daya Terpasang Sumber Penerangan Listrik PLN</th>
                </tr>
                <tr>
                    <th>450 watt</th>
                    <th>900 watt</th>
                    <th>1300 watt</th>
                    <th>2200 watt</th>
                    <th>>2200 watt</th>
                    <th>Tanpa Meteran</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 11')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="9">Bahan Bakar/Energi Utama untuk Memasak</th>
                </tr>
                <tr>
                    <th>Listrik</th>
                    <th>Gas >3 kg</th>
                    <th>Gas 3 kg</th>
                    <th>Gas Kota/Biogas</th>
                    <th>Minyak Tanah</th>
                    <th>Briket</th>
                    <th>Arang</th>
                    <th>Kayu Bakar</th>
                    <th>Tidak Memasak di Rumah</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 12')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="5">Fasilitas Tempat Buang Air Besar</th>
                </tr>
                <tr>
                    <th>Sendiri</th>
                    <th>Bersama</th>
                    <th>Umum</th>
                    <th>Tidak Ada</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif
    @if ($title == 'Tabel 13')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="5">Jenis Kloset</th>
                </tr>
                <tr>
                    <th>Leher Angsa</th>
                    <th>Plengsengan</th>
                    <th>Cemplung/Cubluk</th>
                    <th>Tidak Pakai</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 14')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="6">Tempat Pembuangan Akhir Tinja</th>
                </tr>
                <tr>
                    <th>Tangki</th>
                    <th>SPAL</th>
                    <th>Lubang Tanah</th>
                    <th>Kolam/Sawah/Sungai/Danau/laut</th>
                    <th>Pantai/Tanah Lapang/Kebun</th>
                    <th>Lainnya</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 15')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">Status Perkawinan</th>
                    <th colspan="3">< 19 Tahun</th>
                    <th colspan="3">19-24 Tahun</th>
                    <th colspan="3">25-30 Tahun</th>
                    <th colspan="3">> 30 Tahun</th>
                </tr>
                <tr>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $b4k6 => $r)
                    <tr class="t-center v-mid">
                        <td>{{ $b4k6 }}</td>
                        @foreach ($r as $agerange => $g)
                            <td>
                                @foreach ($g as $gender => $d)
                                    @if ($gender=='1') {{ $d }} @break @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($g as $gender => $d)
                                    @if ($gender=='2') {{ $d }} @break @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($g as $gender => $d)
                                    @if ($gender=='jumlah') {{ $d }} @break @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $agerange => $d)
                        <td>
                            @foreach ($d as $key => $t)
                                @if ($key=='1') {{ $t }} @break @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($d as $key => $t)
                                @if ($key=='2') {{ $t }} @break @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($d as $key => $t)
                                @if ($key=='jumlah') {{ $t }} @break @endif
                            @endforeach
                        </td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 16')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="5">Kepemilikan Kartu Identitas</th>
                </tr>
                <tr>
                    <th>Tidak Memiliki</th>
                    <th>Akta Kelahiran</th>
                    <th>Kartu Pelajar</th>
                    <th>KTP</th>
                    <th>SIM</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 17')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="2">Status Kehamilan</th>
                </tr>
                <tr>
                    <th>Ya</th>
                    <th>Tidak</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 18')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="9">Penggunaan Alat KB</th>
                </tr>
                <tr>
                    <th>MOW/Tubektomi</th>
                    <th>MOP/Vasektomi</th>
                    <th>AKDR/IUD/Spiral</th>
                    <th>Suntikan KB</th>
                    <th>Susuk KB/Norplan/Implanon/Alwalit</th>
                    <th>Pil KB</th>
                    <th>Kondom/Karet KB</th>
                    <th>Intraveg/Tisue/Kondom Wanita</th>
                    <th>Cara Tradisional</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 19')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="13">Jenis Cacat</th>
                </tr>
                <tr>
                    <th>Tidak cacat</th>
                    <th>Tuna daksa/cacat tubuh</th>
                    <th>Tuna netra/buta</th>
                    <th>Tuna rungu</th>
                    <th>Tuna wicara</th>
                    <th>Tuna rungu & wicara</th>
                    <th>Tuna netra & cacat tubuh</th>
                    <th>Tuna netra, rungu, & wicara</th>
                    <th>Tuna rungu, wicara, & cacat tubuh</th>
                    <th>Tuna rungu, wicara, netra, & cacat tubuh</th>
                    <th>Cacat mental retardasi</th>
                    <th>Mantan penderita gangguan jiwa</th>
                    <th>Cacat fisik & mental</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                    <td>(14)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 20')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="10">Penyakit Kronis/Menahun</th>
                </tr>
                <tr>
                    <th>Tidak ada</th>
                    <th>Hipertensi (tekanan darah tinggi)</th>
                    <th>Rematik</th>
                    <th>Asma</th>
                    <th>Masalah jantung</th>
                    <th>Diabetes (kencing manis)</th>
                    <th>Tuberculosis (TBC)</th>
                    <th>Stroke</th>
                    <th>Kanker atau tumor ganas</th>
                    <th>Lainnya (gagal ginjal, paru-paru flek, dan sejenisnya)</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 21')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="5">Golongan Darah</th>
                </tr>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th>AB</th>
                    <th>O</th>
                    <th>Tidak Tahu</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 22')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="3">Partisipasi Sekolah</th>
                </tr>
                <tr>
                    <th>Tidak/belum pernah sekolah</th>
                    <th>Masih sekolah</th>
                    <th>Tidak bersekolah lagi</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 23')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="7">Ijazah Tertinggi yang Dimiliki</th>
                </tr>
                <tr>
                    <th>Tidak punya ijazah</th>
                    <th>SD/sederajat</th>
                    <th>SMP/sederajat</th>
                    <th>SMA/sederajat</th>
                    <th>D1/D2/D3</th>
                    <th>D4/S1</th>
                    <th>S2/S3</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 24')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="22">Pekerjaan Menurut Lapangan Usaha</th>
                </tr>
                <tr>
                    <th>Pertanian tanaman padi & palawija</th>
                    <th>Hortikultura</th>
                    <th>Perkebunan</th>
                    <th>Perikanan tangkap</th>
                    <th>Perikanan budidaya</th>
                    <th>Peternakan</th>
                    <th>Kehutanan & pertanian lainnya</th>
                    <th>Pertambangan/penggalian</th>
                    <th>Industri pengolahan</th>
                    <th>Listrik & gas</th>
                    <th>Bangunan/kontruksi</th>
                    <th>Perdagangan</th>
                    <th>Hotel & rumah makan</th>
                    <th>Transportasi & pergudangan</th>
                    <th>Informasi & komunikasi</th>
                    <th>Keuangan & asuransi</th>
                    <th>Jasa pendidikan</th>
                    <th>Jasa kesehatan</th>
                    <th>Jasa kemasyarakatan, pemerintah, & perorangan</th>
                    <th>Pemulung</th>
                    <th>TKI</th>
                    <th>Lainnya</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                    <td>(14)</td>
                    <td>(15)</td>
                    <td>(16)</td>
                    <td>(17)</td>
                    <td>(18)</td>
                    <td>(19)</td>
                    <td>(20)</td>
                    <td>(21)</td>
                    <td>(22)</td>
                    <td>(23)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 25')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="15">Aset Bergerak</th>
                </tr>
                <tr>
                    <th>Tabung Gas 5,5 kg atau Lebih</th>
                    <th>Lemari Es/Kulkas</th>
                    <th>AC</th>
                    <th>Pemanas Air</th>
                    <th>Telepon Rumah (PSTN)</th>
                    <th>Televisi</th>
                    <th>Emas/Perhiasan & Tabungan (Senilai 10 gram Emas)</th>
                    <th>Komputer/Laptop</th>
                    <th>Sepeda</th>
                    <th>Sepeda Motor</th>
                    <th>Mobil</th>
                    <th>Perahu</th>
                    <th>Motor Tempel</th>
                    <th>Perahu Motor</th>
                    <th>Kapal</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                    <td>(14)</td>
                    <td>(15)</td>
                    <td>(16)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 26')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="5">Jenis Ternak</th>
                </tr>
                <tr>
                    <th>Sapi</th>
                    <th>Kerbau</th>
                    <th>Kuda</th>
                    <th>Babi</th>
                    <th>Kambing/Domba</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 27')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">Umur (Tahun)</th>
                    <th colspan="13">Jenis Cacat</th>
                </tr>
                <tr>
                    <th>Tidak cacat</th>
                    <th>Tuna daksa/cacat tubuh</th>
                    <th>Tuna netra/buta</th>
                    <th>Tuna rungu</th>
                    <th>Tuna wicara</th>
                    <th>Tuna rungu & wicara</th>
                    <th>Tuna netra & cacat tubuh</th>
                    <th>Tuna netra, rungu, & wicara</th>
                    <th>Tuna rungu, wicara, & cacat tubuh</th>
                    <th>Tuna rungu, wicara, netra, & cacat tubuh</th>
                    <th>Cacat mental retardasi</th>
                    <th>Mantan penderita gangguan jiwa</th>
                    <th>Cacat fisik & mental</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                    <td>(6)</td>
                    <td>(7)</td>
                    <td>(8)</td>
                    <td>(9)</td>
                    <td>(10)</td>
                    <td>(11)</td>
                    <td>(12)</td>
                    <td>(13)</td>
                    <td>(14)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>{{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $data)
                        <td>{{ $data }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    @if ($title == 'Tabel 28')
        <table class="table table-bordered display nowrap" id="tabelData" width=100%>
            <thead class="t-center">
                <tr class="v-mid">
                    <th rowspan="2">RW</th>
                    <th colspan="4  ">Rata-Rata Pendapatan per Bulan</th>
                </tr>
                <tr>
                    <th>< 1.000.000</th>
                    <th>1.000.000 - 2.000.000</th>
                    <th>2.000.000 - 4.000.000</th>
                    <th>> 4.000.000</th>
                </tr>
                <tr>
                    <td>(1)</td>
                    <td>(2)</td>
                    <td>(3)</td>
                    <td>(4)</td>
                    <td>(5)</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $d)
                    <tr class="t-center v-mid">
                        <td>RW {{ $key }}</td>
                        @foreach ($d as $data)
                            <td>{{ $data }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="t-center v-mid">
                    <td>Jumlah</td>
                    @foreach ($total as $t)
                        <td>{{ $t }}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    @endif 
    
</div>


<script>
    $(document).ready(function(){
        var d = new Date().getFullYear()
        $('#judulTabel').append(` Tahun ${d}`)

        $('#tabelData').DataTable({
            "language": {
                "emptyTable": "Belum terdapat data",
            },
            "orderCellsTop": true,
            "fixedColumns": true,
            "order": [0, 'asc'],
            "dom": 'Brt',
            "paging": false,
            "buttons": [
                {
                    extend: 'collection',
                    text: 'Unduh Tabel',
                    buttons: [
                        {
                            extend: 'csv',
                            filename: `{!! $title !!}`,
                            exportOptions: {
                                columns: ':visible',
                                search: 'applied',
                                order: 'applied'
                            },
                        },
                        {
                            extend: 'excelHtml5',
                            title: `${$('#judulTabel').text()}`,
                            filename: `{!! $title !!}`,
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: {
                                columns: ':visible',
                                search: 'applied',
                                order: 'applied'
                            },
                            footer: true,
                        },
                        // {
                        //     extend: 'excelHtml5',
                        //     title: `${$('#judulTabel').text()}`,
                        //     filename: `{!! $title !!}`,
                        //     orientation: 'landscape',
                        //     pageSize: 'A4',
                        //     exportOptions: {
                        //         columns: ':visible',
                        //         search: 'applied',
                        //         order: 'applied'
                        //     },
                        //     footer: true,
                        //     customize: function( xlsx ) {
                        //         var table = $('#tabelData').DataTable();
                        //         // Get number of columns to remove last hidden index column.
                        //         var numColumns = table.columns().header().count();
                        //         // console.log(numColumns)
                        //         // Get sheet.
                        //         var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        //         var col = $('col', sheet);
                        //         // Set the column width.
                        //         // $(col[1]).attr('width', 20);
                        //         // Get a clone of the sheet data.        
                        //         var sheetData = $('sheetData', sheet).clone();
                        //         // Clear the current sheet data for appending rows.
                        //         $('sheetData', sheet).empty();
                        //         // Row index from last column.
                        //         var DT_row;        // Row count in Excel sheet.
                        //         var rowCount = 1;
                        //         // Itereate each row in the sheet data.
                        //         $(sheetData).children().each(function(index) {
                        //             // Used for DT row() API to get child data.
                        //             console.log(index)
                        //             var rowIndex = index - 1;
                        //             // Don't process row if its the header row.
                        //             if (index > 0) {
                        //                 // Get row
                        //                 var row = $(this.outerHTML);
                        //                 // Set the Excel row attr to the current Excel row count.
                        //                 row.attr('r', rowCount);
                        //                 var colCount = 1;
                        //                 // Iterate each cell in the row to change the rwo number.
                        //                 row.children().each(function(index) {
                        //                     var cell = $(this);
                        //                     // Set each cell's row value.
                        //                     var rc = cell.attr('r');
                        //                     rc = rc.replace(/\d+$/, "") + rowCount;
                        //                     cell.attr('r', rc);         
                        //                     // if (colCount === numColumns) {
                        //                     //     DT_row = cell.text();
                        //                     //     cell.html('');
                        //                     // }
                        //                     colCount++;
                        //                 });
                        //                 // Get the row HTML and append to sheetData.
                        //                 row = row[0].outerHTML;
                        //                 $('sheetData', sheet).append(row);
                        //                 rowCount++;
                        //                 // Get the child data - could be any data attached to the row.
                        //                 // var childData = table.row(DT_row, {search: 'none', order: 'index'}).data().results; 
                        //                 // if (childData.length > 0) {
                        //                 //     // Prepare Excel formated row
                        //                 //     headerRow = '<row r="' + rowCount + 
                        //                 //                 '" s="2"><c t="inlineStr" r="A' + rowCount + 
                        //                 //                 '"><is><t>' + 
                        //                 //                 '</t></is></c><c t="inlineStr" r="B' + rowCount + 
                        //                 //                 '" s="2"><is><t>Result' + 
                        //                 //                 '</t></is></c><c t="inlineStr" r="C' + rowCount + 
                        //                 //                 '" s="2"><is><t>Notes' + 
                        //                 //                 '</t></is></c></row>'; 
                        //                 //     // Append header row to sheetData.
                        //                 //     $('sheetData', sheet).append(headerRow);
                        //                 //     rowCount++; // Inc excelt row counter.
                        //                 // }
                        //                 // The child data is an array of rows
                        //                 // for (c=0; c<childData.length; c++) {
                        //                 //     // Get row data.
                        //                 //     child = childData[c];
                        //                 //     // Prepare Excel formated row
                        //                 //     childRow = '<row r="' + rowCount + 
                        //                 //                 '"><c t="inlineStr" r="A' + rowCount + 
                        //                 //                 '"><is><t>' + 
                        //                 //                 '</t></is></c><c t="inlineStr" r="B' + rowCount + 
                        //                 //                 '"><is><t>' + child.result + 
                        //                 //                 '</t></is></c><c t="inlineStr" r="C' + rowCount + 
                        //                 //                 '"><is><t>' + child.note + 
                        //                 //                 '</t></is></c></row>';
                        //                 //     // Append row to sheetData.
                        //                 //     $('sheetData', sheet).append(childRow);
                        //                 //     rowCount++; // Inc excelt row counter.    
                        //                 // }
                        //             // Just append the header row and increment the excel row counter.
                        //             } else {
                        //                 var row = $(this.outerHTML);
                        //                 var colCount = 1;
                        //                 // Remove the last header cell.
                        //                 row.children().each(function(index) {
                        //                     var cell = $(this);
                        //                     if (colCount === numColumns) {
                        //                         cell.html('');
                        //                     }
                        //                     colCount++;
                        //                 });
                        //                 row = row[0].outerHTML;
                        //                 $('sheetData', sheet).append(row);
                        //                 rowCount++;
                        //             }
                        //         });        
                        //     },
                        // },
                    ]
                }
            ],
        });

        //styling table
        $('#tabelData thead tr th').css("background-color", "#4392f1").css("color", "#ffffff")
        $('#tabelData thead tr td').css("background-color", "#ffffff").css("padding-right", "0.5rem")
        $('#tabelData thead tr td:eq(0)').addClass("dtfc-fixed-left").css("position", "sticky").css("left", "0px")
        $('#tabelData tfoot tr td').css("background-color", "#ffffff")
    })
</script>


@endsection