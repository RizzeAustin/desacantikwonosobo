@extends('layouts.main')

@section('container')

<h1 class="mt-4" id="judulTabel">{{ $title }} di Desa/Kelurahan {{ $desa->desa }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $lokasi[0] }} > {{ $lokasi[1] }} > {{ $lokasi[2] }} > {{ $lokasi[3] }}</li>
    <li class="breadcrumb-item active">{{ $desa->desa }}</li>
</ol>

<span class="me-2">Tabel:</span>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel1') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Dusun di Desa/Kelurahan {{ $desa->desa }}"> 1 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel2') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya RW di Desa/Kelurahan {{ $desa->desa }}"> 2 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel3') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya RT di Desa/Kelurahan {{ $desa->desa }}"> 3 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel4') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Tempat Ibadah di Desa/Kelurahan {{ $desa->desa }}"> 4 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel5') }}" class="btn btn-info" data-toggle="tooltip" title="Tanah Bengkok di Desa/Kelurahan {{ $desa->desa }}"> 5 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel6') }}" class="btn btn-info" data-toggle="tooltip" title="Tanah Kas Desa/Kelurahan di Desa/Kelurahan {{ $desa->desa }}"> 6 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel7') }}" class="btn btn-info" data-toggle="tooltip" title="Fasilitas Pendidikan di Desa/Kelurahan {{ $desa->desa }}"> 7 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel8') }}" class="btn btn-info" data-toggle="tooltip" title="Fasilitas Pendidikan Agama di Desa/Kelurahan {{ $desa->desa }}"> 8 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel9') }}" class="btn btn-info" data-toggle="tooltip" title="Organisasi Masyarakat di Desa/Kelurahan {{ $desa->desa }}"> 9 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel10') }}" class="btn btn-info" data-toggle="tooltip" title="Organisasi Masyarakat Keagamaan di Desa/Kelurahan {{ $desa->desa }}"> 10 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel11') }}" class="btn btn-info" data-toggle="tooltip" title="Fasilitas Kesehatan di Desa/Kelurahan {{ $desa->desa }}"> 11 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel12') }}" class="btn btn-info" data-toggle="tooltip" title="Tenaga Kesehatan di Desa/Kelurahan {{ $desa->desa }}"> 12 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel13') }}" class="btn btn-info" data-toggle="tooltip" title="Warga Penderita Gizi Buruk di Desa/Kelurahan {{ $desa->desa }}"> 13 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel14') }}" class="btn btn-info" data-toggle="tooltip" title="Kejadian Bencana Alam di Desa/Kelurahan {{ $desa->desa }}"> 14 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel15') }}" class="btn btn-info" data-toggle="tooltip" title="Sarana Olahraga di Desa/Kelurahan {{ $desa->desa }}"> 15 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel16') }}" class="btn btn-info" data-toggle="tooltip" title="Unit Kesenian dan Sarana Rekreasi di Desa/Kelurahan {{ $desa->desa }}"> 16 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel17') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Kelompok Tani dan Anggota Kelompok Tani di Desa/Kelurahan {{ $desa->desa }}"> 17 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel18') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Kelompok Wanita Tani dan Anggota Kelompok Wanita Tani  di Desa/Kelurahan {{ $desa->desa }}"> 18 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel19') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Sarana dan Prasarana Ekonomi di Desa/Kelurahan {{ $desa->desa }}"> 19 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel20') }}" class="btn btn-info" data-toggle="tooltip" title="Sarana Lembaga Keuangan di Desa/Kelurahan {{ $desa->desa }}"> 20 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel21') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Koperasi yang Masih Aktif di Desa/Kelurahan {{ $desa->desa }}"> 21 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel22') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Penggergajian Kayu atau Penggilingan Padi di Desa/Kelurahan {{ $desa->desa }}"> 22 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel23') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Usaha Persewaan di Desa/Kelurahan {{ $desa->desa }}"> 23 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel24') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Sektor Jasa di Desa/Kelurahan {{ $desa->desa }}"> 24 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel25') }}" class="btn btn-info" data-toggle="tooltip" title="Fasilitas Jembatan di Desa/Kelurahan {{ $desa->desa }}"> 25 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel26') }}" class="btn btn-info" data-toggle="tooltip" title="Banyaknya Lembaga Keamanan di Desa/Kelurahan {{ $desa->desa }}"> 26 </a>
<a href="{{ url('/spasial/'.$lokasi[0].'/'.$lokasi[1].'/'.$lokasi[2].'/'.$lokasi[3].'/tabel27') }}" class="btn btn-info" data-toggle="tooltip" title="Fasilitas Pengelolaan Sampah di Desa/Kelurahan {{ $desa->desa }}"> 27 </a>

<div class="row mt-4">
    <div class="col-xl">
        <div class="card mb-4 border-dark">
            <div class="card-header black-card">
                <button class="btn" disabled><i class="fas fa-thumbtack me-2"></i>Tambah / Edit</button>
                <button type="button" id="resetButton" class="btn btn-light ms-auto me-lg-0" style="float: right;"><i class="fas fa-redo"></i> Reset Form</button>
            </div>
            <div class="card-body">
                <form action="{{ url('/spasial/tabel3/add') }}" method="POST" id="form" class="form-spasial" autocomplete="off">
                    @csrf
                    <input type="hidden" name="kd_prov" value="{{ $lokasi[0] }}">
                    <input type="hidden" name="kd_kab" value="{{ $lokasi[1] }}">
                    <input type="hidden" name="kd_kec" value="{{ $lokasi[2] }}">
                    <input type="hidden" name="kd_desa" value="{{ $lokasi[3] }}">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="k1" name="k1" placeholder="k1" value="" readonly>
                                <label for="k1" class="form-label">1. No</label>
                                <small><span class="text-danger error-text k1_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="k2" name="k2" placeholder="kode">
                                    <option value=""></option>
                                    @foreach ($dusun as $d)
                                        <option value="{{ $d->id }}">{{ $d->id }}. {{ $d->nama }}</option>
                                    @endforeach
                                </select>
                                <label for="k2" class="form-label">2. Dusun</label>
                                <small><span class="text-danger error-text k2_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="k3" name="k3" placeholder="kode">
                                    <option value=""></option>
                                    @foreach ($rw as $d)
                                        <option value="{{ $d->id }}">{{ $d->id }}. {{ $d->nama }}</option>
                                    @endforeach
                                </select>
                                <label for="k3" class="form-label">3. RW</label>
                                <small><span class="text-danger error-text k3_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="k4" name="k4" placeholder="k4" value="">
                                <label for="k4" class="form-label">4. RT</label>
                                <small><span class="text-danger error-text k4_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="k5" name="k5" placeholder="k5" value="">
                                <label for="k5" class="form-label">5. Nama Ketua RT</label>
                                <small><span class="text-danger error-text k5_err"></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="k6" name="k6" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1">1. Laki-Laki</option>
                                    <option value="2">2. Perempuan</option>
                                </select>
                                <label for="k6" class="form-label">6. Jenis Kelamin</label>
                                <small><span class="text-danger error-text k6_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="k7" name="k7" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1">1. < 30 tahun</option>
                                    <option value="2">2. 30-40 tahun</option>
                                    <option value="3">3. 41-50 tahun</option>
                                    <option value="4">4. > 50 tahun</option>
                                </select>
                                <label for="k7" class="form-label">7. Usia</label>
                                <small><span class="text-danger error-text k7_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="k8" name="k8" placeholder="kode">
                                    <option value=""></option>
                                    <option value="1">1. SD Kebawah</option>
                                    <option value="2">2. SMP</option>
                                    <option value="3">3. SMA</option>
                                    <option value="4">4. Perguruan Tinggi</option>
                                </select>
                                <label for="k8" class="form-label">8. Pendidikan Terakhir</label>
                                <small><span class="text-danger error-text k8_err"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select type="text" class="form-select" id="flag" name="flag" placeholder="kode">
                                    <option value=""></option>
                                    <option value="Dihapus">Dihapus</option>
                                </select>
                                <label for="flag" class="form-label">Flag</label>
                                <small><span class="text-danger error-text flag_err"></span></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <button type="submit" id="formButton" class="btn btn-primary">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-success fade show" id="success-alert" role="alert" hidden></div>
<div class="alert alert-danger fade show" id="error-alert" role="alert" hidden></div>

<div class="row" style="overflow-x: auto">
    <div class="col">
        <table id="dataTable" class="table table-bordered table-stripped display nowrap">
            <thead>
                <tr class="v-mid t-center">
                    <th>No</th>
                    <th>Dusun</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Nama Ketua RT</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Flag</th>
                    <th>Pilihan</th>
                </tr>
                <tr class="v-mid t-center">
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
                <tr class="v-mid t-center">
                    <td></td>
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
                @foreach ($data as $d)
                    <tr class="v-mid t-center">
                        <td>{{ $d->id }}</td>
                        <td>
                            @foreach ($dusun as $dus)
                                @if ($dus->id==$d->tbl_dusun_id)
                                    {{ $dus->nama }}
                                    @break
                                @endif
                            @endforeach 
                        </td>
                        <td>
                            @foreach ($rw as $r)
                                @if ($r->tbl_dusun_id==$d->tbl_dusun_id && $r->id==$d->tbl_rw_id)
                                    {{ $r->nama }}
                                    @break
                                @endif
                            @endforeach 
                        </td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->ketuart }}</td>
                        <td>
                            @switch($d->jk)
                                @case('1') 1. Laki-Laki @break
                                @case('2') 2. Perempuan @break
                                @default {{ $d->jk }}
                            @endswitch
                        </td>
                        <td>
                            @switch($d->usia)
                                @case('1') 1. < 30 tahun @break
                                @case('2') 2. 30-40 tahun @break
                                @case('3') 3. 41-50 tahun @break
                                @case('4') 4. > 50 tahun @break
                                @default {{ $d->usia }}
                            @endswitch
                        </td>
                        <td>
                            @switch($d->pendidikan)
                                @case('1') 1. SD Kebawah @break
                                @case('2') 2. SMP @break
                                @case('3') 3. SMA @break
                                @case('4') 4. Perguruan Tinggi @break
                                @default {{ $d->pendidikan }}
                            @endswitch    
                        </td>
                        <td>{{ $d->flag }}</td>
                        <td>
                            <button class="btn bg-warning" id="editButton" onclick="edit('{{ $d->id }}')"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){
        var tahun = new Date().getFullYear()
        $('#judulTabel').append(` Tahun ${tahun}`)

        var rw = {!! $rw !!}
        var dusunForm = $("#k2")
        var rwForm = $("#k3")

        dusunForm.change(function(){
            rwForm.empty().append('<option value=""></option>')
            for (let index = 0; index < rw.length; index++) {
                if (rw[index].tbl_dusun_id == dusunForm.val()){
                    rwForm.append(`<option value="${rw[index].id}">${rw[index].id}. ${rw[index].nama}</option>`)
                }
            }
        })

        var dataTable = $('#dataTable').DataTable({
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
            "fixedColumns": true,
            "order": [0, 'asc'],
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
            initComplete: function () {
                this.api().columns([1,2,3,5,6,7,8]).every( function () {
                    var column = this;
                    var select = $('<select><option value="">Semua</option></select>')
                        .appendTo( $("#dataTable thead tr:eq(2) td").eq(column.index()).empty() )
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
        $('#k1').val(dataTable.rows().count()+1)

        
        
        //styling table
        $('#dataTable thead tr th').css("background-color", "#4392f1").css("color", "#ffffff")
        $('#dataTable thead tr td').css("background-color", "#ffffff").css("padding-right", "0.5rem")
        $('#dataTable thead tr td:eq(0)').addClass("dtfc-fixed-left").css("position", "sticky").css("left", "0px")
        $('#dataTable tfoot tr td').css("background-color", "#ffffff")


        $('#resetButton').click(function(){
            resetForm(dataTable)
        })

        $('#form').submit(function(e){
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
                    if($.isEmptyObject(data.error)){
                        $('#success-alert').prop('hidden', false).html(data.success)
                        let tidakAda = true
                        $("#dataTable tbody tr").each(function () {
                            let t = $(this);
                            let no =  t.find("td:eq(0)").html()
                            if (no==$('#k1').val()){
                                tidakAda = false
                                t.find("td:eq(1)").html($('#k2 option:selected').text())
                                t.find("td:eq(2)").html($('#k3 option:selected').text())
                                t.find("td:eq(3)").html($('#k4').val())
                                t.find("td:eq(4)").html($('#k5').val())
                                t.find("td:eq(5)").html($('#k6 option:selected').text())
                                t.find("td:eq(6)").html($('#k7 option:selected').text())
                                t.find("td:eq(7)").html($('#k8 option:selected').text())
                                t.find("td:eq(8)").html($('#flag option:selected').text())
                                return false
                            }
                        });
                        if (tidakAda){
                            dataTable.row.add( [
                                $('#k1').val(),
                                $('#k2 option:selected').text(),
                                $('#k3 option:selected').text(),
                                $('#k4').val(),
                                $('#k5').val(),
                                $('#k6 option:selected').text(),
                                $('#k7 option:selected').text(),
                                $('#k8 option:selected').text(),
                                $('#flag option:selected').text(),
                                '',
                            ] ).draw()
                            $('#dataTable tbody tr:last').addClass('v-mid').addClass('t-center');
                            $('#dataTable tbody tr:last td:last').html(`<button class="btn bg-warning" id="editButton" onclick="edit('${$('#k1').val()}')"><i class="fas fa-edit"></i></button>`);
                        }

                        resetForm(dataTable)
                        alertDismiss()
                    } else {
                        printErrorMsg(data.error)
                    }
                    
                },
                error: function(jqXhr, json, errorThrown){
                    console.log(jqXhr)
                    $('#error-alert').prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
                    alertDismiss()
                }
            });
        })

    })

    function resetForm(dataTable){
        $('#k1').val(dataTable.rows().count()+1)
        $('#k2').val('')
        $('#k3').val('')
        $('#k4').val('')
        $('#k5').val('')
        $('#k6').val('')
        $('#k7').val('')
        $('#k8').val('')
        $('#flag').val('')
        $('#formButton').removeClass('btn-warning').addClass('btn-primary').text('Tambah Data')

        let rw = {!! $rw !!}
        let rwForm = $("#k3")

        rwForm.empty().append('<option value=""></option>')
        for (let index = 0; index < rw.length; index++) {
            rwForm.append(`<option value="${rw[index].id}">${rw[index].id}. ${rw[index].nama}</option>`)
        }
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

    function edit(id){
        let url = `{{ url('/spasial/tabel3/data') }}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'id': id,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                let d = data.data

                let rw = {!! $rw !!}
                let rwForm = $("#rw")
                rwForm.empty().append('<option value=""></option>')
                for (let index = 0; index < rw.length; index++) {
                    if (rw[index].tbl_dusun_id == d.tbl_dusun_id){
                        rwForm.append(`<option value="${rw[index].id}">${rw[index].id}. ${rw[index].nama}</option>`)
                    }
                }

                $('#k1').val(d.id)
                $('#k2').val(d.tbl_dusun_id)
                $('#k3').val(d.tbl_rw_id)
                $('#k4').val(d.nama)
                $('#k5').val(d.ketuart)
                $('#k6').val(d.jk)
                $('#k7').val(d.usia)
                $('#k8').val(d.pendidikan)
                $('#flag').val(d.flag)
                $('#formButton').removeClass('btn-primary').addClass('btn-warning').text('Ubah Data')
                $('html,body').scrollTop($('.card-header').offset().top -75);
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                $('#error-alert').prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
                alertDismiss()
            }
        });
    }
</script>

@endsection