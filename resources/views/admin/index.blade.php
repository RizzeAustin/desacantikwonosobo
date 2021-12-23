@extends('layouts.main')

@section('container')

<h1 class="mt-4">Daftar User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">User terdaftar dalam sistem</li>
</ol>

<div class="card mb-4 border-dark">
    <div class="card-header black-card">
        {{-- <button class="btn"></button> --}}
        <i class="fas fa-table me-1"></i>
        <span>Daftar User</span>
    </div>
    <div class="card-body" id="mainTable">
        <div class="alert alert-success fade show" id="success-alert-index" role="alert" hidden></div>
        <div class="alert alert-danger fade show" id="error-alert-index" role="alert" hidden></div>
        <table id="dataTable" class="table table-striped table-bordered">
            <thead>
                <tr class="v-mid t-center">
                    <th width=25x%>Username</th>
                    <th width=25%>Email</th>
                    <th width=15%>Role</th>
                    <th width=15%>Flag</th>
                    <th width=20%>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $d)
                    <tr class="v-mid t-center">
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->role }}</td>
                        <td class=".flag">{{ $d->flag }}</td>
                        <td>
                            @if ($d->email!='mylaptop77@gmail.com')
                                @if ($d->flag == 'active')
                                    <button class="btn bg-warning" id="flagButton" onclick="activate('{{ $d->username }}')" style="color: #000000;">Deactivate</button>                        
                                @endif
                                @if ($d->flag == 'inactive')
                                    <button class="btn bg-success" id="flagButton" onclick="activate('{{ $d->username }}')" style="color: #ffffff;">Activate</button>
                                    @endif
                                <button class="btn bg-danger" id="removeButton" onclick="remove('{{ $d->username }}')"><i class="fas fa-times"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<h1 class="mt-4">Database</h1>
{{-- <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Unduh Backup Database</li>
</ol> --}}
<a href="{{ url('/data/dump') }}" class="btn btn-success ms-auto me-lg-0 mb-3"><i class="fas fa-download"></i> Backup</a>

<div class="card mb-4 border-dark">
    <div class="card-header black-card">
        <i class="fas fa-thumbtack"></i>    
        <span class="ms-2">Import BIP</span>
    </div>
    <div class="card-body">
        <form action="{{ url('/data/import/bip') }}" method="POST" class="form-lokasi" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" id="error-alert" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <label for="">Minimal mengandung kolom: </label> <br>
                    <strong><label for="">NO_KK, NIK, NAMA, JENIS_KELAMIN, AGAMA, STATUS_KAWIN, PEKERJAAN, STATUS_HUB_KELUARGA, PENDIDIKAN_AKHIR, ALAMAT, RT, RW</label></strong>
                    <div class="form-floating">
                        <input type="file" class="form-control" id="filebip" name="filebip" style="height: 4.25rem; padding-top: 2.5rem;" required>
                        <label for="provinsi" class="form-label">File BIP (.xlsx / .xls)</label>
                        @error('filebip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-floating">
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mb-4 border-dark">
    <div class="card-header black-card">
        <i class="fas fa-thumbtack"></i>    
        <span class="ms-2">Import Data Vaksin Covid-19</span>
    </div>
    <div class="card-body">
        <form action="{{ url('/data/import/vaksin') }}" method="POST" class="form-lokasi" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md">
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" id="error-alert" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <label for="">Minimal mengandung kolom: </label> <br>
                    <strong><label for="">NIK, DOSIS, DESA/KEL</label></strong>
                    <div class="form-floating">
                        <input type="file" class="form-control" id="filevaksin" name="filevaksin" style="height: 4.25rem; padding-top: 2.5rem;" required>
                        <label for="filevaksin" class="form-label">File Data Vaksin (.xlsx / .xls)</label>
                        @error('filevaksin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-floating">
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
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
        });
        $('.dataTable thead tr th').css("background-color", "#4392f1").css("color", "#ffffff")
    })

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

    function activate(username){
        let url = `{!! url('/user/flag') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'username': username,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                if ($.isEmptyObject(data.failed)){
                    $('#success-alert-index').prop('hidden', false).html(data.success)
                    $('html,body').scrollTop($('.card-header').offset().top -75);
                    alertDismiss()
                    $("#dataTable tr").each(function () {
                        let t = $(this);
                        let n =  t.find("td:eq(0)").html()
                        if (n==username){
                            if (data.flag=='active'){
                                t.find('td:eq(3)').text('active')
                                t.find('td:last button.bg-success').removeClass('bg-success').addClass('bg-warning').text('Deactivate').css('color', '#000000')
                            }
                            if (data.flag=='inactive'){
                                t.find('td:eq(3)').text('inactive')
                                t.find('td:last button.bg-warning').removeClass('bg-warning').addClass('bg-success').text('Activate').css('color', '#ffffff')
                            }
                            return false
                        }
                    });
                } else {
                    $('#error-alert-index').prop('hidden', false).html(data.failed)
                    $('html,body').scrollTop($('.card-header').offset().top -75);
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                $('#error-alert-index').prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
                $('html,body').scrollTop($('.card-header').offset().top -75);
                alertDismiss()
            }
        });
    }
    
    function remove(username){
        let url = `{!! url('/user/remove') !!}`
        $.ajax({
            url: url,
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',
                'username': username,
            },
            cache: false,
            dataType: 'json',
            success: function(data){
                if ($.isEmptyObject(data.failed)){
                    $('#success-alert-index').prop('hidden', false).html(data.success)
                    $('html,body').scrollTop($('.card-header').offset().top -75);
                    alertDismiss()
                    $("#dataTable tr").each(function () {
                        let t = $(this);
                        let n =  t.find("td:eq(0)").html()
                        if (n==username){
                            t.hide()
                            return false
                        }
                    });
                } else {
                    $('#error-alert-index').prop('hidden', false).html(data.failed)
                    $('html,body').scrollTop($('.card-header').offset().top -75);
                    alertDismiss()
                }
            },
            error: function(jqXhr, json, errorThrown){
                console.log(jqXhr)
                $('#error-alert-index').prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
                $('html,body').scrollTop($('.card-header').offset().top -75);
                alertDismiss()
            }
        });
    }
</script>

@endsection