<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bimbelnesia - Reset Password</title>
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
                    <h5 class="font-weight-bold">Reset Password</h5>
                    <form method="POST" action="{{ route('do.reset.password') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="email" class="form-control form-control-lg" placeholder="Email" minlength="5" maxlength="50" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                    <button type="button" class="btn btn-primary btn-block">Reset</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    Sudah Punya Akun ?  <a href="{{ route('login') }}" class="font-weight-bold">Login Sekarang &raquo;</a> <br>
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