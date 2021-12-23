@extends('layouts.main')

@section('container')

<h1 class="mt-4">Data</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $lokasi->provinsi }} > {{ $lokasi->kabupaten }} > {{ $lokasi->kecamatan }} > {{ $lokasi->desa }}</li>
</ol>

<div class="card mb-4 border-dark">
    <div class="card-header black-card">
        <button class="btn"><i class="fas fa-table me-1"></i> Data Desa/Kelurahan {{ $desa->desa }}</button>
        <a href="{{ url('/data/add') }}" class="btn btn-success ms-auto me-lg-0" style="float: right"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body" id="mainTable">
        <div class="alert alert-success fade show" id="success-alert-index" role="alert" hidden></div>
        <div class="alert alert-danger fade show" id="error-alert-index" role="alert" hidden></div>
        <table id="dataTable" class="table table-striped table-bordered">
            <thead>
                <tr class="v-mid t-center">
                    <th width=10%>Nomor KK</th>
                    <th width=20%>Nama Kepala Keluarga</th>
                    <th width=15%>Jumlah Anggota Keluarga</th>
                    <th width=30%>Alamat</th>
                    <th width=10%>Flag</th>
                    <th width=15%>Pilihan</th>
                </tr>
                <tr class="y-mid t-center">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tfoot>
            </tfoot>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td class="v-mid t-center">{{ $d['b1r7'] }}</td>
                        <td class="v-mid">{{ $d['b1r8'] }}</td>
                        <td class="v-mid t-center">{{ $d['b1r9'] }}</td>
                        <td class="v-mid">{{ $d['alamat'] }}</td>
                        <td class="v-mid t-center">@if ($d['flag']) {{ $d['flag'] }} @else Ada @endif</td>
                        <td class="v-mid t-center" style="background-color: @if($d['notComplete']) #f4b942 @endif;">
                            <button class="btn bg-info" id="lihatDetailButton" onclick="lihatDetail('{{ url('/data/kk/') }}', '{{ $d['b1r7'] }}')"><i class="fas fa-eye"></i></button>
                            <a href="{{ route('kk.edit', ['kk' => $d['b1r7']]) }}" class="btn bg-warning"><i class="fas fa-edit"></i></a>
                            <button class="btn bg-danger" id="flagButton" onclick="flagIndex('{{ $d['b1r7'] }}')"><i class="fas fa-flag" style="color: #ffffff;"></i></button>
                            @if ($d['flag'])
                                <i class="fas fa-trash fa-lg"></i>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                        {{-- <table id="table7_1" class="table table-bordered table-striped infoTable">
                            <tbody>
                                <tr>
                                    <th>Keluarga memiliki sendiri aset bergerak sebagai berikut:</th>
                                </tr>
                                <tr>
                                    <th>Tabung gas 5,5 kg atau lebig</th>
                                    <td></td>
                                    <th>Sepeda</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Lemari es/kulkas</th>
                                    <td></td>
                                    <th>Sepeda motor</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>AC</th>
                                    <td></td>
                                    <th>Mobil</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Pemanas air (water heater)</th>
                                    <td></td>
                                    <th>Perahu</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Telepon rumah (PSTN)</th>
                                    <td></td>
                                    <th>Motor tempel</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Televisi</th>
                                    <td></td>
                                    <th>Perahu motor</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Emas/perhiasan & tabungan (senilai 10 gram emas)</th>
                                    <td></td>
                                    <th>Kapal</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Komputer/laptop</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="table7_23" class="table table-bordered table-striped infoTable2">
                            <tbody>
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
                                </tr>
                                <tr>
                                    <th>Lahan</th>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <th>Rumah di tempat lain</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="table7_23" class="table table-bordered table-striped infoTable">
                            <tbody>
                                <tr>
                                    <th>Jumlah ternak yang dimiliki (ekor)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Sapi</th>
                                    <td></td>
                                    <th>Babi</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kerbau</th>
                                    <td></td>
                                    <th>Kambing/dombar</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kuda</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table> --}}
                                {{-- <tr class="infoTable2">
                                    <th>Apakah ada anggota keluarga memiliki usaha sendiri/bersama</th>
                                    <td></td>
                                </tr> --}}
                                {{-- <tr class="infoTable4">
                                    <table id="table7_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Jenis Usaha</th>
                                                <th>Jumlah Pekerja</th>
                                                <th>Tempat/lokasi usaha</th>
                                                <th>Omset usaha per bulan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </tr> --}}
                        {{-- <table id="table7_6" class="table table-bordered table-striped infoTable">
                            <tbody>
                                <tr>
                                    <th>Keluarga menjadi/memiliki kartu program berikut</th>
                                    <td></td>
                                    <th>Jaminan sosial tenaga kerja (Jamsostek)/BPJS ketenagakerjaan</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kartu Keluarga Sejahtera (KKS)/Kartu Perlindungan Sosial (KPS)</th>
                                    <td></td>
                                    <th>Asuransi kesehatan lainnya</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kartu Indonesia Pintar (KIP)/Bantuan Siswa Miskin (BSM)</th>
                                    <td></td>
                                    <th>rogram Keluarga Harapan (PKH)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Kartu Indonesia Sehat (KIS)/BPJS Kesehatan/Jamkesmas</th>
                                    <td></td>
                                    <th>Bantuan Pangan Non Tunai (BPNT)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>BPJS Kesehatan peserta mandiri</th>
                                    <td></td>
                                    <th>Kredit Usaha Rakyat (KUR)</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table> --}}
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

<div class="modal fade" id="flagIndexModal" tabindex="-1" role="dialog" aria-labelledby="flagIndexModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="flagIndexModalLabel">Flag - </h5>
          <button class="btn btn-dark" type="button" class="close" onclick="hideModal()" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/data/flag/') }}" method="POST" id="flagIndexForm" class="form-tambah">
                @csrf
                <input type="hidden" name="flagKk" id="flagKk">
                <small><span class="text-danger error-text flagKk_err"></span></small>
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating">
                            <select type="text" class="form-select" id="indexFlag" name="indexFlag" placeholder="kode">
                                <option value="">Ada</option>
                                <option value="Pindah">Pindah</option>
                            </select>
                            <label for="indexFlag" class="form-label">Pemilik KK ini</label>
                            <small><span class="text-danger error-text indexFlag_err"></span></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary f-right mt-3" id="flagIndexFormSubmit">
                            Ubah Flag
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        
        $('#dataTable').DataTable({
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
            "dom": '<"row mb-2"<"col-md-2"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>r<"row"<"col-sm-12"t>><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',   
            "buttons": [
                {
                    extend: 'csv',
                    title: `${$('#judulTabel').text()}`,
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
                    title: `${$('#judulTabel').text()}`,
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
            "orderCellsTop": true,
            initComplete: function () {
                this.api().columns([2,3]).every( function () {
                    var column = this;
                    var select = $('<select><option value="">Semua</option></select>')
                        // .appendTo( $(column.footer()).empty() )
                        .appendTo( $("#dataTable thead tr:eq(1) td").eq(column.index()).empty() )
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
        $('.btn').addClass('mb-1')

        // var ddd = {!! $data !!}
        // for (let index = 0; index < ddd.length; index++) {
        //     $("#dataTable tr").each(function () {
        //         let t = $(this);
        //         let nokk =  t.find("td:eq(0)").html()
        //         if (nokk==ddd[index].b1r7){
        //             if (ddd[index].flag){
        //                 t.find('td:last').append('<i class="fas fa-trash fa-lg"></i>');
        //             }
        //             return false
        //         }
        //     });
        // }

        $('#flagIndexForm').submit(function(e){
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
                        $('#flagIndexModal').modal('hide')
                        $('#success-alert-index').prop('hidden', false).html(data.success)
                        $('html,body').scrollTop($('#mainTable').offset().top -75);
                        $("#dataTable tr").each(function () {
                            let t = $(this);
                            let nokk =  t.find("td:eq(0)").html()
                            if (nokk==$('#flagKk').val()){
                                t.find('td:eq(4)').html($('#indexFlag option:selected').text());
                                if ($('#indexFlag').val()){
                                    t.find('td:eq(4)').html($('#indexFlag').val());
                                    if (t.find('td:last').find('svg').length==4) {
                                        t.find('td:last').find('svg').last().remove()
                                    }
                                    t.find('td:last').append('<i class="fas fa-trash fa-lg"></i>');
                                } else {
                                    t.find('td:last').find('svg').last().remove()
                                }
                                return false
                            }
                        });
                        alertDismiss()
                    } else {
                        $('#flagIndexModal').modal('hide')
                        $('#error-alert-index').prop('hidden', false).html(data.failed)
                        $('html,body').scrollTop($('#mainTable').offset().top -75);
                        alertDismiss()
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    $('#flagIndexModal').modal('hide')
                    $('#error-alert-index').prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
                    $('html,body').scrollTop($('#mainTable').offset().top -75);
                    alertDismiss()
                }
            });
        })
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

    function flagIndex(kk){
        let url = `{!! url('/data/kk') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'b1r7': kk,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                $('#flagIndexModal').modal('show')
                $('#flagIndexModalLabel').text('Flag - ' + kk)
                $('#flagKk').val(kk)
                $('#indexFlag').val(data.data1.flag)
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