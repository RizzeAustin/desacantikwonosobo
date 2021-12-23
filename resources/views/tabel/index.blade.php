@extends('layouts.main')

@section('container')

<h1 class="mt-4" id="judul">Tabel Desa {{ $desa->desa }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $lokasi->provinsi }} > {{ $lokasi->kabupaten }} > {{ $lokasi->kecamatan }} > {{ $lokasi->desa }}</li>
</ol>

<div class="row">
    <div class="col-xl-10">
        <ul class="list-group">
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 1. Jumlah Penduduk Menurut Kelompok Umur di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel1') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 2. Status Penguasaan Bangunan Tempat Tinggal yang Ditempati di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel2') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 3. Jumlah Keluarga Menurut Luas Lantai di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel3') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 4. Jumlah Keluarga Menurut Jenis Lantai Terluas di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel4') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 5. Jumlah Keluarga Menurut Jenis Dinding Terluas di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel5') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 6. Jumlah Keluarga Menurut Jenis Atap Terluas di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel6') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 7. Jumlah Keluarga Menurut Sumber Air Minum di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel7') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 8. Jumlah Keluarga Menurut Cara Memperoleh Air Minum di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel8') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 9. Jumlah Keluarga Menurut Sumber Penerangan Utama di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel9') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 10. Jumlah Keluarga Menurut Daya Terpasang Sumber Penerangan Listrik PLN di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel10') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 11. Jumlah Keluarga Menurut Bahan Bakar/Energi Utama untuk Memasak di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel11') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 12. Jumlah Keluarga Menurut Penggunaan Fasilitas Tempat Buang Air Besar di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel12') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 13. Jumlah Keluarga Menurut Jenis Kloset di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel13') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 14. Jumlah Keluarga Menurut Tempat Pembuangan Akhir Tinja di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel14') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 15. Jumlah Penduduk Menurut Status Perkawinan, Kelompok Umur dan Jenis Kelamin di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel15') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 16. Jumlah Penduduk Menurut Kepemilikan Kartu Identitas di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel16') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 17. Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Status Kehamilan di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel17') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 18. Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Penggunaan Alat KB di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel18') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 19. Jumlah Penduduk Menurut Jenis Cacat di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel19') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 20. Jumlah Penduduk Menurut Penyakit Kronis/Menahun di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel20') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 21. Jumlah Penduduk Menurut Golongan Darah di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel21') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 22. Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Partisipasi Sekolah di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel22') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 23. Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Ijazah Tertinggi yang Dimiliki di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel23') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 24. Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Lapangan Usaha di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel24') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 25. Jumlah Keluarga Menurut Aset Bergerak di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel25') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 26. Jumlah Ternak Menurut Jenis Ternak di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel26') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 27. Jumlah Penduduk Disabilitas Menurut Umur di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel27') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 28. Jumlah Keluarga Menurut Rata-Rata Pendapatan per Bulan di Desa {{ $desa->desa }}
                <a href="{{ url('/tabel/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel28') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
          </ul>
    </div>
</div>

<script>
    $(document).ready(function(){
        var d = new Date().getFullYear()
        $('#judul').append(` Tahun ${d}`)
    })
</script>

@endsection