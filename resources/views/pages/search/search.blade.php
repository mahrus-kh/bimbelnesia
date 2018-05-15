@extends('templates.default')
@section('title')
    <title>Cari Lembaga {{ request('search') }} | Bimbingan Belajar Indonesia - BimbelNesia</title>
@endsection
@section('header-content')
    <header class="business-header-cut-search-page">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11 mt-5">
                    <form method="GET" action="{{ route('do.search') }}">
                        <div class="row">
                            <div class="col-md-9 my-2">
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control-lg form-control" placeholder="Cari : Bimbel SMA, Bahasa Inggris, STAN, Kursus, Les, dll." minlength="2" maxlength="25" required="required">
                            </div>
                            <div class="col-md-2 my-2">
                                <input type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold" VALUE="Temukan">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <div class="container mt-2">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-white rounded-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
    <div class="container mb-2">
        <div class="card">
            <div class="card-body">
                <text class="font-weight-bold">Search : </text>{{ request('search') }}

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse($lembaga as $row)
                <div class="col-md-4 mb-2">
                    <div class="card btn-outline-info">
                        <a href="{{ route('lembaga.show', $row->slug) }}" class="card-text-hover">
                            <div class="card-body">
                                <h5 class="text-dark">{{ $row->tutoring_agency }}</h5>
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
                            </div>
                        </a>
                    </div>
                </div>
            @empty
               <div class="col-md-12 text-center">- Not Found -</div>
            @endforelse
        </div>
    </div>
    <hr class="featurette-divider">
@endsection
