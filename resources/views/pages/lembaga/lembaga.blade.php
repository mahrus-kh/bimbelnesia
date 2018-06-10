@extends('templates.default')
@section('title')
    <title>{{ $lembaga->tutoring_agency }} - BimbelNesia</title>
@endsection
@section('header-content')
    @include('templates.partials.business-header-cut')
@endsection
@section('content')
    <div class="container mt-2">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb bg-white rounded-0">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="">{{ request()->segment(1) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ request()->segment(2) }}</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">{{ $lembaga->tutoring_agency }}<a href="#">@if($lembaga->verified === "1")<i span class="fa fa-check-circle text-primary" data-toggle="tooltip" data-placement="right" title="Verified"></i>@endif </a></h4>
                        <div class="card-text mb-2">
                            <i span class="fa fa-eye text-warning"></i> {{ $lembaga->total_views }}
                            | <i span class="fa fa-comment text-warning"></i> {{ $lembaga->total_comments }}
                            | Share :
                            @foreach($social_share as $social => $link)
                                <a href="{{ $link }}" class="btn btn-secondary btn-sm border-0">{{ strtoupper($social) }}</a>
                            @endforeach
                        </div>
                        <div class="card-text mb-2">Rating
                            <b class="text-warning">{{ $lembaga->rating }}
                                @for($i=0;$i<5;$i++)
                                    @if( $lembaga->rating >= 1)
                                        <i class="fa fa-star"></i>
                                    @elseif ( $lembaga->rating >= 0.5 &&  $lembaga->rating < 1  )
                                        <i class="fa fa-star-half-o"></i>
                                    @elseif( $lembaga->rating < 0.5)
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                    @php  $lembaga->rating =   $lembaga->rating - 1; @endphp
                                @endfor
                            </b>
                            | <a href="#form-feedback" class="btn btn-secondary btn-sm border-0">Berikan Feedback & Komentar &raquo;</a>
                        </div>
                        <hr class="featurette-divider">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <img src="{{ env('API_BASE_IMAGE') }}/{{ $lembaga->logo_image }}" alt="{{ $lembaga->tutoring_agency }}" class="img-thumbnail img-responsive border-0">
                            </div>
                            <div class="col-md-8">
                                <p><b>Kategori : </b>
                                    @foreach($lembaga->category_id as $category)
                                        <span class="badge badge-pill badge-warning font-weight-normal">{{ $category }}</span>
                                    @endforeach
                                </p>
                                <p><b>Website : </b>
                                    <a href="{{ $lembaga->contact->website }}" class="text-dark">{{ $lembaga->contact->website }} &raquo;</a>
                                </p>
                                <p><b>Sosial Media : </b>
                                    <a href="{{ $lembaga->contact->facebook }}" class="text-dark">Facebook &raquo;</a> |
                                    <a href="{{ $lembaga->contact->instagram }}" class="text-dark">Instagram &raquo;</a>
                                </p>
                                <p><b>Kontak : </b>
                                    {{ $lembaga->contact->office_phone }} | {{ $lembaga->contact->mobile_phone }} | {{ $lembaga->contact->email }} | {{ $lembaga->contact->other_contacts }}
                                </p>
                            </div>
                        </div>
                        <hr class="featurette-divider">
                        <div class="row mb-1">
                            <div class="col">
                                <b>Alamat : </b> {{ $lembaga->address }}
                            </div>
                        </div>
                        <hr class="featurette-divider">
                        <div class="row mb-1">
                            <div class="col">
                                <b>Deskripsi : </b> {{ $lembaga->description }}
                            </div>
                        </div>
                        <hr class="featurette-divider">
                        <div class="row mb-1">
                            <div class="col">
                                <b>Sub Kategori : </b>
                                @foreach($lembaga->sub_category_id as $sub_category)
                                    <span class="badge badge-pill badge-warning font-weight-normal">{{ $sub_category}}</span>
                                @endforeach
                            </div>
                        </div>
                        <hr class="featurette-divider">
                        <div class="row mb-1">
                            <div class="col">
                                <b>Tags : </b>
                                @foreach($lembaga->tags as $tags)
                                    <span class="badge badge-pill badge-secondary font-weight-normal">#{{ $tags }}</span>
                                @endforeach
                            </div>
                        </div>
                        <hr class="featurette-divider">
                        <div class="accordion" id="accordion">
                            <div class="card">
                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="card-header" id="headingOne">Keunggulan Proses Bimbingan &raquo;</div>
                                </a>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                @php $no = 0 @endphp
                                                @forelse($lembaga->excellence as $row)
                                                    <tr>
                                                        <td class="text-center">{{ $no + 1}}</td>
                                                        <td>{{ $row->excellence }}</td>
                                                    </tr>
                                                    @php $no+=1 @endphp
                                                @empty
                                                    <tr>
                                                        <td class="text-center">-</td>
                                                        <td>Not Found</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <a class="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <div class="card-header" id="headingTwo">Fasilitas (Sarana & Prasarana) &raquo;</div>
                                </a>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                @php $no = 0 @endphp
                                                @forelse($lembaga->facility as $row)
                                                    <tr>
                                                        <td class="text-center">{{ $no + 1}}</td>
                                                        <td>{{ $row->facility }}</td>
                                                    </tr>
                                                    @php $no+=1 @endphp
                                                @empty
                                                    <tr>
                                                        <td class="text-center">-</td>
                                                        <td>Not Found</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <a class="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <div class="card-header" id="headingThree">Program Bimbingan &raquo;</div>
                                </a>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col">Program Bimbingan</th>
                                                    <th scope="col">Biaya(Rp)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $no = 0 @endphp
                                                @forelse($lembaga->study_program as $row)
                                                    <tr>
                                                        <td class="text-center">{{ $no + 1}}</td>
                                                        <td>{{ $row->study_program }}</td>
                                                        <td>{{ number_format($row->cost, 0, "-", ".") }}</td>
                                                    </tr>
                                                    @php $no+=1 @endphp
                                                @empty
                                                    <tr>
                                                        <td class="text-center">-</td>
                                                        <td>Not Found</td>
                                                        <td>Not Found</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Form Feedback & Komentar</h5>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11" id="form-feedback">
                                @if(session('api_token'))
                                    @if(session('message'))
                                        <label class="text-warning">{{ session('message') }}</label>
                                    @endif
                                    <form method="POST" action="{{ route('do.feedback', request()->segment(2)) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('POST') }}
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Rating*</label>
                                            <div class="col-md-7">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="rating" id="inputRating5" value="5" required="required">
                                                    <label class="form-check-label" for="inputRating5">@for($i=0;$i<5;$i++) <i span class="fa fa-star"></i> @endfor Sangat Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="rating" id="inputRating4" value="4" required="required">
                                                    <label class="form-check-label" for="inputRating4">@for($i=0;$i<4;$i++) <i span class="fa fa-star"></i> @endfor Baik Sekali</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="rating" id="inputRating3" value="3" required="required">
                                                    <label class="form-check-label" for="inputRating3">@for($i=0;$i<3;$i++) <i span class="fa fa-star"></i> @endfor Cukup Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="rating" id="inputRating2" value="2" required="required">
                                                    <label class="form-check-label" for="inputRating2">@for($i=0;$i<2;$i++) <i span class="fa fa-star"></i> @endfor Kurang Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="rating" id="inputRating1" value="1" required="required">
                                                    <label class="form-check-label" for="inputRating1">@for($i=0;$i<1;$i++) <i span class="fa fa-star"></i> @endfor Tidak Baik</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Komentar*</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="comment" rows="2" minlength="3" maxlength="250" placeholder="pengalaman pribadi, kelebihan, kekurangan, kritik, saran, dll." required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label"></label>
                                            <div class="col-md-5">
                                                <input type="submit" class="btn btn-primary" value="Kirim Feedback">
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    Login untuk memberi Feedback & Komentar ! <a href="{{ route('login') }}" class="font-weight-bold">Login Sekarang &raquo;</a>
                                @endif
                            </div>
                        </div>
                        <hr class="featurette-divider">
                        <h5 class="card-title" id="user_reviews">Feedback & Komentar</h5>
                        <div class="card">
                            <div class="card-body">
                                @forelse($lembaga->feedback as $row)
                                    <text class="text-primary">
                                        {{ $row->name_user }}
                                    </text>
                                    <p> &raquo; @for($i=0;$i<5;$i++)
                                            @if( $row->rating >= 1)
                                                <i class="fa fa-star text-warning"></i>
                                            @elseif ( $row->rating >= 0.5 &&  $row->rating < 1  )
                                                <i class="fa fa-star-half-o text-warning"></i>
                                            @elseif( $row->rating < 0.5)
                                                <i class="fa fa-star-o text-warning"></i>
                                            @endif
                                            @php  $row->rating =   $row->rating - 1; @endphp
                                        @endfor
                                        {{ $row->comment }}
                                    </p>
                                    <hr>
                                @empty
                                    <h6 class="text-dark text-center">Belum Ditemukan - Jadilah yang Pertama Memberikan Feedback</h6>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <h5 class="card-header">Rekomendasi</h5>
                    <div class="card-body first">
                    </div>
                </div>
                <div class="card mb-3">
                    <h5 class="card-header">Lembaga Lainnya</h5>
                    <div class="card-body second">
                    </div>
                </div>
            </div>
        </div>
        <hr class="featurette-divider">
@endsection
@section('javascript')
    @include('pages.lembaga.blade-js.lembaga')
@endsection