@extends('layouts.main')

@section('container')

<h1 class="mt-4" id="judul">Tabel Data Spasial Desa {{ $desa->desa }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $lokasi->provinsi }} > {{ $lokasi->kabupaten }} > {{ $lokasi->kecamatan }} > {{ $lokasi->desa }}</li>
</ol>

<div class="row">
    <div class="col-xl-6">
        <ul class="list-group">
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 1. Banyaknya Dusun
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel1') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 2. Banyaknya RW
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel2') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 3. Banyaknya RT
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel3') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 4. Banyaknya Tempat Ibadah
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel4') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 5. Tanah Bengkok
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel5') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 6. Tanah Kas Desa/Kelurahan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel6') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 7. Fasilitas Pendidikan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel7') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 8. Fasilitas Pendidikan Agama
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel8') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 9. Organisasi Masyarakat
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel9') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 10. Organisasi Masyarakat Keagamaan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel10') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 11. Fasilitas Kesehatan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel11') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 12. Tenaga Kesehatan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel12') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 13. Warga Penderita Gizi Buruk
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel13') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 14. Kejadian Bencana Alam
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel14') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
          </ul>
    </div>
    <div class="col-xl-6">
        <ul class="list-group">
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 15. Sarana Olahraga
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel15') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 16. Unit Kesenian dan Sarana Rekreasi
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel16') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 17. Banyaknya Kelompok Tani dan Anggota Kelompok Tani
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel17') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 18. Banyaknya Kelompok Wanita Tani dan Anggota Kelompok Wanita Tani 
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel18') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 19. Banyaknya Sarana dan Prasarana Ekonomi
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel19') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 20. Sarana Lembaga Keuangan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel20') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 21. Banyaknya Koperasi yang Masih Aktif
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel21') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 22. Banyaknya Penggergajian Kayu atau Penggilingan Padi
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel22') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 23. Banyaknya Usaha Persewaan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel23') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 24. Banyaknya Sektor Jasa
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel24') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 25. Fasilitas Jembatan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel25') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 26. Banyaknya Lembaga Keamanan
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel26') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 27. Fasilitas Pengelolaan Sampah
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel27') }}" class="btn btn-info">Lihat Tabel</a>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                Tabel 28.
                <a href="{{ url('/spasial/'.$lokasi->provinsi.'/'.$lokasi->kabupaten.'/'.$lokasi->kecamatan.'/'.$lokasi->desa.'/tabel28') }}" class="btn btn-info">Lihat Tabel</a>
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