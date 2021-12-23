@extends('layouts.main')

@section('container')

<h1 class="mt-4">Data</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $request->provinsi }} > {{ $request->kabupaten }} > {{ $request->kecamatan }} > {{ $request->desa }}</li>
</ol>



<div class="card mb-4 border-dark">
    <div class="card-header black-card">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <span class="nav-link" style="color: #ffffff;"><i class="fas fa-thumbtack me-2"></i> Filter Data :</span>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='1' || $request->tabel=='') active @endif" id="kkTab" style="color: @if ($request->tabel=='1' || $request->tabel=='') #000000 @else #ffffff @endif ;">Tabel KK</button>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='2') active @endif" id="pTab" style="color: @if ($request->tabel=='2') #000000 @else #ffffff @endif ;">Tabel Penduduk</button>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='3') active @endif" id="sTab" style="color: @if ($request->tabel=='3') #000000 @else #ffffff @endif ;">Tabel Sertifikat</button>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='4') active @endif" id="uTab" style="color: @if ($request->tabel=='4') #000000 @else #ffffff @endif ;">Tabel Usaha</button>
            </li>
            <li class="ms-auto me-lg-0" style="float: right;">
                <button type="button" id="resetButton" class="btn btn-light"><i class="fas fa-redo"></i> Reset Form</button>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-pane" id="kartuKeluarga" @if ($request->tabel=='1' || $request->tabel=='') @else hidden @endif>
            <form action="{{ url('/data/kuisioner/tabelkk') }}" method="POST" id="form" class="form-spasial" autocomplete="off">
                @csrf
                <input type="hidden" name="filter" value="true">
                <input type="hidden" name="tabel" value="1">
                <input type="hidden" name="provinsi" value="{{ $request->provinsi }}">
                <input type="hidden" name="kabupaten" value="{{ $request->kabupaten }}">
                <input type="hidden" name="kecamatan" value="{{ $request->kecamatan }}">
                <input type="hidden" name="desa" value="{{ $request->desa }}">
                <div class="form-spasial">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok I Pengenalan Tempat & Blok II Keterangan Petugas dan Responden</strong></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="b1r10" name="b1r10" placeholder="b1r10" value="{{ $request['b1r10'] }}">
                                <label for="b1r10" class="form-label">10. Nomor Bangunan Rumah</label>
                                <input class="form-check-input" type="checkbox" id="b1r10on" name="b1r10on" @isset($request['b1r10on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="kd_pencacah" name="kd_pencacah" placeholder="kd_pencacah" @isset($request) value="{{ $request['kd_pencacah'] }}" @endisset>
                                <label for="kd_pencacah" class="form-label">Kode Pencacah</label>
                                <input class="form-check-input" type="checkbox" id="kd_pencacahon" name="kd_pencacahon" @isset($request['kd_pencacahon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="kd_pemeriksa" name="kd_pemeriksa" placeholder="kd_pemeriksa" @isset($request) value="{{ $request['kd_pemeriksa'] }}" @endisset>
                                <label for="kd_pemeriksa" class="form-label">Kode Pemeriksa</label>
                                <input class="form-check-input" type="checkbox" id="kd_pemeriksaon" name="kd_pemeriksaon" @isset($request['kd_pemeriksaon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b2r5" name="b2r5" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b2r5']=='1') selected @endif @endisset>1. Selesai dicacah</option>
                                    <option value="2" @isset($request) @if ($request['b2r5']=='2') selected @endif @endisset>2. Tidak bersedia dicacah</option>
                                </select>
                                <label for="b2r5" class="form-label">5. Hasil Pencacahan</label>
                                <input class="form-check-input" type="checkbox" id="b2r5on" name="b2r5on" @isset($request['b2r5on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-spasial">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok III Keterangan Perumahan</strong></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r1a" name="b3r1a" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r1a']=='1') selected @endif @endisset>1. Milik sendiri</option>
                                    <option value="2" @isset($request) @if ($request['b3r1a']=='2') selected @endif @endisset>2. Kontrak/sewa</option>
                                    <option value="3" @isset($request) @if ($request['b3r1a']=='3') selected @endif @endisset>3. Bebas sewa</option>
                                    <option value="4" @isset($request) @if ($request['b3r1a']=='4') selected @endif @endisset>4. Dinas</option>
                                    <option value="5" @isset($request) @if ($request['b3r1a']=='5') selected @endif @endisset>5. Lainnya</option>
                                </select>
                                <label for="b3r1a" class="form-label">1a. Status penguasaan bangunan tempat tinggal yang ditempati</label>
                                <input class="form-check-input" type="checkbox" id="b3r1aon" name="b3r1aon" @isset($request['b3r1aon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r1b" name="b3r1b" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r1b']=='1') selected @endif @endisset>1. Milik sendiri</option>
                                    <option value="2" @isset($request) @if ($request['b3r1b']=='2') selected @endif @endisset>2. Milik orang lain</option>
                                    <option value="3" @isset($request) @if ($request['b3r1b']=='3') selected @endif @endisset>3. Tanah negara</option>
                                    <option value="4" @isset($request) @if ($request['b3r1b']=='4') selected @endif @endisset>4. Lainnya</option>
                                </select>
                                <label for="b3r1b" class="form-label">1b. Status lahan tempat tinggal yang ditempati</label>
                                <input class="form-check-input" type="checkbox" id="b3r1bon" name="b3r1bon" @isset($request['b3r1bon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b3r2_min" name="b3r2_min" placeholder="b3r2_min" value="{{ $request['b3r2_min'] }}" min="0" style="height: 5.25rem; padding-top: 3.25rem;">
                                <label for="b3r2_min" class="form-label">2. Luas lantai (m2) - minimal</label>
                                <input class="form-check-input" type="checkbox" id="b3r2on" name="b3r2on" @isset($request['b3r2on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b3r2_max" name="b3r2_max" placeholder="b3r2_max" value="{{ $request['b3r2_max'] }}" min="0" style="height: 5.25rem; padding-top: 3.25rem;">
                                <label for="b3r2_max" class="form-label">2. Luas lantai (m2) - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r3" name="b3r3" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="01" @isset($request) @if ($request['b3r3']=='01') selected @endif @endisset>01. Marmer/granit</option>
                                    <option value="02" @isset($request) @if ($request['b3r3']=='02') selected @endif @endisset>02. Keramik</option>
                                    <option value="03" @isset($request) @if ($request['b3r3']=='03') selected @endif @endisset>03. Parket/vinil/permadani</option>
                                    <option value="04" @isset($request) @if ($request['b3r3']=='04') selected @endif @endisset>04. Ubin/tegel/teraso</option>
                                    <option value="05" @isset($request) @if ($request['b3r3']=='05') selected @endif @endisset>05. Kayu/papan kualitas tinggi</option>
                                    <option value="06" @isset($request) @if ($request['b3r3']=='06') selected @endif @endisset>06. Semen/bata merah</option>
                                    <option value="07" @isset($request) @if ($request['b3r3']=='07') selected @endif @endisset>07. Bambu</option>
                                    <option value="08" @isset($request) @if ($request['b3r3']=='08') selected @endif @endisset>08. Kayu/papan kualitas rendah</option>
                                    <option value="09" @isset($request) @if ($request['b3r3']=='09') selected @endif @endisset>09. Tanah</option>
                                    <option value="10" @isset($request) @if ($request['b3r3']=='10') selected @endif @endisset>10. Lainnya</option>
                                </select>
                                <label for="b3r3" class="form-label">3. Jenis lantai terluas</label>
                                <input class="form-check-input" type="checkbox" id="b3r3on" name="b3r3on" @isset($request['b3r3on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r4a" name="b3r4a" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r4a']=='1') selected @endif @endisset>1. Tembok</option>
                                    <option value="2" @isset($request) @if ($request['b3r4a']=='2') selected @endif @endisset>2. Plesteran anyaman bambu/kawat</option>
                                    <option value="3" @isset($request) @if ($request['b3r4a']=='3') selected @endif @endisset>3. Kayu</option>
                                    <option value="4" @isset($request) @if ($request['b3r4a']=='4') selected @endif @endisset>4. Anyaman bambu</option>
                                    <option value="5" @isset($request) @if ($request['b3r4a']=='5') selected @endif @endisset>5. Batang kayu</option>
                                    <option value="6" @isset($request) @if ($request['b3r4a']=='6') selected @endif @endisset>6. Bambu</option>
                                    <option value="7" @isset($request) @if ($request['b3r4a']=='7') selected @endif @endisset>7. Lainnya</option>
                                </select>
                                <label for="b3r4a" class="form-label">4a. Jenis dinding terluas</label>
                                <input class="form-check-input" type="checkbox" id="b3r4aon" name="b3r4aon" @isset($request['b3r4aon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r4b" name="b3r4b" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r4b']=='1') selected @endif @endisset>1. Bagus/kualitas tinggi</option>
                                    <option value="2" @isset($request) @if ($request['b3r4b']=='2') selected @endif @endisset>2. Jelek/kualitas rendah</option>
                                </select>
                                <label for="b3r4b" class="form-label">4b. Kondisi dinding</label>
                                <input class="form-check-input" type="checkbox" id="b3r4bon" name="b3r4bon" @isset($request['b3r4bon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r5a" name="b3r5a" placeholder="kode">
                                    <option value=""></option>
                                    <option value="01" @isset($request) @if ($request['b3r5a']=='01') selected @endif @endisset>01. Beton/genteng beton</option>
                                    <option value="02" @isset($request) @if ($request['b3r5a']=='02') selected @endif @endisset>02. Genteng keramik</option>
                                    <option value="03" @isset($request) @if ($request['b3r5a']=='03') selected @endif @endisset>03. Genteng metal</option>
                                    <option value="04" @isset($request) @if ($request['b3r5a']=='04') selected @endif @endisset>04. Genteng tanah liat</option>
                                    <option value="05" @isset($request) @if ($request['b3r5a']=='05') selected @endif @endisset>05. Asbes</option>
                                    <option value="06" @isset($request) @if ($request['b3r5a']=='06') selected @endif @endisset>06. Seng</option>
                                    <option value="07" @isset($request) @if ($request['b3r5a']=='07') selected @endif @endisset>07. Sirap</option>
                                    <option value="08" @isset($request) @if ($request['b3r5a']=='08') selected @endif @endisset>08. Bambu</option>
                                    <option value="09" @isset($request) @if ($request['b3r5a']=='09') selected @endif @endisset>09. Jerami/ijuk/daun daunan/rumbia</option>
                                    <option value="10" @isset($request) @if ($request['b3r5a']=='10') selected @endif @endisset>10. Lainnya</option>
                                </select>
                                <label for="b3r5a" class="form-label">5a. Jenis atap terluas</label>
                                <input class="form-check-input" type="checkbox" id="b3r5aon" name="b3r5aon" @isset($request['b3r5aon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r5b" name="b3r5b" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r5b']=='1') selected @endif @endisset>1. Bagus/kualitas tinggi</option>
                                    <option value="2" @isset($request) @if ($request['b3r5b']=='2') selected @endif @endisset>2. Jelek/kualitas rendah</option>
                                </select>
                                <label for="b3r5b" class="form-label">5b. Kondisi atap</label>
                                <input class="form-check-input" type="checkbox" id="b3r5bon" name="b3r5bon" @isset($request['b3r5bon']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b3r6_min" name="b3r6_min" placeholder="b3r6_min" value="{{ $request['b3r6_min'] }}" min="0" max="99">
                                <label for="b3r6_min" class="form-label">6. Jumlah kamar tidur - minimal</label>
                                <input class="form-check-input" type="checkbox" id="b3r6on" name="b3r6on" @isset($request['b3r6on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b3r6_max" name="b3r6_max" placeholder="b3r6_max" value="{{ $request['b3r6_max'] }}" min="0" max="99">
                                <label for="b3r6_max" class="form-label">6. Jumlah kamar tidur - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r7" name="b3r7" placeholder="kode">
                                    <option value=""></option>
                                    <option value="01" @isset($request) @if ($request['b3r7']=='01') selected @endif @endisset>01. Air kemasan bermerk</option>
                                    <option value="02" @isset($request) @if ($request['b3r7']=='02') selected @endif @endisset>02. Air isi ulang</option>
                                    <option value="03" @isset($request) @if ($request['b3r7']=='03') selected @endif @endisset>03. Leding meteran</option>
                                    <option value="04" @isset($request) @if ($request['b3r7']=='04') selected @endif @endisset>04. Leding eceran</option>
                                    <option value="05" @isset($request) @if ($request['b3r7']=='05') selected @endif @endisset>05. Sumur bor/pompa</option>
                                    <option value="06" @isset($request) @if ($request['b3r7']=='06') selected @endif @endisset>06. Sumur terlindung</option>
                                    <option value="07" @isset($request) @if ($request['b3r7']=='07') selected @endif @endisset>07. Sumur tak terlindung</option>
                                    <option value="08" @isset($request) @if ($request['b3r7']=='08') selected @endif @endisset>08. Mata air terlindung</option>
                                    <option value="09" @isset($request) @if ($request['b3r7']=='09') selected @endif @endisset>09. Mata air tak terlindung</option>
                                    <option value="10" @isset($request) @if ($request['b3r7']=='10') selected @endif @endisset>10. Air sungai/danau/waduk</option>
                                    <option value="11" @isset($request) @if ($request['b3r7']=='11') selected @endif @endisset>11. Air hujan</option>
                                    <option value="12" @isset($request) @if ($request['b3r7']=='12') selected @endif @endisset>12. Lainnya</option>
                                </select>
                                <label for="b3r7" class="form-label">7. Sumber air minum</label>
                                <input class="form-check-input" type="checkbox" id="b3r7on" name="b3r7on" @isset($request['b3r7on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r8" name="b3r8" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r8']=='1') selected @endif @endisset>1. Membeli eceran</option>
                                    <option value="2" @isset($request) @if ($request['b3r8']=='2') selected @endif @endisset>2. Langganan</option>
                                    <option value="3" @isset($request) @if ($request['b3r8']=='3') selected @endif @endisset>3. Tidak membeli</option>
                                </select>
                                <label for="b3r8" class="form-label">8. Cara memperoleh air minum</label>
                                <input class="form-check-input" type="checkbox" id="b3r8on" name="b3r8on" @isset($request['b3r8on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r9a" name="b3r9a" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r9a']=='1') selected @endif @endisset>1. Listrik PLN</option>
                                    <option value="2" @isset($request) @if ($request['b3r9a']=='2') selected @endif @endisset>2. Listrik non PLN</option>
                                    <option value="3" @isset($request) @if ($request['b3r9a']=='3') selected @endif @endisset>3. Bukan listrik</option>
                                </select>
                                <label for="b3r9a" class="form-label">9a. Sumber penerangan utama</label>
                                <input class="form-check-input" type="checkbox" id="b3r9aon" name="b3r9aon" @isset($request['b3r9aon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r9b" name="b3r9b" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r9b']=='1') selected @endif @endisset>1. 450 watt</option>
                                    <option value="2" @isset($request) @if ($request['b3r9b']=='2') selected @endif @endisset>2. 900 watt</option>
                                    <option value="3" @isset($request) @if ($request['b3r9b']=='3') selected @endif @endisset>3. 1300 watt</option>
                                    <option value="4" @isset($request) @if ($request['b3r9b']=='4') selected @endif @endisset>4. 2200 watt</option>
                                    <option value="5" @isset($request) @if ($request['b3r9b']=='5') selected @endif @endisset>5. > 2200 watt</option>
                                    <option value="6" @isset($request) @if ($request['b3r9b']=='6') selected @endif @endisset>6. Tanpa meteran</option>
                                </select>
                                <label for="b3r9b" class="form-label">9b. Daya terpasang</label>
                                <input class="form-check-input" type="checkbox" id="b3r9bon" name="b3r9bon" @isset($request['b3r9bon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r10" name="b3r10" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r10']=='1') selected @endif @endisset>1. Listrik</option>
                                    <option value="2" @isset($request) @if ($request['b3r10']=='2') selected @endif @endisset>2. Gas > 3 kg</option>
                                    <option value="3" @isset($request) @if ($request['b3r10']=='3') selected @endif @endisset>3. Gas 3 kg</option>
                                    <option value="4" @isset($request) @if ($request['b3r10']=='4') selected @endif @endisset>4. Gas kota/biogas</option>
                                    <option value="5" @isset($request) @if ($request['b3r10']=='5') selected @endif @endisset>5. Minyak tanah</option>
                                    <option value="6" @isset($request) @if ($request['b3r10']=='6') selected @endif @endisset>6. Briket</option>
                                    <option value="7" @isset($request) @if ($request['b3r10']=='7') selected @endif @endisset>7. Arang</option>
                                    <option value="8" @isset($request) @if ($request['b3r10']=='8') selected @endif @endisset>8. Kayu bakar</option>
                                    <option value="9" @isset($request) @if ($request['b3r10']=='9') selected @endif @endisset>9. Tidak memasak di rumah</option>
                                </select>
                                <label for="b3r10" class="form-label">10. Bahan bakar/energi utama untuk memasak</label>
                                <input class="form-check-input" type="checkbox" id="b3r10on" name="b3r10on" @isset($request['b3r10on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r11a" name="b3r11a" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r11a']=='1') selected @endif @endisset>1. Sendiri</option>
                                    <option value="2" @isset($request) @if ($request['b3r11a']=='2') selected @endif @endisset>2. Bersama</option>
                                    <option value="3" @isset($request) @if ($request['b3r11a']=='3') selected @endif @endisset>3. Umum</option>
                                    <option value="4" @isset($request) @if ($request['b3r11a']=='4') selected @endif @endisset>4. Tidak ada</option>
                                </select>
                                <label for="b3r11a" class="form-label">11a. Penggunaan fasilitas buang air besar</label>
                                <input class="form-check-input" type="checkbox" id="b3r11aon" name="b3r11aon" @isset($request['b3r11aon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r11b" name="b3r11b" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r11b']=='1') selected @endif @endisset>1. Leher angsa</option>
                                    <option value="2" @isset($request) @if ($request['b3r11b']=='2') selected @endif @endisset>2. Plengsengan</option>
                                    <option value="3" @isset($request) @if ($request['b3r11b']=='3') selected @endif @endisset>3. Cemplung/cubluk</option>
                                    <option value="4" @isset($request) @if ($request['b3r11b']=='4') selected @endif @endisset>4. Tidak pakai</option>
                                </select>
                                <label for="b3r11b" class="form-label">11b. Jenis kloset</label>
                                <input class="form-check-input" type="checkbox" id="b3r11bon" name="b3r11bon" @isset($request['b3r11bon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b3r12" name="b3r12" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b3r12']=='1') selected @endif @endisset>1. Tangki</option>
                                    <option value="2" @isset($request) @if ($request['b3r12']=='2') selected @endif @endisset>2. SPAL</option>
                                    <option value="3" @isset($request) @if ($request['b3r12']=='3') selected @endif @endisset>3. Lubang tanah</option>
                                    <option value="4" @isset($request) @if ($request['b3r12']=='4') selected @endif @endisset>4. Kolam/sawah/sungai/danau/laut</option>
                                    <option value="5" @isset($request) @if ($request['b3r12']=='5') selected @endif @endisset>5. Pantai/tanah lapang/kebun</option>
                                    <option value="6" @isset($request) @if ($request['b3r12']=='6') selected @endif @endisset>6. Lainnya</option>
                                </select>
                                <label for="b3r12" class="form-label">12. Tempat pembuangan akhir tinja</label>
                                <input class="form-check-input" type="checkbox" id="b3r12on" name="b3r12on" @isset($request['b3r12on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-spasial">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok VI Pendapatan Keluarga</strong></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b6r1k2" name="b6r1k2" placeholder="kode">
                                    <option value=""></option>
                                    <option value="00" @isset($request) @if ($request['b6r1k2']=='00') selected @endif @endisset>00. Penerimaan pendapatan</option>
                                    <option value="01" @isset($request) @if ($request['b6r1k2']=='01') selected @endif @endisset>01. Pertanian tanaman padi & palawija</option>
                                    <option value="02" @isset($request) @if ($request['b6r1k2']=='02') selected @endif @endisset>02. Hortikultura</option>
                                    <option value="03" @isset($request) @if ($request['b6r1k2']=='03') selected @endif @endisset>03. Perkebunan</option>
                                    <option value="04" @isset($request) @if ($request['b6r1k2']=='04') selected @endif @endisset>04. Perikanan tangkap</option>
                                    <option value="05" @isset($request) @if ($request['b6r1k2']=='05') selected @endif @endisset>05. Perikanan budidaya</option>
                                    <option value="06" @isset($request) @if ($request['b6r1k2']=='06') selected @endif @endisset>06. Peternakan</option>
                                    <option value="07" @isset($request) @if ($request['b6r1k2']=='07') selected @endif @endisset>07. Kehutanan & pertanian lainnya</option>
                                    <option value="08" @isset($request) @if ($request['b6r1k2']=='08') selected @endif @endisset>08. Pertambangan/penggalian</option>
                                    <option value="09" @isset($request) @if ($request['b6r1k2']=='09') selected @endif @endisset>09. Industri pengolahan</option>
                                    <option value="10" @isset($request) @if ($request['b6r1k2']=='10') selected @endif @endisset>10. Listrik & gas</option>
                                    <option value="11" @isset($request) @if ($request['b6r1k2']=='11') selected @endif @endisset>11. Bangunan/kontruksi</option>
                                    <option value="12" @isset($request) @if ($request['b6r1k2']=='12') selected @endif @endisset>12. Perdagangan</option>
                                    <option value="13" @isset($request) @if ($request['b6r1k2']=='13') selected @endif @endisset>13. Hotel & rumah makan</option>
                                    <option value="14" @isset($request) @if ($request['b6r1k2']=='14') selected @endif @endisset>14. Transportasi & pergudangan</option>
                                    <option value="15" @isset($request) @if ($request['b6r1k2']=='15') selected @endif @endisset>15. Informasi & komunikasi</option>
                                    <option value="16" @isset($request) @if ($request['b6r1k2']=='16') selected @endif @endisset>16. Keuangan & asuransi</option>
                                    <option value="17" @isset($request) @if ($request['b6r1k2']=='17') selected @endif @endisset>17. Jasa pendidikan</option>
                                    <option value="18" @isset($request) @if ($request['b6r1k2']=='18') selected @endif @endisset>18. Jasa kesehatan</option>
                                    <option value="19" @isset($request) @if ($request['b6r1k2']=='19') selected @endif @endisset>19. Jasa kemasyarakatan, pemerintah, & perorangan</option>
                                    <option value="20" @isset($request) @if ($request['b6r1k2']=='20') selected @endif @endisset>20. Pemulung</option>
                                    <option value="21" @isset($request) @if ($request['b6r1k2']=='21') selected @endif @endisset>21. TKI</option>
                                    <option value="22" @isset($request) @if ($request['b6r1k2']=='22') selected @endif @endisset>22. Lainnya</option>
                                </select>
                                <label for="b6r1k2" class="form-label">Kode Lapangan Usaha</label>
                                <input class="form-check-input" type="checkbox" id="b6r1k2on" name="b6r1k2on" @isset($request['b6r1k2on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b6r2_min" name="b6r2_min" placeholder="b6r2_min" value="{{ $request['b6r2_min'] }}" min="0">
                                <label for="b6r2_min" class="form-label">2. Pendapatan seluruh anggota keluarga per bulan (Rp) - minimal</label>
                                <input class="form-check-input" type="checkbox" id="b6r2on" name="b6r2on" @isset($request['b6r2on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b6r2_max" name="b6r2_max" placeholder="b6r2_max" value="{{ $request['b6r2_max'] }}" min="0">
                                <label for="b6r2_max" class="form-label">2. Pendapatan seluruh anggota keluarga per bulan (Rp) - maksimal</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-spasial">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok VII Kepemilikan Aset dan Keikutsertaan Program</strong></div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" id="b7r1on" name="b7r1on" @isset($request['b7r1on']) checked @endisset>
                            1. Keluarga memiliki sendiri aset bergerak sebagai berikut
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1a" name="b7r1a" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1a']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1a']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1a" class="form-label">a. Tabung gas 5,5 kg atau lebih</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1b" name="b7r1b" placeholder="kode">
                                    <option value=""></option>
                                    <option value="3" @isset($request) @if ($request['b7r1b']=='3') selected @endif @endisset>3. Ya</option>
                                    <option value="4" @isset($request) @if ($request['b7r1b']=='4') selected @endif @endisset>4. Tidak</option>
                                </select>
                                <label for="b7r1b" class="form-label">b. Lemari es/kulkas</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1c" name="b7r1c" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1c']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1c']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1c" class="form-label">c. AC</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1d" name="b7r1d" placeholder="kode">
                                    <option value=""></option>
                                    <option value="3" @isset($request) @if ($request['b7r1d']=='3') selected @endif @endisset>3. Ya</option>
                                    <option value="4" @isset($request) @if ($request['b7r1d']=='4') selected @endif @endisset>4. Tidak</option>
                                </select>
                                <label for="b7r1d" class="form-label">d. Pemanas air (water heater)</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1e" name="b7r1e" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1e']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1e']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1e" class="form-label">e. Telepon rumah (PSTN)</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1f" name="b7r1f" placeholder="kode">
                                    <option value=""></option>
                                    <option value="3" @isset($request) @if ($request['b7r1f']=='3') selected @endif @endisset>3. Ya</option>
                                    <option value="4" @isset($request) @if ($request['b7r1f']=='4') selected @endif @endisset>4. Tidak</option>
                                </select>
                                <label for="b7r1f" class="form-label">f. Televisi</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1g" name="b7r1g" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1g']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1g']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1g" class="form-label">g. Emas/perhiasan & tabungan (senilai 10 gram emas)</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1h" name="b7r1h" placeholder="kode">
                                    <option value=""></option>
                                    <option value="3" @isset($request) @if ($request['b7r1h']=='3') selected @endif @endisset>3. Ya</option>
                                    <option value="4" @isset($request) @if ($request['b7r1h']=='4') selected @endif @endisset>4. Tidak</option>
                                </select>
                                <label for="b7r1h" class="form-label">h. Komputer/laptop</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1i" name="b7r1i" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1i']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1i']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1i" class="form-label">i. Sepeda</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1j" name="b7r1j" placeholder="kode">
                                    <option value=""></option>
                                    <option value="3" @isset($request) @if ($request['b7r1j']=='3') selected @endif @endisset>3. Ya</option>
                                    <option value="4" @isset($request) @if ($request['b7r1j']=='4') selected @endif @endisset>4. Tidak</option>
                                </select>
                                <label for="b7r1j" class="form-label">j. Sepeda motor</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1k" name="b7r1k" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1k']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1k']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1k" class="form-label">k. Mobil</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1l" name="b7r1l" placeholder="kode">
                                    <option value=""></option>
                                    <option value="3" @isset($request) @if ($request['b7r1l']=='3') selected @endif @endisset>3. Ya</option>
                                    <option value="4" @isset($request) @if ($request['b7r1l']=='4') selected @endif @endisset>4. Tidak</option>
                                </select>
                                <label for="b7r1l" class="form-label">l. Perahu</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1m" name="b7r1m" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1m']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1m']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1m" class="form-label">m. Motor tempel</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1n" name="b7r1n" placeholder="kode">
                                    <option value=""></option>
                                    <option value="3" @isset($request) @if ($request['b7r1n']=='3') selected @endif @endisset>3. Ya</option>
                                    <option value="4" @isset($request) @if ($request['b7r1n']=='4') selected @endif @endisset>4. Tidak</option>
                                </select>
                                <label for="b7r1n" class="form-label">n. Perahu motor</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r1o" name="b7r1o" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r1o']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r1o']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r1o" class="form-label">o. Kapal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r2a_min" name="b7r2a_min" placeholder="b7r2a_min" value="{{ $request['b7r2a_min'] }}" min="0">
                                <label for="b7r2a_min" class="form-label">2a. Jumlah nomor HP aktif yang dimiliki oleh seluruh anggota keluarga - minimal</label>
                                <input class="form-check-input" type="checkbox" id="b7r2aon" name="b7r2aon" @isset($request['b7r2aon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r2a_max" name="b7r2a_max" placeholder="b7r2a_max" value="{{ $request['b7r2a_max'] }}" min="0">
                                <label for="b7r2a_max" class="form-label">2a. Jumlah nomor HP aktif yang dimiliki oleh seluruh anggota keluarga - maksimal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r2b_min" name="b7r2b_min" placeholder="b7r2b_min" value="{{ $request['b7r2b_min'] }}" min="0">
                                <label for="b7r2b_min" class="form-label">2b. Jumlah TV layar datar minimal 30 inch yang dimiliki keluarga - minimal</label>
                                <input class="form-check-input" type="checkbox" id="b7r2bon" name="b7r2bon" @isset($request['b7r2bon']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r2b_max" name="b7r2b_max" placeholder="b7r2b_max" value="{{ $request['b7r2b_max'] }}" min="0">
                                <label for="b7r2b_max" class="form-label">2b. Jumlah TV layar datar minimal 30 inch yang dimiliki keluarga - maksimal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" id="b7r3on" name="b7r3on" @isset($request['b7r3on']) checked @endisset>
                            3. Keluarga yang memiliki aset tidak bergerak sebagai berikut
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r3a1" name="b7r3a1" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r3a1']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r3a1']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r3a1" class="form-label">a. Lahan</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r3a2_min" name="b7r3a2_min" placeholder="b7r3a2_min" value="{{ $request['b7r3a2_min'] }}" min="0">
                                <label for="b7r3a2_min" class="form-label">Luas (m2) - minimal</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r3a2_max" name="b7r3a2_max" placeholder="b7r3a2_max" value="{{ $request['b7r3a2_max'] }}" min="0">
                                <label for="b7r3a2_max" class="form-label">Luas (m2) - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r3b" name="b7r3b" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r3b']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r3b']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r3b" class="form-label">b. Rumah di tempat lain</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" id="b7r4on" name="b7r4on" @isset($request['b7r4on']) checked @endisset>
                            4. Jumlah ternak yang dimiliki (ekor)
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4a_min" name="b7r4a_min" placeholder="b7r4a_min" value="{{ $request['b7r4a_min'] }}" min=0>
                                <label for="b7r4a_min" class="form-label">a. Sapi - minimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4b_min" name="b7r4b_min" placeholder="b7r4b_min" value="{{ $request['b7r4b_min'] }}" min=0>
                                <label for="b7r4b_min" class="form-label">b. Kerbau - minimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4c_min" name="b7r4c_min" placeholder="b7r4c_min" value="{{ $request['b7r4c_min'] }}" min=0>
                                <label for="b7r4c_min" class="form-label">c. Kuda - minimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4d_min" name="b7r4d_min" placeholder="b7r4d_min" value="{{ $request['b7r4d_min'] }}" min=0>
                                <label for="b7r4d_min" class="form-label">d. Babi - minimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4e_min" name="b7r4e_min" placeholder="b7r4e_min" value="{{ $request['b7r4e_min'] }}" min=0>
                                <label for="b7r4e_min" class="form-label">e. Kambing/domba - minimal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4a_max" name="b7r4a_max" placeholder="b7r4a_max" value="{{ $request['b7r4a_max'] }}" min=0>
                                <label for="b7r4a_max" class="form-label">a. Sapi - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4b_max" name="b7r4b_max" placeholder="b7r4b_max" value="{{ $request['b7r4b_max'] }}" min=0>
                                <label for="b7r4b_max" class="form-label">b. Kerbau - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4c_max" name="b7r4c_max" placeholder="b7r4c_max" value="{{ $request['b7r4c_max'] }}" min=0>
                                <label for="b7r4c_max" class="form-label">c. Kuda - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4d_max" name="b7r4d_max" placeholder="b7r4d_max" value="{{ $request['b7r4d_max'] }}" min=0>
                                <label for="b7r4d_max" class="form-label">d. Babi - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r4e_max" name="b7r4e_max" placeholder="b7r4e_max" value="{{ $request['b7r4e_max'] }}" min=0>
                                <label for="b7r4e_max" class="form-label">e. Kambing/domba - maksimal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r5a" name="b7r5a" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r5a']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b7r5a']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b7r5a" class="form-label">5a. Apakah ada anggota keluarga yang memiliki usaha sendiri/bersama?</label>
                                <input class="form-check-input" type="checkbox" id="b7r5aon" name="b7r5aon" @isset($request['b7r5aon']) checked @endisset>
                            </div>
                        </div>
                    </div>     
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <button type="submit" id="formButton" class="btn btn-primary">Tampilkan Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="penduduk" @if ($request->tabel=='2') @else hidden @endif>
            <form action="{{ url('/data/kuisioner/tabelpenduduk') }}" method="POST" id="form" class="form-spasial" autocomplete="off">
                @csrf
                <input type="hidden" name="filter" value="true">
                <input type="hidden" name="tabel" value="2">
                <input type="hidden" name="provinsi" value="{{ $request->provinsi }}">
                <input type="hidden" name="kabupaten" value="{{ $request->kabupaten }}">
                <input type="hidden" name="kecamatan" value="{{ $request->kecamatan }}">
                <input type="hidden" name="desa" value="{{ $request->desa }}">
                
                <div class="form-spasial">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok IV Keterangan Sosial Ekonomi Anggota keluarga</strong></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="b4k2_nama" name="b4k2_nama" placeholder="b4k2_nama" value="{{ $request['b4k2_nama'] }}">
                                <label for="b4k2_nama" class="form-label">2. Nama</label>
                                <small><span class="text-danger error-text b4k2_nama_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="b4k2_nik" name="b4k2_nik" placeholder="b4k2_nik" value="{{ $request['b4k2_nik'] }}">
                                <label for="b4k2_nik" class="form-label">NIK</label>
                                <small><span class="text-danger error-text b4k2_nik_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k3" name="b4k3" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k3']=='1') selected @endif @endisset>1. Kepala keluarga</option>
                                    <option value="2" @isset($request) @if ($request['b4k3']=='2') selected @endif @endisset>2. Istri/suami</option>
                                    <option value="3" @isset($request) @if ($request['b4k3']=='3') selected @endif @endisset>3. Anak</option>
                                    <option value="4" @isset($request) @if ($request['b4k3']=='4') selected @endif @endisset>4. Menantu</option>
                                    <option value="5" @isset($request) @if ($request['b4k3']=='5') selected @endif @endisset>5. Cucu</option>
                                    <option value="6" @isset($request) @if ($request['b4k3']=='6') selected @endif @endisset>6. Orang tua/mertua</option>
                                    <option value="7" @isset($request) @if ($request['b4k3']=='7') selected @endif @endisset>7. Pembantu ruta</option>
                                    <option value="8" @isset($request) @if ($request['b4k3']=='8') selected @endif @endisset>8. Lainnya</option>
                                </select>
                                <label for="b4k3" class="form-label">3. Hubungan dengan kepala keluarga</label>
                                <input class="form-check-input" type="checkbox" id="b4k3on" name="b4k3on" @isset($request['b4k3on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select " id="b4k4" name="b4k4" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k4']=='1') selected @endif @endisset>1. Laki-laki</option>
                                    <option value="2" @isset($request) @if ($request['b4k4']=='2') selected @endif @endisset>2. Perempuan</option>
                                </select>
                                <label for="b4k4" class="form-label">4. Jenis kelamin</label>
                                <input class="form-check-input" type="checkbox" id="b4k4on" name="b4k4on" @isset($request['b4k4on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b4k5_min" name="b4k5_min" placeholder="b4k5_min" value="{{ $request['b4k5_min'] }}" min="0" max="999">
                                <label for="b4k5_min" class="form-label">5. Umur (Tahun) - minmal</label>
                                <input class="form-check-input" type="checkbox" id="b4k5on" name="b4k5on" @isset($request['b4k5on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b4k5_max" name="b4k5_max" placeholder="b4k5_max" value="{{ $request['b4k5_max'] }}" min="0" max="999">
                                <label for="b4k5_max" class="form-label">5. Umur (Tahun) - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k6" name="b4k6" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k6']=='1') selected @endif @endisset>1. Belum kawin</option>
                                    <option value="2" @isset($request) @if ($request['b4k6']=='2') selected @endif @endisset>2. Kawin/nikah</option>
                                    <option value="3" @isset($request) @if ($request['b4k6']=='3') selected @endif @endisset>3. Cerai hidup</option>
                                    <option value="4" @isset($request) @if ($request['b4k6']=='4') selected @endif @endisset>4. Cerai mati</option>
                                </select>
                                <label for="b4k6" class="form-label">6. Status perkawinan</label>
                                <input class="form-check-input" type="checkbox" id="b4k6on" name="b4k6on" @isset($request['b4k6on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k7" name="b4k7" placeholder="kode">
                                    <option value=""></option>
                                    <option value="0" @isset($request) @if ($request['b4k7']=='0') selected @endif @endisset>0. Tidak</option>
                                    <option value="1" @isset($request) @if ($request['b4k7']=='1') selected @endif @endisset>1. Ya, dapat ditunjukkan</option>
                                    <option value="2" @isset($request) @if ($request['b4k7']=='2') selected @endif @endisset>2. Ya, tidak dapat ditunjukkan</option>
                                </select>
                                <label for="b4k7" class="form-label">7. Kepemilikan akta/buku nikah/akta cerai</label>
                                <input class="form-check-input" type="checkbox" id="b4k7on" name="b4k7on" @isset($request['b4k7on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k8" name="b4k8" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k8']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b4k8']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b4k8" class="form-label">8. Tercantum dalam KK di keluarga ini</label>
                                <input class="form-check-input" type="checkbox" id="b4k8on" name="b4k8on" @isset($request['b4k8on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b4k9" name="b4k9" placeholder="b4k9" value="{{ $request['b4k9'] }}" min="0" max="15">
                                <label for="b4k9" class="form-label">9. Kepemilikan kartu identitas</label>
                                <input class="form-check-input" type="checkbox" id="b4k9on" name="b4k9on" @isset($request['b4k9on']) checked @endisset>                      
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k10" name="b4k10" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k10']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b4k10']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b4k10" class="form-label">10. Status kehamilan</label>
                                <input class="form-check-input" type="checkbox" id="b4k10on" name="b4k10on" @isset($request['b4k10on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k11" name="b4k11" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k11']=='1') selected @endif @endisset>1. MOW/Tubektomi</option>
                                    <option value="2" @isset($request) @if ($request['b4k11']=='2') selected @endif @endisset>2. MOP/Vasektomi</option>
                                    <option value="3" @isset($request) @if ($request['b4k11']=='3') selected @endif @endisset>3. AKDR/IUD/Spiral</option>
                                    <option value="4" @isset($request) @if ($request['b4k11']=='4') selected @endif @endisset>4. Suntikan KB</option>
                                    <option value="5" @isset($request) @if ($request['b4k11']=='5') selected @endif @endisset>5. Susuk KB/Norplan/Implanon/Alwalit</option>
                                    <option value="6" @isset($request) @if ($request['b4k11']=='6') selected @endif @endisset>6. Pil KB</option>
                                    <option value="7" @isset($request) @if ($request['b4k11']=='7') selected @endif @endisset>7. Kondom/Karet KB</option>
                                    <option value="8" @isset($request) @if ($request['b4k11']=='8') selected @endif @endisset>8. Intravag/Tisue/Kondom Wanita</option>
                                    <option value="9" @isset($request) @if ($request['b4k11']=='9') selected @endif @endisset>9. Cara Tradisional</option>
                                </select>
                                <label for="b4k11" class="form-label">11. Alat KB</label>
                                <input class="form-check-input" type="checkbox" id="b4k11on" name="b4k11on" @isset($request['b4k11on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k12" name="b4k12" placeholder="kode">
                                    <option value=""></option>
                                    <option value="00" @isset($request) @if ($request['b4k12']=='00') selected @endif @endisset>00. Tidak cacat</option>
                                    <option value="01" @isset($request) @if ($request['b4k12']=='01') selected @endif @endisset>01. Tuna daksa/cacat tubuh</option>
                                    <option value="02" @isset($request) @if ($request['b4k12']=='02') selected @endif @endisset>02. Tuna netra/buta</option>
                                    <option value="03" @isset($request) @if ($request['b4k12']=='03') selected @endif @endisset>03. Tuna rungu</option>
                                    <option value="04" @isset($request) @if ($request['b4k12']=='04') selected @endif @endisset>04. Tuna wicara</option>
                                    <option value="05" @isset($request) @if ($request['b4k12']=='05') selected @endif @endisset>05. Tuna rungu & wicara</option>
                                    <option value="06" @isset($request) @if ($request['b4k12']=='06') selected @endif @endisset>06. Tuna netra & cacat tubuh</option>
                                    <option value="07" @isset($request) @if ($request['b4k12']=='07') selected @endif @endisset>07. Tuna netra, rungu, & wicara</option>
                                    <option value="08" @isset($request) @if ($request['b4k12']=='08') selected @endif @endisset>08. Tuna rungu, wicara, & cacat tubuh</option>
                                    <option value="09" @isset($request) @if ($request['b4k12']=='09') selected @endif @endisset>09. Tuna rungu, wicara, netra, & cacat tubuh</option>
                                    <option value="10" @isset($request) @if ($request['b4k12']=='10') selected @endif @endisset>10. Cacat mental retardasi</option>
                                    <option value="11" @isset($request) @if ($request['b4k12']=='11') selected @endif @endisset>11. Mantan penderita gangguan jiwa</option>
                                    <option value="12" @isset($request) @if ($request['b4k12']=='12') selected @endif @endisset>12. Cacat fisik & mental</option>
                                </select>
                                <label for="b4k12" class="form-label">12. Jenis cacat</label>
                                <input class="form-check-input" type="checkbox" id="b4k12on" name="b4k12on" @isset($request['b4k12on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k13" name="b4k13" placeholder="kode">
                                    <option value=""></option>
                                    <option value="0" @isset($request) @if ($request['b4k13']=='0') selected @endif @endisset>0. Tidak ada</option>
                                    <option value="1" @isset($request) @if ($request['b4k13']=='1') selected @endif @endisset>1. Hipertensi (tekanan darah tinggi)</option>
                                    <option value="2" @isset($request) @if ($request['b4k13']=='2') selected @endif @endisset>2. Rematik</option>
                                    <option value="3" @isset($request) @if ($request['b4k13']=='3') selected @endif @endisset>3. Asma</option>
                                    <option value="4" @isset($request) @if ($request['b4k13']=='4') selected @endif @endisset>4. Masalah jantung</option>
                                    <option value="5" @isset($request) @if ($request['b4k13']=='5') selected @endif @endisset>5. Diabetes (kencing manis)</option>
                                    <option value="6" @isset($request) @if ($request['b4k13']=='6') selected @endif @endisset>6. Tuberculosis (TBC)</option>
                                    <option value="7" @isset($request) @if ($request['b4k13']=='7') selected @endif @endisset>7. Stroke</option>
                                    <option value="8" @isset($request) @if ($request['b4k13']=='8') selected @endif @endisset>8. Kanker atau tumor ganas</option>
                                    <option value="9" @isset($request) @if ($request['b4k13']=='9') selected @endif @endisset>9. Lainnya (gagal ginjal, paru-paru flek, dan sejenisnya)</option>
                                </select>
                                <label for="b4k13" class="form-label">13. Penyakit kronis/menahun</label>
                                <input class="form-check-input" type="checkbox" id="b4k13on" name="b4k13on" @isset($request['b4k13on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k14" name="b4k14" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k14']=='1') selected @endif @endisset>1. A</option>
                                    <option value="2" @isset($request) @if ($request['b4k14']=='2') selected @endif @endisset>2. B</option>
                                    <option value="3" @isset($request) @if ($request['b4k14']=='3') selected @endif @endisset>3. AB</option>
                                    <option value="4" @isset($request) @if ($request['b4k14']=='4') selected @endif @endisset>4. O</option>
                                    <option value="5" @isset($request) @if ($request['b4k14']=='5') selected @endif @endisset>5. Tidak tahu</option>
                                </select>
                                <label for="b4k14" class="form-label">14. Golongan darah</label>
                                <input class="form-check-input" type="checkbox" id="b4k14on" name="b4k14on" @isset($request['b4k14on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k15" name="b4k15" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="0" @isset($request) @if ($request['b4k15']=='0') selected @endif @endisset>0. Tidak/belum pernah sekolah</option>
                                    <option value="1" @isset($request) @if ($request['b4k15']=='1') selected @endif @endisset>1. Masih sekolah</option>
                                    <option value="2" @isset($request) @if ($request['b4k15']=='2') selected @endif @endisset>2. Tidak bersekolah lagi</option>
                                </select>
                                <label for="b4k15" class="form-label">15. Partisipasi sekolah</label>
                                <input class="form-check-input" type="checkbox" id="b4k15on" name="b4k15on" @isset($request['b4k15on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k16" name="b4k16" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="01" @isset($request) @if ($request['b4k16']=='01') selected @endif @endisset>01. SD/SDLB</option>
                                    <option value="02" @isset($request) @if ($request['b4k16']=='02') selected @endif @endisset>02. Paket A</option>
                                    <option value="03" @isset($request) @if ($request['b4k16']=='03') selected @endif @endisset>03. M. Ibtidaiyah</option>
                                    <option value="04" @isset($request) @if ($request['b4k16']=='04') selected @endif @endisset>04. SMP/SMPLB</option>
                                    <option value="05" @isset($request) @if ($request['b4k16']=='05') selected @endif @endisset>05. Paket B</option>
                                    <option value="06" @isset($request) @if ($request['b4k16']=='06') selected @endif @endisset>06. M. Tsanawiyah</option>
                                    <option value="07" @isset($request) @if ($request['b4k16']=='06') selected @endif @endisset>07. SMA/SMK/SMALB</option>
                                    <option value="08" @isset($request) @if ($request['b4k16']=='08') selected @endif @endisset>08. Paket C</option>
                                    <option value="09" @isset($request) @if ($request['b4k16']=='09') selected @endif @endisset>09. M. Aliyah</option>
                                    <option value="10" @isset($request) @if ($request['b4k16']=='10') selected @endif @endisset>10. Perguruan tinggi</option>
                                </select>
                                <label for="b4k16" class="form-label">16. Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki</label>
                                <input class="form-check-input" type="checkbox" id="b4k16on" name="b4k16on" @isset($request['b4k16on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k17" name="b4k17" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k17']=='1') selected @endif @endisset>1</option>
                                    <option value="2" @isset($request) @if ($request['b4k17']=='2') selected @endif @endisset>2</option>
                                    <option value="3" @isset($request) @if ($request['b4k17']=='3') selected @endif @endisset>3</option>
                                    <option value="4" @isset($request) @if ($request['b4k17']=='4') selected @endif @endisset>4</option>
                                    <option value="5" @isset($request) @if ($request['b4k17']=='5') selected @endif @endisset>5</option>
                                    <option value="6" @isset($request) @if ($request['b4k17']=='6') selected @endif @endisset>6</option>
                                    <option value="7" @isset($request) @if ($request['b4k17']=='7') selected @endif @endisset>7</option>
                                    <option value="8" @isset($request) @if ($request['b4k17']=='8') selected @endif @endisset>8 (Tamat)</option>
                                </select>
                                <label for="b4k17" class="form-label">17. Kelas tertinggi yang pernah/sedang diduduki</label>
                                <input class="form-check-input" type="checkbox" id="b4k17on" name="b4k17on" @isset($request['b4k17on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k18" name="b4k18" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="0" @isset($request) @if ($request['b4k18']=='0') selected @endif @endisset>0. Tidak punya ijazah</option>
                                    <option value="1" @isset($request) @if ($request['b4k18']=='1') selected @endif @endisset>1. SD/sederajat</option>
                                    <option value="2" @isset($request) @if ($request['b4k18']=='2') selected @endif @endisset>2. SMP/sederajat</option>
                                    <option value="3" @isset($request) @if ($request['b4k18']=='3') selected @endif @endisset>3. SMA/sederajat</option>
                                    <option value="4" @isset($request) @if ($request['b4k18']=='4') selected @endif @endisset>4. D1/D2/D3</option>
                                    <option value="5" @isset($request) @if ($request['b4k18']=='5') selected @endif @endisset>5. D4/S1</option>
                                    <option value="6" @isset($request) @if ($request['b4k18']=='6') selected @endif @endisset>6. S2/S3</option>
                                </select>
                                <label for="b4k18" class="form-label">18. Ijazah tertinggi yang dimiliki</label>
                                <input class="form-check-input" type="checkbox" id="b4k18on" name="b4k18on" @isset($request['b4k18on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k19" name="b4k19" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k19']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b4k19']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b4k19" class="form-label">19. Pensiunan</label>
                                <input class="form-check-input" type="checkbox" id="b4k19on" name="b4k19on" @isset($request['b4k19on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k20" name="b4k20" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k20']=='1') selected @endif @endisset>1. Ya</option>
                                    <option value="2" @isset($request) @if ($request['b4k20']=='2') selected @endif @endisset>2. Tidak</option>
                                </select>
                                <label for="b4k20" class="form-label">20. Bekerja/ membantu bekerja</label>
                                <input class="form-check-input" type="checkbox" id="b4k20on" name="b4k20on" @isset($request['b4k20on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k21" name="b4k21" placeholder="kode">
                                    <option value=""></option>
                                    <option value="01" @isset($request) @if ($request['b4k21']=='01') selected @endif @endisset>01. Pertanian tanaman padi & palawija</option>
                                    <option value="02" @isset($request) @if ($request['b4k21']=='02') selected @endif @endisset>02. Hortikultura</option>
                                    <option value="03" @isset($request) @if ($request['b4k21']=='03') selected @endif @endisset>03. Perkebunan</option>
                                    <option value="04" @isset($request) @if ($request['b4k21']=='04') selected @endif @endisset>04. Perikanan tangkap</option>
                                    <option value="05" @isset($request) @if ($request['b4k21']=='05') selected @endif @endisset>05. Perikanan budidaya</option>
                                    <option value="06" @isset($request) @if ($request['b4k21']=='06') selected @endif @endisset>06. Peternakan</option>
                                    <option value="07" @isset($request) @if ($request['b4k21']=='07') selected @endif @endisset>07. Kehutanan & pertanian lainnya</option>
                                    <option value="08" @isset($request) @if ($request['b4k21']=='08') selected @endif @endisset>08. Pertambangan/penggalian</option>
                                    <option value="09" @isset($request) @if ($request['b4k21']=='09') selected @endif @endisset>09. Industri pengolahan</option>
                                    <option value="10" @isset($request) @if ($request['b4k21']=='10') selected @endif @endisset>10. Listrik & gas</option>
                                    <option value="11" @isset($request) @if ($request['b4k21']=='11') selected @endif @endisset>11. Bangunan/kontruksi</option>
                                    <option value="12" @isset($request) @if ($request['b4k21']=='12') selected @endif @endisset>12. Perdagangan</option>
                                    <option value="13" @isset($request) @if ($request['b4k21']=='13') selected @endif @endisset>13. Hotel & rumah makan</option>
                                    <option value="14" @isset($request) @if ($request['b4k21']=='14') selected @endif @endisset>14. Transportasi & pergudangan</option>
                                    <option value="15" @isset($request) @if ($request['b4k21']=='15') selected @endif @endisset>15. Informasi & komunikasi</option>
                                    <option value="16" @isset($request) @if ($request['b4k21']=='16') selected @endif @endisset>16. Keuangan & asuransi</option>
                                    <option value="17" @isset($request) @if ($request['b4k21']=='17') selected @endif @endisset>17. Jasa pendidikan</option>
                                    <option value="18" @isset($request) @if ($request['b4k21']=='18') selected @endif @endisset>18. Jasa kesehatan</option>
                                    <option value="19" @isset($request) @if ($request['b4k21']=='19') selected @endif @endisset>19. Jasa kemasyarakatan, pemerintah, & perorangan</option>
                                    <option value="20" @isset($request) @if ($request['b4k21']=='20') selected @endif @endisset>20. Pemulung</option>
                                    <option value="21" @isset($request) @if ($request['b4k21']=='21') selected @endif @endisset>21. TKI</option>
                                    <option value="22" @isset($request) @if ($request['b4k21']=='22') selected @endif @endisset>22. Lainnya</option>
                                </select>
                                <label for="b4k21" class="form-label">21. Lapangan usaha dari pekerjaan utama</label>
                                <input class="form-check-input" type="checkbox" id="b4k21on" name="b4k21on" @isset($request['b4k21on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k22" name="b4k22" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k22']=='1') selected @endif @endisset>1. Berusaha sendiri</option>
                                    <option value="2" @isset($request) @if ($request['b4k22']=='2') selected @endif @endisset>2. Berusaha dibantu buruh tidak tetap/tidak dibayar</option>
                                    <option value="3" @isset($request) @if ($request['b4k22']=='3') selected @endif @endisset>3. Berusaha dibantu buruh tetap/dibayar</option>
                                    <option value="4" @isset($request) @if ($request['b4k22']=='4') selected @endif @endisset>4. Buruh/karyawan/pegawai swasta</option>
                                    <option value="5" @isset($request) @if ($request['b4k22']=='5') selected @endif @endisset>5. PNS/TNI/Polri/BUMN/BUMD</option>
                                    <option value="6" @isset($request) @if ($request['b4k22']=='6') selected @endif @endisset>6. Pekerja bebas pertanian</option>
                                    <option value="7" @isset($request) @if ($request['b4k22']=='7') selected @endif @endisset>7. Pekerja bebas non-pertanian</option>
                                    <option value="8" @isset($request) @if ($request['b4k22']=='8') selected @endif @endisset>8. Pekerja keluarga/tidak dibayar</option>
                                </select>
                                <label for="b4k22" class="form-label">22. Status kedudukan dalam pekerjaan utama</label>
                                <input class="form-check-input" type="checkbox" id="b4k22on" name="b4k22on" @isset($request['b4k22on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k23" name="b4k23" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k12']=='1') selected @endif @endisset>1. Islam</option>
                                    <option value="2" @isset($request) @if ($request['b4k12']=='2') selected @endif @endisset>2. Protestan</option>
                                    <option value="3" @isset($request) @if ($request['b4k12']=='3') selected @endif @endisset>3. Katolik</option>
                                    <option value="4" @isset($request) @if ($request['b4k12']=='4') selected @endif @endisset>4. Hindu</option>
                                    <option value="5" @isset($request) @if ($request['b4k12']=='5') selected @endif @endisset>5. Budha</option>
                                    <option value="6" @isset($request) @if ($request['b4k12']=='6') selected @endif @endisset>6. Konghucu</option>
                                    <option value="7" @isset($request) @if ($request['b4k12']=='7') selected @endif @endisset>7. Lainnya</option>
                                </select>
                                <label for="b4k23" class="form-label">23. Agama</label>
                                <input class="form-check-input" type="checkbox" id="b4k23on" name="b4k23on" @isset($request['b4k23on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k24" name="b4k24" placeholder="kode">
                                    <option value=""></option>
                                    <option value="01" @isset($request) @if ($request['b4k24']=='01') selected @endif @endisset>01. Arab</option>
                                    <option value="02" @isset($request) @if ($request['b4k24']=='02') selected @endif @endisset>02. Ambon</option>
                                    <option value="03" @isset($request) @if ($request['b4k24']=='03') selected @endif @endisset>03. Bali</option>
                                    <option value="04" @isset($request) @if ($request['b4k24']=='04') selected @endif @endisset>04. Batak</option>
                                    <option value="05" @isset($request) @if ($request['b4k24']=='05') selected @endif @endisset>05. Betawi</option>
                                    <option value="06" @isset($request) @if ($request['b4k24']=='06') selected @endif @endisset>06. Bugis</option>
                                    <option value="07" @isset($request) @if ($request['b4k24']=='07') selected @endif @endisset>07. China</option>
                                    <option value="08" @isset($request) @if ($request['b4k24']=='08') selected @endif @endisset>08. Dayak</option>
                                    <option value="09" @isset($request) @if ($request['b4k24']=='09') selected @endif @endisset>09. India</option>
                                    <option value="10" @isset($request) @if ($request['b4k24']=='10') selected @endif @endisset>10. Jawa</option>
                                    <option value="11" @isset($request) @if ($request['b4k24']=='11') selected @endif @endisset>11. Madura</option>
                                    <option value="12" @isset($request) @if ($request['b4k24']=='12') selected @endif @endisset>12. Melayu</option>
                                    <option value="13" @isset($request) @if ($request['b4k24']=='13') selected @endif @endisset>13. Minang</option>
                                    <option value="14" @isset($request) @if ($request['b4k24']=='14') selected @endif @endisset>14. Papua</option>
                                    <option value="15" @isset($request) @if ($request['b4k24']=='15') selected @endif @endisset>15. Sunda</option>
                                    <option value="16" @isset($request) @if ($request['b4k24']=='16') selected @endif @endisset>16. Timor</option>
                                    <option value="17" @isset($request) @if ($request['b4k24']=='17') selected @endif @endisset>17. Lainnya</option>
                                </select>
                                <label for="b4k24" class="form-label">24. Suku</label>
                                <input class="form-check-input" type="checkbox" id="b4k24on" name="b4k24on" @isset($request['b4k24on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b4k25" name="b4k25" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b4k25']=='1') selected @endif @endisset>1. Alamat tempat tinggal dan KTP/KK di dalam desa</option>
                                    <option value="2" @isset($request) @if ($request['b4k25']=='2') selected @endif @endisset>2. Alamat tempat tinggal di dalam desa tapi KTP/KK di luar desa</option>
                                    <option value="3" @isset($request) @if ($request['b4k25']=='3') selected @endif @endisset>3. Alamat tempat tinggal di luar desa tapi KTP/KK di dalam desa</option>
                                </select>
                                <label for="b4k25" class="form-label">25. Domisili</label>
                                <input class="form-check-input" type="checkbox" id="b4k25on" name="b4k25on" @isset($request['b4k25on']) checked @endisset>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="b4k26" name="b4k26" placeholder="b4k26" @isset($request) value="{{ $request['b4k26'] }}" @endisset>
                                <label for="b4k26" class="form-label">26. Peserta Program Bansos</label>
                                <input class="form-check-input" type="checkbox" id="b4k26on" name="b4k26on" @isset($request['b4k26on']) checked @endisset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="vaksinCovid" name="vaksinCovid" placeholder="vaksinCovid" @isset($request) value="{{ $request['vaksinCovid'] }}" @endisset>
                            <label for="vaksinCovid" class="form-label">Vaksin Covid</label>
                            <input class="form-check-input" type="checkbox" id="vaksinCovidon" name="vaksinCovidon" @isset($request['vaksinCovidon']) checked @endisset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="flag" name="flag" placeholder="kode">
                                <option value="">Ada</option>
                                <option value="Pindah" @isset($request) @if ($request['flag']=='Pindah') selected @endif @endisset>Pindah</option>
                                <option value="Meninggal" @isset($request) @if ($request['flag']=='Meninggal') selected @endif @endisset>Meninggal</option>
                                <option value="Punya KK Baru" @isset($request) @if ($request['flag']=='Punya KK Baru') selected @endif @endisset>Punya KK Baru</option>
                                <option value="all" @isset($request) @if ($request['flag']=='all') selected @endif @endisset>Tampilkan Semua Flag</option>
                            </select>
                            <label for="flag" class="form-label">Flag</label>
                            <input class="form-check-input" type="checkbox" id="flagon" name="flagon" @isset($request['flagon']) checked @endisset>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <button type="submit" id="formButton" class="btn btn-primary">Tampilkan Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="sertifikat" @if ($request->tabel=='3') @else hidden @endif>
            <form action="{{ url('/data/kuisioner/tabelsertifikat') }}" method="POST" id="form" class="form-spasial" autocomplete="off">
                @csrf
                <input type="hidden" name="filter" value="true">
                <input type="hidden" name="tabel" value="3">
                <input type="hidden" name="provinsi" value="{{ $request->provinsi }}">
                <input type="hidden" name="kabupaten" value="{{ $request->kabupaten }}">
                <input type="hidden" name="kecamatan" value="{{ $request->kecamatan }}">
                <input type="hidden" name="desa" value="{{ $request->desa }}">
                
                <div class="form-spasial">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok V Sertifikat Tanah</strong></div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b5k3" name="b5k3" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b5k3']=='1') selected @endif @endisset>1. Pekarangan</option>
                                    <option value="2" @isset($request) @if ($request['b5k3']=='2') selected @endif @endisset>2. Sawah irigasi</option>
                                    <option value="3" @isset($request) @if ($request['b5k3']=='3') selected @endif @endisset>3. Sawah tadah hujan</option>
                                    <option value="4" @isset($request) @if ($request['b5k3']=='4') selected @endif @endisset>4. Tegalan</option>
                                    <option value="5" @isset($request) @if ($request['b5k3']=='5') selected @endif @endisset>5. Kolam</option>
                                </select>
                                <label for="b5k3" class="form-label">3. Jenis lahan</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b5k4" name="b5k4" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b5k4']=='1') selected @endif @endisset>1. Ada SPPT</option>
                                    <option value="2" @isset($request) @if ($request['b5k4']=='2') selected @endif @endisset>2. Tidak ada SPPT</option>
                                </select>
                                <label for="b5k4" class="form-label">4. Keberadaan SPPT</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="b5k5" name="b5k5" placeholder="b5k5" value="{{ $request['b5k5'] }}">
                                <label for="b5k5" class="form-label">5. Nomor objek pajak</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b5k6_min" name="b5k6_min" placeholder="b5k6_min" value="{{ $request['b5k6_min'] }}" min="0">
                                <label for="b5k6_min" class="form-label">6. Luas lahan (m2) - minimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b5k6_max" name="b5k6_max" placeholder="b5k6_max" value="{{ $request['b5k6_max'] }}" min="0">
                                <label for="b5k6_max" class="form-label">6. Luas lahan (m2) - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b5k7" name="b5k7" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1"@isset($request) @if ($request['b5k7']=='1') selected @endif @endisset>1. SHM</option>
                                    <option value="2"@isset($request) @if ($request['b5k7']=='2') selected @endif @endisset>2. HGB</option>
                                    <option value="3"@isset($request) @if ($request['b5k7']=='3') selected @endif @endisset>3. Tidak bersertifikat</option>
                                </select>
                                <label for="b5k7" class="form-label">7. Hak kepemilikan sertifikat</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <button type="submit" id="formButton" class="btn btn-primary">Tampilkan Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane" id="usaha" @if ($request->tabel=='4') @else hidden @endif>
            <form action="{{ url('/data/kuisioner/tabelusaha') }}" method="POST" id="form" class="form-spasial" autocomplete="off">
                @csrf
                <input type="hidden" name="filter" value="true">
                <input type="hidden" name="tabel" value="4">
                <input type="hidden" name="provinsi" value="{{ $request->provinsi }}">
                <input type="hidden" name="kabupaten" value="{{ $request->kabupaten }}">
                <input type="hidden" name="kecamatan" value="{{ $request->kecamatan }}">
                <input type="hidden" name="desa" value="{{ $request->desa }}">

                <div class="form-spasial">
                    <div class="card-header mb-2 mt-0 blokHed"><strong>Blok VII Kepemilikan Aset dan Keikutsertaan Program</strong></div>
                    <div class="row">
                        <div class="col">
                            5b. Anggota keluarga memiliki usaha sendiri/bersama
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r5bk2_kode" name="b7r5bk2_kode" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="01" @isset($request) @if ($request['b7r5bk2_kode']=='01') selected @endif @endisset>01. Pertanian tanaman padi dan palawija</option>
                                    <option value="02" @isset($request) @if ($request['b7r5bk2_kode']=='02') selected @endif @endisset>02. Hortikultura</option>
                                    <option value="03" @isset($request) @if ($request['b7r5bk2_kode']=='03') selected @endif @endisset>03. Perkebunan</option>
                                    <option value="04" @isset($request) @if ($request['b7r5bk2_kode']=='04') selected @endif @endisset>04. Perikanan tangkap</option>
                                    <option value="05" @isset($request) @if ($request['b7r5bk2_kode']=='05') selected @endif @endisset>05. Perikanan budidaya</option>
                                    <option value="06" @isset($request) @if ($request['b7r5bk2_kode']=='06') selected @endif @endisset>06. Peternakan</option>
                                    <option value="07" @isset($request) @if ($request['b7r5bk2_kode']=='07') selected @endif @endisset>07. Kehutanan dan pertanian lainnya</option>
                                    <option value="08" @isset($request) @if ($request['b7r5bk2_kode']=='08') selected @endif @endisset>08. Pertambangan/penggalian</option>
                                    <option value="09" @isset($request) @if ($request['b7r5bk2_kode']=='09') selected @endif @endisset>09. Usaha menjahit/tata busana</option>
                                    <option value="10" @isset($request) @if ($request['b7r5bk2_kode']=='10') selected @endif @endisset>10. Salon kecantikan</option>
                                    <option value="11" @isset($request) @if ($request['b7r5bk2_kode']=='11') selected @endif @endisset>11. Reparasi/montir mobil/motor</option>
                                    <option value="12" @isset($request) @if ($request['b7r5bk2_kode']=='12') selected @endif @endisset>12. Reparasi elektronika</option>
                                    <option value="13" @isset($request) @if ($request['b7r5bk2_kode']=='13') selected @endif @endisset>13. Industri barang dari kulit</option>
                                    <option value="14" @isset($request) @if ($request['b7r5bk2_kode']=='14') selected @endif @endisset>14. Industri barang dari kayu</option>
                                    <option value="15" @isset($request) @if ($request['b7r5bk2_kode']=='15') selected @endif @endisset>15. Industri barang dari logam</option>
                                    <option value="16" @isset($request) @if ($request['b7r5bk2_kode']=='16') selected @endif @endisset>16. Industri barang dari kain/tenun</option>
                                    <option value="17" @isset($request) @if ($request['b7r5bk2_kode']=='17') selected @endif @endisset>17. Industri gerabah/kramik/batu</option>
                                    <option value="18" @isset($request) @if ($request['b7r5bk2_kode']=='18') selected @endif @endisset>18. Industri anyaman dari rotan/bambu, rumput, pandan, dll</option>
                                    <option value="19" @isset($request) @if ($request['b7r5bk2_kode']=='19') selected @endif @endisset>19. Industri makanan dan minuman</option>
                                    <option value="20" @isset($request) @if ($request['b7r5bk2_kode']=='20') selected @endif @endisset>20. Industri lainnya</option>
                                    <option value="21" @isset($request) @if ($request['b7r5bk2_kode']=='21') selected @endif @endisset>21. Listrik dan gas</option>
                                    <option value="22" @isset($request) @if ($request['b7r5bk2_kode']=='22') selected @endif @endisset>22. Bangunan/kontruksi</option>
                                    <option value="23" @isset($request) @if ($request['b7r5bk2_kode']=='23') selected @endif @endisset>23. Toko/warung kelontong</option>
                                    <option value="24" @isset($request) @if ($request['b7r5bk2_kode']=='24') selected @endif @endisset>24. Perdagangan lain</option>
                                    <option value="25" @isset($request) @if ($request['b7r5bk2_kode']=='25') selected @endif @endisset>25. Warung/kedai makanan</option>
                                    <option value="26" @isset($request) @if ($request['b7r5bk2_kode']=='26') selected @endif @endisset>26. Penginapan (homestay)</option>
                                    <option value="27" @isset($request) @if ($request['b7r5bk2_kode']=='27') selected @endif @endisset>27. Hotel dan rumah makan</option>
                                    <option value="28" @isset($request) @if ($request['b7r5bk2_kode']=='28') selected @endif @endisset>28. Ojek pangkalan</option>
                                    <option value="29" @isset($request) @if ($request['b7r5bk2_kode']=='29') selected @endif @endisset>29. Ojek online</option>
                                    <option value="30" @isset($request) @if ($request['b7r5bk2_kode']=='30') selected @endif @endisset>30. Transportasi dan pergudangan lainnya</option>
                                    <option value="31" @isset($request) @if ($request['b7r5bk2_kode']=='31') selected @endif @endisset>31. Informasi dan komunikasi</option>
                                    <option value="32" @isset($request) @if ($request['b7r5bk2_kode']=='32') selected @endif @endisset>32. Keuangan dan asuransi</option>
                                    <option value="33" @isset($request) @if ($request['b7r5bk2_kode']=='33') selected @endif @endisset>33. Usaha les bahasa asing</option>
                                    <option value="34" @isset($request) @if ($request['b7r5bk2_kode']=='34') selected @endif @endisset>34. Usaha les komputer</option>
                                    <option value="35" @isset($request) @if ($request['b7r5bk2_kode']=='35') selected @endif @endisset>35. Jasa pendidikan lain</option>
                                    <option value="36" @isset($request) @if ($request['b7r5bk2_kode']=='36') selected @endif @endisset>36. Praktek dokter umum/spesialis</option>
                                    <option value="37" @isset($request) @if ($request['b7r5bk2_kode']=='37') selected @endif @endisset>37. Praktek dokter gigi</option>
                                    <option value="38" @isset($request) @if ($request['b7r5bk2_kode']=='38') selected @endif @endisset>38. Praktek bidan</option>
                                    <option value="39" @isset($request) @if ($request['b7r5bk2_kode']=='39') selected @endif @endisset>39. Jasa kesehatan lain</option>
                                    <option value="40" @isset($request) @if ($request['b7r5bk2_kode']=='40') selected @endif @endisset>40. Jasa kemasyarakatan, pemerintahan, & perorangan</option>
                                    <option value="41" @isset($request) @if ($request['b7r5bk2_kode']=='41') selected @endif @endisset>41. Pemulung</option>
                                    <option value="42" @isset($request) @if ($request['b7r5bk2_kode']=='42') selected @endif @endisset>42. Lainnya</option>
                                </select>
                                <label for="b7r5bk2_kode" class="form-label">Kode usaha</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r5bk3_min" name="b7r5bk3_min" placeholder="b7r5bk3_min" value="{{ $request['b7r5bk3_min'] }}" min="0" style="height: 5.25rem; padding-top: 3.25rem;">
                                <label for="b7r5bk3_min" class="form-label">3. Jumlah pekerja (orang) - minimal</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="b7r5bk3_max" name="b7r5bk3_max" placeholder="b7r5bk3_max" value="{{ $request['b7r5bk3_max'] }}" min="0" style="height: 5.25rem; padding-top: 3.25rem;">
                                <label for="b7r5bk3_max" class="form-label">3. Jumlah pekerja (orang) - maksimal</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r5bk4" name="b7r5bk4" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r5bk4']=='1') selected @endif @endisset>1. Ada</option>
                                    <option value="2" @isset($request) @if ($request['b7r5bk4']=='2') selected @endif @endisset>2. Tidak ada</option>
                                </select>
                                <label for="b7r5bk4" class="form-label">4. Tempat/lokasi usaha</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="b7r5bk5" name="b7r5bk5" placeholder="kode" style="height: 5.25rem; padding-top: 3.25rem;">
                                    <option value=""></option>
                                    <option value="1" @isset($request) @if ($request['b7r5bk5']=='1') selected @endif @endisset>1. < 1 juta</option>
                                    <option value="2" @isset($request) @if ($request['b7r5bk5']=='2') selected @endif @endisset>2. 1 - < 5 juta</option>
                                    <option value="3" @isset($request) @if ($request['b7r5bk5']=='3') selected @endif @endisset>3. 5 - < 10 juta</option>
                                    <option value="4" @isset($request) @if ($request['b7r5bk5']=='4') selected @endif @endisset>4. >= 10 juta</option>
                                </select>
                                <label for="b7r5bk5" class="form-label">5. Omset usaha perbulan</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating">
                            <button type="submit" id="formButton" class="btn btn-primary">Tampilkan Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <div class="alert alert-success fade show" id="success-alert-index" role="alert" hidden></div>
<div class="alert alert-danger fade show" id="error-alert-index" role="alert" hidden></div> --}}

{{-- <div class="row mb-4" style="height: 5vh"><span class="btn btn-danger">TABEL DATA</span></div> --}}

{{------------------------------------------------------------------------------- TABEL ----------------------------------------------------------------------}}

<div class="alert alert-danger fade show" id="error-alert-index" role="alert" hidden></div>

<div class="card mb-4 border-dark" id="tabelCard">
    <div class="card-header black-card">
        <span></span>
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <span class="nav-link" style="color: #ffffff;"><i class="fas fa-table me-1"></i> Data :</span>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='1' || $request->tabel=='') active @endif" id="kkTabData" style="color: @if ($request->tabel=='1' || $request->tabel=='') #000000 @else #ffffff @endif ;">KK Desa {{ $desa->desa }}</button>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='2') active @endif" id="pTabData" style="color: @if ($request->tabel=='2') #000000 @else #ffffff @endif ;">Penduduk Desa {{ $desa->desa }}</button>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='3') active @endif" id="sTabData" style="color: @if ($request->tabel=='3') #000000 @else #ffffff @endif ;">Sertifikat Desa {{ $desa->desa }}</button>
            </li>
            <li class="nav-item">
                <button class="nav-link @if ($request->tabel=='4') active @endif" id="uTabData" style="color: @if ($request->tabel=='4') #000000 @else #ffffff @endif ;">Usaha Desa {{ $desa->desa }}</button>
            </li>
        </ul>
    </div>
    <div class="card-body" >
        <div class="tab-pane" id="kartuKeluargaData" @if ($request->tabel=='1' || $request->tabel=='') @else hidden @endif style="overflow-x: auto">
            <table id="kkTable" class="table table-striped table-bordered display nowrap">
                <thead>
                    <tr class="v-mid t-center">
                        <th>Nomor KK</th>
                        <th>Nama Kepala Keluarga</th>
                        <th>Jumlah Anggota Keluarga</th>
                        <th>Alamat</th>
                        @isset($request['b1r10on']) <th>Nomor Bangunan Rumah</th> @endisset
                        @isset($request['kd_pencacahon']) <th>Kode Pencacah</th> @endisset
                        @isset($request['kd_pemeriksaon']) <th>Kode Pemeriksa</th> @endisset
                        @isset($request['b2r5on']) <th>Hasil Pencacahan</th> @endisset
                        @isset($request['b3r1aon']) <th>Status Penguasaan Bangunan Tempat Tinggal</th> @endisset
                        @isset($request['b3r1bon']) <th>Status Lahan Tempat Tinggal</th> @endisset
                        @isset($request['b3r2on']) <th>Luas lantai</th> @endisset
                        @isset($request['b3r3on']) <th>Jenis Lantai Terluas</th> @endisset
                        @isset($request['b3r4aon']) <th>Jenis Dinding Terluas</th> @endisset
                        @isset($request['b3r4bon']) <th>Kondisi Dinding</th> @endisset
                        @isset($request['b3r5aon']) <th>Jenis Atap Terluas</th> @endisset
                        @isset($request['b3r5bon']) <th>Kondisi Atap</th> @endisset
                        @isset($request['b3r6on']) <th>Jumlah Kamar</th> @endisset
                        @isset($request['b3r7on']) <th>Sumber Air Minum</th> @endisset
                        @isset($request['b3r8on']) <th>Cara Memperoleh Air Minum</th> @endisset
                        @isset($request['b3r9aon']) <th>Sumber Penerangan Utama</th> @endisset
                        @isset($request['b3r9bon']) <th>Daya Terpasang</th> @endisset
                        @isset($request['b3r10on']) <th>Bahan Bakar/Energi Utama untuk Memasak</th> @endisset
                        @isset($request['b3r11aon']) <th>Penggunaan Fasilitas Buang Air Besar</th> @endisset
                        @isset($request['b3r11bon']) <th>Jenis Kloset</th> @endisset
                        @isset($request['b3r12on']) <th>Tempat Pembuangan Akhir Tinja</th> @endisset
                        @isset($request['b6r1k2on']) <th>Kode Lapangan Usaha</th> @endisset
                        @isset($request['b6r2on']) <th>Pendapatan Seluruh Anggota Keluarga</th> @endisset
                        @isset($request['b7r1on']) <th>Aset Bergerak</th> @endisset
                        @isset($request['b7r2aon']) <th>Jumlah Nomor HP Aktif</th> @endisset
                        @isset($request['b7r2bon']) <th>Jumlah TV Layar Datar min 30inch</th> @endisset
                        @isset($request['b7r3on']) <th>Aset Tidak Bergerak</th> @endisset
                        @isset($request['b7r4on']) <th>Jumlah Ternak</th> @endisset
                        @isset($request['b7r5aon']) <th>Apakah Memiliki Usaha Sendiri/Bersama</th> @endisset
                        <th>Pilihan</th>
                    </tr>
                    <tr class="y-mid t-center" id="filterboxrow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @isset($request['b1r10on']) <td></td> @endisset
                        @isset($request['kd_pencacahon']) <td></td> @endisset
                        @isset($request['kd_pemeriksaon']) <td></td> @endisset
                        @isset($request['b2r5on']) <td></td> @endisset
                        @isset($request['b3r1aon']) <td></td> @endisset
                        @isset($request['b3r1bon']) <td></td> @endisset
                        @isset($request['b3r2on']) <td></td> @endisset
                        @isset($request['b3r3on']) <td></td> @endisset
                        @isset($request['b3r4aon']) <td></td> @endisset
                        @isset($request['b3r4bon']) <td></td> @endisset
                        @isset($request['b3r5aon']) <td></td> @endisset
                        @isset($request['b3r5bon']) <td></td> @endisset
                        @isset($request['b3r6on']) <td></td> @endisset
                        @isset($request['b3r7on']) <td></td> @endisset
                        @isset($request['b3r8on']) <td></td> @endisset
                        @isset($request['b3r9aon']) <td></td> @endisset
                        @isset($request['b3r9bon']) <td></td> @endisset
                        @isset($request['b3r10on']) <td></td> @endisset
                        @isset($request['b3r11aon']) <td></td> @endisset
                        @isset($request['b3r11bon']) <td></td> @endisset
                        @isset($request['b3r12on']) <td></td> @endisset
                        @isset($request['b6r1k2on']) <td></td> @endisset
                        @isset($request['b6r2on']) <td></td> @endisset
                        @isset($request['b7r1on']) <td></td> @endisset
                        @isset($request['b7r2aon']) <td></td> @endisset
                        @isset($request['b7r2bon']) <td></td> @endisset
                        @isset($request['b7r3on']) <td></td> @endisset
                        @isset($request['b7r4on']) <td></td> @endisset
                        @isset($request['b7r5aon']) <td></td> @endisset
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @isset($data1)
                        @foreach ($data1 as $d)
                            <tr class="v-mid t-center">
                                <td>{{ $d['b1r7'] }}</td>
                                <td>{{ $d['b1r8'] }}</td>
                                <td>{{ $d['b1r9'] }}</td>
                                <td>{{ $d['alamat'] }}</td>
                                @isset($request['b1r10on']) <td>{{ $d['b1r10'] }}</td> @endisset
                                @isset($request['kd_pencacahon']) <td>{{ $d['kd_pencacah'] }}</td> @endisset
                                @isset($request['kd_pemeriksaon']) <td>{{ $d['kd_pemeriksa'] }}</td> @endisset
                                @isset($request['b2r5on']) <td>
                                    @switch($d['b2r5'])
                                        @case('1') Ya @break
                                        @case('2') Tidak @break
                                        @default {{ $d['b2r5'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r1aon']) <td>
                                    @switch($d['b3r1a'])
                                        @case('1') Milik sendiri @break
                                        @case('2') Kontrak/sewa @break
                                        @case('3') Bebas sewa @break
                                        @case('4') Dinas @break
                                        @case('5') Lainnya @break
                                        @default {{ $d['b3r1a'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r1bon']) <td>
                                    @switch($d['b3r1b'])
                                        @case('1') Milik sendiri @break
                                        @case('2') Milik orang lain @break
                                        @case('3') Tanah negara @break
                                        @case('4') Lainnya @break
                                        @default {{ $d['b3r1b'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r2on']) <td>{{ $d['b3r2'] }}</td> @endisset
                                @isset($request['b3r3on']) <td>
                                    @switch($d['b3r3'])
                                        @case('01') Marmer/granit @break
                                        @case('02') Keramik @break
                                        @case('03') Parket/vinil/permadani @break
                                        @case('04') Ubin/tegel/teraso @break
                                        @case('05') Kayu/papan kualitas tinggi @break
                                        @case('06') Semen/bata merah @break
                                        @case('07') Bambu @break
                                        @case('08') Kayu/papan kualitas rendah @break
                                        @case('09') Tanah @break
                                        @case('10') Lainnya @break
                                        @default {{ $d['b3r3'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r4aon']) <td>
                                    @switch($d['b3r4a'])
                                        @case('1') Tembok @break
                                        @case('2') Plesteran anyaman bambu/kawat @break
                                        @case('3') Kayu @break
                                        @case('4') Anyaman bambu @break
                                        @case('5') Batang kayu @break
                                        @case('6') Bambu @break
                                        @case('7') Lainnya @break
                                        @default {{ $d['b3r4a'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r4bon']) <td>
                                    @switch($d['b3r4b'])
                                        @case('1') Bagus/kualitas tinggi @break
                                        @case('2') Jelek/kualitas rendah @break
                                        @default {{ $d['b3r4b'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r5aon']) <td>
                                    @switch($d['b3r5a'])
                                        @case('01') Beton/genteng beton @break
                                        @case('02') Genteng keramik @break
                                        @case('03') Genteng metal @break
                                        @case('04') Genteng tanah liat @break
                                        @case('05') Asbes @break
                                        @case('06') Seng @break
                                        @case('07') Sirap @break
                                        @case('08') Bambu @break
                                        @case('09') Jerami/ijuk/daun daunan/rumbia @break
                                        @case('10') Lainnya @break
                                        @default {{ $d['b3r5a'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r5bon']) <td>
                                    @switch($d['b3r5b'])
                                        @case('1') Bagus/kualitas tinggi @break
                                        @case('2') Jelek/kualitas rendah @break
                                        @default {{ $d['b3r5b'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r6on']) <td>{{ $d['b3r6'] }}</td> @endisset
                                @isset($request['b3r7on']) <td>
                                    @switch($d['b3r7'])
                                        @case('01') Air kemasan bermerk @break
                                        @case('02') Air isi ulang @break
                                        @case('03') Leding meteran @break
                                        @case('04') Leding eceran @break
                                        @case('05') Sumur bor/pompa @break
                                        @case('06') Sumur terlindung @break
                                        @case('07') Sumur tak terlindung @break
                                        @case('08') Mata air terlindung @break
                                        @case('09') Mata air tak terlindung @break
                                        @case('10') Air sungai/danau/waduk @break
                                        @case('11') Air hujan @break
                                        @case('12') Lainnya @break
                                        @default {{ $d['b3r7'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r8on']) <td>
                                    @switch($d['b3r8'])
                                        @case('1') Membeli eceran @break
                                        @case('2') Langganan @break
                                        @case('3') Tidak membeli @break
                                        @default {{ $d['b3r8'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r9aon']) <td>
                                    @switch($d['b3r9a'])
                                        @case('1') Listrik PLN @break
                                        @case('2') Listrik non PLN @break
                                        @case('3') Bukan listrik @break
                                        @default {{ $d['b3r9a'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r9bon']) <td>
                                    @switch($d['b3r9b'])
                                        @case('1') 450 watt @break
                                        @case('2') 900 watt @break
                                        @case('3') 1300 watt @break
                                        @case('4') 2200 watt @break
                                        @case('5') > 2200 watt @break
                                        @case('6') Tanpa meteran @break
                                        @default {{ $d['b3r9b'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r10on']) <td>
                                    @switch($d['b3r10'])
                                        @case('1') Listrik @break
                                        @case('2') Gas > 3 kg @break
                                        @case('3') Gas 3 kg @break
                                        @case('4') Gas kota/biogas @break
                                        @case('5') Minyak tanah @break
                                        @case('6') Briket @break
                                        @case('7') Arang @break
                                        @case('8') Kayu bakar @break
                                        @case('9') Tidak memasak di rumah @break
                                        @default {{ $d['b3r10'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r11aon']) <td>
                                    @switch($d['b3r11a'])
                                        @case('1') Sendiri @break
                                        @case('2') Bersama @break
                                        @case('3') Umum @break
                                        @case('4') Tidak ada @break
                                        @default {{ $d['b3r11a'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r11bon']) <td>
                                    @switch($d['b3r11b'])
                                        @case('1') Leher angsa @break
                                        @case('2') Plengsengan @break
                                        @case('3') Cemplung/cubluk @break
                                        @case('4') Tidak pakai @break
                                        @default {{ $d['b3r11b'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b3r12on']) <td>
                                    @switch($d['b3r12'])
                                        @case('1') Tangki @break
                                        @case('2') SPAL @break
                                        @case('3') Lubang tanah @break
                                        @case('4') Kolam/sawah/sungai/danau/laut @break
                                        @case('5') Pantai/tanah lapang/kebun @break
                                        @case('6') Lainnya @break
                                        @default {{ $d['b3r12'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b6r1k2on']) <td>
                                    @switch($d['b6r1k2'])
                                        @case('00') Penerimaan pendapatan @break
                                        @case('01') Pertanian tanaman padi & palawija @break
                                        @case('02') Hortikultura @break
                                        @case('03') Perkebunan @break
                                        @case('04') Perikanan tangkap @break
                                        @case('05') Perikanan budidaya @break
                                        @case('06') Peternakan @break
                                        @case('07') Kehutanan & pertanian lainnya @break
                                        @case('08') Pertambangan/penggalian @break
                                        @case('09') Industri pengolahan @break
                                        @case('10') Listrik & gas @break
                                        @case('11') Bangunan/kontruksi @break
                                        @case('12') Perdagangan @break
                                        @case('13') Hotel & rumah makan @break
                                        @case('14') Transportasi & pergudangan @break
                                        @case('15') Informasi & komunikasi @break
                                        @case('16') Keuangan & asuransi @break
                                        @case('17') Jasa pendidikan @break
                                        @case('18') Jasa kesehatan @break
                                        @case('19') Jasa kemasyarakatan, pemerintah, & perorangan @break
                                        @case('20') Pemulung @break
                                        @case('21') TKI @break
                                        @case('22') Lainnya @break
                                        @default {{ $d['b6r1k2'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b6r2on']) <td>{{ $d['b6r2'] }}</td> @endisset
                                @isset($request['b7r1on']) <td class="t-left">
                                    @if ($d['b7r1a']==1) Tabung gas 5,5 kg atau lebih, <br> @endif
                                    @if ($d['b7r1b']==3) Lemari es/kulkas, <br> @endif
                                    @if ($d['b7r1c']==1) AC, <br> @endif
                                    @if ($d['b7r1d']==3) Pemanas air (water heater), <br> @endif
                                    @if ($d['b7r1e']==1) Telepon rumah (PSTN), <br> @endif
                                    @if ($d['b7r1f']==3) Televisi, <br> @endif
                                    @if ($d['b7r1g']==1) Emas/perhiasan & tabungan (senilai 10 gram emas), <br> @endif
                                    @if ($d['b7r1h']==3) Komputer/laptop, <br> @endif
                                    @if ($d['b7r1i']==1) Sepeda, <br> @endif
                                    @if ($d['b7r1j']==3) Sepeda motor, <br> @endif
                                    @if ($d['b7r1k']==1) Mobil, <br> @endif
                                    @if ($d['b7r1l']==3) Perahu, <br> @endif
                                    @if ($d['b7r1m']==1) Motor tempel, <br> @endif
                                    @if ($d['b7r1n']==3) Perahu motor, <br> @endif
                                    @if ($d['b7r1o']==1) Kapal, <br> @endif
                                </td> @endisset
                                @isset($request['b7r2aon']) <td>{{ $d['b7r2a'] }}</td> @endisset
                                @isset($request['b7r2bon']) <td>{{ $d['b7r2b'] }}</td> @endisset
                                @isset($request['b7r3on']) <td>
                                    @if ($d['b7r3a1']==1) Lahan {{ $d['b7r3a2'] }} m2, <br> @endif
                                    @if ($d['b7r3b']==3) Rumah di tempat lain <br> @endif
                                </td> @endisset
                                @isset($request['b7r4on']) <td class="t-left">
                                    @if ($d['b7r4a']) Sapi: {{ $d['b7r4a'] }} Ekor <br> @endif
                                    @if ($d['b7r4b']) Kerbau: {{ $d['b7r4b'] }} Ekor <br> @endif
                                    @if ($d['b7r4c']) Kuda: {{ $d['b7r4c'] }} Ekor <br> @endif
                                    @if ($d['b7r4d']) Babi: {{ $d['b7r4d'] }} Ekor <br> @endif
                                    @if ($d['b7r4e']) Kambing/Domba: {{ $d['b7r4e'] }} Ekor <br> @endif
                                </td> @endisset
                                @isset($request['b7r5aon']) <td>
                                    @switch($d['b7r5a'])
                                        @case('1') Ya @break
                                        @case('2') Tidak @break
                                        @default {{ $d['b7r5a'] }}
                                    @endswitch
                                </td> @endisset
                                <td>
                                    <button class="btn bg-info" id="lihatDetailButton" onclick="lihatDetail('{{ url('/data/kk/') }}', '{{ $d['b1r7'] }}')"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="pendudukData" @if ($request->tabel=='2') @else hidden @endif style="overflow-x: auto">
            <table id="pTable" class="table table-striped table-bordered display nowrap">
                <thead>
                    <tr class="v-mid t-center">
                        <th>Nomor KK</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        @isset($request['b4k3on']) <th>Hubungan dengan Kepala Keluarga</th> @endisset
                        @isset($request['b4k4on']) <th>Jenis Kelamin</th> @endisset
                        @isset($request['b4k5on']) <th>Umur</th> @endisset
                        @isset($request['b4k6on']) <th>Status Perkawinan</th> @endisset
                        @isset($request['b4k7on']) <th>Kepemilikan Akta/Buku Nikah/Akta Cerai</th> @endisset
                        @isset($request['b4k8on']) <th>Tercantum Dalam KK</th> @endisset
                        @isset($request['b4k9on']) <th>Kepemilikan Kartu Identitas</th> @endisset
                        @isset($request['b4k10on']) <th>Status Kehamilan</th> @endisset
                        @isset($request['b4k11on']) <th>Alat KB</th> @endisset
                        @isset($request['b4k12on']) <th>Jenis Cacat</th> @endisset
                        @isset($request['b4k13on']) <th>Penyakit Kronis/Menahun</th> @endisset
                        @isset($request['b4k14on']) <th>Golongan Darah</th> @endisset
                        @isset($request['b4k15on']) <th>Partisipasi Sekolah</th> @endisset
                        @isset($request['b4k16on']) <th>Jenjang dan Jenis Pendidikan Tertinggi yang Pernah/Sedang diduduki</th> @endisset
                        @isset($request['b4k17on']) <th>Kelas Tertinggi yang Pernah/Sedang diduduki</th> @endisset
                        @isset($request['b4k18on']) <th>Ijazah Tertinggi yang dimiliki</th> @endisset
                        @isset($request['b4k19on']) <th>Pensiunan</th> @endisset
                        @isset($request['b4k20on']) <th>Bekerja/Membantu Bekerja</th> @endisset
                        @isset($request['b4k21on']) <th>Lapangan Usaha Pekerjaan Utama</th> @endisset
                        @isset($request['b4k22on']) <th>Status Kedudukan dalam Pekerjaan Utama</th> @endisset
                        @isset($request['b4k23on']) <th>Agama</th> @endisset
                        @isset($request['b4k24on']) <th>Suku</th> @endisset
                        @isset($request['b4k25on']) <th>Domisili</th> @endisset
                        @isset($request['b4k26on']) <th>Peserta Program Bansos</th> @endisset
                        @isset($request['vaksinCovidon']) <th>Vaksin Covid</th> @endisset
                        @isset($request['flagon']) <th>Flag</th> @endisset
                        <th>Pilihan</th>
                    </tr>
                    <tr class="y-mid t-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        @isset($request['b4k3on']) <td></td> @endisset
                        @isset($request['b4k4on']) <td></td> @endisset
                        @isset($request['b4k5on']) <td></td> @endisset
                        @isset($request['b4k6on']) <td></td> @endisset
                        @isset($request['b4k7on']) <td></td> @endisset
                        @isset($request['b4k8on']) <td></td> @endisset
                        @isset($request['b4k9on']) <td></td> @endisset
                        @isset($request['b4k10on']) <td></td> @endisset
                        @isset($request['b4k11on']) <td></td> @endisset
                        @isset($request['b4k12on']) <td></td> @endisset
                        @isset($request['b4k13on']) <td></td> @endisset
                        @isset($request['b4k14on']) <td></td> @endisset
                        @isset($request['b4k15on']) <td></td> @endisset
                        @isset($request['b4k16on']) <td></td> @endisset
                        @isset($request['b4k17on']) <td></td> @endisset
                        @isset($request['b4k18on']) <td></td> @endisset
                        @isset($request['b4k19on']) <td></td> @endisset
                        @isset($request['b4k20on']) <td></td> @endisset
                        @isset($request['b4k21on']) <td></td> @endisset
                        @isset($request['b4k22on']) <td></td> @endisset
                        @isset($request['b4k23on']) <td></td> @endisset
                        @isset($request['b4k24on']) <td></td> @endisset
                        @isset($request['b4k25on']) <td></td> @endisset
                        @isset($request['b4k26on']) <td></td> @endisset
                        @isset($request['vaksinCovidon']) <td></td> @endisset
                        @isset($request['flagon']) <td></td> @endisset
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @isset($data2)
                        @foreach ($data2 as $d)
                            <tr class="v-mid t-center">
                                <td>{{ $d['b1r7'] }}</td>
                                <td>{{ $d['b4k2_nama'] }}</td>
                                <td>{{ $d['b4k2_nik'] }}</td>
                                <td>{{ $d['tbl_data1']->alamat }}</td>
                                @isset($request['b4k3on']) <td>
                                    @switch($d['b4k3'])
                                        @case('1') Kepala keluarga @break
                                        @case('2') Istri/suami @break
                                        @case('3') Anak @break
                                        @case('4') Menantu @break
                                        @case('5') Cucu @break
                                        @case('6') Orang tua/mertua @break
                                        @case('7') Pembantu ruta @break
                                        @case('8') Lainnya @break
                                        @default {{ $d['b4k3'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k4on']) <td>
                                    @switch($d['b4k4'])
                                        @case('1') Laki-laki @break
                                        @case('2') Perempuan @break
                                        @default {{ $d['b4k4'] }}
                                    @endswitch
                                </td> @endisset
                                @isset($request['b4k5on']) <td></td> @endisset
                                @isset($request['b4k6on']) <td>
                                    @switch($d['b4k6'])
                                        @case('1') Belum kawin @break
                                        @case('2') Kawin/nikah @break
                                        @case('3') Cerai hidup @break
                                        @case('4') Cerai mati @break
                                        @default {{ $d['b4k6'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k7on']) <td>
                                    @switch($d['b4k7'])
                                        @case('0') Tidak @break
                                        @case('1') Ya, dapat ditunjukkan @break
                                        @case('2') Ya, tidak dapat ditunjukkan @break
                                        @default {{ $d['b4k7'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k8on']) <td>
                                    @switch($d['b4k8'])
                                        @case('1') Ya @break
                                        @case('2') Tidak @break
                                        @default {{ $d['b4k8'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k9on']) <td>
                                    @switch($d['b4k9'])
                                        @case('0') Tidak memiliki @break
                                        @case('1') Akta Kelahiran @break
                                        @case('2') Kartu Pelajar @break
                                        @case('4') KTP @break
                                        @case('8') SIM @break
                                        @case('3') Akta kelahiran, kartu pelajar @break
                                        @case('5') Akta kelahiran, KTP @break
                                        @case('9') Akta kelahiran, SIM @break
                                        @case('6') Kartu pelajar, KTP @break
                                        @case('7') Akta kelahiran, kartu pelajar, KTP @break
                                        @case('10') Kartu pelajar, SIM @break
                                        @case('12') KTP, SIM @break
                                        @case('11') Akta kelahiran, kartu pelajar, SIM @break
                                        @case('14') Kartu pelajar, KTP, SIM @break
                                        @case('15') Akta kelahiran, kartu pelajar, KTP, SIM @break
                                        @default {{ $d['b4k9'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k10on']) <td>
                                    @switch($d['b4k10'])
                                        @case('1') Ya @break
                                        @case('2') Tidak @break
                                        @default {{ $d['b4k10'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k11on']) <td>
                                    @switch($d['b4k11'])
                                        @case('1') MOW/Tubektomi @break
                                        @case('2') MOP/Vasektomi @break
                                        @case('3') AKDR/IUD/Spiral @break
                                        @case('4') Suntikan KB @break
                                        @case('5') Susuk KB/Norplan/Implanon/Alwalit @break
                                        @case('6') Pil KB @break
                                        @case('7') Kondom/Karet KB @break
                                        @case('8') Intravag/Tisue/Kondom Wanita @break
                                        @case('9') Cara Tradisional @break
                                        @default {{ $d['b4k11'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k12on']) <td>
                                    @switch($d['b4k12'])
                                        @case('00') Tidak cacat @break
                                        @case('01') Tuna daksa/cacat tubuh @break
                                        @case('02') Tuna netra/buta @break
                                        @case('03') Tuna rungu @break
                                        @case('04') Tuna wicara @break
                                        @case('05') Tuna rungu & wicara @break
                                        @case('06') Tuna netra & cacat tubuh @break
                                        @case('07') Tuna netra, rungu, & wicara @break
                                        @case('08') Tuna rungu, wicara, & cacat tubuh @break
                                        @case('09') Tuna rungu, wicara, netra, & cacat tubuh @break
                                        @case('10') Cacat mental retardasi @break
                                        @case('11') Mantan penderita gangguan jiwa @break
                                        @case('12') Cacat fisik & mental @break
                                        @default {{ $d['b4k12'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k13on']) <td>
                                    @switch($d['b4k13'])
                                        @case('0') Tidak ada @break
                                        @case('1') Hipertensi (tekanan darah tinggi) @break
                                        @case('2') Rematik @break
                                        @case('3') Asma @break
                                        @case('4') Masalah jantung @break
                                        @case('5') Diabetes (kencing manis) @break
                                        @case('6') Tuberculosis (TBC) @break
                                        @case('7') Stroke @break
                                        @case('8') Kanker atau tumor ganas @break
                                        @case('9') Lainnya (gagal ginjal, paru-paru flek, dan sejenisnya) @break
                                        @default {{ $d['b4k13'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k14on']) <td>
                                    @switch($d['b4k14'])
                                        @case('1') A @break
                                        @case('2') B @break
                                        @case('3') AB @break
                                        @case('4') O @break
                                        @case('5') Tidak tahu @break
                                        @default {{ $d['b4k14'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k15on']) <td>
                                    @switch($d['b4k15'])
                                        @case('0') Tidak/belum pernah sekolah @break
                                        @case('1') Masih sekolah @break
                                        @case('2') Tidak bersekolah lagi @break
                                        @default {{ $d['b4k15'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k16on']) <td>
                                    @switch($d['b4k16'])
                                        @case('01') SD/SDLB @break
                                        @case('02') Paket A @break
                                        @case('03') M. Ibtidaiyah @break
                                        @case('04') SMP/SMPLB @break
                                        @case('05') Paket B @break
                                        @case('06') M. Tsanawiyah @break
                                        @case('07') SMA/SMK/SMALB @break
                                        @case('08') Paket C @break
                                        @case('09') M. Aliyah @break
                                        @case('10') Perguruan tinggi @break
                                        @default {{ $d['b4k16'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k17on']) <td>
                                    @switch($d['b4k17'])
                                        @case('8') 8 (Tamat) @break
                                        @default {{ $d['b4k17'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k18on']) <td>
                                    @switch($d['b4k18'])
                                        @case('0') Tidak punya ijazah @break
                                        @case('1') SD/sederajat @break
                                        @case('2') SMP/sederajat @break
                                        @case('3') SMA/sederajat @break
                                        @case('4') D1/D2/D3 @break
                                        @case('5') D4/S1 @break
                                        @case('6') S2/S3 @break
                                        @default {{ $d['b4k18'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k19on']) <td>
                                    @switch($d['b4k19'])
                                        @case('1') Ya @break
                                        @case('2') Tidak @break
                                        @default {{ $d['b4k19'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k20on']) <td>
                                    @switch($d['b4k20'])
                                        @case('1') Ya @break
                                        @case('2') Tidak @break
                                        @default {{ $d['b4k20'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k21on']) <td>
                                    @switch($d['b4k21'])
                                        @case('01') Pertanian tanaman padi & palawija @break
                                        @case('02') Hortikultura @break
                                        @case('03') Perkebunan @break
                                        @case('04') Perikanan tangkap @break
                                        @case('05') Perikanan budidaya @break
                                        @case('06') Peternakan @break
                                        @case('07') Kehutanan & pertanian lainnya @break
                                        @case('08') Pertambangan/penggalian @break
                                        @case('09') Industri pengolahan @break
                                        @case('10') Listrik & gas @break
                                        @case('11') Bangunan/kontruksi @break
                                        @case('12') Perdagangan @break
                                        @case('13') Hotel & rumah makan @break
                                        @case('14') Transportasi & pergudangan @break
                                        @case('15') Informasi & komunikasi @break
                                        @case('16') Keuangan & asuransi @break
                                        @case('17') Jasa pendidikan @break
                                        @case('18') Jasa kesehatan @break
                                        @case('19') Jasa kemasyarakatan, pemerintah, & perorangan @break
                                        @case('20') Pemulung @break
                                        @case('21') TKI @break
                                        @case('22') Lainnya @break
                                        @default {{ $d['b4k21'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k22on']) <td>
                                    @switch($d['b4k22'])
                                        @case('1') Berusaha sendiri @break
                                        @case('2') Berusaha dibantu buruh tidak tetap/tidak dibayar @break
                                        @case('3') Berusaha dibantu buruh tetap/dibayar @break
                                        @case('4') Buruh/karyawan/pegawai swasta @break
                                        @case('5') PNS/TNI/Polri/BUMN/BUMD @break
                                        @case('6') Pekerja bebas pertanian @break
                                        @case('7') Pekerja bebas non-pertanian @break
                                        @case('8') Pekerja keluarga/tidak dibayar @break
                                        @default {{ $d['b4k22'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k23on']) <td>
                                    @switch($d['b4k23'])
                                        @case('1') Islam @break
                                        @case('2') Protestan @break
                                        @case('3') Katolik @break
                                        @case('4') Hindu @break
                                        @case('5') Budha @break
                                        @case('6') Konghucu @break
                                        @case('7') Lainnya @break
                                        @default {{ $d['b4k23'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k24on']) <td>
                                    @switch($d['b4k24'])
                                        @case('01') Arab @break
                                        @case('02') Ambon @break
                                        @case('03') Bali @break
                                        @case('04') Batak @break
                                        @case('05') Betawi @break
                                        @case('06') Bugis @break
                                        @case('07') China @break
                                        @case('08') Dayak @break
                                        @case('09') India @break
                                        @case('10') Jawa @break
                                        @case('11') Madura @break
                                        @case('12') Melayu @break
                                        @case('13') Minang @break
                                        @case('14') Papua @break
                                        @case('15') Sunda @break
                                        @case('16') Timor @break
                                        @case('17') Lainnya @break
                                        @default {{ $d['b4k24'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k25on']) <td>
                                    @switch($d['b4k25'])
                                        @case('1') Alamat tempat tinggal dan KTP/KK di dalam desa @break
                                        @case('2') Alamat tempat tinggal di dalam desa tapi KTP/KK di luar desa @break
                                        @case('3') Alamat tempat tinggal di luar desa tapi KTP/KK di dalam desa @break
                                        @default {{ $d['b4k25'] }}
                                    @endswitch    
                                </td> @endisset
                                @isset($request['b4k26on']) <td> {{ getb4k26($d['b4k26']) }} </td> @endisset
                                @isset($request['vaksinCovidon']) <td>{{ $d['vaksinCovid'] }}</td> @endisset
                                @isset($request['flagon']) <td>
                                    @switch($d['flag'])
                                        @case(null) Ada @break
                                        @default {{ $d['flag'] }}
                                    @endswitch
                                </td> @endisset
                                <td>
                                    <button class="btn bg-info" id="lihatDetailButton" onclick="lihatDetail('{{ url('/data/kk/') }}', '{{ $d['b1r7'] }}')"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="sertifikatData" @if ($request->tabel=='3') @else hidden @endif style="overflow-x: auto">
            <table id="sTable" class="table table-striped table-bordered display nowrap">
                <thead>
                    <tr class="v-mid t-center">
                        <th>No KK</th>
                        <th>Nama Lahan</th>
                        <th>Alamat</th>
                        <th>Jenis</th>
                        <th>SPPT</th>
                        <th>No Objek Pajak</th>
                        <th>Luas (m2)</th>
                        <th>Hak Kepemilikan Sertifikat</th>
                        <th>Pilihan</th>
                    </tr>
                    <tr class="y-mid t-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @isset($data3)
                        @foreach ($data3 as $d)
                            <tr class="v-mid t-center">
                                <td>{{ $d['b1r7'] }}</td>
                                <td>{{ $d['b5k2'] }}</td>
                                <td>{{ $d['tbl_data1']->alamat }}</td>
                                <td>
                                    @switch($d['b5k3'])
                                        @case('1') Pekarangan @break
                                        @case('2') Sawah irigasi @break
                                        @case('3') Sawah tadah hujan @break
                                        @case('4') Tegalan @break
                                        @case('5') Kolam @break
                                        @default {{ $d['b5k3'] }}                                 
                                    @endswitch
                                </td>
                                <td>
                                    @switch($d['b5k4'])
                                        @case('1') Ada SPPT @break
                                        @case('2') Tidak ada SPPT @break
                                        @default {{ $d['b5k4'] }}                                 
                                    @endswitch
                                </td>
                                <td>{{ $d['b5k5'] }}</td>
                                <td>{{ $d['b5k6'] }}</td>
                                <td>
                                    @switch($d['b5k7'])
                                        @case('1') SHM @break
                                        @case('2') HGB @break
                                        @case('3') Tidak bersertifikat @break
                                        @default {{ $d['b5k7'] }}                                 
                                    @endswitch
                                </td>
                                <td>
                                    <button class="btn bg-info" id="lihatDetailButton" onclick="lihatDetail('{{ url('/data/kk/') }}', '{{ $d['b1r7'] }}')"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="usahaData" @if ($request->tabel=='4') @else hidden @endif style="overflow-x: auto">
            <table id="uTable" class="table table-striped table-bordered display nowrap">
                <thead>
                    <tr class="v-mid t-center">
                        <th>Nomor KK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Usaha</th>
                        <th>Kode Usaha</th>
                        <th>Jumlah Pekerja</th>
                        <th>Tempat/Lokasi Usaha</th>
                        <th>Omset per Bulan</th>
                        <th>Pilihan</th>
                    </tr>
                    <tr class="y-mid t-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @isset($data4)
                        @foreach ($data4 as $d)
                            <tr class="v-mid t-center">
                                <td>{{ $d['b1r7'] }}</td>
                                <td>
                                    @foreach ($d['tbl_data1']->tbl_data2 as $dd)
                                        @if ($d['b7r5bk1']==$dd->b4k1)
                                            {{ $dd->b4k2_nama }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $d['tbl_data1']->alamat }}</td>
                                <td>{{ $d['b7r5bk2_usaha'] }}</td>
                                <td>
                                    @switch($d['b7r5bk2_kode'])
                                        @case('01') 01. Pertanian tanaman padi dan palawija @break
                                        @case('02') 02. Hortikultura @break
                                        @case('03') 03. Perkebunan @break
                                        @case('04') 04. Perikanan tangkap @break
                                        @case('05') 05. Perikanan budidaya @break
                                        @case('06') 06. Peternakan @break
                                        @case('07') 07. Kehutanan dan pertanian lainnya @break
                                        @case('08') 08. Pertambangan/penggalian @break
                                        @case('09') 09. Usaha menjahit/tata busana @break
                                        @case('10') 10. Salon kecantikan @break
                                        @case('11') 11. Reparasi/montir mobil/motor @break
                                        @case('12') 12. Reparasi elektronika @break
                                        @case('13') 13. Industri barang dari kulit @break
                                        @case('14') 14. Industri barang dari kayu @break
                                        @case('15') 15. Industri barang dari logam @break
                                        @case('16') 16. Industri barang dari kain/tenun @break
                                        @case('17') 17. Industri gerabah/kramik/batu @break
                                        @case('18') 18. Industri anyaman dari rotan/bambu, rumput, pandan, dll @break
                                        @case('19') 19. Industri makanan dan minuman @break
                                        @case('20') 20. Industri lainnya @break
                                        @case('21') 21. Listrik dan gas @break
                                        @case('22') 22. Bangunan/kontruksi @break
                                        @case('23') 23. Toko/warung kelontong @break
                                        @case('24') 24. Perdagangan lain @break
                                        @case('25') 25. Warung/kedai makanan @break
                                        @case('26') 26. Penginapan (homestay) @break
                                        @case('27') 27. Hotel dan rumah makan @break
                                        @case('28') 28. Ojek pangkalan @break
                                        @case('29') 29. Ojek online @break
                                        @case('30') 30. Transportasi dan pergudangan lainnya @break
                                        @case('31') 31. Informasi dan komunikasi @break
                                        @case('32') 32. Keuangan dan asuransi @break
                                        @case('33') 33. Usaha les bahasa asing @break
                                        @case('34') 34. Usaha les komputer @break
                                        @case('35') 35. Jasa pendidikan lain @break
                                        @case('36') 36. Praktek dokter umum/spesialis @break
                                        @case('37') 37. Praktek dokter gigi @break
                                        @case('38') 38. Praktek bidan @break
                                        @case('39') 39. Jasa kesehatan lain @break
                                        @case('40') 40. Jasa kemasyarakatan, pemerintahan, & perorangan @break
                                        @case('41') 41. Pemulung @break
                                        @case('42') 42. Lainnya @break
                                        @default {{ $d['b7r5bk2_kode'] }}                                 
                                    @endswitch
                                </td>
                                <td>{{ $d['b7r5bk3'] }}</td>
                                <td>
                                    @switch($d['b7r5bk4'])
                                        @case('1') Ada @break
                                        @case('2') Tidak ada @break
                                        @default {{ $d['b7r5bk4'] }}                                 
                                    @endswitch
                                </td>
                                <td>
                                    @switch($d['b7r5bk5'])
                                        @case('1') < 1 juta @break
                                        @case('2') 1 - < 5 juta @break
                                        @case('3') 5 - < 10 juta @break
                                        @case('4') >= 10 juta @break
                                        @default {{ $d['b7r5bk5'] }}                                 
                                    @endswitch
                                </td>
                                <td>
                                    <button class="btn bg-info" id="lihatDetailButton" onclick="lihatDetail('{{ url('/data/kk/') }}', '{{ $d['b1r7'] }}')"><i class="fas fa-eye"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="detailKk" tabindex="-1" role="dialog" aria-labelledby="detailKkLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailKkLabel">New message</h5>
                <button class="btn btn-dark" type="button" class="close" onclick="hideModal()" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header mb-2 blokHed"><strong>Blok I Pengenalan Tempat</strong></div>
                <div class="row">
                    <div class="col">
                        <table id="table1" class="table table-bordered table-striped infoTable">
                            <tbody>
                                <tr>
                                    <th>Provinsi</th>
                                    <td></td>
                                    <th>Alamat</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kabupaten</th>
                                    <td></td>
                                    <th>Nomor KK</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <td></td>
                                    <th>Nama Kepala Keluarga</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Desa/Kelurahan</th>
                                    <td></td>
                                    <th>Jumlah Anggota Keluarga</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Nama Dusun</th>
                                    <td></td>
                                    <th>Nomor Bangunan Rumah</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-header mb-2 blokHed"><strong>Blok II Keterangan Petugas dan Responden</strong></div>
                <div class="row">
                    <div class="col">
                        <table id="table2" class="table table-bordered table-striped infoTable3">
                            <tbody>
                                <tr>
                                    <th>Tanggal Pencacahan</th>
                                    <td></td>
                                    <th>Nama Pencacah</th>
                                    <td></td>
                                    <th>Kode Pencacah</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pemeriksaan</th>
                                    <td></td>
                                    <th>Nama Pemeriksa</th>
                                    <td></td>
                                    <th>Kode Pemeriksa</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Hasil Pencacahan keluarga</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-header mb-2 blokHed"><strong>Blok III Keterangan Perumahan</strong></div>
                <div class="row">
                    <div class="col">
                        <table id="table3" class="table table-bordered table-striped infoTable2">
                            <tbody>
                                <tr>
                                    <th>Status penguasaan bangunan tempat tinggal</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Status lahan tempat tinggal yang ditempati</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Luas lantai</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jenis lantai terluas</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jenis dinding terluas</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kondisi dinding</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jenis atap terluas</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kondisi atap</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jumlah kamar tidur</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Sumber air minum</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Cara memperoleh air minum</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Sumber penerangan utama</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Daya terpasang</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Bahan bakar/energi utama untuk memasak</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Penggunaan fasilitas utama untuk buang air besar</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jenis kloset</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Tempat pembuangan akhir tinja</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-header mb-2 blokHed"><strong>Blok IV Keterangan Sosial Ekonomi Anggota keluarga</strong></div>
                <div class="row me-1" style="overflow-x: auto">
                    <div class="col">
                        <table id="table4" class="table table-bordered table-striped display nowrap">
                            <thead>
                                <tr class="v-mid t-center">
                                    <th class="dtfc-fixed-left" style="position: sticky; left: 0px">No urut</th>
                                    <th class="dtfc-fixed-left" style="position: sticky; left: 99px">Nama</th>
                                    <th>NIK</th>
                                    <th>Hubungan dengan Kepala Keluarga</th>
                                    <th>Jenis kelamin</th>
                                    <th>Umur</th>
                                    <th>Status perkawinan</th>
                                    <th>Kepemilikan akta/buku nikah atau akta cerai</th>
                                    <th>Tercantum dalam Kartu Keluarga (KK) keluarga ini</th>
                                    <th>Kepemilikan kartu identitas</th>
                                    <th>Status kehamilan</th>
                                    <th>Alat KB</th>
                                    <th>Jenis cacat</th>
                                    <th>Penyakit kronis/menahun</th>
                                    <th>Golongan darah</th>
                                    <th>Partisipasi sekolah</th>
                                    <th>Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki</th>
                                    <th>Kelas tertinggi yang pernah/sedang diduduki</th>
                                    <th>Ijazah tertinggi yang dimiliki</th>
                                    <th>Pensiunan</th>
                                    <th>Bekerja/membantu bekerja</th>
                                    <th>Lapangan usaha dari pekerjaan utama</th>
                                    <th>Status kedudukan dalam pekerjaan utama</th>
                                    <th>Agama</th>
                                    <th>Suku</th>
                                    <th>Domisili</th>
                                    <th>Peserta Program Bansos</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-header mb-2 blokHed"><strong>Blok V Sertifikat Tanah</strong></div>
                <div class="row">
                    <div class="col">
                        <table id="table5" class="table table-bordered table-striped">
                            <thead>
                                <tr class="v-mid t-center">
                                    <th>No</th>
                                    <th>Nama lahan</th>
                                    <th>Jenis lahan</th>
                                    <th>Keberadaan SPPT</th>
                                    <th>Nomor objek pajak</th>
                                    <th>Luas lahan (m2)</th>
                                    <th>Hak kepemilikan sertifikat</th>
                                    <th>Nama hak milik</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-header mb-2 blokHed"><strong>Blok VI Pendapatan Keluarga</strong></div>
                <div class="row">
                    <div class="col">
                        <table id="table6" class="table table-bordered table-striped infoTable2">
                            <tbody>
                                <tr>
                                    <th>Pekerjaan yang menghasilkan pendapatan terbesar</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kode lapangan usaha</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Pendapatan seluruh anggota keluarga per bulan</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-header mb-2 blokHed"><strong>Blok VII Kepemilikan Aset dan Keikutsertaan Program</strong></div>
                <div class="row">
                    <div class="col">
                        <table id="table7" class="table table-bordered table-striped infoTable2">
                            <tbody>
                                <tr>
                                    <th>Keluarga memiliki sendiri aset bergerak sebagai berikut:</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jumlah nomor HP aktif yang dimiliki oleh seluruh anggota keluarga</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jumlah TV layar datar minimal 30 inch yang dimiliki keluarga</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Keluarga memiliki aset tidak bergerak sebagai berikut</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jumlah ternak yang dimiliki</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Keluarga menjadi/memiliki kartu program berikut</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Keluarga memiliki usaha sendiri/bersama</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="table7_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Usaha</th>
                                    <th>Kode Usaha</th>
                                    <th>Jumlah Pekerja</th>
                                    <th>Tempat/lokasi usaha</th>
                                    <th>Omset usaha per bulan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-header mb-2 blokHed"><strong>Blok VIII Catatan</strong></div>
                <div class="row">
                    <div class="col">
                        <table id="table8" class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th width=30%>Catatan</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="hideModal()">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        // --------------------------------------------------------------------------------------------TAB SWITCH
        $('#kkTab').click(function(){
            switchTab('kkTab', 'kartuKeluarga', 'kkTabData', 'kartuKeluargaData')
        })
        $('#kkTabData').click(function(){
            switchTab('kkTab', 'kartuKeluarga', 'kkTabData', 'kartuKeluargaData')
        })
        $('#pTab').click(function(){
            switchTab('pTab', 'penduduk', 'pTabData', 'pendudukData')
        })
        $('#pTabData').click(function(){
            switchTab('pTab', 'penduduk', 'pTabData', 'pendudukData')
        })
        $('#sTab').click(function(){
            switchTab('sTab', 'sertifikat', 'sTabData', 'sertifikatData')
        })
        $('#sTabData').click(function(){
            switchTab('sTab', 'sertifikat', 'sTabData', 'sertifikatData')
        })
        $('#uTab').click(function(){
            switchTab('uTab', 'usaha', 'uTabData', 'usahaData')
        })
        $('#uTabData').click(function(){
            switchTab('uTab', 'usaha', 'uTabData', 'usahaData')
        })

        $('#resetButton').click(function(){
            $('#b1r10').val('')
            $('#kd_pencacah').val('')
            $('#kd_pemeriksa').val('')
            $('#b2r5').val('')
            $('#b3r1a').val('')
            $('#b3r1b').val('')
            $('#b3r2_min').val('')
            $('#b3r2_max').val('')
            $('#b3r3').val('')
            $('#b3r4a').val('')
            $('#b3r4b').val('')
            $('#b3r5a').val('')
            $('#b3r5b').val('')
            $('#b3r6_min').val('')
            $('#b3r6_max').val('')
            $('#b3r7').val('')
            $('#b3r8').val('')
            $('#b3r9a').val('')
            $('#b3r9b').val('')
            $('#b3r10').val('')
            $('#b3r11a').val('')
            $('#b3r11b').val('')
            $('#b3r12').val('')
            $('#b6r1k2').val('')
            $('#b6r2_min').val('')
            $('#b6r2_max').val('')
            $('#b7r1a').val('')
            $('#b7r1b').val('')
            $('#b7r1c').val('')
            $('#b7r1d').val('')
            $('#b7r1e').val('')
            $('#b7r1f').val('')
            $('#b7r1g').val('')
            $('#b7r1h').val('')
            $('#b7r1i').val('')
            $('#b7r1j').val('')
            $('#b7r1k').val('')
            $('#b7r1l').val('')
            $('#b7r1m').val('')
            $('#b7r1n').val('')
            $('#b7r1o').val('')
            $('#b7r2a_min').val('')
            $('#b7r2a_max').val('')
            $('#b7r2b_min').val('')
            $('#b7r2b_max').val('')
            $('#b7r3a1').val('')
            $('#b7r3a2_min').val('')
            $('#b7r3a2_max').val('')
            $('#b7r3b').val('')
            $('#b7r4a_min').val('')
            $('#b7r4b_min').val('')
            $('#b7r4c_min').val('')
            $('#b7r4d_min').val('')
            $('#b7r4e_min').val('')
            $('#b7r4a_max').val('')
            $('#b7r4b_max').val('')
            $('#b7r4c_max').val('')
            $('#b7r4d_max').val('')
            $('#b7r4e_max').val('')
            $('#b7r5a').val('')

            $('#b4k2_nama').val('')
            $('#b4k2_nik').val('')
            $('#b4k3').val('')
            $('#b4k4').val('')
            $('#b4k5_min').val('')
            $('#b4k5_max').val('')
            $('#b4k6').val('')
            $('#b4k7').val('')
            $('#b4k8').val('')
            $('#b4k9').val('')
            $('#b4k10').val('')
            $('#b4k11').val('')
            $('#b4k12').val('')
            $('#b4k13').val('')
            $('#b4k14').val('')
            $('#b4k15').val('')
            $('#b4k16').val('')
            $('#b4k17').val('')
            $('#b4k18').val('')
            $('#b4k19').val('')
            $('#b4k20').val('')
            $('#b4k21').val('')
            $('#b4k22').val('')
            $('#b4k23').val('')
            $('#b4k24').val('')
            $('#b4k25').val('')
            $('#b4k26').val('')
            
            $('#b5k3').val('')
            $('#b5k4').val('')
            $('#b5k5').val('')
            $('#b5k6_min').val('')
            $('#b5k6_max').val('')
            $('#b5k7').val('')
            
            $('#b7r5bk2_kode').val('')
            $('#b7r5bk3_min').val('')
            $('#b7r5bk3_max').val('')
            $('#b7r5bk4').val('')
            $('#b7r5bk5').val('')

            $(".form-check-input").removeAttr('checked');
        })



        // --------------------------------------------------------------------------------------------MAKE DATATABLE
        
        $('#kkTable').DataTable({
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
            "language": {
                "emptyTable": "Belum terdapat data",
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
            "orderCellsTop": true,
            "fixedColumns":{
                "left": 2
            },
            "dom": '<"row mb-2"<"col-md-2"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>r<"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',   
            "buttons": [
                {
                    extend: 'csv',
                    title: 'Data Kartu Keluarga',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Kartu Keluarga',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
            ],
            initComplete: function () {
                this.api().columns([2,3]).every( function () {
                    var column = this;
                    var select = $('<select><option value="">Semua</option></select>')
                        .appendTo( $("#kkTable thead tr:eq(1) td").eq(column.index()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            },
        });

        $('#pTable').DataTable({
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
            "language": {
                "emptyTable": "Belum terdapat data",
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
            "orderCellsTop": true,
            "fixedColumns":{
                "left": 2
            },
            "dom": '<"row mb-2"<"col-md-2"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>r<"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',   
            "buttons": [
                {
                    extend: 'csv',
                    title: 'Data Penduduk',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Penduduk',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
            ],
            initComplete: function () {
                this.api().columns([0,3]).every( function () {
                    var column = this;
                    var select = $('<select><option value="">Semua</option></select>')
                        .appendTo( $("#pTable thead tr:eq(1) td").eq(column.index()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        $('#sTable').DataTable({
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
            "language": {
                "emptyTable": "Belum terdapat data",
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
            "orderCellsTop": true,
            "fixedColumns":{
                "left": 2
            },
            "dom": '<"row mb-2"<"col-md-2"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>r<"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',   
            "buttons": [
                {
                    extend: 'csv',
                    title: 'Data Sertifikat',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Sertifikat',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
            ],
            initComplete: function () {
                this.api().columns([0,2]).every( function () {
                    var column = this;
                    var select = $('<select><option value="">Semua</option></select>')
                        .appendTo( $("#sTable thead tr:eq(1) td").eq(column.index()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        $('#uTable').DataTable({
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
            "language": {
                "emptyTable": "Belum terdapat data",
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
            "orderCellsTop": true,
            "fixedColumns":{
                "left": 2
            },
            "dom": '<"row mb-2"<"col-md-2"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>r<"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',   
            "buttons": [
                {
                    extend: 'csv',
                    title: 'Data Usaha',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
                {
                    extend: 'excelHtml5',
                    title: 'Data Usaha',
                    filename: `{!! $title !!}`,
                    orientation: 'landscape',
                    pageSize: 'A4',
                    exportOptions: {
                        columns: ':visible',
                        search: 'applied',
                        order: 'applied'
                    },
                },
            ],
            initComplete: function () {
                this.api().columns([0,2]).every( function () {
                    var column = this;
                    var select = $('<select><option value="">Semua</option></select>')
                        .appendTo( $("#uTable thead tr:eq(1) td").eq(column.index()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });

        $('.dataTable thead tr th').css("background-color", "#4392f1").css("color", "#ffffff")
        // $('.dataTable thead tr td').css("background-color", "#ffffff").css("padding-right", "0.5rem")
        // $('.dataTable thead tr td:eq(0)').addClass("dtfc-fixed-left").css("position", "sticky").css("left", "0px")
        // $('.dataTable thead tr td:eq(1)').addClass("dtfc-fixed-left").css("position", "sticky").css("left", "155px")

    })

    function hideModal(){
        $('.modal').modal('hide')
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

    function switchTab (tab, content, tab2, content2){
        $('button.nav-link').removeClass('active').css('color', '#ffffff')
        $(`#${tab}`).addClass('active').css('color', '#000000')
        $(`#${tab2}`).addClass('active').css('color', '#000000')
        $('.tab-pane').prop('hidden', true)
        $(`#${content}`).prop('hidden', false)
        $(`#${content2}`).prop('hidden', false)
    }

    function lihatDetail(url, kk){
        $.ajax({
            url: `${url}`,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'b1r7': kk,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                let d1 = data.data1
                let d2 = data.data2
                let d3 = data.data3
                let d4 = data.data4
                // console.log(d1)
                // console.log(d2)
                // console.log(d3)
                // console.log(d4)

                
                $('#detailKk').modal('show')
                $('#detailKkLabel').text(kk + ' - ' + d1.b1r8)
                
                let url = `{!! url('/data/nmtempat') !!}`
                let token = `{!! csrf_token() !!}`
                nm_tempat(url, token, d1.kd_prov, d1.kd_kab, d1.kd_kec, d1.kd_desa)
                    .then(tempat => {
                        $('#table1 tr:eq(0) td:eq(0)').text(d1.kd_prov +' '+ tempat.nm_prov)
                        $('#table1 tr:eq(1) td:eq(0)').text(d1.kd_kab +' '+ tempat.nm_kab)
                        $('#table1 tr:eq(2) td:eq(0)').text(d1.kd_kec +' '+ tempat.nm_kec)
                        $('#table1 tr:eq(3) td:eq(0)').text(d1.kd_desa +' '+ tempat.nm_desa)
                    })
                $('#table1 tr:eq(4) td:eq(0)').text(d1.nm_dusun)
                $('#table1 tr:eq(0) td:eq(1)').text(d1.alamat)
                $('#table1 tr:eq(1) td:eq(1)').text(d1.b1r7)
                $('#table1 tr:eq(2) td:eq(1)').text(d1.b1r8)
                $('#table1 tr:eq(3) td:eq(1)').text(d1.b1r9)
                $('#table1 tr:eq(4) td:eq(1)').text(d1.b1r10)

                $('#table2 tr:eq(0) td:eq(0)').text(d1.b2r1_tgl+'-'+d1.b2r1_bln+'-'+d1.b2r1_thn)
                $('#table2 tr:eq(1) td:eq(0)').text(d1.b2r3_tgl+'-'+d1.b2r3_bln+'-'+d1.b2r3_thn)
                $('#table2 tr:eq(2) td:eq(0)').text(b2r5(d1.b2r5))
                $('#table2 tr:eq(0) td:eq(1)').text(d1.nm_pencacah)
                $('#table2 tr:eq(1) td:eq(1)').text(d1.nm_pemeriksa)
                $('#table2 tr:eq(0) td:eq(2)').text(d1.kd_pencacah)
                $('#table2 tr:eq(1) td:eq(2)').text(d1.kd_pemeriksa)

                $('#table3 tr:eq(0) td:eq(0)').text(b3r1a(d1.b3r1a))
                $('#table3 tr:eq(1) td:eq(0)').text(b3r1b(d1.b3r1b))
                $('#table3 tr:eq(2) td:eq(0)').text(d1.b3r2+' m2')
                $('#table3 tr:eq(3) td:eq(0)').text(b3r3(d1.b3r3))
                $('#table3 tr:eq(4) td:eq(0)').text(b3r4a(d1.b3r4a))
                $('#table3 tr:eq(5) td:eq(0)').text(b3r4b(d1.b3r4b))
                $('#table3 tr:eq(6) td:eq(0)').text(b3r5a(d1.b3r5a))
                $('#table3 tr:eq(7) td:eq(0)').text(b3r5b(d1.b3r5b))
                $('#table3 tr:eq(8) td:eq(0)').text(d1.b3r6+' kamar')
                $('#table3 tr:eq(9) td:eq(0)').text(b3r7(d1.b3r7))
                $('#table3 tr:eq(10) td:eq(0)').text(b3r8(d1.b3r8))
                $('#table3 tr:eq(11) td:eq(0)').text(b3r9a(d1.b3r9a))
                $('#table3 tr:eq(12) td:eq(0)').text(b3r9b(d1.b3r9b))
                $('#table3 tr:eq(13) td:eq(0)').text(b3r10(d1.b3r10))
                $('#table3 tr:eq(14) td:eq(0)').text(b3r11a(d1.b3r11a))
                $('#table3 tr:eq(15) td:eq(0)').text(b3r11b(d1.b3r11b))
                $('#table3 tr:eq(16) td:eq(0)').text(b3r12(d1.b3r12))

                var table4 = $('#table4').DataTable({
                    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
                    "language": {
                        "emptyTable": "Belum terdapat data",
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
                    "autoWidth": true,
                    "order": [],
                    "paging": false,
                    // "scrollX": true,
                    // "fixedColumns":{
                    //     "left": 2
                    // },
                    "destroy": true,
                    "bFilter": false,
                    "info": false,
                });
                table4.clear();

                if (d2.length!=0){
                    for (let index = 0; index < d2.length; index++) {
                        if ($.isEmptyObject(d2[index].flag)) {
                            let b4k26List = ''
                            if (d2[index].b4k26=='0') {
                                b4k26List = 'Tidak memiliki'
                            } else {
                                let results = getCombinations([1, 2, 4, 8, 16, 32, 64, 128, 256]);
                                for (let i = 0; i < results.length; i++) {
                                    let sum = 0
                                    for (let j = 0; j < results[i].length; j++) {
                                        sum = sum + results[i][j]
                                    }
                                    if (d2[index].b4k26==String(sum)) {
                                        for (let j = 0; j < results[i].length; j++) {
                                            if (results[i][j]==1) { b4k26List = b4k26List + 'Kartu Keluarga Sejahtera (KKS)/Kartu Perlindungan Sosial (KPS), <br>' }
                                            if (results[i][j]==2) { b4k26List = b4k26List + 'Kartu Indonesia Pintar (KIP)/Bantuan Siswa Miskin (BSM), <br>' }
                                            if (results[i][j]==4) { b4k26List = b4k26List + 'Kartu Indonesia Sehat (KIS)/BPJS Kesehatan/Jamkesmas, <br>' }
                                            if (results[i][j]==8) { b4k26List = b4k26List + 'BPJS Kesehatan peserta mandiri, <br>' }
                                            if (results[i][j]==16) { b4k26List = b4k26List + 'Jaminan sosial tenaga kerja (Jamsostek)/BPJS ketenagakerjaan, <br>' }
                                            if (results[i][j]==32) { b4k26List = b4k26List + 'Asuransi kesehatan lainnya, <br>' }
                                            if (results[i][j]==64) { b4k26List = b4k26List + 'Program Keluarga Harapan (PKH), <br>' }
                                            if (results[i][j]==128) { b4k26List = b4k26List + 'Bantuan Pangan Non Tunai (BPNT), <br>' }
                                            if (results[i][j]==256) { b4k26List = b4k26List + 'Kredit Usaha Rakyat (KUR), <br>' }
                                        }
                                        break
                                    }
                                }
                            }
                            table4.row.add( [
                                d2[index].b4k1,
                                d2[index].b4k2_nama,
                                d2[index].b4k2_nik,
                                b4k3(d2[index].b4k3),
                                b4k4(d2[index].b4k4),
                                d2[index].b4k5,
                                b4k6(d2[index].b4k6),
                                b4k7(d2[index].b4k7),
                                b4k8(d2[index].b4k8),
                                b4k9(d2[index].b4k9),
                                b4k10(d2[index].b4k10),
                                b4k11(d2[index].b4k11),
                                b4k12(d2[index].b4k12),
                                b4k13(d2[index].b4k13),
                                b4k14(d2[index].b4k14),
                                b4k15(d2[index].b4k15),
                                b4k16(d2[index].b4k16),
                                b4k17(d2[index].b4k17),
                                b4k18(d2[index].b4k18),
                                b4k19(d2[index].b4k19),
                                b4k20(d2[index].b4k20),
                                b4k21(d2[index].b4k21),
                                b4k22(d2[index].b4k22),
                                b4k23(d2[index].b4k23),
                                b4k24(d2[index].b4k24),
                                b4k25(d2[index].b4k25),
                                b4k26List,
                            ] ).draw()
                            $('#table4 tbody tr:last td:eq(0)').addClass("dtfc-fixed-left").css("position", "sticky").css("left", "0px")
                            $('#table4 tbody tr:last td:eq(1)').addClass("dtfc-fixed-left").css("position", "sticky").css("left", "99px")
                        }
                    }
                    table4.columns.adjust().draw()
                }
                
                var table5 = $('#table5').DataTable({
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
                    // "order": [ 0, 'desc' ]
                    "order": [],
                    "paging": false,
                    // "scrollX": true,
                    // "fixedColumns":{
                    //     "left": 2
                    // },
                    "destroy": true,
                    "bFilter": false,
                    "info": false,
                });
                table5.clear().draw();

                if (d3.length!=0) {
                    for (let index = 0; index < d3.length; index++) {
                        table5.row.add([
                            d3[index].b5k1,
                            d3[index].b5k2,
                            b5k3(d3[index].b5k3),
                            b5k4(d3[index].b5k4),
                            d3[index].b5k5,
                            d3[index].b5k6,
                            b5k7(d3[index].b5k7),
                            d3[index].b5k8,
                        ]).draw()
                        
                    }
                }

                $('#table6 tr:eq(0) td:eq(0)').text(d1.b6r1k1 || '-')
                $('#table6 tr:eq(1) td:eq(0)').text(b6r1k2(d1.b6r1k2) || '-')
                $('#table6 tr:eq(2) td:eq(0)').text('Rp '+d1.b6r2 || '-')

                let b7r1 = ''
                if(d1.b7r1a==1){b7r1=b7r1+'Tabung gas 5,5 kg atau lebih, <br>'}
                if(d1.b7r1b==3){b7r1=b7r1+'Lemari es/kulkas, <br>'}
                if(d1.b7r1c==1){b7r1=b7r1+'AC, <br>'}
                if(d1.b7r1d==3){b7r1=b7r1+'Pemanas air (water heater), <br>'}
                if(d1.b7r1e==1){b7r1=b7r1+'Telepon rumah (PSTN), <br>'}
                if(d1.b7r1f==3){b7r1=b7r1+'Televisi, <br>'}
                if(d1.b7r1g==1){b7r1=b7r1+'Emas/perhiasan & tabungan (senilai 10 gram emas), <br>'}
                if(d1.b7r1h==3){b7r1=b7r1+'Komputer/laptop, <br>'}
                if(d1.b7r1i==1){b7r1=b7r1+'Sepeda, <br>'}
                if(d1.b7r1j==3){b7r1=b7r1+'Sepeda motor, <br>'}
                if(d1.b7r1k==1){b7r1=b7r1+'Mobil, <br>'}
                if(d1.b7r1l==3){b7r1=b7r1+'Perahu, <br>'}
                if(d1.b7r1m==1){b7r1=b7r1+'Motor tempel, <br>'}
                if(d1.b7r1n==3){b7r1=b7r1+'Perahu motor, <br>'}
                if(d1.b7r1o==1){b7r1=b7r1+'Kapal, <br>'}
                $('#table7 tr:eq(0) td:eq(0)').html(b7r1 || '-')
                
                $('#table7 tr:eq(1) td:eq(0)').text(d1.b7r2a+' buah')
                $('#table7 tr:eq(2) td:eq(0)').text(d1.b7r2b+' buah')

                let b7r3 = ''
                if(d1.b7r3a1==1){b7r3=b7r3+'Lahan '+d1.b7r3a2+' m2 <br>'}
                if(d1.b7r3b==3){b7r3=b7r3+'Rumah di tempat lain <br>'}
                $('#table7 tr:eq(3) td:eq(0)').html(b7r3)

                let b7r4 = ''
                b7r4=b7r4+'Sapi: '+d1.b7r4a+' ekor <br>'                
                b7r4=b7r4+'Kerbau: '+d1.b7r4b+' ekor <br>'                
                b7r4=b7r4+'Kuda: '+d1.b7r4c+' ekor <br>'                
                b7r4=b7r4+'Babi: '+d1.b7r4d+' ekor <br>'                
                b7r4=b7r4+'Kambing/domba: '+d1.b7r4e+' ekor <br>'                
                $('#table7 tr:eq(4) td:eq(0)').html(b7r4)

                let b7r6 = ''
                if(d1.b7r6a==1){b7r6=b7r6+'Kartu Keluarga Sejahtera (KKS)/Kartu Perlindungan Sosial (KPS), <br>'}
                if(d1.b7r6b==3){b7r6=b7r6+'Kartu Indonesia Pintar (KIP)/Bantuan Siswa Miskin (BSM), <br>'}
                if(d1.b7r6c==1){b7r6=b7r6+'Kartu Indonesia Sehat (KIS)/BPJS Kesehatan/Jamkesmas, <br>'}
                if(d1.b7r6d==3){b7r6=b7r6+'BPJS Kesehatan peserta mandiri, <br>'}
                if(d1.b7r6e==1){b7r6=b7r6+'Jaminan sosial tenaga kerja (Jamsostek)/BPJS ketenagakerjaan, <br>'}
                if(d1.b7r6f==3){b7r6=b7r6+'Asuransi kesehatan lainnya, <br>'}
                if(d1.b7r6g==1){b7r6=b7r6+'Program Keluarga Harapan (PKH), <br>'}
                if(d1.b7r6h==3){b7r6=b7r6+'Bantuan Pangan Non Tunai (BPNT), <br>'}
                if(d1.b7r6i==1){b7r6=b7r6+'Kredit Usaha Rakyat (KUR), <br>'}
                $('#table7 tr:eq(5) td:eq(0)').html(b7r6)

                $('#table7 tr:eq(6) td:eq(0)').text(b7r5a(d1.b7r5a))

                var table7 = $('#table7_table').DataTable({
                    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"] ],
                    "language": {
                        "emptyTable": "Belum terdapat jenis usaha",
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
                    // "order": [ 0, 'desc' ]
                    "order": [],
                    "paging": false,
                    // "scrollX": true,
                    // "fixedColumns": true,
                    "destroy": true,
                    "bFilter": false,
                    "info": false,
                });
                table7.clear().draw();

                if (d4.length!=0) {
                    for (let index = 0; index < d4.length; index++) {
                        let nama
                        for (let ind = 0; ind < d2.length; ind++) {
                            if (d4[index].b7r5bk1==d2[ind].b4k1){
                                nama = d2[ind].b4k2_nama
                                break
                            }
                        }
                        table7.row.add([
                            nama,
                            d4[index].b7r5bk2_usaha,
                            b7r5k2(d4[index].b7r5bk2_kode),
                            d4[index].b7r5bk3,
                            b7r5k4(d4[index].b7r5bk4),
                            b7r5k5(d4[index].b7r5bk5),
                        ]).draw()
                        
                    }
                }

                $('#table8 tr:eq(0) td:eq(0)').text(d1.catatan || '-')

                $('.dataTable thead tr th').css("background-color", "#4392f1").css("color", "#ffffff")
                
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                $('#error-alert-index').prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
                $('html,body').scrollTop($('#mainTable').offset().top -75);
                alertDismiss()
            }
        });
    }

</script>

@endsection