<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - BimbelNesia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modify/auth.css') }}">
</head>
<body>
{{--Top Menu--}}
    @include('templates.partials.top-menu')
{{--End Top Menu--}}
<div class="container">
    <div class="card bg-light border-0 my-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col">
                    <h5 class="font-weight-bold text-center">Register BimbelNesia</h5>
                    <form method="POST" action="{{ route('do.register') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        @if(session('message'))
                            <div class="alert alert-warning alert-dismissible fade show col-md-12" role="alert">
                                <strong>{{ session('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Nama Lengkap" minlength="3" maxlength="50" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" minlength="5" maxlength="50" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" minlength="8" maxlength="50" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-primary btn-block" value="Register">
                            </div>
                            <div class="col-sm-12 my-2">
                                &raquo; Dengan mendaftar, Anda menyetujui <a href="#">Ketentuan Layanan</a> dan <a href="#">Kebijakan Privasi</a> yang berlaku.
                            </div>
                        </div>
                    </form>
                    <hr>
                    Sudah Punya Akun ?  <a href="{{ route('login') }}" class="font-weight-bold">Login Sekarang &raquo;</a> <br>
                    Atau <a href="#" class="font-weight-bold">Login Pengelola lBB &raquo;</a>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</div>
</body>
{{--Script JavaScript--}}
    @include('templates.partials.script')
{{--End Script JavaScript--}}
</html>