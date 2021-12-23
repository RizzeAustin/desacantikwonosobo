<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->       
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/styles.css') }}"/>

        <link rel="shortcut icon" href="{{ asset('/public/images/logo.png') }}" />

        <style type="text/css">
            @font-face{
                font-family: "bernard-mt-condensed-regular";
                src: url('{{ asset('/public/fonts/BERNHC.TTF') }}');
            }

            .taggg {
                font-family: 'bernard-mt-condensed-regular', sans-serif;
                /* letter-spacing: 2px; */
                font-size: 35px;
                /* transform: scaleX(1.5); */
            }
        </style>
        
        <title>Login | Desa Cantik</title>

    </head>
    <body>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content_login">
                <main>
                    <div class="container-fluid px-4 py-4">
                        
                        <div class="row" style="height: 95vh">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm col-sm mx-auto my-auto">
                                @if (env('KD_KEC')=='050' && env('KD_DESA')=='002') 
                                    <h1 class="t-center pb-4 taggg">DESA LIPURSARI</h1>
                                    <h1 class="t-center pb-4 taggg"> - BENAHI DATANE, <br> BEN GAMPANG SEKABEHANE - </h1>
                                @endif 
                                @if (env('KD_KEC')=='110' && env('KD_DESA')=='002') 
                                    <h1 class="t-center pb-4 taggg">DESA PUNGANGAN</h1>
                                @endif 
                                @if (env('KD_KEC')=='120' && env('KD_DESA')=='003') 
                                    <h1 class="t-center pb-4 taggg">DESA SENDANGSARI</h1>
                                    <h1 class="t-center pb-4 taggg"> - MAYO BENAHI DATANE, <br> BENER DATANE GAMPANG SEKABEHANE - </h1>
                                @endif 
                                @if (env('KD_KEC')=='100' && env('KD_DESA')=='006') 
                                    <h1 class="t-center pb-4 taggg">DESA GONDANG</h1>
                                @endif 
                                @if (env('KD_KEC')=='110' && env('KD_DESA')=='008') 
                                    <h1 class="t-center pb-4 taggg">KELURAHAN ANDONGSILI</h1>
                                    <h1 class="t-center pb-4 taggg"> - DATANE BENER, TURUNE ANGLER - </h1>
                                @endif 
                                @if (env('KD_KEC')=='030' && env('KD_DESA')=='011') 
                                    <h1 class="t-center pb-4 taggg">KELURAHAN SAPURAN</h1>
                                @endif 
                                @if (env('KD_KEC')=='070' && env('KD_DESA')=='013') 
                                <img class="card-img-top" src="{{ asset('/public/images/kick.jpeg') }}" alt="KICK MOBILE">
                                    <h1 class="t-center pb-4 taggg">DESA MADURETNO</h1>
                                    <h1 class="t-center pb-4 taggg"> - DATANE APIK, APA WAE TINGGAL KLIK - </h1>
                                @endif 
                                @if (env('KD_KEC')=='110' && env('KD_DESA')=='014') 
                                    <h1 class="t-center pb-4 taggg">DESA BLEDERAN</h1>
                                    <h1 class="t-center pb-4 taggg"> - KOMPLIT DATANE, GAMPANG GAWEANE - </h1>
                                @endif 
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm mx-auto my-auto">
                                <div class="card text-center border-dark mb-3">
                                    <div class="card-header" style="background-color: #2f4858">
                                        <ul class="nav nav-tabs card-header-tabs">
                                            <li class="nav-item">
                                                <button class="nav-link active" id="loginTab" style="color: #000000;">Login</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link" id="registerTab" style="color: #ffffff;">Register</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <img class="card-img-top" src="{{ asset('/public/images/logo_wide.png') }}" alt="Desa Cantik">
                                    <div class="card-body">
                                        <div class="tab-pane" id="login">
                                            <div class="row">
                                                <div class="col-md-10 mx-auto">
                                                    <div class="alert alert-success fade show" id="success-alert-register" role="alert" hidden></div>
                                                    <div class="alert alert-danger fade show" id="failed-alert-register" role="alert" hidden></div>
                                                </div>
                                            </div>
                                            <form action="{{ url('/login') }}" method="POST" class="loginForm" autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" autofocus style="text-transform: none;">
                                                            <label for="username" class="form-label">Username</label>
                                                            @error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" style="text-transform: none;">
                                                            <label for="password" class="form-label">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <button type="submit" class="form-control btn btn-success">Log In</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="row">
                                                <div class="col-md-10 mx-auto">
                                                    <a href="{{ url('/forgot-password') }}" class="f-left" style="text-decoration: none;">Lupa password?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="register" hidden>
                                            <form action="{{ url('/register') }}" method="POST" class="registerForm" autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="usernameRegister" name="usernameRegister" placeholder="Username" style="text-transform: none;">
                                                            <label for="usernameRegister" class="form-label">Username</label>
                                                            <small><span class="text-danger error-text usernameRegister_err"></span></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <div class="form-floating">
                                                            <input type="email" class="form-control" id="emailRegister" name="emailRegister" placeholder="email" style="text-transform: none;">
                                                            <label for="emailRegister" class="form-label">Email</label>
                                                            <small><span class="text-danger error-text emailRegister_err"></span></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" placeholder="Password" style="text-transform: none;">
                                                            <label for="passwordRegister" class="form-label">Password</label>
                                                            <small><span class="text-danger error-text passwordRegister_err"></span></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="passwordRegister_confirmation" name="passwordRegister_confirmation" placeholder="Password" style="text-transform: none;">
                                                            <label for="passwordRegister_confirmation" class="form-label">Ulang Password</label>
                                                            <small><span class="text-danger error-text passwordRegister_err"></span></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <div class="form-floating">
                                                            <select type="text" class="form-select" id="roleRegister" name="roleRegister" placeholder="role">
                                                                <option value="admin">Admin</option>
                                                                <option value="editor">Editor</option>
                                                                <option value="pengentri">Pengentri</option>
                                                            </select>
                                                            <label for="roleRegister" class="form-label">Role</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mx-auto mb-3">
                                                        <button type="submit" class="form-control btn btn-primary">Register</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <p>{{ env('VERSION', '1.0.6') }}</p>
                            </div>
                        </div>                        
                    </div>
                </main>
            </div>
        </div>

        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="{{ asset('/public/js/login/jquery-3.5.1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/public/js/login/popper-1.12.9.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/public/js/login/bootstrap-5.1.1.bundle.min.js') }}"></script>

        <script>
            $(document).ready(function(){
                alertDismiss()
                $('#loginTab').click(function(){
                    $('.nav-link').removeClass('active').css('color', '#ffffff')
                    $(this).addClass('active').css('color', '#000000')
                    $('.tab-pane').prop('hidden', true)
                    $('#login').prop('hidden', false)
                    $('#username').focus()
                })
                $('#registerTab').click(function(){
                    $('.nav-link').removeClass('active').css('color', '#ffffff')
                    $(this).addClass('active').css('color', '#000000')
                    $('.tab-pane').prop('hidden', true)
                    $('#register').prop('hidden', false)
                    $('#usernameRegister').focus()
                })

                $('.registerForm').submit(function(e){
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
                                $('.nav-link').removeClass('active').css('color', '#ffffff')
                                $('#loginTab').addClass('active').css('color', '#000000')
                                $('.tab-pane').prop('hidden', true)
                                $('#login').prop('hidden', false)
                                $('#username').focus()
                                $('#success-alert-register').prop('hidden', false).html(data.success)
                                alertDismiss()
                                form[0].reset()
                            } else {
                                printErrorMsg(data.error)
                            }
                        },
                        error: function(jqXhr, json, errorThrown){
                            console.log(jqXhr)
                            $('#fail-alert-register').prop('hidden', false).html('Jaringan bermasalah, silahkan coba lagi/hubungi admin')
                            alertDismiss()
                        }
                    });
                })

                
            })
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
        </script>
    </body>
</html>

