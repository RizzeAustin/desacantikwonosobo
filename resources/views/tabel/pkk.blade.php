@extends('layouts.main')

@section('container')

<h1 class="mt-4" id="judul">Tabel PKK</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $lokasi[0] }} > {{ $lokasi[1] }} > {{ $lokasi[2] }} > {{ $lokasi[3] }}</li>
    <li class="breadcrumb-item active">{{ $desa->desa }}</li>
</ol>

<table id="tablepkk" class="table table-bordered table-striped display nowrap">
    <thead>
        <tr class="v-mid t-center">
            <th>No KK</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Hubungan dengan Kepala Keluarga</th>
            <th>Jenis kelamin</th>
            <th>Umur</th>
            <th>Status perkawinan</th>
            <th>Alat KB</th>
            <th>Jenis cacat</th>
            <th>Penyakit kronis/menahun</th>
            <th>Golongan darah</th>
            <th>Partisipasi sekolah</th>
            <th>Jenjang dan jenis pendidikan tertinggi yang pernah/sedang diduduki</th>
            <th>Kelas tertinggi yang pernah/sedang diduduki</th>
            <th>Ijazah tertinggi yang dimiliki</th>
            <th>Rata-Rata Pendapatan Keluarga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d->b1r7 }}</td>
                <td>{{ $d->b4k2_nik }}</td>
                <td>{{ $d->b4k2_nama }}</td>
                <td>
                    @switch($d->b4k3)
                        @case('1') Kepala keluarga @break
                        @case('2') Istri/suami @break
                        @case('3') Anak @break
                        @case('4') Menantu @break
                        @case('5') Cucu @break
                        @case('6') Orang tua/mertua @break
                        @case('7') Pembantu ruta @break
                        @case('8') Lainnya @break
                        @default {{ $d->b4k3 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k4)
                        @case('1') Laki-laki @break
                        @case('2') Perempuan @break
                        @default {{ $d->b4k4 }}
                    @endswitch
                </td>
                <td>{{ $d->b4k5 }}</td>
                <td>
                    @switch($d->b4k6)
                        @case('1') Belum kawin @break
                        @case('2') Kawin/nikah @break
                        @case('3') Cerai hidup @break
                        @case('4') Cerai mati @break
                        @default {{ $d->b4k6 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k11)
                        @case('1') MOW/Tubektomi @break
                        @case('2') MOP/Vasektomi @break
                        @case('3') AKDR/IUD/Spiral @break
                        @case('4') Suntikan KB @break
                        @case('5') Susuk KB/Norplan/Implanon/Alwalit @break
                        @case('6') Pil KB @break
                        @case('7') Kondom/Karet KB @break
                        @case('8') Intravag/Tisue/Kondom Wanita @break
                        @case('9') Cara Tradisional @break
                        @default {{ $d->b4k11 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k12)
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
                        @default {{ $d->b4k12 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k13)
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
                        @default {{ $d->b4k13 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k14)
                        @case('1') A @break
                        @case('2') B @break
                        @case('3') AB @break
                        @case('4') O @break
                        @case('5') Tidak tahu @break
                        @default {{ $d->b4k14 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k15)
                        @case('0') Tidak/belum pernah sekolah @break
                        @case('1') Masih sekolah @break
                        @case('2') Tidak bersekolah lagi @break
                        @default {{ $d->b4k15 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k16)
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
                        @default {{ $d->b4k16 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k17)
                        @case('1') 1 @break
                        @case('2') 2 @break
                        @case('3') 3 @break
                        @case('4') 4 @break
                        @case('5') 5 @break
                        @case('6') 6 @break
                        @case('7') 7 @break
                        @case('8') 8 (Tamat) @break
                        @default {{ $d->b4k17 }}
                    @endswitch
                </td>
                <td>
                    @switch($d->b4k18)
                        @case('0') Tidak punya ijazah @break
                        @case('1') SD/sederajat @break
                        @case('2') SMP/sederajat @break
                        @case('3') SMA/sederajat @break
                        @case('4') D1/D2/D3 @break
                        @case('5') D4/S1 @break
                        @case('6') S2/S3 @break
                        @default {{ $d->b4k18 }}
                    @endswitch
                </td>
                <td>{{ $d['tbl_data1']->b6r2 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $( document ).ready(function() {
        $('#tablepkk').DataTable({
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
            "order": [0, 'asc'],
            "fixedColumns":   {
                left: 3
            },
            "scrollX": true,
            "orderCellsTop": true,
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
            // initComplete: function () {
            //     this.api().columns([2,3]).every( function () {
            //         var column = this;
            //         var select = $('<select><option value="">Semua</option></select>')
            //             .appendTo( $("#tablepkk thead tr:eq(1) td").eq(column.index()).empty() )
            //             .on( 'change', function () {
            //                 var val = $.fn.dataTable.util.escapeRegex(
            //                     $(this).val()
            //                 );
    
            //                 column
            //                     .search( val ? '^'+val+'$' : '', true, false )
            //                     .draw();
            //             } );
    
            //         column.data().unique().sort().each( function ( d, j ) {
            //             select.append( '<option value="'+d+'">'+d+'</option>' )
            //         } );
            //     } );
            // }
        });
        $('.dataTable thead tr th').css("background-color", "#4392f1").css("color", "#ffffff")
        $('.dataTable thead tr td').css("background-color", "#ffffff")
    });
</script>

@endsection