<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        {{-- JUNK --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
        {{-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
        {{-- dataTables --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css"> --}}
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script> --}}
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.0/js/dataTables.fixedColumns.min.js"></script> --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/> --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/fc-4.0.1/sc-2.0.5/sl-1.3.3/datatables.min.css"/> --}}
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script> --}}
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/fc-4.0.1/sc-2.0.5/sl-1.3.3/datatables.min.js"></script> --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/> --}}
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> --}}
        
        
        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/jquery-3.5.1.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/popper-1.12.9.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/bootstrap-5.1.1.bundle.min.js') }}"></script>
        
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/FontAwesome-5.15.3.min.js') }}"></script>

        {{-- https://github.com/janpaepke/ScrollMagic --}}
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/ScrollMagic-2.0.8.min.js') }}"></script>
        
        <script type="text/javascript" src="{{ asset('/public/js/infoTableSwitch.js') }}"></script>
        
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/dataTables.bootstrap5.min.css') }}"/>
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/4.0.1/css/fixedColumns.bootstrap5.min.css"/> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/fixedColumns.bootstrap5.min.css') }}"/>
        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/jquery-3.6.0.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/jquery.dataTables-1.11.3.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/dataTables-1.11.3.bootstrap5.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.0.1/js/dataTables.fixedColumns.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/dataTables.fixedColumns-4.0.1.min.js') }}"></script>

        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.min.css"/> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/buttons-2.0.1.bootstrap5.min.css') }}"/>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/jszip-2.5.0.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/pdfmake-0.1.36.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/vfs_fonts-0.1.36.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/dataTables.buttons-2.0.1.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/buttons-2.0.1.bootstrap5.min.js') }}"></script>
        {{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/buttons.html5.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/styles.css') }}"/>
        <script type="text/javascript" src="{{ asset('/public/js/scripts.js') }}"></script>
        
        <link rel="shortcut icon" href="{{ asset('/public/images/logo.png') }}" />
        <title>{{ $title }} | Desa Cantik</title>
    </head>
    <body class="sb-nav-fixed">
        {{-- sb-sidenav-toggled --}}
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 ms-2 me-3" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <img src="{{ asset('/public/images/logo.png') }}" alt="" width="50">
            <a class="navbar-brand" href="{{ url('/') }}">DESA CANTIK WONOSOBO</a>
            <!-- Sidebar Toggle-->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->username }} <i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="#!">Profil</a></li> --}}
                        {{-- <li><hr class="dropdown-divider" /></li> --}}
                        <li>
                            <form action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" aria-current="page">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Home</div>
                            
                            <a class="nav-link {{ ($active === '/landing') ? 'active' : ''}}" href="{{ url('/landing') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                Halaman Utama
                            </a>

                            @if (Auth::user()->hasRole('admin'))
                                <a class="nav-link collapsed {{ ($active === '/admin') ? 'active' : ''}}" href="{{ url('/admin') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                    Admin
                                </a>
                            @endif

                            <div class="sb-sidenav-menu-heading">Kuisioner Kependudukan</div>

                            <a class="nav-link collapsed {{ ($active === '/data') ? 'active' : ''}}" href="#" data-bs-toggle="collapse" data-bs-target="#dataKuisioner" aria-expanded="false" aria-controls="dataKuisioner">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></i></div>
                                Data Kuisioner
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse {{ ($active === '/data/tambah' || $active === '/data/kk/edit') ? 'show' : ''}}" id="dataKuisioner" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ ($active === '/data/tambah') ? 'active' : ''}}" href="{{ url('/data/add') }}"><i class="fas fa-plus me-2"></i> Tambah Data</a>
                                    <a class="nav-link {{ ($active === '/data/kk/edit') ? 'active' : ''}}" href="#" {{ ($active === '/data/kk/edit') ? '' : 'hidden'}}><i class="fas fa-edit me-2"></i> Edit Data</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ ($active === '/data/tabulasi') ? 'active' : ''}}" href="#" data-bs-toggle="collapse" data-bs-target="#dataTabulasi" aria-expanded="false" aria-controls="dataTabulasi">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                                Data Tabulasi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse {{ ($active === '/tabel') ? 'show' : ''}}" id="dataTabulasi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ ($active === '/tabel') ? 'active' : ''}}" href="#"><i class="fas fa-table me-2"></i> Desa Dalam Angka</a>
                                    {{-- <a class="nav-link {{ ($active === '/tabel/pkk') ? 'active' : ''}}" href="{{ url('/tabel/pkk') }}"><i class="fas fa-table me-2"></i> Keperluan PKK</a> --}}
                                </nav>
                            </div>

                            <a class="nav-link collapsed {{ ($active === '/data/kuisioner') ? 'active' : ''}}" href="#" data-bs-toggle="collapse" data-bs-target="#dataKues" aria-expanded="false" aria-controls="dataKues">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                                Pencarian Penduduk
                                <div class="sb-sidenav-collapse-arrow"><i class=""></i></div>
                            </a>

                            <div class="sb-sidenav-menu-heading">Kuisioner Spasial</div>

                            <a class="nav-link collapsed {{ ($active === '/spasial') ? 'active' : ''}}" href="#" data-bs-toggle="collapse" data-bs-target="#dataSpasial" aria-expanded="false" aria-controls="dataSpasial">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                                Data Kuisioner
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse {{ ($active === '/spasial/tabel') ? 'show' : ''}}" id="dataSpasial" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ ($active === '/spasial/tabel') ? 'active' : ''}}" href="#" {{ ($active === '/spasial/tabel') ? '' : 'hidden'}}><i class="fas fa-table me-2"></i> Tabel</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div style="font-size: 10pt">Created By: BPS Wonosobo</div>
                        <div style="font-size: 10pt">&copy; 2021 - {{ env('VERSION', '1.0.6') }}</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('container')
                        
                    </div>
                </main>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </symbol>
                    <symbol id="instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </symbol>
                    <symbol id="twitter" viewBox="0 0 16 16">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </symbol>
                </svg>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex me-3">
                                <li class="ms-3"><a class="link-dark" href="https://www.twitter.com/bps_statistics"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                                <li class="ms-3"><a class="link-dark" href="https://www.youtube.com/channel/UCn4IaaxHaaP-mAjZzrAtixA">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                    </svg></a>
                                </li>
                                <li class="ms-3"><a class="link-dark" href="https://www.instagram.com/bps_statistics/"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                                <li class="ms-3"><a class="link-dark" href="https://www.facebook.com/pages/Badan-Pusat-Statistik/1394866840805957"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
                
            </div>
        </div>
        <script>
            $( document ).ready(function () {
                $('[data-toggle="tooltip"]').tooltip()
                $('[data-toggle="tooltip"]').addClass('mb-1')
                $('.form-floating').addClass('mb-1')
                var x = window.matchMedia("(max-width: 450px)")
                hideBrand(x) // Call listener function at run time
                x.addListener(hideBrand) // Attach listener function on state changes
            })

            function hideBrand(x) {
                if (x.matches) { // If media query matches
                    $('.navbar-brand').prop('hidden', true)
                } else {
                    $('.navbar-brand').prop('hidden', false)
                }
            }          
            
        </script>

    </body>
</html>
