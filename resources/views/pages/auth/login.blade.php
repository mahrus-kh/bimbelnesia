<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - BimbelNesia</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/modify/auth.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                    <h5 class="font-weight-bold">Masuk ke BimbelNesia</h5>
                    <div class="col-md-4"></div>
                    <form method="POST" action="{{ route('do.login') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        @if(session('message'))
                            <div class="alert alert-info alert-dismissible fade show col-md-9" role="alert">
                                <strong>{{ session('message') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" placeholder="Email" minlength="5" maxlength="50" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" minlength="8" maxlength="50" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-primary btn-block" value="Login">
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label"><a href="{{ route('reset.password') }}">Lupa Password ?</a></label>
                            </div>
                        </div>
                    </form>
                    <hr>
                    Atau masuk dengan <br>
                    <button type="button" class="btn btn-outline-info"><i class="fa fa-twitter fa-2x"></i></button>
                    <button type="button" class="btn btn-outline-danger"><i class="fa fa-google fa-2x"></i></button>
                    <button type="button" class="btn btn-outline-primary"><i class="fa fa-facebook fa-2x"></i></button>
                    <button type="button" class="btn btn-outline-warning"><i class="fa fa-instagram fa-2x"></i></button>
                    <hr>
                    Belum Punya Akun ?  <a href="{{ route('register') }}" class="font-weight-bold">Daftar Sekarang &raquo;</a> <br>
                    Atau <a href="#" class="font-weight-bold">Login Pengelola Lembaga &raquo;</a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
</body>
{{--Script JavaScript--}}
    @include('templates.partials.script')
{{--End Script JavaScript--}}
</html>