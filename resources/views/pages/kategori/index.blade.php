@extends('templates.default')
@section('title')
    <title>Semua Kategori Bimbingan Belajar Indonesia - BimbelNesia</title>
@endsection
@section('header-content')
    @include('templates.partials.business-header-cut')
@endsection
@section('content')
    <div class="container mt-2">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-white rounded-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">{{ request()->segment(1) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Semua Kategori</li>
            </ol>
        </nav>
    </div>
    <div class="container mb-2">
        <div class="card">
            <div class="card-body">
                <text class="font-weight-bold">Sub Kategori :</text>
                @foreach($list_sub_category as $row)
                    <a href="{{ route('sub.kategori', $row->slug) }}" class="text-dark text-lbb">
                        <span class="badge badge-pill badge-secondary font-weight-normal">{{ $row->sub_category }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="list-group">
                    <a href="{{ route('kategori.index') }}" class="{{ request()->segment(1) === "kategori" ? 'active' : '' }} list-group-item list-group-item-action font-weight-bold">Semua Kategori <span class="badge badge-light badge-pill font-weight-bold pull-right"></span></a>
                    @foreach($list_category as $row)
                        <a href="{{ route('kategori', $row->slug) }}" class="list-group-item list-group-item-action font-weight-bold">{{ $row->category }} <span class="badge badge-light badge-pill font-weight-bold pull-right">{{ $row->count }}</span></a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @forelse($lembaga as $row)
                        <div class="col-md-6 mb-2">
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
                        -
                    @endforelse
                </div>
                <div class="mt-2 text-center">
                    {{ $lembaga->withPath('kategori')->links('templates.partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">
@endsection
