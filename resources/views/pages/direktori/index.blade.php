@extends('templates.default')
@section('title')
    <title>Direktori Lembaga Bimbingan Belajar - BimbelNesia</title>
@endsection
@section('header-content')
    @include('templates.partials.business-header-cut')
@endsection
@section('content')
    <div class="container mt-3">
        <h4 class="text-primary">Direktori Lembaga Bimbingan Belajar</h4>
        <div class="row">
            <div class="col"><a href="{{ route('direktori.index') }}" class="{{ request()->segment(1) === 'direktori' ? '' : 'text-dark' }} font-weight-bold">ALL</a></div>
            @foreach($alphabet_directory as $alphabet)
                <div class="col"><a href="{{ route('direktori.show', strtolower($alphabet->alphabet)) }}" class="{{ request()->segment(2) === $alphabet->alphabet ? '' : 'text-dark' }} font-weight-bold">{{ $alphabet->alphabet }}</a></div>
            @endforeach
        </div>
        <hr class="featurette-divider">
        @foreach($lembaga_by_alphabet as $alphabet => $row)
            <h5 class="font-weight-bold">{{ $alphabet }}</h5>
            <div class="row">
                <div class="col-md-4">
                    @php $i = 0 @endphp
                    @foreach($row as $lembaga)
                    &raquo; <a href="{{ route('lembaga.show', $lembaga->slug) }}" class="text-lbb">{{ $lembaga->tutoring_agency }}</a><br>
                    @php $i+=1 @endphp
                            @if($i === 3)
                                </div>
                            <div class='col-md-4'>
                                @php $i = 0 @endphp
                            @endif
                    @endforeach
                </div>
            </div>
            <a href="{{ route('direktori.show', strtolower($alphabet)) }}">Lihat Selengkapnya</a>
            <hr class="featurette-divider">
        @endforeach
    </div>
    <br>
    <hr class="featurette-divider">
@endsection