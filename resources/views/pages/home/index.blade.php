@extends('templates.default')
@section('title')
    <title>BimbelNesia - Informasi Bimbingan Belajar Indonesia : Direktori Bimbingan Belajar Sesuai Kebutuhan di Indonesia</title>
@endsection
@section('header-content')
    <header class="business-header-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center text-white mt-5 font-weight-bold">Pusat Informasi LBB di Indonesia</h1>
                    <h5 class="text-center text-white">Direktori LBB Indonesia : Temukan dan Pilih Bimbingan Belajar Sesuai Kebutuhan di Indonesia</h5>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <form method="GET" action="{{ route('do.search') }}">
                               <div class="row">
                                   <div class="col-md-9 my-2">
                                       <input type="text" name="search" class="form-control-lg form-control" placeholder="Cari : Bimbel SMA, Bahasa Inggris, STAN, Kursus, Les, dll." minlength="2" maxlength="25" required="required">
                                   </div>
                                   <div class="col-md-2 my-2">
                                       <input type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold" VALUE="Temukan">
                                   </div>
                               </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="container mt-4 mb-4">
        <div class="row">
            @foreach($list_sub_category as $row)
                <div class="col mb-3">
                    <div class="card btn-outline-info">
                        <a href="{{ route('sub.kategori', $row->slug) }}" class="card-text-hover">
                            <div class="card-body text-center">
                                <i class="{{ $row->fa_icon }} fa-4x {{ $row->color }} mb-1" aria-hidden="true"></i>
                                <p class="text-dark">{{ $row->sub_category }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid bg-info mb-4">
        <div class="container text-center">
            Coming Soon
        </div>
    </div>
    <div class="container mb-5 mt-4">
        <h5 class="text-center font-weight-bold text-primary">- Lembaga Populer -</h5>
        <div class="row">
            <div class="col">
                <div class="card-deck">
                    @foreach($list_popular_lembaga as $row)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5>{{ $row->tutoring_agency }} <i span class="fa fa-check-circle text-primary"></i></h5>
                                @for($i=0;$i<5;$i++)
                                    @if($row->rating >= 1)
                                        <i span class="fa fa-star text-warning"></i>
                                    @elseif ($row->rating >= 0.5 && $row->rating < 1  )
                                        <i span class="fa fa-star-half-o text-warning"></i>
                                    @elseif($row->rating < 0.5)
                                        <i span class="fa fa-star-o text-warning"></i>
                                    @endif
                                    @php  $row->rating =   $row->rating - 1; @endphp
                                @endfor
                                <div class="card-text text-dark">{{ $row->total_comments }} Feedback & Komentar &raquo;</div>
                                <br>
                                <p class="card-text">{{ $row->description }}</p>
                                <a href="{{ route('lembaga.show', $row->slug) }}" class="btn btn-outline-primary font-weight-bold">Detail Lengkap &raquo;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection