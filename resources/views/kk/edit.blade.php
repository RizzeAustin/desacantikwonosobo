@extends('layouts.main')

@section('container')

<h1 class="mt-4">Edit Data</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit Data {{ $data1->b1r7 }}</li>
</ol>

<div class="modal fade" id="blok4Modal" tabindex="-1" role="dialog" aria-labelledby="blok4ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="min-width: 80vw">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blok4ModalLabel">Tambah Anggota Keluarga</h5>
          <button class="btn btn-dark" type="button" class="close" onclick="hideModal()" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/data/edit/blok4table') }}" method="POST" id="blok4FormTable" class="form-tambah" autocomplete="off">
                @csrf
                <input type="hidden" name="b1r7Blok4Table" id="b1r7Blok4Table">
                <small><span class="text-danger error-text b1r7Blok4Table_err"></span></small>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b4k1" name="b4k1" placeholder="b4k1" value="" readonly>
                            <label for="b4k1" class="form-label">1. No Urut</label>
                            <small><span class="text-danger error-text b4k1_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b4k2_nama" name="b4k2_nama" placeholder="b4k2_nama" value="">
                            <label for="b4k2_nama" class="form-label">2. Nama anggota keluarga</label>
                            <small><span class="text-danger error-text b4k2_nama_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b4k2_nik" name="b4k2_nik" placeholder="b4k2_nik" value="">
                            <label for="b4k2_nik" class="form-label">NIK</label>
                            <small><span class="text-danger error-text b4k2_nik_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k3" name="b4k3" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Kepala keluarga</option>
                                <option value="2">2. Istri/suami</option>
                                <option value="3">3. Anak</option>
                                <option value="4">4. Menantu</option>
                                <option value="5">5. Cucu</option>
                                <option value="6">6. Orang tua/mertua</option>
                                <option value="7">7. Pembantu ruta</option>
                                <option value="8">8. Lainnya</option>
                            </select>
                            <label for="b4k3" class="form-label">3. Hubungan dengan kepala keluarga</label>
                            <small><span class="text-danger error-text b4k3_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select " id="b4k4" name="b4k4" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Laki-laki</option>
                                <option value="2">2. Perempuan</option>
                            </select>
                            <label for="b4k4" class="form-label">4. Jenis kelamin</label>
                            <small><span class="text-danger error-text b4k4_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="b4k5" name="b4k5" placeholder="b4k5" value="" min="0" max="999">
                            <label for="b4k5" class="form-label">5. Umur (Tahun)</label>
                            <small><span class="text-danger error-text b4k5_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="b4k5_dob" name="b4k5_dob" placeholder="b4k5_dob" value="">
                            <label for="b4k5_dob" class="form-label">Tanggal Lahir</label>
                            <small><span class="text-danger error-text b4k5_dob_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k6" name="b4k6" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Belum kawin</option>
                                <option value="2">2. Kawin/nikah</option>
                                <option value="3">3. Cerai hidup</option>
                                <option value="4">4. Cerai mati</option>
                            </select>
                            <label for="b4k6" class="form-label">6. Status perkawinan</label>
                            <small><span class="text-danger error-text b4k6_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k7" name="b4k7" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="0">0. Tidak</option>
                                <option value="1">1. Ya, dapat ditunjukkan</option>
                                <option value="2">2. Ya, tidak dapat ditunjukkan</option>
                            </select>
                            <label for="b4k7" class="form-label">7. Kepemilikan akta/buku nikah/akta cerai</label>
                            <small><span class="text-danger error-text b4k7_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k8" name="b4k8" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Ya</option>
                                <option value="2">2. Tidak</option>
                            </select>
                            <label for="b4k8" class="form-label">8. Tercantum dalam KK di keluarga ini</label>
                            <small><span class="text-danger error-text b4k8_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="b4k9" name="b4k9" placeholder="b4k9" value="" min="0" max="15">
                            <label for="b4k9" class="form-label">9. Kepemilikan kartu identitas</label>
                            <small><span class="text-danger error-text b4k9_err"></span></small>                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k10" name="b4k10" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="1">1. Ya</option>
                                <option value="2">2. Tidak</option>
                            </select>
                            <label for="b4k10" class="form-label">10. Status kehamilan</label>
                            <small><span class="text-danger error-text b4k10_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k11" name="b4k11" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="1">1. MOW/Tubektomi</option>
                                <option value="2">2. MOP/Vasektomi</option>
                                <option value="3">3. AKDR/IUD/Spiral</option>
                                <option value="4">4. Suntikan KB</option>
                                <option value="5">5. Susuk KB/Norplan/Implanon/Alwalit</option>
                                <option value="6">6. Pil KB</option>
                                <option value="7">7. Kondom/Karet KB</option>
                                <option value="8">8. Intravag/Tisue/Kondom Wanita</option>
                                <option value="9">9. Cara Tradisional</option>
                            </select>
                            <label for="b4k11" class="form-label">11. Alat KB</label>
                            <small><span class="text-danger error-text b4k11_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-3">
                        <small>
                            <table width=100%>
                                <tbody>
                                    <tr>
                                        <td>*Pilih KODE yang sesuai</td>
                                        <td>
                                            <input class="form-check-input mt-1 b4k9_check" type="checkbox" id="b4k9_2">
                                            <label class="form-check-label" for="b4k9_2"> 2. Kartu pelajar </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-check-input mt-1 b4k9_check" type="checkbox" id="b4k9_0">
                                            <label class="form-check-label" for="b4k9_2"> 0. Tidak memiliki </label>
                                        </td>
                                        <td>
                                            <input class="form-check-input mt-1 b4k9_check" type="checkbox" id="b4k9_4">
                                            <label class="form-check-label" for="b4k9_2"> 4. KTP </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-check-input mt-1 b4k9_check" type="checkbox" id="b4k9_1">
                                            <label class="form-check-label" for="b4k9_2"> 1. Akta kelahiran </label>
                                        </td>
                                        <td>
                                            <input class="form-check-input mt-1 b4k9_check" type="checkbox" id="b4k9_8">
                                            <label class="form-check-label" for="b4k9_2"> 8. SIM </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k12" name="b4k12" placeholder="kode">
                                <option value=""></option>
                                <option value="00">00. Tidak cacat</option>
                                <option value="01">01. Tuna daksa/cacat tubuh</option>
                                <option value="02">02. Tuna netra/buta</option>
                                <option value="03">03. Tuna rungu</option>
                                <option value="04">04. Tuna wicara</option>
                                <option value="05">05. Tuna rungu & wicara</option>
                                <option value="06">06. Tuna netra & cacat tubuh</option>
                                <option value="07">07. Tuna netra, rungu, & wicara</option>
                                <option value="08">08. Tuna rungu, wicara, & cacat tubuh</option>
                                <option value="09">09. Tuna rungu, wicara, netra, & cacat tubuh</option>
                                <option value="10">10. Cacat mental retardasi</option>
                                <option value="11">11. Mantan penderita gangguan jiwa</option>
                                <option value="12">12. Cacat fisik & mental</option>
                            </select>
                            <label for="b4k12" class="form-label">12. Jenis cacat</label>
                            <small><span class="text-danger error-text b4k12_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k13" name="b4k13" placeholder="kode">
                                <option value=""></option>
                                <option value="0">0. Tidak ada</option>
                                <option value="1">1. Hipertensi (tekanan darah tinggi)</option>
                                <option value="2">2. Rematik</option>
                                <option value="3">3. Asma</option>
                                <option value="4">4. Masalah jantung</option>
                                <option value="5">5. Diabetes (kencing manis)</option>
                                <option value="6">6. Tuberculosis (TBC)</option>
                                <option value="7">7. Stroke</option>
                                <option value="8">8. Kanker atau tumor ganas</option>
                                <option value="9">9. Lainnya (gagal ginjal, paru-paru flek, dan sejenisnya)</option>
                            </select>
                            <label for="b4k13" class="form-label">13. Penyakit kronis/menahun</label>
                            <small><span class="text-danger error-text b4k13_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k14" name="b4k14" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. A</option>
                                <option value="2">2. B</option>
                                <option value="3">3. AB</option>
                                <option value="4">4. O</option>
                                <option value="5">5. Tidak tahu</option>
                            </select>
                            <label for="b4k14" class="form-label">14. Golongan darah</label>
                            <small><span class="text-danger error-text b4k14_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k15" name="b4k15" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;" disabled>
                                <option value=""></option>
                                <option value="0">0. Tidak/belum pernah sekolah</option>
                                <option value="1">1. Masih sekolah</option>
                                <option value="2">2. Tidak bersekolah lagi</option>
                            </select>
                            <label for="b4k15" class="form-label">15. Partisipasi sekolah</label>
                            <small><span class="text-danger error-text b4k15_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k16" name="b4k16" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;" disabled>
                                <option value=""></option>
                                <option value="01">01. SD/SDLB</option>
                                <option value="02">02. Paket A</option>
                                <option value="03">03. M. Ibtidaiyah</option>
                                <option value="04">04. SMP/SMPLB</option>
                                <option value="05">05. Paket B</option>
                                <option value="06">06. M. Tsanawiyah</option>
                                <option value="07">07. SMA/SMK/SMALB</option>
                                <option value="08">08. Paket C</option>
                                <option value="09">09. M. Aliyah</option>
                                <option value="10">10. Perguruan tinggi</option>
                            </select>
                            <label for="b4k16" class="form-label">16. Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki</label>
                            <small><span class="text-danger error-text b4k16_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k17" name="b4k17" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;" disabled>
                                <option value=""></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8 (Tamat)</option>
                            </select>
                            <label for="b4k17" class="form-label">17. Kelas tertinggi yang pernah/sedang diduduki</label>
                            <small><span class="text-danger error-text b4k17_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k18" name="b4k18" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;" disabled>
                                <option value=""></option>
                                <option value="0">0. Tidak punya ijazah</option>
                                <option value="1">1. SD/sederajat</option>
                                <option value="2">2. SMP/sederajat</option>
                                <option value="3">3. SMA/sederajat</option>
                                <option value="4">4. D1/D2/D3</option>
                                <option value="5">5. D4/S1</option>
                                <option value="6">6. S2/S3</option>
                            </select>
                            <label for="b4k18" class="form-label">18. Ijazah tertinggi yang dimiliki</label>
                            <small><span class="text-danger error-text b4k18_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k19" name="b4k19" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="1">1. Ya</option>
                                <option value="2">2. Tidak</option>
                            </select>
                            <label for="b4k19" class="form-label">19. Pensiunan</label>
                            <small><span class="text-danger error-text b4k19_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k20" name="b4k20" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="1">1. Ya</option>
                                <option value="2">2. Tidak</option>
                            </select>
                            <label for="b4k20" class="form-label">20. Bekerja/ membantu bekerja</label>
                            <small><span class="text-danger error-text b4k20_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k21" name="b4k21" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="01">01. Pertanian tanaman padi & palawija</option>
                                <option value="02">02. Hortikultura</option>
                                <option value="03">03. Perkebunan</option>
                                <option value="04">04. Perikanan tangkap</option>
                                <option value="05">05. Perikanan budidaya</option>
                                <option value="06">06. Peternakan</option>
                                <option value="07">07. Kehutanan & pertanian lainnya</option>
                                <option value="08">08. Pertambangan/penggalian</option>
                                <option value="09">09. Industri pengolahan</option>
                                <option value="10">10. Listrik & gas</option>
                                <option value="11">11. Bangunan/kontruksi</option>
                                <option value="12">12. Perdagangan</option>
                                <option value="13">13. Hotel & rumah makan</option>
                                <option value="14">14. Transportasi & pergudangan</option>
                                <option value="15">15. Informasi & komunikasi</option>
                                <option value="16">16. Keuangan & asuransi</option>
                                <option value="17">17. Jasa pendidikan</option>
                                <option value="18">18. Jasa kesehatan</option>
                                <option value="19">19. Jasa kemasyarakatan, pemerintah, & perorangan</option>
                                <option value="20">20. Pemulung</option>
                                <option value="21">21. TKI</option>
                                <option value="22">22. Lainnya</option>
                            </select>
                            <label for="b4k21" class="form-label">21. Lapangan usaha dari pekerjaan utama</label>
                            <small><span class="text-danger error-text b4k21_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k22" name="b4k22" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="1">1. Berusaha sendiri</option>
                                <option value="2">2. Berusaha dibantu buruh tidak tetap/tidak dibayar</option>
                                <option value="3">3. Berusaha dibantu buruh tetap/dibayar</option>
                                <option value="4">4. Buruh/karyawan/pegawai swasta</option>
                                <option value="5">5. PNS/TNI/Polri/BUMN/BUMD</option>
                                <option value="6">6. Pekerja bebas pertanian</option>
                                <option value="7">7. Pekerja bebas non-pertanian</option>
                                <option value="8">8. Pekerja keluarga/tidak dibayar</option>
                            </select>
                            <label for="b4k22" class="form-label">22. Status kedudukan dalam pekerjaan utama</label>
                            <small><span class="text-danger error-text b4k22_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k23" name="b4k23" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Islam</option>
                                <option value="2">2. Protestan</option>
                                <option value="3">3. Katolik</option>
                                <option value="4">4. Hindu</option>
                                <option value="5">5. Budha</option>
                                <option value="6">6. Konghucu</option>
                                <option value="7">7. Lainnya</option>
                            </select>
                            <label for="b4k23" class="form-label">23. Agama</label>
                            <small><span class="text-danger error-text b4k23_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k24" name="b4k24" placeholder="kode">
                                <option value=""></option>
                                <option value="01">01. Arab</option>
                                <option value="02">02. Ambon</option>
                                <option value="03">03. Bali</option>
                                <option value="04">04. Batak</option>
                                <option value="05">05. Betawi</option>
                                <option value="06">06. Bugis</option>
                                <option value="07">07. China</option>
                                <option value="08">08. Dayak</option>
                                <option value="09">09. India</option>
                                <option value="10">10. Jawa</option>
                                <option value="11">11. Madura</option>
                                <option value="12">12. Melayu</option>
                                <option value="13">13. Minang</option>
                                <option value="14">14. Papua</option>
                                <option value="15">15. Sunda</option>
                                <option value="16">16. Timor</option>
                                <option value="17">17. Lainnya</option>
                            </select>
                            <label for="b4k24" class="form-label">24. Suku</label>
                            <small><span class="text-danger error-text b4k24_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b4k25" name="b4k25" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Alamat tempat tinggal dan KTP/KK di dalam desa</option>
                                <option value="2">2. Alamat tempat tinggal di dalam desa tapi KTP/KK di luar desa</option>
                                <option value="3">3. Alamat tempat tinggal di luar desa tapi KTP/KK di dalam desa</option>
                            </select>
                            <label for="b4k25" class="form-label">25. Domisili</label>
                            <small><span class="text-danger error-text b4k25_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="b4k26" name="b4k26" placeholder="b4k26" value="" min="0" max="511">
                            <label for="b4k26" class="form-label">26. Peserta Program Bansos</label>
                            <small><span class="text-danger error-text b4k26_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <small>
                            <table width=100%>
                                <tbody>
                                    <tr><td>*Pilih KODE yang sesuai untuk rincian 26</td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_0">
                                        <label class="form-check-label"> 0. Tidak memiliki </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_1">
                                        <label class="form-check-label"> 1. Kartu Keluarga Sejahtera (KKS)/Kartu Perlindungan Sosial (KPS) </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_2">
                                        <label class="form-check-label"> 2. Kartu Indonesia Pintar (KIP)/Bantuan Siswa Miskin (BSM) </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_4">
                                        <label class="form-check-label"> 4. Kartu Indonesia Sehat (KIS)/BPJS Kesehatan/Jamkesmas </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_8">
                                        <label class="form-check-label"> 8. BPJS Kesehatan peserta mandiri </label>
                                    </td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                    <div class="col-md">
                        <small>
                            <table width=100%>
                                <tbody>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_16">
                                        <label class="form-check-label"> 16. Jaminan sosial tenaga kerja (Jamsostek)/BPJS ketenagakerjaan </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_32">
                                        <label class="form-check-label"> 32. Asuransi kesehatan lainnya </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_64">
                                        <label class="form-check-label"> 64. Program Keluarga Harapan (PKH) </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_128">
                                        <label class="form-check-label"> 128. Bantuan Pangan Non Tunai (BPNT) </label>
                                    </td></tr>
                                    <tr><td>
                                        <input class="form-check-input mt-1 b4k26_check" type="checkbox" id="b4k26_256">
                                        <label class="form-check-label"> 256. Kredit Usaha Rakyat (KUR) </label>
                                    </td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary f-right" id="blok4tableSubmit">
                            Tambah Anggota Keluarga
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="blok5Modal" tabindex="-1" role="dialog" aria-labelledby="blok5ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blok5ModalLabel">Tambah Sertifikat Tanah</h5>
          <button class="btn btn-dark" type="button" class="close" onclick="hideModal()" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/data/edit/blok5table') }}" method="POST" id="blok5FormTable" class="form-tambah" autocomplete="off">
                @csrf
                <input type="hidden" name="b1r7Blok5Table" id="b1r7Blok5Table">
                <small><span class="text-danger error-text b1r7Blok5Table_err"></span></small>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b5k1" name="b5k1" placeholder="b5k1" value="" readonly>
                            <label for="b5k1" class="form-label">1. Nomor</label>
                            <small><span class="text-danger error-text b5k1_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b5k2" name="b5k2" placeholder="b5k2" value="">
                            <label for="b5k2" class="form-label">2. Nama Lahan</label>
                            <small><span class="text-danger error-text b5k2_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b5k3" name="b5k3" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Pekarangan</option>
                                <option value="2">2. Sawah irigasi</option>
                                <option value="3">3. Sawah tadah hujan</option>
                                <option value="4">4. Tegalan</option>
                                <option value="5">5. Kolam</option>
                            </select>
                            <label for="b5k3" class="form-label">3. Jenis lahan</label>
                            <small><span class="text-danger error-text b5k3_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b5k4" name="b5k4" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Ada SPPT</option>
                                <option value="2">2. Tidak ada SPPT</option>
                            </select>
                            <label for="b5k4" class="form-label">4. Keberadaan SPPT</label>
                            <small><span class="text-danger error-text b5k4_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b5k5" name="b5k5" placeholder="b5k5" value="" disabled>
                            <label for="b5k5" class="form-label">5. Nomor objek pajak</label>
                            <small><span class="text-danger error-text b5k5_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="b5k6" name="b5k6" placeholder="b5k6" value="0" min="0" readonly>
                            <label for="b5k6" class="form-label">6. Luas lahan (m2)</label>
                            <small><span class="text-danger error-text b5k6_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b5k7" name="b5k7" placeholder="kode" disabled>
                                <option value=""></option>
                                <option value="1">1. SHM</option>
                                <option value="2">2. HGB</option>
                                <option value="3">3. Tidak bersertifikat</option>
                            </select>
                            <label for="b5k7" class="form-label">7. Hak kepemilikan sertifikat</label>
                            <small><span class="text-danger error-text b5k7_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" list="b5k8List" class="form-control" id="b5k8" name="b5k8" placeholder="b5k8" disabled>
                            <datalist id="b5k8List"></datalist>
                            <label for="b5k8" class="form-label">8. Nama hak milik</label>
                            <small><span class="text-danger error-text b5k8_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary f-right mt-3" id="blok5tableSubmit">
                            Tambah Sertifikat Tanah
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="blok7Modal" tabindex="-1" role="dialog" aria-labelledby="blok7ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="blok7ModalLabel">Tambah Jenis Usaha</h5>
          <button class="btn btn-dark" type="button" class="close" onclick="hideModal()" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/data/edit/blok7table') }}" method="POST" id="blok7FormTable" class="form-tambah" autocomplete="off">
                @csrf
                <input type="hidden" name="b1r7Blok7Table" id="b1r7Blok7Table">
                <small><span class="text-danger error-text b1r7Blok7Table_err"></span></small>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b7r5bk0" name="b7r5bk0" placeholder="b7r5bk0" value="" readonly>
                            <label for="b7r5bk0" class="form-label">0. Nomor</label>
                            <small><span class="text-danger error-text b7r5bk0_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b7r5bk1" name="b7r5bk1" placeholder="kode">
                                <option value=""></option>
                            </select>
                            <label for="b7r5bk1" class="form-label">1. Nama Anggota Keluarga</label>
                            <small><span class="text-danger error-text b7r5bk1_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="b7r5bk2_usaha" name="b7r5bk2_usaha" placeholder="b7r5bk2_usaha" value="">
                            <label for="b7r5bk2_usaha" class="form-label">2. Jenis Usaha</label>
                            <small><span class="text-danger error-text b7r5bk2_usaha_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b7r5bk2_kode" name="b7r5bk2_kode" placeholder="kode">
                                <option value=""></option>
                                <option value="01">01. Pertanian tanaman padi dan palawija</option>
                                <option value="02">02. Hortikultura</option>
                                <option value="03">03. Perkebunan</option>
                                <option value="04">04. Perikanan tangkap</option>
                                <option value="05">05. Perikanan budidaya</option>
                                <option value="06">06. Peternakan</option>
                                <option value="07">07. Kehutanan dan pertanian lainnya</option>
                                <option value="08">08. Pertambangan/penggalian</option>
                                <option value="09">09. Usaha menjahit/tata busana</option>
                                <option value="10">10. Salon kecantikan</option>
                                <option value="11">11. Reparasi/montir mobil/motor</option>
                                <option value="12">12. Reparasi elektronika</option>
                                <option value="13">13. Industri barang dari kulit</option>
                                <option value="14">14. Industri barang dari kayu</option>
                                <option value="15">15. Industri barang dari logam</option>
                                <option value="16">16. Industri barang dari kain/tenun</option>
                                <option value="17">17. Industri gerabah/kramik/batu</option>
                                <option value="18">18. Industri anyaman dari rotan/bambu, rumput, pandan, dll</option>
                                <option value="19">19. Industri makanan dan minuman</option>
                                <option value="20">20. Industri lainnya</option>
                                <option value="21">21. Listrik dan gas</option>
                                <option value="22">22. Bangunan/kontruksi</option>
                                <option value="23">23. Toko/warung kelontong</option>
                                <option value="24">24. Perdagangan lain</option>
                                <option value="25">25. Warung/kedai makanan</option>
                                <option value="26">26. Penginapan (homestay)</option>
                                <option value="27">27. Hotel dan rumah makan</option>
                                <option value="28">28. Ojek pangkalan</option>
                                <option value="29">29. Ojek online</option>
                                <option value="30">30. Transportasi dan pergudangan lainnya</option>
                                <option value="31">31. Informasi dan komunikasi</option>
                                <option value="32">32. Keuangan dan asuransi</option>
                                <option value="33">33. Usaha les bahasa asing</option>
                                <option value="34">34. Usaha les komputer</option>
                                <option value="35">35. Jasa pendidikan lain</option>
                                <option value="36">36. Praktek dokter umum/spesialis</option>
                                <option value="37">37. Praktek dokter gigi</option>
                                <option value="38">38. Praktek bidan</option>
                                <option value="39">39. Jasa kesehatan lain</option>
                                <option value="40">40. Jasa kemasyarakatan, pemerintahan, & perorangan</option>
                                <option value="41">41. Pemulung</option>
                                <option value="42">42. Lainnya</option>
                            </select>
                            <label for="b7r5bk2_kode" class="form-label">Kode usaha</label>
                            <small><span class="text-danger error-text b7r5bk2_kode_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="b7r5bk3" name="b7r5bk3" placeholder="b7r5bk3" value="" min="0">
                            <label for="b7r5bk3" class="form-label">3. Jumlah pekerja (orang)</label>
                            <small><span class="text-danger error-text b7r5bk3_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b7r5bk4" name="b7r5bk4" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. Ada</option>
                                <option value="2">2. Tidak ada</option>
                            </select>
                            <label for="b7r5bk4" class="form-label">4. Tempat/lokasi usaha</label>
                            <small><span class="text-danger error-text b7r5bk4_err"></span></small>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="b7r5bk5" name="b7r5bk5" placeholder="kode">
                                <option value=""></option>
                                <option value="1">1. < 1 juta</option>
                                <option value="2">2. 1 - < 5 juta</option>
                                <option value="3">3. 5 - < 10 juta</option>
                                <option value="4">4. >= 10 juta</option>
                            </select>
                            <label for="b7r5bk5" class="form-label">5. Omset usaha perbulan</label>
                            <small><span class="text-danger error-text b7r5bk5_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary f-right" id="blok7tableSubmit">
                            Tambah Jenis Usaha
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="flagBlok4Modal" tabindex="-1" role="dialog" aria-labelledby="flagBlok4ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="flagBlok4ModalLabel">Flag - </h5>
          <button class="btn btn-dark" type="button" class="close" onclick="hideModal()" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/data/nik/flag/') }}" method="POST" id="flagBlok4Table" class="form-tambah">
                @csrf
                <input type="hidden" name="flagNik" id="flagNik">
                <small><span class="text-danger error-text flagNik_err"></span></small>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="blok4Flag" name="blok4Flag" placeholder="kode">
                                <option value="">Ada</option>
                                <option value="Pindah">Pindah</option>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Punya KK Baru">Punya KK Baru</option>
                            </select>
                            <label for="blok4Flag" class="form-label">Pemilik NIK ini</label>
                            <small><span class="text-danger error-text blok4Flag_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary f-right mt-3" id="flagBlok4TableSubmit">
                            Ubah Flag
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="list-group col-md-3">
                <div id="bloknav">
                    <a class="list-group-item list-group-item-action picker active" target="1">Blok I Pengenalan Tempat</a>
                    <a class="list-group-item list-group-item-action picker" target="2">Blok II Keterangan Petugas dan Responden</a>
                    <a class="list-group-item list-group-item-action picker" target="3">Blok III Keterangan Perumahan</a>
                    <a class="list-group-item list-group-item-action picker" target="4">Blok IV Keterangan Sosial dan Ekonomi Anggota Keluarga</a>
                    <a class="list-group-item list-group-item-action picker" target="5">Blok V Sertifikat Tanah</a>
                    <a class="list-group-item list-group-item-action picker" target="6">Blok VI Pendapatan Keluarga</a>
                    <a class="list-group-item list-group-item-action picker" target="7">Blok VII Kepemilikan Aset dan Keikutsertaan Program</a>
                    <a class="list-group-item list-group-item-action picker" target="8">Blok VIII Catatan</a>
                </div>
            </div>
            <div class="col-md-9">
                <div id="blok1" class="targetDiv border border-dark p-2">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok I Pengenalan Tempat</strong></div>
                    <div class="alert alert-success fade show" id="success-alert-blok1" role="alert" hidden></div>
                    <form action="{{ url('/data/edit/blok1') }}" method="POST" id="blok1Form" class="form-tambah" autocomplete="off">
                        @csrf
                        <input type="hidden" id="b1r7Blok1" name="b1r7Blok1">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="kd_prov" name="kd_prov" placeholder="kode">
                                        <option value=""></option>
                                        @foreach ($prov as $p)
                                            <option value="{{ $p->kd_prov }}">{{ $p->kd_prov }} {{ $p->prov }}</option>
                                        @endforeach
                                    </select>
                                    <label for="kd_prov" class="form-label">1. Provinsi</label>
                                    <small><span class="text-danger error-text kd_prov_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="kd_kab" name="kd_kab" placeholder="kode">
                                        <option value=""></option>
                                    </select>
                                    <label for="kd_kab" class="form-label">2. Kabupaten</label>
                                    <small><span class="text-danger error-text kd_kab_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="kd_kec" name="kd_kec" placeholder="kode">
                                        <option value=""></option>
                                    </select>
                                    <label for="kd_kec" class="form-label">3. Kecamatan</label>
                                    <small><span class="text-danger error-text kd_kec_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="kd_desa" name="kd_desa" placeholder="kode">
                                        <option value=""></option>
                                    </select>
                                    <label for="kd_desa" class="form-label">4. Desa/Kelurahan</label>
                                    <small><span class="text-danger error-text kd_desa_err"></span></small>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nm_dusun" name="nm_dusun" placeholder="nm_dusun" value="">
                                    <label for="nm_dusun" class="form-label">5. Dusun</label>
                                    <small><span class="text-danger error-text nm_dusun_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="">
                                    <label for="alamat" class="form-label">6. Alamat <small>(RT XXX RW XXX)</small></label>
                                    <small><span class="text-danger error-text alamat_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="b1r7" name="b1r7" placeholder="b1r7" value="">
                                    <label for="b1r7" class="form-label">7. Nomor Kartu keluarga</label>
                                    <small><span class="text-danger error-text b1r7_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" list="b1r8List" class="form-control" id="b1r8" name="b1r8" placeholder="b1r8" value="">
                                    <datalist id="b1r8List"></datalist>
                                    <label for="b1r8" class="form-label">8. Nama Kepala Keluarga</label>
                                    <small><span class="text-danger error-text b1r8_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b1r9" name="b1r9" placeholder="b1r9" value="" min="1" max="99">
                                    <label for="b1r9" class="form-label">9. Jumlah Anggota Keluarga</label>
                                    <small><span class="text-danger error-text b1r9_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="b1r10" name="b1r10" placeholder="b1r10" value="">
                                    <label for="b1r10" class="form-label">10. Nomor Bangunan Rumah</label>
                                    <small><span class="text-danger error-text b1r10_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" id="simpanBlok1">Simpan Blok I</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="blok2" class="targetDiv border border-dark p-2 mt-4">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok II Keterangan Petugas dan Responden</strong><span style="display: flex;">No KK: -</span></div>
                    <div class="alert alert-success fade show" id="success-alert-blok2" role="alert" hidden></div>
                    <div class="alert alert-danger fade show" id="error-alert-blok2" role="alert" hidden></div>
                    <form action="{{ url('/data/edit/blok2') }}" method="POST" id="blok2Form" class="form-tambah">
                        @csrf
                        <input type="hidden" id="b1r7Blok2" name="b1r7Blok2">
                        <small><span class="text-danger error-text b1r7Blok2_err"></span></small>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="b2r1" name="b2r1" placeholder="b2r1" value="">
                                    <label for="b2r1" class="form-label">1. Tanggal Pencacahan</label>
                                    <small><span class="text-danger error-text b2r1_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nm_pencacah" name="nm_pencacah" placeholder="nm_pencacah" value="">
                                    <label for="nm_pencacah" class="form-label">2. Nama Pencacah</label>
                                    <small><span class="text-danger error-text nm_pencacah_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kd_pencacah" name="kd_pencacah" placeholder="kd_pencacah" value="">
                                    <label for="kd_pencacah" class="form-label">Kode Pencacah</label>
                                    <small><span class="text-danger error-text kd_pencacah_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="b2r3" name="b2r3" placeholder="b2r3" value="">
                                    <label for="b2r3" class="form-label">3. Tanggal Pemeriksaan</label>
                                    <small><span class="text-danger error-text b2r3_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nm_pemeriksa" name="nm_pemeriksa" placeholder="nm_pemeriksa" value="">
                                    <label for="nm_pemeriksa" class="form-label">4. Nama Pemeriksa</label>
                                    <small><span class="text-danger error-text nm_pemerikssa_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kd_pemeriksa" name="kd_pemeriksa" placeholder="kd_pemeriksa" value="">
                                    <label for="kd_pemeriksa" class="form-label">Kode Pemeriksa</label>
                                    <small><span class="text-danger error-text kd_pemeriksa_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b2r5" name="b2r5" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Selesai dicacah</option>
                                        <option value="2">2. Tidak bersedia dicacah</option>
                                    </select>
                                    <label for="b2r5" class="form-label">5. Hasil Pencacahan</label>
                                    <small><span class="text-danger error-text b2r5_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" id="simpanBlok2">Simpan Blok II</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="blok3" class="targetDiv border border-dark p-2 mt-4">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok III Keterangan Perumahan</strong><span style="display: flex;">No KK: -</span></div>
                    <div class="alert alert-success fade show" id="success-alert-blok3" role="alert" hidden></div>
                    <div class="alert alert-danger fade show" id="error-alert-blok3" role="alert" hidden></div>
                    <form action="{{ url('/data/edit/blok3') }}" method="POST" id="blok3Form" class="form-tambah">
                        @csrf
                        <input type="hidden" id="b1r7Blok3" name="b1r7Blok3">
                        <small><span class="text-danger error-text b1r7Blok3_err"></span></small>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r1a" name="b3r1a" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                        <option value=""></option>
                                        <option value="1">1. Milik sendiri</option>
                                        <option value="2">2. Kontrak/sewa</option>
                                        <option value="3">3. Bebas sewa</option>
                                        <option value="4">4. Dinas</option>
                                        <option value="5">5. Lainnya</option>
                                    </select>
                                    <label for="b3r1a" class="form-label">1a. Status penguasaan bangunan tempat tinggal yang ditempati</label>
                                    <small><span class="text-danger error-text b3r1a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r1b" name="b3r1b" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;" {{ ($data1->b3r1b) ? '' : 'disabled' }}>
                                        <option value=""></option>
                                        <option value="1">1. Milik sendiri</option>
                                        <option value="2">2. Milik orang lain</option>
                                        <option value="3">3. Tanah negara</option>
                                        <option value="4">4. Lainnya</option>
                                    </select>
                                    <label for="b3r1b" class="form-label">1b. Status lahan tempat tinggal yang ditempati</label>
                                    <small><span class="text-danger error-text b3r1b_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b3r2" name="b3r2" placeholder="b3r2" value="" min="0" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <label for="b3r2" class="form-label">2. Luas lantai (m2)</label>
                                    <small><span class="text-danger error-text b3r2_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r3" name="b3r3" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                        <option value=""></option>
                                        <option value="01">01. Marmer/granit</option>
                                        <option value="02">02. Keramik</option>
                                        <option value="03">03. Parket/vinil/permadani</option>
                                        <option value="04">04. Ubin/tegel/teraso</option>
                                        <option value="05">05. Kayu/papan kualitas tinggi</option>
                                        <option value="06">06. Semen/bata merah</option>
                                        <option value="07">07. Bambu</option>
                                        <option value="08">08. Kayu/papan kualitas rendah</option>
                                        <option value="09">09. Tanah</option>
                                        <option value="10">10. Lainnya</option>
                                    </select>
                                    <label for="b3r3" class="form-label">3. Jenis lantai terluas</label>
                                    <small><span class="text-danger error-text b3r3_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r4a" name="b3r4a" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Tembok</option>
                                        <option value="2">2. Plesteran anyaman bambu/kawat</option>
                                        <option value="3">3. Kayu</option>
                                        <option value="4">4. Anyaman bambu</option>
                                        <option value="5">5. Batang kayu</option>
                                        <option value="6">6. Bambu</option>
                                        <option value="7">7. Lainnya</option>
                                    </select>
                                    <label for="b3r4a" class="form-label">4a. Jenis dinding terluas</label>
                                    <small><span class="text-danger error-text b3r4a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r4b" name="b3r4b" placeholder="kode" {{ ($data1->b3r4b) ? '' : 'disabled' }}>
                                        <option value=""></option>
                                        <option value="1">1. Bagus/kualitas tinggi</option>
                                        <option value="2">2. Jelek/kualitas rendah</option>
                                    </select>
                                    <label for="b3r4b" class="form-label">4b. Kondisi dinding</label>
                                    <small><span class="text-danger error-text b3r4b_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r5a" name="b3r5a" placeholder="kode">
                                        <option value=""></option>
                                        <option value="01">01. Beton/genteng beton</option>
                                        <option value="02">02. Genteng keramik</option>
                                        <option value="03">03. Genteng metal</option>
                                        <option value="04">04. Genteng tanah liat</option>
                                        <option value="05">05. Asbes</option>
                                        <option value="06">06. Seng</option>
                                        <option value="07">07. Sirap</option>
                                        <option value="08">08. Bambu</option>
                                        <option value="09">09. Jerami/ijuk/daun daunan/rumbia</option>
                                        <option value="10">10. Lainnya</option>
                                    </select>
                                    <label for="b3r5a" class="form-label">5a. Jenis atap terluas</label>
                                    <small><span class="text-danger error-text b3r5a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r5b" name="b3r5b" placeholder="kode" {{ ($data1->b3r5b) ? '' : 'disabled' }}>
                                        <option value=""></option>
                                        <option value="1">1. Bagus/kualitas tinggi</option>
                                        <option value="2">2. Jelek/kualitas rendah</option>
                                    </select>
                                    <label for="b3r5b" class="form-label">5b. Kondisi atap</label>
                                    <small><span class="text-danger error-text b3r5b_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b3r6" name="b3r6" placeholder="b3r6" value="" min="0" max="99">
                                    <label for="b3r6" class="form-label">6. Jumlah kamar tidur</label>
                                    <small><span class="text-danger error-text b3r6_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r7" name="b3r7" placeholder="kode">
                                        <option value=""></option>
                                        <option value="01">01. Air kemasan bermerk</option>
                                        <option value="02">02. Air isi ulang</option>
                                        <option value="03">03. Leding meteran</option>
                                        <option value="04">04. Leding eceran</option>
                                        <option value="05">05. Sumur bor/pompa</option>
                                        <option value="06">06. Sumur terlindung</option>
                                        <option value="07">07. Sumur tak terlindung</option>
                                        <option value="08">08. Mata air terlindung</option>
                                        <option value="09">09. Mata air tak terlindung</option>
                                        <option value="10">10. Air sungai/danau/waduk</option>
                                        <option value="11">11. Air hujan</option>
                                        <option value="12">12. Lainnya</option>
                                    </select>
                                    <label for="b3r7" class="form-label">7. Sumber air minum</label>
                                    <small><span class="text-danger error-text b3r7_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r8" name="b3r8" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Membeli eceran</option>
                                        <option value="2">2. Langganan</option>
                                        <option value="3">3. Tidak membeli</option>
                                    </select>
                                    <label for="b3r8" class="form-label">8. Cara memperoleh air minum</label>
                                    <small><span class="text-danger error-text b3r8_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r9a" name="b3r9a" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Listrik PLN</option>
                                        <option value="2">2. Listrik non PLN</option>
                                        <option value="3">3. Bukan listrik</option>
                                    </select>
                                    <label for="b3r9a" class="form-label">9a. Sumber penerangan utama</label>
                                    <small><span class="text-danger error-text b3r9a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r9b" name="b3r9b" placeholder="kode" {{ ($data1->b3r9b) ? '' : 'disabled' }}>
                                        <option value=""></option>
                                        <option value="1">1. 450 watt</option>
                                        <option value="2">2. 900 watt</option>
                                        <option value="3">3. 1300 watt</option>
                                        <option value="4">4. 2200 watt</option>
                                        <option value="5">5. > 2200 watt</option>
                                        <option value="6">6. Tanpa meteran</option>
                                    </select>
                                    <label for="b3r9b" class="form-label">9b. Daya terpasang</label>
                                    <small><span class="text-danger error-text b3r9b_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r10" name="b3r10" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Listrik</option>
                                        <option value="2">2. Gas > 3 kg</option>
                                        <option value="3">3. Gas 3 kg</option>
                                        <option value="4">4. Gas kota/biogas</option>
                                        <option value="5">5. Minyak tanah</option>
                                        <option value="6">6. Briket</option>
                                        <option value="7">7. Arang</option>
                                        <option value="8">8. Kayu bakar</option>
                                        <option value="9">9. Tidak memasak di rumah</option>
                                    </select>
                                    <label for="b3r10" class="form-label">10. Bahan bakar/energi utama untuk memasak</label>
                                    <small><span class="text-danger error-text b3r10_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r11a" name="b3r11a" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Sendiri</option>
                                        <option value="2">2. Bersama</option>
                                        <option value="3">3. Umum</option>
                                        <option value="4">4. Tidak ada</option>
                                    </select>
                                    <label for="b3r11a" class="form-label">11a. Penggunaan fasilitas buang air besar</label>
                                    <small><span class="text-danger error-text b3r11a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r11b" name="b3r11b" placeholder="kode" {{ ($data1->b3r11b) ? '' : 'disabled' }}>
                                        <option value=""></option>
                                        <option value="1">1. Leher angsa</option>
                                        <option value="2">2. Plengsengan</option>
                                        <option value="3">3. Cemplung/cubluk</option>
                                        <option value="4">4. Tidak pakai</option>
                                    </select>
                                    <label for="b3r11b" class="form-label">11b. Jenis kloset</label>
                                    <small><span class="text-danger error-text b3r11b_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b3r12" name="b3r12" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Tangki</option>
                                        <option value="2">2. SPAL</option>
                                        <option value="3">3. Lubang tanah</option>
                                        <option value="4">4. Kolam/sawah/sungai/danau/laut</option>
                                        <option value="5">5. Pantai/tanah lapang/kebun</option>
                                        <option value="6">6. Lainnya</option>
                                    </select>
                                    <label for="b3r12" class="form-label">12. Tempat pembuangan akhir tinja</label>
                                    <small><span class="text-danger error-text b3r12_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" id="simpanBlok3">Simpan Blok III</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="blok4" class="targetDiv border border-dark p-2 mt-4">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok IV Keterangan Sosial Ekonomi Anggota keluarga</strong><span style="display: flex;">No KK: -</span></div>
                    <div class="alert alert-success fade show" id="success-alert-blok4" role="alert" hidden></div>
                    <div class="alert alert-danger fade show" id="error-alert-blok4" role="alert" hidden></div>
                    <div class="row">
                        <div class="col">
                            <button type="button" id="showBlok4" class="btn btn-success" data-toggle="modal" data-whatever=""><i class="fas fa-plus"></i> Tambah Anggota Keluarga</button>
                        </div>
                    </div>
                    <div style="overflow-x: auto">
                        <table id="blok4TableAnggotaKeluarga" class="table table-striped table-bordered">
                            <thead>
                                <tr class="v-mid t-center">
                                    <th width=10%>No Urut</th>
                                    <th width=35%>Nama</th>
                                    <th width=25%>NIK</th>
                                    <th width=15%>Flag</th>
                                    <th width=15%>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="blok5" class="targetDiv border border-dark p-2 mt-4">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok V Sertifikat Tanah</strong><span style="display: flex;">No KK: -</span></div>
                    <div class="alert alert-success fade show" id="success-alert-blok5" role="alert" hidden></div>
                    <div class="alert alert-danger fade show" id="error-alert-blok5" role="alert" hidden></div>
                    <div class="row">
                        <div class="col">
                            <button type="button" id="showBlok5" class="btn btn-success" data-toggle="modal" data-whatever=""><i class="fas fa-plus"></i> Tambah Sertifikat</button>
                        </div>
                    </div>
                    <div style="overflow-x: auto">
                        <table id="blok5SertifikatTanah" class="table table-striped table-bordered">
                            <thead>
                                <tr class="v-mid t-center">
                                    <th width=5%>No</th>
                                    <th width=25%>Nama Lahan</th>
                                    <th width=25%>Jenis</th>
                                    <th width=25%>SPPT</th>
                                    <th width=20%>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="blok6" class="targetDiv border border-dark p-2 mt-4">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok VI Pendapatan Keluarga</strong><span style="display: flex;">No KK: -</span></div>
                    <div class="alert alert-success fade show" id="success-alert-blok6" role="alert" hidden></div>
                    <div class="alert alert-danger fade show" id="error-alert-blok6" role="alert" hidden></div>
                    <form action="{{ url('/data/edit/blok6') }}" method="POST" id="blok6Form" class="form-tambah">
                        @csrf
                        <input type="hidden" name="b1r7Blok6" id="b1r7Blok6">
                        <small><span class="text-danger error-text b1r7Blok6_err"></span></small>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="b6r1k1" name="b6r1k1" placeholder="b6r1k1" value="">
                                    <label for="b6r1k1" class="form-label">1. Pekerjaan yang mendapatkan penghasilan terbesar</label>
                                    <small><span class="text-danger error-text b6r1k1_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b6r1k2" name="b6r1k2" placeholder="kode">
                                        <option value=""></option>
                                        <option value="00">00. Penerimaan pendapatan</option>
                                        <option value="01">01. Pertanian tanaman padi & palawija</option>
                                        <option value="02">02. Hortikultura</option>
                                        <option value="03">03. Perkebunan</option>
                                        <option value="04">04. Perikanan tangkap</option>
                                        <option value="05">05. Perikanan budidaya</option>
                                        <option value="06">06. Peternakan</option>
                                        <option value="07">07. Kehutanan & pertanian lainnya</option>
                                        <option value="08">08. Pertambangan/penggalian</option>
                                        <option value="09">09. Industri pengolahan</option>
                                        <option value="10">10. Listrik & gas</option>
                                        <option value="11">11. Bangunan/kontruksi</option>
                                        <option value="12">12. Perdagangan</option>
                                        <option value="13">13. Hotel & rumah makan</option>
                                        <option value="14">14. Transportasi & pergudangan</option>
                                        <option value="15">15. Informasi & komunikasi</option>
                                        <option value="16">16. Keuangan & asuransi</option>
                                        <option value="17">17. Jasa pendidikan</option>
                                        <option value="18">18. Jasa kesehatan</option>
                                        <option value="19">19. Jasa kemasyarakatan, pemerintah, & perorangan</option>
                                        <option value="20">20. Pemulung</option>
                                        <option value="21">21. TKI</option>
                                        <option value="22">22. Lainnya</option>
                                    </select>
                                    <label for="b6r1k2" class="form-label">Kode Lapangan Usaha</label>
                                    <small><span class="text-danger error-text b6r1k2_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b6r2" name="b6r2" placeholder="b6r2" value="" min="0">
                                    <label for="b6r2" class="form-label">2. Pendapatan seluruh anggota keluarga per bulan (Rp)</label>
                                    <small><span class="text-danger error-text b6r2_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" id="simpanBlok6">Simpan Blok VI</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="blok7" class="targetDiv border border-dark p-2 mt-4">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok VII Kepemilikan Aset dan Keikutsertaan Program</strong><span style="display: flex;">No KK: -</span></div>
                    <div class="alert alert-success fade show" id="success-alert-blok7" role="alert" hidden></div>
                    <div class="alert alert-danger fade show" id="error-alert-blok7" role="alert" hidden></div>
                    <form action="{{ url('/data/edit/blok7') }}" method="POST" id="blok7Form" class="form-tambah">
                        @csrf
                        <input type="hidden" name="b1r7Blok7" id="b1r7Blok7">
                        <small><span class="text-danger error-text b1r7Blok7_err"></span></small>
                        <div class="row">
                            <div class="col">
                                1. Keluarga memiliki sendiri aset bergerak sebagai berikut
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1a" name="b7r1a" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1a" class="form-label">a. Tabung gas 5,5 kg atau lebih</label>
                                    <small><span class="text-danger error-text b7r1a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1b" name="b7r1b" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r1b" class="form-label">b. Lemari es/kulkas</label>
                                    <small><span class="text-danger error-text b7r1b_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1c" name="b7r1c" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1c" class="form-label">c. AC</label>
                                    <small><span class="text-danger error-text b7r1c_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1d" name="b7r1d" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r1d" class="form-label">d. Pemanas air (water heater)</label>
                                    <small><span class="text-danger error-text b7r1d_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1e" name="b7r1e" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1e" class="form-label">e. Telepon rumah (PSTN)</label>
                                    <small><span class="text-danger error-text b7r1e_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1f" name="b7r1f" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r1f" class="form-label">f. Televisi</label>
                                    <small><span class="text-danger error-text b7r1f_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1g" name="b7r1g" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1g" class="form-label">g. Emas/perhiasan & tabungan (senilai 10 gram emas)</label>
                                    <small><span class="text-danger error-text b7r1g_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1h" name="b7r1h" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r1h" class="form-label">h. Komputer/laptop</label>
                                    <small><span class="text-danger error-text b7r1h_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1i" name="b7r1i" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1i" class="form-label">i. Sepeda</label>
                                    <small><span class="text-danger error-text b7r1i_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1j" name="b7r1j" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r1j" class="form-label">j. Sepeda motor</label>
                                    <small><span class="text-danger error-text b7r1j_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1k" name="b7r1k" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1k" class="form-label">k. Mobil</label>
                                    <small><span class="text-danger error-text b7r1k_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1l" name="b7r1l" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r1l" class="form-label">l. Perahu</label>
                                    <small><span class="text-danger error-text b7r1l_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1m" name="b7r1m" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1m" class="form-label">m. Motor tempel</label>
                                    <small><span class="text-danger error-text b7r1m_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1n" name="b7r1n" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r1n" class="form-label">n. Perahu motor</label>
                                    <small><span class="text-danger error-text b7r1n_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r1o" name="b7r1o" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r1o" class="form-label">o. Kapal</label>
                                    <small><span class="text-danger error-text b7r1o_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r2a" name="b7r2a" placeholder="b7r2a" value="" min="0">
                                    <label for="b7r2a" class="form-label">2a. Jumlah nomor HP aktif yang dimiliki oleh seluruh anggota keluarga</label>
                                    <small><span class="text-danger error-text b7r2a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r2b" name="b7r2b" placeholder="b7r2b" value="" min="0">
                                    <label for="b7r2b" class="form-label">2b. Jumlah TV layar datar minimal 30 inch yang dimiliki keluarga</label>
                                    <small><span class="text-danger error-text b7r2b_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                3. Keluarga yang memiliki aset tidak bergerak sebagai berikut
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r3a1" name="b7r3a1" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r3a1" class="form-label">a. Lahan</label>
                                    <small><span class="text-danger error-text b7r3a1_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r3a2" name="b7r3a2" placeholder="b7r3a2" value="" min="0" disabled>
                                    <label for="b7r3a2" class="form-label">Luas (m2)</label>
                                    <small><span class="text-danger error-text b7r3a2_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r3b" name="b7r3b" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r3b" class="form-label">b. Rumah di tempat lain</label>
                                    <small><span class="text-danger error-text b7r3b_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                4. Jumlah ternak yang dimiliki (ekor)
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r4a" name="b7r4a" placeholder="b7r4a" value="" min=0>
                                    <label for="b7r4a" class="form-label">a. Sapi</label>
                                    <small><span class="text-danger error-text b7r4a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r4b" name="b7r4b" placeholder="b7r4b" value="" min=0>
                                    <label for="b7r4b" class="form-label">b. Kerbau</label>
                                    <small><span class="text-danger error-text b7r4b_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r4c" name="b7r4c" placeholder="b7r4c" value="" min=0>
                                    <label for="b7r4c" class="form-label">c. Kuda</label>
                                    <small><span class="text-danger error-text b7r4c_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r4d" name="b7r4d" placeholder="b7r4d" value="" min=0>
                                    <label for="b7r4d" class="form-label">d. Babi</label>
                                    <small><span class="text-danger error-text b7r4d_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="b7r4e" name="b7r4e" placeholder="b7r4e" value="" min=0>
                                    <label for="b7r4e" class="form-label">e. Kambing/domba</label>
                                    <small><span class="text-danger error-text b7r4e_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r5a" name="b7r5a" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r5a" class="form-label">5a. Apakah ada anggota keluarga yang memiliki usaha sendiri/bersama?</label>
                                    <small><span class="text-danger error-text b7r5a_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                5b. Jika 5a="Ya"
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <button type="button" id="showBlok7" class="btn btn-success" data-toggle="modal" data-whatever="" disabled><i class="fas fa-plus"></i> Tambah Usaha</button>
                            </div>
                        </div>
                        <div style="overflow-x: auto">
                            <table id="blok7Usaha" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="v-mid t-center">
                                        <th width=5%>No</th>
                                        <th width=20%>(No Urut) Nama</th>
                                        <th width=30%>Jenis Usaha</th>
                                        <th width=10%>Jumlah pekerja</th>
                                        <th width=10%>Lokasi usaha</th>
                                        <th width=15%>Omset perbulan</th>
                                        <th width=10%>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                6. Keluarga menjadi/memiliki kartu program berikut
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6a" name="b7r6a" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r6a" class="form-label">a. Kartu Keluarga Sejahtera (KKS)/Kartu Perlindungan Sosial (KPS)</label>
                                    <small><span class="text-danger error-text b7r6a_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6b" name="b7r6b" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r6b" class="form-label">b. Kartu Indonesia Pintar (KIP)/Bantuan Siswa Miskin (BSM)</label>
                                    <small><span class="text-danger error-text b7r6b_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6c" name="b7r6c" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r6c" class="form-label">c. Kartu Indonesia Sehat (KIS)/BPJS Kesehatan/Jamkesmas</label>
                                    <small><span class="text-danger error-text b7r6c_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6d" name="b7r6d" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r6d" class="form-label">d. BPJS Kesehatan peserta mandiri</label>
                                    <small><span class="text-danger error-text b7r6d_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6e" name="b7r6e" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r6e" class="form-label">e. Jaminan sosial tenaga kerja (Jamsostek)/BPJS ketenagakerjaan</label>
                                    <small><span class="text-danger error-text b7r6e_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6f" name="b7r6f" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r6f" class="form-label">f. Asuransi kesehatan lainnya</label>
                                    <small><span class="text-danger error-text b7r6f_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6g" name="b7r6g" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r6g" class="form-label">g. Program Keluarga Harapan (PKH)</label>
                                    <small><span class="text-danger error-text b7r6g_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6h" name="b7r6h" placeholder="kode">
                                        <option value=""></option>
                                        <option value="3">3. Ya</option>
                                        <option value="4">4. Tidak</option>
                                    </select>
                                    <label for="b7r6h" class="form-label">h. Bantuan Pangan Non Tunai (BPNT)</label>
                                    <small><span class="text-danger error-text b7r6h_err"></span></small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <select type="text" class="form-select" id="b7r6i" name="b7r6i" placeholder="kode">
                                        <option value=""></option>
                                        <option value="1">1. Ya</option>
                                        <option value="2">2. Tidak</option>
                                    </select>
                                    <label for="b7r6i" class="form-label">i. Kredit Usaha Rakyat (KUR)</label>
                                    <small><span class="text-danger error-text b7r6i_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" id="simpanBlok7">Simpan Blok VII</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="blok8" class="targetDiv border border-dark p-2 mt-4">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok VIII Catatan</strong><span style="display: flex;">No KK: -</span></div>
                    <div class="alert alert-success fade show" id="success-alert-blok8" role="alert" hidden></div>
                    <div class="alert alert-danger fade show" id="error-alert-blok8" role="alert" hidden></div>
                    <form action="{{ url('/data/add/blok8') }}" method="POST" id="blok8Form" class="form-tambah">
                        @csrf
                        <input type="hidden" name="b1r7Blok8" id="b1r7Blok8">
                        <small><span class="text-danger error-text b1r7Blok8_err"></span></small>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" id="catatan" name="catatan" cols="30" rows="10"></textarea>
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <small><span class="text-danger error-text catatan_err"></span></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-primary" id="simpanBlok8">Simpan Blok VIII</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        
        var controller = new ScrollMagic.Controller();
        var scene = new ScrollMagic.Scene({
            duration: 3500,
            offset: 120,
        }).setPin('#bloknav').addTo(controller);
        $('.picker').click(function(){
            $('.picker').removeClass('active')
            $(this).addClass('active')
            $('html,body').scrollTop($('#blok'+$(this).attr('target')).offset().top -75);
        });
        var y = window.matchMedia("(max-width: 450px)")
        removeNav(y, scene) // Call listener function at run time
        y.addListener(removeNav) // Attach listener function on state changes

        // -----------------------------------------------------------------------------------------------------    BLOK 1

        var kabData = {!! $kab !!}
        var kecData = {!! $kec !!}
        var desData = {!! $desa !!}
        var provinsiForm = $("#kd_prov")
        var kabupatenForm = $("#kd_kab")
        var kecamatanForm = $("#kd_kec")
        var desaForm = $("#kd_desa")

        provinsiForm.change(function(){
            kabupatenForm.empty().append('<option value=""></option>')
            for (let index = 0; index < kabData.length; index++) {
                if (kabData[index].kd_prov == provinsiForm.val()){
                    kabupatenForm.append(`<option value="${kabData[index].kd_kab}">${kabData[index].kd_kab} ${kabData[index].kab}</option>`)
                }
            }
        })
        kabupatenForm.change(function(){
            kecamatanForm.empty().append('<option value=""></option>')
            for (let index = 0; index < kecData.length; index++) {
                if (kecData[index].kd_kab == kabupatenForm.val()){
                    kecamatanForm.append(`<option value="${kecData[index].kd_kec}">${kecData[index].kd_kec} ${kecData[index].kec}</option>`)
                }
            }
        })
        kecamatanForm.change(function(){
            desaForm.empty().append('<option value=""></option>')
            for (let index = 0; index < desData.length; index++) {
                if (desData[index].kd_kec == kecamatanForm.val()){
                    desaForm.append(`<option value="${desData[index].kd_desa}">${desData[index].kd_desa} ${desData[index].desa}</option>`)
                }
            }
        })

        $('#b1r7').focusout(function(){
            $('#b1r7Blok2').val($(this).val())
            $('#b1r7Blok3').val($(this).val())
            $('#b1r7Blok4Table').val($(this).val())
            $('#b1r7Blok5Table').val($(this).val())
            $('#b1r7Blok6').val($(this).val())
            $('#b1r7Blok7Table').val($(this).val())
            $('#b1r7Blok7').val($(this).val())
            $('#b1r7Blok8').val($(this).val())

            $('.blokHed > span').text('No KK: '+$(this).val())
        })

        $('#blok1Form').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    console.log(data)
                    removeErrorMsg(data.key)
                    if($.isEmptyObject(data.error)){
                        $('#success-alert-blok1').prop('hidden', false).html(data.success)
                        $('html,body').scrollTop($('#blok1').offset().top -75);
                        alertDismiss()
                    } else {
                        printErrorMsg(data.error)
                    }
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    ajaxfail('blok1')
                }
            });
        })

        // -----------------------------------------------------------------------------------------------------    BLOK 2

        $('#blok2Form').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)

                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#success-alert-blok2').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok2').offset().top -75);
                            alertDismiss()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#error-alert-blok2').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok2').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    ajaxfail('blok2')
                }
            });
        })

        // -----------------------------------------------------------------------------------------------------    BLOK 3
        
        $('#b3r1a').change(function(){
            if ($(this).val()=='1'){
                $('#b3r1b').prop('disabled', false)
            } else {
                $('#b3r1b').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b3r4a').change(function(){
            let array = ['1','2','3']
            if (array.indexOf($(this).val())!=-1){
                $('#b3r4b').prop('disabled', false)
            } else {
                $('#b3r4b').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b3r5a').change(function(){
            let array = ['01','02','03','04','05','06','07']
            if (array.indexOf($(this).val())!=-1){
                $('#b3r5b').prop('disabled', false)
            } else {
                $('#b3r5b').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b3r9a').change(function(){
            if ($(this).val()=='1'){
                $('#b3r9b').prop('disabled', false)
            } else {
                $('#b3r9b').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b3r11a').change(function(){
            if ($(this).val()=='4'){
                $('#b3r11b').prop('disabled', true).prop("selectedIndex", 0)
            } else {
                $('#b3r11b').prop('disabled', false)
            }
        })

        $('#blok3Form').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)

                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#success-alert-blok3').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok3').offset().top -75);
                            alertDismiss()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#error-alert-blok3').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok3').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    ajaxfail('blok3')
                }
            });
        })

        // -----------------------------------------------------------------------------------------------------    BLOK 4
        
        var blok4TableAnggotaKeluarga = $('#blok4TableAnggotaKeluarga').DataTable({
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
            "language": {
                "emptyTable": "Belum terdapat anggota keluarga",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 - 0 dari 0 entri",
                "infoFiltered":   "(disaring dari _MAX_ total entri)",
                "lengthMenu":     "Menampilkan _MENU_ entri",
                "search":         "Cari:",
                "zeroRecords":    "Data tidak ditemukan",
                "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Selanjutnya",
                    "previous":   "Sebelumnya"
                },
            },
            "autoWidth": false,
            "order": [ ],
            "dom": 'rt',
            "paging": false,
        });

        $('#b4k4').change(function(){
            if ($('#b4k4').val()==1) {
                $('#b4k10').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k11').prop('disabled', true).prop("selectedIndex", 0)
            }
        })

        $('#b4k6').change(function(){
            let array = ['2','3']
            if (array.indexOf($(this).val())!=-1){
                $('#b4k7').prop('disabled', false)
            } else {
                $('#b4k7').prop('disabled', true).prop("selectedIndex", 0)
            }

            if ($('#b4k4').val()==2 && $('#b4k5').val()>=10 && $('#b4k5').val()<=49 && $('#b4k6').val()==2) {
                $('#b4k10').prop('disabled', false)
                $('#b4k11').prop('disabled', false)
            } else {
                $('#b4k10').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k11').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b4k5').focusout(function(){
            if ($(this).val()>=5){
                $('#b4k15').prop('disabled', false)
                $('#b4k19').prop('disabled', false)
                $('#b4k20').prop('disabled', false)
            } else {
                $('#b4k10').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k11').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k15').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k16').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k17').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k18').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k19').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k20').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k21').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k22').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b4k9').focusout(function(){
            $('.b4k9_check').prop('checked', false)
            b4k9Check($(this).val())
        })
        $('#b4k9_0, #b4k9_1, #b4k9_2, #b4k9_4, #b4k9_8').change(function(){
            let v = 0
            if ($('#b4k9_1').prop('checked')==true) { v = v + 1 }
            if ($('#b4k9_2').prop('checked')==true) { v = v + 2 }
            if ($('#b4k9_4').prop('checked')==true) { v = v + 4 }
            if ($('#b4k9_8').prop('checked')==true) { v = v + 8 }
            $('#b4k9').val(v)
        })
        $('#b4k15').change(function(){
            let array = ['1','2']
            if (array.indexOf($(this).val())!=-1){
                $('#b4k16').prop('disabled', false)
                $('#b4k17').prop('disabled', false)
                $('#b4k18').prop('disabled', false)
            } else {
                $('#b4k16').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k17').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k18').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b4k20').change(function(){
            if ($(this).val()=='1'){
                $('#b4k21').prop('disabled', false)
                $('#b4k22').prop('disabled', false)
            } else {
                $('#b4k21').prop('disabled', true).prop("selectedIndex", 0)
                $('#b4k22').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b4k26').focusout(function(){
            $('.b4k26_check').prop('checked', false)
            // b4k26Check($(this).val())
            if ($(this).val()=='0') {
                $(`#b4k26_0`).prop('checked', true)
            } else {
                let results = getCombinations([1, 2, 4, 8, 16, 32, 64, 128, 256]);
                for (let i = 0; i < results.length; i++) {
                    let sum = 0
                    for (let j = 0; j < results[i].length; j++) {
                        sum = sum + results[i][j]
                    }
                    if ($(this).val()==String(sum)) {
                        for (let j = 0; j < results[i].length; j++) {
                            $(`#b4k26_${results[i][j]}`).prop('checked', true)
                        }
                        break
                    }
                }
            }
        })
        $('#b4k26_0, #b4k26_1, #b4k26_2, #b4k26_4, #b4k26_8, #b4k26_16, #b4k26_32, #b4k26_64, #b4k26_128, #b4k26_256').change(function(){
            let v = 0
            if ($('#b4k26_1').prop('checked')==true) { v = v + 1 }
            if ($('#b4k26_2').prop('checked')==true) { v = v + 2 }
            if ($('#b4k26_4').prop('checked')==true) { v = v + 4 }
            if ($('#b4k26_8').prop('checked')==true) { v = v + 8 }
            if ($('#b4k26_16').prop('checked')==true) { v = v + 16 }
            if ($('#b4k26_32').prop('checked')==true) { v = v + 32 }
            if ($('#b4k26_64').prop('checked')==true) { v = v + 64 }
            if ($('#b4k26_128').prop('checked')==true) { v = v + 128 }
            if ($('#b4k26_256').prop('checked')==true) { v = v + 256 }
            $('#b4k26').val(v)
        })

        $('#showBlok4').click(function(){
            if (!$('#b1r7Blok4Table').val()){
                $('#error-alert-blok4').prop('hidden', false).html('Mohon isikan kembali Nomor KK di Blok I')
                $('html,body').scrollTop($('#blok4').offset().top -75);
                alertDismiss()
            } else {
                $('#blok4Modal').modal('show')
                $('#blok4ModalLabel').text('Tambah Anggota Keluarga')
                $('#blok4FormTable')[0].reset()
                $('#blok4FormTable').attr('action', `{!! url('/data/add/blok4table') !!}`)
                $('#b4k1').val(blok4TableAnggotaKeluarga.rows().count()+1)
                $('#b4k2_nama').focus
                $('#b4k7').prop('disabled', true)
                $('#b4k10').prop('disabled', true)
                $('#b4k11').prop('disabled', true)
                $('#b4k15').prop('disabled', true)
                $('#b4k19').prop('disabled', true)
                $('#b4k20').prop('disabled', true)
                $('#b4k16').prop('disabled', true)
                $('#b4k17').prop('disabled', true)
                $('#b4k18').prop('disabled', true)
                $('#b4k21').prop('disabled', true)
                $('#b4k22').prop('disabled', true)
                $('#blok4tableSubmit').text('Tambah Anggota Keluarga')
            }
        })

        $('#blok4FormTable').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)
                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#blok4Modal').modal('hide')
                            $('#success-alert-blok4').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok4').offset().top -75);
                            let tidakAda = true
                            $("#blok4TableAnggotaKeluarga tr").each(function () {
                                let t = $(this);
                                let no =  t.find("td:eq(0)").html()
                                let nik =  t.find("td:eq(2)").html()
                                if (no==$('#b4k1').val() || nik==$('#b4k2_nik').val()){
                                    tidakAda = false
                                    t.find("td:eq(0)").html($('#b4k1').val())
                                    t.find("td:eq(1)").html($('#b4k2_nama').val())
                                    t.find("td:eq(2)").html($('#b4k2_nik').val())
                                    t.find("td:eq(4)").html(`<button type="button" id="showBlok4Edit" class="btn btn-warning me-1" onclick="editNik('${$("#b4k2_nik").val()}')" data-toggle="modal" data-nik="${$("#b4k2_nik").val()}"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok4" class="btn btn-danger me-1" onclick="flag4('${$("#b4k2_nik").val()}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                                    return false
                                }
                            });
                            if (tidakAda){
                                blok4TableAnggotaKeluarga.row.add( [
                                    $('#b4k1').val(),
                                    $('#b4k2_nama').val(),
                                    $('#b4k2_nik').val(),
                                    'Ada',
                                    '',
                                ] ).draw( false )
                                $('#blok4TableAnggotaKeluarga tr:last').addClass('v-mid').addClass('t-center');
                                $('#blok4TableAnggotaKeluarga tr:last td:last').html(`<button type="button" id="showBlok4Edit" class="btn btn-warning me-1" onclick="editNik('${$("#b4k2_nik").val()}')" data-toggle="modal" data-nik="${$("#b4k2_nik").val()}"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok4" class="btn btn-danger me-1" onclick="flag4('${$("#b4k2_nik").val()}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                            }
                            
                            alertDismiss()
                            $('#blok4FormTable')[0].reset()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#blok4Modal').modal('hide')
                        $('#error-alert-blok4').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok4').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    $('#blok4Modal').modal('hide')
                    ajaxfail('blok4')
                }
            });
        })

        // -----------------------------------------------------------------------------------------------------    BLOK 5
        
        var blok5SertifikatTanah = $('#blok5SertifikatTanah').DataTable({
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
            "language": {
                "emptyTable": "Belum terdapat sertifikat tanah",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 - 0 dari 0 entri",
                "infoFiltered":   "(disaring dari _MAX_ total entri)",
                "lengthMenu":     "Menampilkan _MENU_ entri",
                "search":         "Cari:",
                "zeroRecords":    "Data tidak ditemukan",
                "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Selanjutnya",
                    "previous":   "Sebelumnya"
                },
            },
            "autoWidth": false,
            "order": [],
            "destroy": true,
            "dom": 'rt',
            "paging": false,
        });

        $('#b5k4').change(function(){
            if ($(this).val()=='1'){
                $('#b5k5').prop('disabled', false)
                $('#b5k6').prop('readonly', false).val(0)
                $('#b5k7').prop('disabled', false)
            } else {
                $('#b5k5').prop('disabled', true).val('')
                $('#b5k6').prop('readonly', true).val(0)
                $('#b5k7').prop('disabled', true).prop("selectedIndex", 0)
                $('#b5k8').prop('disabled', true).prop("selectedIndex", 0)
            }
        })
        $('#b5k7').change(function(){
            if ($(this).val()=='1'){
                $('#b5k8').prop('disabled', false)
            } else {
                $('#b5k8').prop('disabled', true)
            }
        })

        $('#showBlok5').click(function(){
            if (!$('#b1r7Blok5Table').val()){
                $('#error-alert-blok5').prop('hidden', false).html('Mohon isikan kembali Nomor KK di Blok I')
                $('html,body').scrollTop($('#blok5').offset().top -75);
                alertDismiss()
            } else {
                $.ajax({
                    url: `{!! url('/data/anggotakeluarga') !!}`,
                    type: "POST",
                    data:{ 
                        _token:'{{ csrf_token() }}',
                        'b1r7': $('#b1r7Blok5Table').val(),
                    },
                    cache: false,
                    dataType: 'json',
                    success: function(data){
                        if (data.data.length==0){
                            $('#error-alert-blok5').prop('hidden', false).html('Anggota keluarga tidak ditemukan')
                            $('html,body').scrollTop($('#blok5').offset().top -75);
                            alertDismiss()
                        } else {
                            $('#blok5Modal').modal('show')
                            $('#blok5ModalLabel').text('Tambah Sertifikat Tanah')
                            $('#blok5FormTable')[0].reset()
                            $('#blok5FormTable').attr('action', `{!! url('/data/add/blok5table') !!}`)
                            $('#b5k1').val(blok5SertifikatTanah.rows().count()+1)
                            $('#b5k2').focus()
                            $('#b5k5').prop('disabled', true)
                            $('#b5k6').prop('readonly', true)
                            $('#b5k7').prop('disabled', true)
                            $('#b5k8').prop('disabled', true)
                            $('#b5k8List').empty()
                            for (let index = 0; index < data.data.length; index++) {
                                $('#b5k8List').append(`<option value="${data.data[index].b4k2_nama}">`)
                            }
                            $('#blok5tableSubmit').text('Tambah Sertifikat Tanah')
                        }
                        
                    },
                    error: function(jqXhr, json, errorThrown){
                        console.log(jqXhr)
                        ajaxfail('blok5')
                    }
                });
            }
        })

        $('#blok5FormTable').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)
                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#blok5Modal').modal('hide')
                            $('#success-alert-blok5').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok5').offset().top -75);
                            let tidakAda = true

                            $("#blok5SertifikatTanah tr").each(function () {
                                let t = $(this);
                                let namaLahan =  t.find("td:eq(0)").html()
                                if (namaLahan==$('#b5k1').val()){
                                    tidakAda = false
                                    t.find("td:eq(1)").html($('#b5k2').val())
                                    t.find("td:eq(2)").html($('#b5k3 option:selected').text())
                                    t.find("td:eq(3)").html($('#b5k4 option:selected').text())
                                    return false
                                }
                            });
                            if (tidakAda){
                                blok5SertifikatTanah.row.add( [
                                    $('#b5k1').val(),
                                    $('#b5k2').val(),
                                    $('#b5k3 option:selected').text(),
                                    $('#b5k4 option:selected').text(),
                                    '',
                                ] ).draw( false )
                                $('#blok5SertifikatTanah tr:last').addClass('v-mid').addClass('t-center');
                                $('#blok5SertifikatTanah tr:last td:last').html(`<button type="button" id="showBlok5Edit" class="btn btn-warning me-1" onclick="editSertifikat('${$("#b1r7Blok5Table").val()}', '${$("#b5k1").val()}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok5" class="btn btn-danger me-1" onclick="flag5('${$("#b1r7Blok5Table").val()}', '${$("#b5k1").val()}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                            }
                            
                            alertDismiss()
                            $('#blok5FormTable')[0].reset()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#blok5Modal').modal('hide')
                        $('#error-alert-blok5').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok5').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    $('#blok5Modal').modal('hide')
                    ajaxfail('blok5')
                }
            });
        })

        // -----------------------------------------------------------------------------------------------------    BLOK 6
        
        $('#blok6Form').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)

                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#success-alert-blok6').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok6').offset().top -75);
                            alertDismiss()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#error-alert-blok6').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok6').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    ajaxfail('blok6')
                }
            });
        })

        // -----------------------------------------------------------------------------------------------------    BLOK 7
        var blok7Usaha = $('#blok7Usaha').DataTable({
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
            "language": {
                "emptyTable": "Belum terdapat usaha",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 - 0 dari 0 entri",
                "infoFiltered":   "(disaring dari _MAX_ total entri)",
                "lengthMenu":     "Menampilkan _MENU_ entri",
                "search":         "Cari:",
                "zeroRecords":    "Data tidak ditemukan",
                "paginate": {
                    "first":      "Awal",
                    "last":       "Akhir",
                    "next":       "Selanjutnya",
                    "previous":   "Sebelumnya"
                },
            },
            "autoWidth": false,
            // "order": [ 0, 'desc' ],
            "order": [],
            "destroy": true,
            "dom": 'rt',
            "paging": false,
        });

        $('#b7r3a1').change(function(){
            if ($(this).val()=='1'){
                $('#b7r3a2').prop('disabled', false)
            } else {
                $('#b7r3a2').prop('disabled', true).val('')
            }
        })

        $('#b7r5a').change(function(){
            if ($(this).val()=='1'){
                $('#showBlok7').prop('disabled', false)
            } else {
                $('#showBlok7').prop('disabled', true).prop("selectedIndex", 0)
            }
        })

        $('#showBlok7').click(function(){
            if (!$('#b1r7Blok7Table').val()){
                $('#error-alert-blok7').prop('hidden', false).html('Mohon isikan kembali Nomor KK di Blok I').focus()
                $('html,body').scrollTop($('#blok7').offset().top -75);
                alertDismiss()
            } else {
                $.ajax({
                    url: `{!! url('/data/anggotakeluarga') !!}`,
                    type: "POST",
                    data:{ 
                        _token:'{{ csrf_token() }}',
                        'b1r7': $('#b1r7Blok7Table').val(),
                    },
                    cache: false,
                    dataType: 'json',
                    success: function(data){
                        if (data.data.length==0){
                            $('#error-alert-blok7').prop('hidden', false).html('Anggota keluarga tidak ditemukan')
                            $('html,body').scrollTop($('#blok7').offset().top -75);
                            alertDismiss()
                        } else {
                            $('#blok7Modal').modal('show')
                            $('#blok7ModalLabel').text('Tambah Jenis Usaha')
                            $('#blok7FormTable')[0].reset()
                            $('#blok7FormTable').attr('action', `{!! url('/data/add/blok7table') !!}`)
                            $('#b7r5bk0').val(blok7Usaha.rows().count()+1)
                            $('#b7r5bk1_nama').focus()
                            $('#b7r5bk1').empty()
                            $('#b7r5bk1').append('<option value=""></option>')
                            for (let index = 0; index < data.data.length; index++) {
                                $('#b7r5bk1').append(`<option value="${data.data[index].b4k1}">(${data.data[index].b4k1}) ${data.data[index].b4k2_nama}</option>`)
                            }
                            $('#blok7tableSubmit').text('Tambah Jenis Usaha')
                        }
                        
                    },
                    error: function(jqXhr, json, errorThrown){
                        console.log(jqXhr)
                        ajaxfail('blok7')
                    }
                });
            }
        })

        $('#blok7FormTable').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)
                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#blok7Modal').modal('hide')
                            $('#success-alert-blok7').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok7').offset().top -75);
                            let tidakAda = true

                            $("#blok7Usaha tr").each(function () {
                                let t = $(this);
                                let nama =  t.find("td:eq(0)").html()
                                if (nama==$('#b7r5bk0').val()){
                                    tidakAda = false
                                    t.find("td:eq(1)").html(`(${$('#b7r5bk0').val()}) `+$('#b7r5bk1 option:selected').text())
                                    t.find("td:eq(2)").html($('#b7r5bk2_usaha').val())
                                    // t.find("td:eq(2)").html($('#b7r5bk2_kode option:selected').text())
                                    t.find("td:eq(3)").html($('#b7r5bk3').val())
                                    t.find("td:eq(4)").html($('#b7r5bk4 option:selected').text())
                                    t.find("td:eq(5)").html($('#b7r5bk5 option:selected').text())
                                    return false
                                }
                            });
                            if (tidakAda){
                                blok7Usaha.row.add([
                                    $('#b7r5bk0').val(),
                                    `(${$('#b7r5bk0').val()}) `+$('#b7r5bk1 option:selected').text(),
                                    $('#b7r5bk2_usaha').val(),
                                    $('#b7r5bk3').val(),
                                    $('#b7r5bk4 option:selected').text(),
                                    $('#b7r5bk5 option:selected').text(),
                                    '',
                                ]).draw( false )
                                $('#blok7Usaha tr:last').addClass('v-mid').addClass('t-center');
                                $('#blok7Usaha tr:last td:last').html(`<button type="button" id="showBlok7Edit" class="btn btn-warning me-1" onclick="editUsaha('${$("#b1r7Blok7Table").val()}', '${$('#b7r5bk0').val()}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok7" class="btn btn-danger me-1" onclick="flag7('${$("#b1r7Blok7Table").val()}', '${$('#b7r5bk0').val()}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                            }
                            
                            alertDismiss()
                            $('#blok7FormTable')[0].reset()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#blok7Modal').modal('hide')
                        $('#error-alert-blok7').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok7').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    $('#blok7Modal').modal('hide')
                    ajaxfail('blok7')
                }
            });
        })

        $('#blok7Form').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)

                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#success-alert-blok7').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok7').offset().top -75);
                            alertDismiss()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#error-alert-blok7').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok7').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    ajaxfail('blok7')
                }
            });
        })

        $('#blok8Form').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    removeErrorMsg(data.key)

                    if ($.isEmptyObject(data.failed)) {
                        if($.isEmptyObject(data.error)){
                            $('#success-alert-blok8').prop('hidden', false).html(data.success)
                            $('html,body').scrollTop($('#blok8').offset().top -75);
                            alertDismiss()
                        } else {
                            printErrorMsg(data.error)
                        }
                    } else {
                        $('#error-alert-blok8').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok8').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    ajaxfail('blok8')
                }
            });
        })

        $('.dataTable thead tr th').css("background-color", "#4392f1").css("color", "#ffffff")
        // -----------------------------------------------------------------------------------------------------    FLAG
        $('#flagBlok4Table').submit(function(e){
            e.preventDefault()
            let form = $(this)
            $.ajax({
                url: form.prop('action'),
                type: "POST",
                data: form.serialize(),
                cache: false,
                dataType: 'json',
                success: function(data){
                    if ($.isEmptyObject(data.failed)) {
                        $('#flagBlok4Modal').modal('hide')
                        $('#success-alert-blok4').prop('hidden', false).html(data.success)
                        $('html,body').scrollTop($('#blok4').offset().top -75);
                        $("#blok4TableAnggotaKeluarga tr").each(function () {
                            let t = $(this);
                            let nik =  t.find("td:eq(2)").html()
                            if (nik==$('#flagNik').val()){
                                t.find('td:eq(3)').html($('#blok4Flag option:selected').text());
                                if ($('#blok4Flag').val()){
                                    t.find('td:last').append('<i class="fas fa-trash fa-lg"></i>');
                                } else {
                                    t.find('td:last').html(`<button type="button" id="showBlok4Edit" class="btn btn-warning" onclick="editNik('${nik}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok4" class="btn btn-danger me-1" onclick="flag4('${nik}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                                }
                                return false
                            }
                        });
                        alertDismiss()
                    } else {
                        $('#flagBlok4Modal').modal('hide')
                        $('#error-alert-blok4').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#blok4').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    $('#flagBlok4Modal').modal('hide')
                    ajaxfail('blok4')
                }
            });
        })
        
        // -----------------------------------------------------------------------------------------------------    PLACE DATA FOR EDIT
        var data1 = {!! $data1 !!}
        var data2 = {!! $data1->tbl_data2 !!}
        var data3 = {!! $data1->tbl_data3 !!}
        var data4 = {!! $data1->tbl_data4 !!}

        //blok1
        let url = `{!! url('/data/nmtempat') !!}`
        let token = `{!! csrf_token() !!}`
        nm_tempat(url, token, data1.kd_prov, data1.kd_kab, data1.kd_kec, data1.kd_desa)
            .then(tempat => {
                $('#kd_prov option:first').val(data1.kd_prov).text(data1.kd_prov +' '+ tempat.nm_prov)
                $('#kd_kab option:first').val(data1.kd_kab).text(data1.kd_kab +' '+ tempat.nm_kab)
                $('#kd_kec option:first').val(data1.kd_kec).text(data1.kd_kec +' '+ tempat.nm_kec)
                $('#kd_desa option:first').val(data1.kd_desa).text(data1.kd_desa +' '+ tempat.nm_desa)
            })
        $('#nm_dusun').val(data1.nm_dusun)
        $('#alamat').val(data1.alamat)
        $('#b1r7').val(data1.b1r7)
        $('#b1r8').val(data1.b1r8)
        $('#b1r8List').empty()
        for (let index = 0; index < data2.length; index++) {
            $('#b1r8List').append(`<option value="${data2[index].b4k2_nama}">`)
        }
        $('#b1r9').val(data1.b1r9)
        $('#b1r10').val(data1.b1r10)

        //additional blok
        $('#b1r7Blok1').val(data1.b1r7)
        $('#b1r7Blok2').val(data1.b1r7)
        $('#b1r7Blok3').val(data1.b1r7)
        $('#b1r7Blok4Table').val(data1.b1r7)
        $('#b1r7Blok5Table').val(data1.b1r7)
        $('#b1r7Blok6').val(data1.b1r7)
        $('#b1r7Blok7Table').val(data1.b1r7)
        $('#b1r7Blok7').val(data1.b1r7)
        $('#b1r7Blok8').val(data1.b1r7)
        $('.blokHed > span').text('No KK: '+data1.b1r7)

        //blok2
        $('#b2r1').val(data1.b2r1_thn+'-'+data1.b2r1_bln+'-'+data1.b2r1_tgl)
        $('#nm_pencacah').val(data1.nm_pencacah)
        $('#kd_pencacah').val(data1.kd_pencacah)
        $('#b2r3').val(data1.b2r3_thn+'-'+data1.b2r3_bln+'-'+data1.b2r3_tgl)
        $('#nm_pemeriksa').val(data1.nm_pemeriksa)
        $('#kd_pemeriksa').val(data1.kd_pemeriksa)
        $('#b2r5').val(data1.b2r5)
        
        //blok3
        $('#b3r1a').val(data1.b3r1a)
        $('#b3r1b').val(data1.b3r1b)
        $('#b3r2').val(data1.b3r2)
        $('#b3r3').val(data1.b3r3)
        $('#b3r4a').val(data1.b3r4a)
        $('#b3r4b').val(data1.b3r4b)
        $('#b3r5a').val(data1.b3r5a)
        $('#b3r5b').val(data1.b3r5b)
        $('#b3r6').val(data1.b3r6)
        $('#b3r7').val(data1.b3r7)
        $('#b3r8').val(data1.b3r8)
        $('#b3r9a').val(data1.b3r9a)
        $('#b3r9b').val(data1.b3r9b)
        $('#b3r10').val(data1.b3r10)
        $('#b3r11a').val(data1.b3r11a)
        $('#b3r11b').val(data1.b3r11b)
        $('#b3r12').val(data1.b3r12)
        
        //blok4
        if(data2.length!=0){
            for (let index = 0; index < data2.length; index++) {
                blok4TableAnggotaKeluarga.row.add([
                    data2[index].b4k1,
                    data2[index].b4k2_nama,
                    data2[index].b4k2_nik,
                    data2[index].flag || 'Ada',
                    '',
                ]).draw()
                $('#blok4TableAnggotaKeluarga tr:last').addClass('v-mid').addClass('t-center');
                $('#blok4TableAnggotaKeluarga tr:last td:last').html(`<button type="button" id="showBlok4Edit" class="btn btn-warning me-1" onclick="editNik('${data2[index].b4k2_nik}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok4" class="btn btn-danger me-1" onclick="flag4('${data2[index].b4k2_nik}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                if (data2[index].flag){
                    $(`#blok4TableAnggotaKeluarga tr:last td:last`).append('<i class="fas fa-trash fa-lg"></i>');
                }
            }
        }

        //blok5
        if(data3.length!=0){
            for (let index = 0; index < data3.length; index++) {
                blok5SertifikatTanah.row.add([
                    data3[index].b5k1,
                    data3[index].b5k2,
                    b5k3(data3[index].b5k3),
                    b5k4(data3[index].b5k4),
                    '',
                ]).draw()
                $('#blok5SertifikatTanah tr:last').addClass('v-mid').addClass('t-center');
                $('#blok5SertifikatTanah tr:last td:last').html(`<button type="button" id="showBlok5Edit" class="btn btn-warning me-1" onclick="editSertifikat('${data1.b1r7}', '${data3[index].b5k1}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok5" class="btn btn-danger me-1" onclick="flag5('${data1.b1r7}', '${data3[index].b5k1}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                if (data3[index].flag){
                    $('#blok5SertifikatTanah tr:last td:last').append('<i class="fas fa-trash fa-lg"></i>');
                }
            }
        }

        //blok6
        $('#b6r1k1').val(data1.b6r1k1)
        $('#b6r1k2').val(data1.b6r1k2)
        $('#b6r2').val(data1.b6r2)

        //blok7
        $('#b7r1a').val(data1.b7r1a)
        $('#b7r1b').val(data1.b7r1b)
        $('#b7r1c').val(data1.b7r1c)
        $('#b7r1d').val(data1.b7r1d)
        $('#b7r1e').val(data1.b7r1e)
        $('#b7r1f').val(data1.b7r1f)
        $('#b7r1g').val(data1.b7r1g)
        $('#b7r1h').val(data1.b7r1h)
        $('#b7r1i').val(data1.b7r1i)
        $('#b7r1j').val(data1.b7r1j)
        $('#b7r1k').val(data1.b7r1k)
        $('#b7r1l').val(data1.b7r1l)
        $('#b7r1m').val(data1.b7r1m)
        $('#b7r1n').val(data1.b7r1n)
        $('#b7r1o').val(data1.b7r1o)
        $('#b7r2a').val(data1.b7r2a)
        $('#b7r2b').val(data1.b7r2b)
        $('#b7r3a1').val(data1.b7r3a1)
        $('#b7r3a2').val(data1.b7r3a2)
        $('#b7r3b').val(data1.b7r3b)
        $('#b7r4a').val(data1.b7r4a)
        $('#b7r4b').val(data1.b7r4b)
        $('#b7r4c').val(data1.b7r4c)
        $('#b7r4d').val(data1.b7r4d)
        $('#b7r4e').val(data1.b7r4e)
        $('#b7r5a').val(data1.b7r5a)
        if (data1.b7r5a==1){$('#showBlok7').prop('disabled', false)}
        $('#b7r6a').val(data1.b7r6a)
        $('#b7r6b').val(data1.b7r6b)
        $('#b7r6c').val(data1.b7r6c)
        $('#b7r6d').val(data1.b7r6d)
        $('#b7r6e').val(data1.b7r6e)
        $('#b7r6f').val(data1.b7r6f)
        $('#b7r6g').val(data1.b7r6g)
        $('#b7r6h').val(data1.b7r6h)
        $('#b7r6i').val(data1.b7r6i)
        
        if (data4.length!=0) {
            for (let index = 0; index < data4.length; index++) {
                let nama
                let no
                for (let ind = 0; ind < data2.length; ind++) {
                    if (data4[index].b7r5bk1==data2[ind].b4k1){
                        nama = data2[ind].b4k2_nama
                        no = data2[ind].b4k1
                        break
                    }
                }
                blok7Usaha.row.add([
                    index+1,
                    `(${no}) ${nama}`,
                    data4[index].b7r5bk2_usaha,
                    data4[index].b7r5bk3,
                    b7r5k4(data4[index].b7r5bk4),
                    b7r5k5(data4[index].b7r5bk5),
                    '',
                ]).draw()
                $('#blok7Usaha tr:last').addClass('v-mid').addClass('t-center');
                $('#blok7Usaha tr:last td:last').html(`<button type="button" id="showBlok7Edit" class="btn btn-warning me-1" onclick="editUsaha('${data1.b1r7}', '${data4[index].b7r5bk0}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok7" class="btn btn-danger me-1" onclick="flag7('${data1.b1r7}', '${data4[index].b7r5bk0}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                if (data4[index].flag){
                    $('#blok7Usaha tr:last td:last').append('<i class="fas fa-trash fa-lg"></i>');
                }
            }
        }

        //flag


    })

    function hideModal(){
        $('.modal').modal('hide')
    }

    function printErrorMsg(msg) {
        $.each( msg, function( key, value ) {
            $('.'+key+'_err').text(value);
            $('#'+key).addClass('is-invalid');
        });
    }
    function removeErrorMsg(msg) {
        $.each( msg, function( key, value ) {
            $('.'+key+'_err').text('');
            $('#'+key).removeClass('is-invalid');
        });
    }

    function alertDismiss(){
        $(".alert-success").fadeTo(5000, 500).slideUp(500, function() {
            $(".alert-success").slideUp(500);
            $(".alert-success").prop('hidden', true);
        });
        $(".alert-danger").fadeTo(5000, 500).slideUp(500, function() {
            $(".alert-danger").slideUp(500);
            $(".alert-danger").prop('hidden', true);
        });
    }

    function ajaxfail(blok){
        $('html,body').scrollTop($(`#${blok}`).offset().top -75);
        $(`#error-alert-${blok}`).prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
        alertDismiss()
    }

    function removeNav(x, s) {
        if (x.matches) { // If media query matches
            s.duration(15);
            s.offset(0);
        } else {
            s.duration(3500);
            s.offset(120);
        }
    }

    function editNik(nik) {
        let url = `{!! url('/data/nik/edit') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'nik': nik,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                if ($.isEmptyObject(data.error)){
                    $('#blok4Modal').modal('show')
                    let d = data.data
                    let url = `{!! url('/data/nik/update') !!}`
                    $('#blok4ModalLabel').text('Sunting Anggota Keluarga ' + d.b4k1)
                    $('#blok4FormTable').attr('action', url)
                    
                    if (d.b4k1) {
                        $('#b4k1').val(d.b4k1)
                    } else {
                        $('#b4k1').val(d.b4k1).prop('readonly', false)
                    }

                    $('#b4k2_nama').val(d.b4k2_nama)
                    $('#b4k2_nik').val(d.b4k2_nik)
                    $('#b4k3').val(d.b4k3)
                    $('#b4k4').val(d.b4k4)
                    $('#b4k5').val(d.b4k5)
                    $('#b4k5_dob').val(d.b4k5_dob)
                    $('#b4k6').val(d.b4k6)
                    $('#b4k7').val(d.b4k7)
                    $('#b4k8').val(d.b4k8)
                    $('#b4k9').val(d.b4k9)
                    b4k9Check(d.b4k9)
                    $('#b4k10').val(d.b4k10)
                    $('#b4k11').val(d.b4k11)
                    $('#b4k12').val(d.b4k12)
                    $('#b4k13').val(d.b4k13)
                    $('#b4k14').val(d.b4k14)
                    $('#b4k15').val(d.b4k15)
                    $('#b4k16').val(d.b4k16)
                    $('#b4k17').val(d.b4k17)
                    $('#b4k18').val(d.b4k18)
                    $('#b4k19').val(d.b4k19)
                    $('#b4k20').val(d.b4k20)
                    $('#b4k21').val(d.b4k21)
                    $('#b4k22').val(d.b4k22)
                    $('#b4k23').val(d.b4k23)
                    $('#b4k24').val(d.b4k24)
                    $('#b4k25').val(d.b4k25)
                    $('#b4k26').val(d.b4k26)
                    $('.b4k26_check').prop('checked', false)
                    if (d.b4k26=='0') {
                        $(`#b4k26_0`).prop('checked', true)
                    } else {
                        let results = getCombinations([1, 2, 4, 8, 16, 32, 64, 128, 256]);
                        for (let i = 0; i < results.length; i++) {
                            let sum = 0
                            for (let j = 0; j < results[i].length; j++) {
                                sum = sum + results[i][j]
                            }
                            if (d.b4k26==String(sum)) {
                                for (let j = 0; j < results[i].length; j++) {
                                    $(`#b4k26_${results[i][j]}`).prop('checked', true)
                                }
                                break
                            }
                        }
                    }

                    if (d.b4k6==2 || d.b4k6==3){
                        $('#b4k7').prop('disabled', false)
                    } else {
                        $('#b4k7').prop('disabled', true)
                    }
                    if (d.b4k4==2 && d.b4k5>=10 && d.b4k5<=49 && d.b4k6==2){
                        $('#b4k10').prop('disabled', false)
                        $('#b4k11').prop('disabled', false)
                    } else {
                        $('#b4k10').prop('disabled', true)
                        $('#b4k11').prop('disabled', true)
                    }
                    if (d.b4k5>=5){
                        $('#b4k15').prop('disabled', false)
                        $('#b4k19').prop('disabled', false)
                        $('#b4k20').prop('disabled', false)
                    } else {
                        $('#b4k15').prop('disabled', true)
                        $('#b4k19').prop('disabled', true)
                        $('#b4k20').prop('disabled', true)
                    }
                    if (d.b4k15==1 || d.b4k15==2){
                        $('#b4k16').prop('disabled', false)
                        $('#b4k17').prop('disabled', false)
                        $('#b4k18').prop('disabled', false)
                    } else {
                        $('#b4k16').prop('disabled', true)
                        $('#b4k17').prop('disabled', true)
                        $('#b4k18').prop('disabled', true)
                    }
                    if (d.b4k20==1){
                        $('#b4k21').prop('disabled', false)
                        $('#b4k22').prop('disabled', false)
                    } else {
                        $('#b4k21').prop('disabled', true)
                        $('#b4k22').prop('disabled', true)
                    }

                    $('#blok4tableSubmit').text('Sunting Anggota Keluarga ' + d.b4k1)
                } else {
                    $('#error-alert-blok4').prop('hidden', false).html(data.error)
                    $('html,body').scrollTop($('#blok4').offset().top -75);
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                ajaxfail('blok4')
            }
        });
    }

    function editSertifikat(kk, no) {
        let url = `{!! url('/data/tanah/edit') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'kk': kk,
                'no': no,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                console.log(data)
                if ($.isEmptyObject(data.error)){
                    $('#blok5Modal').modal('show')
                    let url = `{!! url('/data/tanah/update') !!}`
                    $('#blok5ModalLabel').text('Ubah Sertifikat Tanah - ' + data.data.b5k2)
                    $('#blok5FormTable').attr('action', url)

                    $('#b5k8List').empty()
                    for (let index = 0; index < data.anggota.length; index++) {
                        $('#b5k8List').append(`<option value="${data.anggota[index].b4k2_nama}">`)
                    }

                    $('#b5k1').val(no).prop('readonly', true)
                    $('#b5k2').val(data.data.b5k2)
                    $('#b5k3').val(data.data.b5k3)
                    $('#b5k4').val(data.data.b5k4)
                    $('#b5k5').val(data.data.b5k5)
                    $('#b5k6').val(data.data.b5k6)
                    $('#b5k7').val(data.data.b5k7)
                    $('#b5k8').val(data.data.b5k8)

                    if (data.data.b5k4=='1'){
                        $('#b5k5').prop('disabled', false)
                        $('#b5k6').prop('readonly', false)
                        $('#b5k7').prop('disabled', false)
                    } else {
                        $('#b5k5').prop('disabled', true)
                        $('#b5k6').prop('readonly', true)
                        $('#b5k7').prop('disabled', true)
                    }
                    if (data.data.b5k7=='1'){
                        $('#b5k8').prop('disabled', false)
                    } else {
                        $('#b5k8').prop('disabled', true)
                    }

                    $('#blok5tableSubmit').text('Ubah Sertifikat Tanah')
                } else {
                    $('#error-alert-blok5').prop('hidden', false).html(data.error)
                    $('html,body').scrollTop($('#blok5').offset().top -75);
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                ajaxfail('blok5')
            }
        });
    }

    function editUsaha(kk, no){
        let url = `{!! url('/data/usaha/edit') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'kk': kk,
                'no': no,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                if ($.isEmptyObject(data.error)){
                    $('#blok7Modal').modal('show')
                    let url = `{!! url('/data/usaha/update') !!}`
                    $('#blok7ModalLabel').text('Ubah Jenis Usaha - '+no)
                    $('#blok7FormTable').attr('action', url)

                    $('#b7r5bk1').empty().append('<option value=""></option>')
                    for (let index = 0; index < data.anggota.length; index++) {
                        $('#b7r5bk1').append(`<option value="${data.anggota[index].b4k1}">${data.anggota[index].b4k2_nama}</option>`)
                    }

                    $('#b7r5bk0').val(no).prop('readonly', true)
                    $('#b7r5bk1').val(data.data.b7r5bk1)
                    $('#b7r5bk2_usaha').val(data.data.b7r5bk2_usaha)
                    $('#b7r5bk2_kode').val(data.data.b7r5bk2_kode)
                    $('#b7r5bk3').val(data.data.b7r5bk3)
                    $('#b7r5bk4').val(data.data.b7r5bk4)
                    $('#b7r5bk5').val(data.data.b7r5bk5)

                    $('#blok7tableSubmit').text('Ubah jenis usaha')
                } else {
                    $('#error-alert-blok7').prop('hidden', false).html(data.error)
                    $('html,body').scrollTop($('#blok7').offset().top -75);
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                ajaxfail('blok7')
            }
        });
    }

    function flag4(nik){
        let url = `{!! url('/data/nik/edit') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'nik': nik,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                if ($.isEmptyObject(data.error)){
                    $('#flagBlok4Modal').modal('show')
                    $('#flagBlok4ModalLabel').text('Flag - ' + nik)
                    $('#flagNik').val(nik)
                    $('#blok4Flag').val(data.data.flag)
                } else {
                    $('#error-alert-blok4').prop('hidden', false).html(data.error)
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                ajaxfail('blok4')
            }
        });
    }

    function flag5(kk, no){
        let url = `{!! url('/data/tanah/flag') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'kk': kk,
                'no': no,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                if ($.isEmptyObject(data.failed)){
                    $('#success-alert-blok5').prop('hidden', false).html(data.success)
                    $('html,body').scrollTop($('#blok5').offset().top -75);
                    $("#blok5SertifikatTanah tr").each(function () {
                        let t = $(this);
                        let n =  t.find("td:eq(0)").html()
                        if (n==no){
                            if (data.flag){
                                t.find('td:last').append('<i class="fas fa-trash fa-lg"></i>');
                            } else {
                                t.find('td:last').html(`<button type="button" id="showBlok5Edit" class="btn btn-warning me-1" onclick="editSertifikat('${kk}', '${no}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok5" class="btn btn-danger me-1" onclick="flag5('${kk}', '${no}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                            }
                            return false
                        }
                    });
                    alertDismiss()
                } else {
                    $('#error-alert-blok5').prop('hidden', false).html(data.failed)
                    $('html,body').scrollTop($('#blok5').offset().top -75);
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                ajaxfail('blok5')
            }
        });
    }

    function flag7(kk, no){
        let url = `{!! url('/data/usaha/flag') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'kk': kk,
                'no': no,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                if ($.isEmptyObject(data.failed)){
                    $('#success-alert-blok7').prop('hidden', false).html(data.success)
                    $('html,body').scrollTop($('#blok7').offset().top -75);
                    $("#blok7Usaha tr").each(function () {
                        let t = $(this);
                        let n =  t.find("td:eq(0)").html()
                        if (n==no){
                            if (data.flag){
                                t.find('td:last').append('<i class="fas fa-trash fa-lg"></i>');
                            } else {
                                t.find('td:last').html(`<button type="button" id="showBlok7Edit" class="btn btn-warning me-1" onclick="editUsaha('${kk}', '${no}')" data-toggle="modal"><i class="fas fa-edit"></i></button>`+`<button type="button" id="flagBlok7" class="btn btn-danger me-1" onclick="flag7('kk}', '${no}')" data-toggle="modal"><i class="fas fa-flag"></i></button>`);
                            }
                            return false
                        }
                    });
                    alertDismiss()
                } else {
                    $('#error-alert-blok7').prop('hidden', false).html(data.failed)
                    $('html,body').scrollTop($('#blok7').offset().top -75);
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                ajaxfail('blok7')
            }
        });
    }

</script>

{{-- <script type="text/javascript">
    $(document).ready(function(){
        
    })
</script> --}}

@endsection