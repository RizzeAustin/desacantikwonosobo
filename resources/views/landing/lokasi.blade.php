@extends('layouts.main')

@section('container')

<h1 class="mt-4">Halaman Utama</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Lokasi</li>
</ol>

<div class="row">
    <div class="col-xl-4">
        <div class="card mb-4 border-dark">
            <div class="card-header black-card">
                <i class="fas fa-thumbtack"></i>    
                <span class="ms-2">Edit Data Kependudukan</span>
            </div>
            <div class="card-body">
                <form action="{{ url('/data/index') }}" method="POST" class="form-lokasi">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="kode" required>
                                    <option value="33">33 Jawa Tengah</option>
                                    @foreach ($prov as $p)
                                        <option value="{{ $p->kd_prov }}">{{ $p->kd_prov }} {{ $p->prov }}</option>
                                    @endforeach
                                </select>
                                <label for="provinsi" class="form-label">Provinsi</label>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" placeholder="kode" required>
                                    <option value="07">07 Wonosobo</option>
                                </select>
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="030" @if (env('KD_KEC')=='030') selected @endif>030 Sapuran</option>
                                    <option value="050" @if (env('KD_KEC')=='050') selected @endif>050 Leksono</option>
                                    <option value="070" @if (env('KD_KEC')=='070') selected @endif>070 Kalikajar</option>
                                    <option value="100" @if (env('KD_KEC')=='100') selected @endif>100 Watumalang</option>
                                    <option value="110" @if (env('KD_KEC')=='110') selected @endif>110 Mojotengah</option>
                                    <option value="120" @if (env('KD_KEC')=='120') selected @endif>120 Garung</option>
                                </select>
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('desa') is-invalid @enderror" id="desa" name="desa" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="002" @if (env('KD_KEC')=='050' && env('KD_DESA')=='002') selected @endif>002 Lipursari</option>
                                    <option value="002" @if (env('KD_KEC')=='110' && env('KD_DESA')=='002') selected @endif>002 Pungangan</option>
                                    <option value="003" @if (env('KD_KEC')=='120' && env('KD_DESA')=='003') selected @endif>003 Sendangsari</option>
                                    <option value="006" @if (env('KD_KEC')=='100' && env('KD_DESA')=='006') selected @endif>006 Gondang</option>
                                    <option value="008" @if (env('KD_KEC')=='110' && env('KD_DESA')=='008') selected @endif>008 Andongsili</option>
                                    <option value="011" @if (env('KD_KEC')=='030' && env('KD_DESA')=='011') selected @endif>011 Sapuran</option>
                                    <option value="013" @if (env('KD_KEC')=='070' && env('KD_DESA')=='013') selected @endif>013 Maduretno</option>
                                    <option value="014" @if (env('KD_KEC')=='110' && env('KD_DESA')=='014') selected @endif>014 Blederan</option>
                                </select>
                                <label for="desa" class="form-label">Desa/Kelurahan</label>
                                @error('desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card mb-4 border-dark">
            <div class="card-header black-card">
                <i class="fas fa-thumbtack"></i>    
                <span class="ms-2">Tabulasi, Tambah, dan Edit Data Spasial</span>
            </div>
            <div class="card-body">
                <form action="{{ url('/spasial') }}" method="POST" class="form-lokasi">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="kode" required>
                                    <option value="33">33 Jawa Tengah</option>
                                    @foreach ($prov as $p)
                                        <option value="{{ $p->kd_prov }}">{{ $p->prov }}</option>
                                    @endforeach
                                </select>
                                <label for="provinsi" class="form-label">Provinsi</label>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" placeholder="kode" required>
                                    <option value="07">07 Wonosobo</option>
                                </select>
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="030" @if (env('KD_KEC')=='030') selected @endif>030 Sapuran</option>
                                    <option value="050" @if (env('KD_KEC')=='050') selected @endif>050 Leksono</option>
                                    <option value="070" @if (env('KD_KEC')=='070') selected @endif>070 Kalikajar</option>
                                    <option value="100" @if (env('KD_KEC')=='100') selected @endif>100 Watumalang</option>
                                    <option value="110" @if (env('KD_KEC')=='110') selected @endif>110 Mojotengah</option>
                                    <option value="120" @if (env('KD_KEC')=='120') selected @endif>120 Garung</option>
                                </select>
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('desa') is-invalid @enderror" id="desa" name="desa" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="002" @if (env('KD_KEC')=='050' && env('KD_DESA')=='002') selected @endif>002 Lipursari</option>
                                    <option value="002" @if (env('KD_KEC')=='110' && env('KD_DESA')=='002') selected @endif>002 Pugangan</option>
                                    <option value="003" @if (env('KD_KEC')=='120' && env('KD_DESA')=='003') selected @endif>003 Sendangsari</option>
                                    <option value="006" @if (env('KD_KEC')=='100' && env('KD_DESA')=='006') selected @endif>006 Gondang</option>
                                    <option value="008" @if (env('KD_KEC')=='110' && env('KD_DESA')=='008') selected @endif>008 Andongsili</option>
                                    <option value="011" @if (env('KD_KEC')=='030' && env('KD_DESA')=='011') selected @endif>011 Sapuran</option>
                                    <option value="013" @if (env('KD_KEC')=='070' && env('KD_DESA')=='013') selected @endif>013 Maduretno</option>
                                    <option value="014" @if (env('KD_KEC')=='110' && env('KD_DESA')=='014') selected @endif>014 Blederan</option>
                                </select>
                                <label for="desa" class="form-label">Desa/Kelurahan</label>
                                @error('desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('tabel') is-invalid @enderror" id="tabel" name="tabel" placeholder="kode" style="margin-bottom: 0" required>
                                    <option value="1">Tabel 1. Banyaknya Dusun</option>
                                    <option value="2">Tabel 2. Banyaknya RW</option>
                                    <option value="3">Tabel 3. Banyaknya RT</option>
                                    <option value="4">Tabel 4. Banyaknya Tempat Ibadah</option>
                                    <option value="5">Tabel 5. Tanah Bengkok</option>
                                    <option value="6">Tabel 6. Tanah Kas Desa/Kelurahan</option>
                                    <option value="7">Tabel 7. Fasilitas Pendidikan</option>
                                    <option value="8">Tabel 8. Fasilitas Pendidikan Agama</option>
                                    <option value="9">Tabel 9. Organisasi Masyarakat</option>
                                    <option value="10">Tabel 10. Organisasi Masyarakat Keagamaan</option>
                                    <option value="11">Tabel 11. Fasilitas Kesehatan</option>
                                    <option value="12">Tabel 12. Tenaga Kesehatan</option>
                                    <option value="13">Tabel 13. Warga Penderita Gizi Buruk</option>
                                    <option value="14">Tabel 14. Kejadian Bencana Alam</option>
                                    <option value="15">Tabel 15. Sarana Olahraga</option>
                                    <option value="16">Tabel 16. Unit Kesenian dan Sarana Rekreasi</option>
                                    <option value="17">Tabel 17. Banyaknya Kelompok Tani dan Anggota Kelompok Tani</option>
                                    <option value="18">Tabel 18. Banyaknya Kelompok Wanita Tani dan Anggota Kelompok Wanita Tani </option>
                                    <option value="19">Tabel 19. Banyaknya Sarana dan Prasarana Ekonomi</option>
                                    <option value="20">Tabel 20. Sarana Lembaga Keuangan</option>
                                    <option value="21">Tabel 21. Banyaknya Koperasi yang Masih Aktif</option>
                                    <option value="22">Tabel 22. Banyaknya Penggergajian Kayu atau Penggilingan Padi</option>
                                    <option value="23">Tabel 23. Banyaknya Usaha Persewaan</option>
                                    <option value="24">Tabel 24. Banyaknya Sektor Jasa</option>
                                    <option value="25">Tabel 25. Fasilitas Jembatan</option>
                                    <option value="26">Tabel 26. Banyaknya Lembaga Keamanan</option>
                                    <option value="27">Tabel 27. Fasilitas Pengelolaan Sampah</option>
                                </select>
                                <label for="tabel" class="form-label">Tabel</label>
                                @error('tabel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card mb-4 border-dark">
            <div class="card-header black-card">
                <i class="fas fa-thumbtack"></i>    
                <span class="ms-2">Tabulasi Desa Dalam Angka</span>
            </div>
            <div class="card-body">
                <form action="{{ url('/tabel') }}" method="POST" class="form-lokasi">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="kode" required>
                                    <option value="33">33 Jawa Tengah</option>
                                    @foreach ($prov as $p)
                                        <option value="{{ $p->kd_prov }}">{{ $p->prov }}</option>
                                    @endforeach
                                </select>
                                <label for="provinsi" class="form-label">Provinsi</label>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" placeholder="kode" required>
                                    <option value="07">07 Wonosobo</option>
                                </select>
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="030" @if (env('KD_KEC')=='030') selected @endif>030 Sapuran</option>
                                    <option value="050" @if (env('KD_KEC')=='050') selected @endif>050 Leksono</option>
                                    <option value="070" @if (env('KD_KEC')=='070') selected @endif>070 Kalikajar</option>
                                    <option value="100" @if (env('KD_KEC')=='100') selected @endif>100 Watumalang</option>
                                    <option value="110" @if (env('KD_KEC')=='110') selected @endif>110 Mojotengah</option>
                                    <option value="120" @if (env('KD_KEC')=='120') selected @endif>120 Garung</option>
                                </select>
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('desa') is-invalid @enderror" id="desa" name="desa" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="002" @if (env('KD_KEC')=='050' && env('KD_DESA')=='002') selected @endif>002 Lipursari</option>
                                    <option value="002" @if (env('KD_KEC')=='110' && env('KD_DESA')=='002') selected @endif>002 Pugangan</option>
                                    <option value="003" @if (env('KD_KEC')=='120' && env('KD_DESA')=='003') selected @endif>003 Sendangsari</option>
                                    <option value="006" @if (env('KD_KEC')=='100' && env('KD_DESA')=='006') selected @endif>006 Gondang</option>
                                    <option value="008" @if (env('KD_KEC')=='110' && env('KD_DESA')=='008') selected @endif>008 Andongsili</option>
                                    <option value="011" @if (env('KD_KEC')=='030' && env('KD_DESA')=='011') selected @endif>011 Sapuran</option>
                                    <option value="013" @if (env('KD_KEC')=='070' && env('KD_DESA')=='013') selected @endif>013 Maduretno</option>
                                    <option value="014" @if (env('KD_KEC')=='110' && env('KD_DESA')=='014') selected @endif>014 Blederan</option>
                                </select>
                                <label for="desa" class="form-label">Desa/Kelurahan</label>
                                @error('desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('tabel') is-invalid @enderror" id="tabel" name="tabel" placeholder="kode" style="margin-bottom: 0" required>
                                    <option value="1">Tabel 1. Jumlah Penduduk Menurut Kelompok Umur</option>
                                    <option value="2">Tabel 2. Status Penguasaan Bangunan Tempat Tinggal yang Ditempati</option>
                                    <option value="3">Tabel 3. Jumlah Keluarga Menurut Luas Lantai</option>
                                    <option value="4">Tabel 4. Jumlah Keluarga Menurut Jenis Lantai Terluas</option>
                                    <option value="5">Tabel 5. Jumlah Keluarga Menurut Jenis Dinding Terluas</option>
                                    <option value="6">Tabel 6. Jumlah Keluarga Menurut Jenis Atap Terluas</option>
                                    <option value="7">Tabel 7. Jumlah Keluarga Menurut Sumber Air Minum</option>
                                    <option value="8">Tabel 8. Jumlah Keluarga Menurut Cara Memperoleh Air Minum</option>
                                    <option value="9">Tabel 9. Jumlah Keluarga Menurut Sumber Penerangan Utama</option>
                                    <option value="10">Tabel 10. Jumlah Keluarga Menurut Daya Terpasang Sumber Penerangan Listrik PLN</option>
                                    <option value="11">Tabel 11. Jumlah Keluarga Menurut Bahan Bakar/Energi Utama untuk Memasak</option>
                                    <option value="12">Tabel 12. Jumlah Keluarga Menurut Penggunaan Fasilitas Tempat Buang Air Besar</option>
                                    <option value="13">Tabel 13. Jumlah Keluarga Menurut Jenis Kloset</option>
                                    <option value="14">Tabel 14. Jumlah Keluarga Menurut Tempat Pembuangan Akhir Tinja</option>
                                    <option value="15">Tabel 15. Jumlah Penduduk Menurut Status Perkawinan, Kelompok Umur dan Jenis Kelamin</option>
                                    <option value="16">Tabel 16. Jumlah Penduduk Menurut Kepemilikan Kartu Identitas</option>
                                    <option value="17">Tabel 17. Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Status Kehamilan</option>
                                    <option value="18">Tabel 18. Jumlah Penduduk Wanita Umur 10-49 Tahun yang Berstatus Kawin Menurut Penggunaan Alat KB</option>
                                    <option value="19">Tabel 19. Jumlah Penduduk Menurut Jenis Cacat</option>
                                    <option value="20">Tabel 20. Jumlah Penduduk Menurut Penyakit Kronis/Menahun</option>
                                    <option value="21">Tabel 21. Jumlah Penduduk Menurut Golongan Darah</option>
                                    <option value="22">Tabel 22. Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Partisipasi Sekolah</option>
                                    <option value="23">Tabel 23. Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Ijazah Tertinggi yang Dimiliki</option>
                                    <option value="24">Tabel 24. Jumlah Penduduk Usia 5 Tahun ke Atas Menurut Lapangan Usaha</option>
                                    <option value="25">Tabel 25. Jumlah Keluarga Menurut Aset Bergerak</option>
                                    <option value="26">Tabel 26. Jumlah Ternak Menurut Jenis Ternak</option>
                                    <option value="27">Tabel 27. Jumlah Penduduk Disabilitas Menurut Umur</option>
                                    <option value="28">Tabel 28. Jumlah Keluarga Menurut Rata-Rata Pendapatan per Bulan</option>
                                </select>
                                <label for="tabel" class="form-label">Tabel</label>
                                @error('tabel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row border border-dark mb-4"></div>
<div class="row">
    <div class="col-xl-4">
        <div class="card mb-4 border-dark">
            <div class="card-header black-card">
                <i class="fas fa-thumbtack"></i>    
                <span class="ms-2">Pencarian Penduduk dengan Data Kuisioner</span>
            </div>
            <div class="card-body">
                <form action="{{ url('/data/kuisioner') }}" method="POST" class="form-lokasi">
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" placeholder="kode" required>
                                    <option value="33">33 Jawa Tengah</option>
                                    @foreach ($prov as $p)
                                        <option value="{{ $p->kd_prov }}">{{ $p->prov }}</option>
                                    @endforeach
                                </select>
                                <label for="provinsi" class="form-label">Provinsi</label>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" placeholder="kode" required>
                                    <option value="07">07 Wonosobo</option>
                                </select>
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="030" @if (env('KD_KEC')=='030') selected @endif>030 Sapuran</option>
                                    <option value="050" @if (env('KD_KEC')=='050') selected @endif>050 Leksono</option>
                                    <option value="070" @if (env('KD_KEC')=='070') selected @endif>070 Kalikajar</option>
                                    <option value="100" @if (env('KD_KEC')=='100') selected @endif>100 Watumalang</option>
                                    <option value="110" @if (env('KD_KEC')=='110') selected @endif>110 Mojotengah</option>
                                    <option value="120" @if (env('KD_KEC')=='120') selected @endif>120 Garung</option>
                                </select>
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select @error('desa') is-invalid @enderror" id="desa" name="desa" placeholder="kode" required>
                                    <option value=""></option>
                                    <option value="002" @if (env('KD_KEC')=='050' && env('KD_DESA')=='002') selected @endif>002 Lipursari</option>
                                    <option value="002" @if (env('KD_KEC')=='110' && env('KD_DESA')=='002') selected @endif>002 Pugangan</option>
                                    <option value="003" @if (env('KD_KEC')=='120' && env('KD_DESA')=='003') selected @endif>003 Sendangsari</option>
                                    <option value="006" @if (env('KD_KEC')=='100' && env('KD_DESA')=='006') selected @endif>006 Gondang</option>
                                    <option value="008" @if (env('KD_KEC')=='110' && env('KD_DESA')=='008') selected @endif>008 Andongsili</option>
                                    <option value="011" @if (env('KD_KEC')=='030' && env('KD_DESA')=='011') selected @endif>011 Sapuran</option>
                                    <option value="013" @if (env('KD_KEC')=='070' && env('KD_DESA')=='013') selected @endif>013 Maduretno</option>
                                    <option value="014" @if (env('KD_KEC')=='110' && env('KD_DESA')=='014') selected @endif>014 Blederan</option>
                                </select>
                                <label for="desa" class="form-label">Desa/Kelurahan</label>
                                @error('desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        var kab = {!! $kab !!}
        var kec = {!! $kec !!}
        var des = {!! $desa !!}

        var provinsi = $("#provinsi")
        var kabupaten = $("#kabupaten")
        var kecamatan = $("#kecamatan")
        var desa = $("#desa")

        provinsi.change(function(){
            kabupaten.empty().append('<option value=""></option>')
            for (let index = 0; index < kab.length; index++) {
                if (kab[index].kd_prov == provinsi.val()){
                    kabupaten.append(`<option value="${kab[index].kd_kab}">${kab[index].kd_kab} ${kab[index].kab}</option>`)
                }
            }
        })
        kabupaten.change(function(){
            kecamatan.empty().append('<option value=""></option>')
            for (let index = 0; index < kec.length; index++) {
                if (kec[index].kd_kab == kabupaten.val()){
                    kecamatan.append(`<option value="${kec[index].kd_kec}">${kec[index].kd_kec} ${kec[index].kec}</option>`)
                }
            }
        })
        kecamatan.change(function(){
            desa.empty().append('<option value=""></option>')
            for (let index = 0; index < des.length; index++) {
                if (des[index].kd_kec == kecamatan.val()){
                    desa.append(`<option value="${des[index].kd_desa}">${des[index].kd_desa} ${des[index].desa}</option>`)
                }
            }
        })
    });
</script>

@endsection