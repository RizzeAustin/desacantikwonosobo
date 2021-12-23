<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->       
        <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/styles.css') }}"/>

        <link rel="shortcut icon" href="{{ asset('/public/images/logo.png') }}" />
        <title>Lupa Password | Desa Cantik</title>

    </head>
    <body>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 py-4">                    
                        <div class="row" style="height: 95vh">
                            <div class="col-md-4 mx-auto my-auto">
                                <div class="card text-center border-dark mb-3">
                                    <div class="card-header black-card">
                                        <span>Lupa Password</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-10 mx-auto">
                                                @if (session()->has('status'))
                                                    <div class="alert alert-success fade show" id="success-alert-register" role="alert">{{ session('status') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <form action="{{ url('/forgot-password') }}" method="POST" class="resetPasswordForm" autocomplete="off">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-10 mx-auto mb-3">
                                                    <div class="form-floating">
                                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email" autofocus style="text-transform: none;">
                                                        <label for="email" class="form-label">Email</label>
                                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-10 mx-auto mb-3">
                                                    <button type="submit" class="form-control btn btn-success">Kirim Link Reset Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </main>
            </div>
        </div>

        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    </body>
</html>

