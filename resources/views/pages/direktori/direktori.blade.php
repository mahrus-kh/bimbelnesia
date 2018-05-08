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
            <div class="col"><a href="{{ route('direktori.index') }}" class="{{ url()->current() === route('direktori.index') ? '' : 'text-dark' }} font-weight-bold">ALL</a></div>
            @foreach($alphabet_directory as $alphabet)
                <div class="col"><a href="{{ route('direktori.show', strtolower($alphabet->alphabet)) }}" class="{{ request()->segment(2) == strtolower($alphabet->alphabet) ? '' : 'text-dark' }} font-weight-bold">{{ $alphabet->alphabet }}</a></div>
            @endforeach
        </div>
        <hr class="featurette-divider">
        <h5 class="font-weight-bold">{{ strtoupper(request()->segment(2)) }}</h5>
        <div class="row">
            <div class="col-md-4">
                @php
                    $batas = ceil(count($lembaga_by_alphabet) / 3);
                    $i = 0;
                @endphp
                @foreach($lembaga_by_alphabet as $row)
                    &raquo; <a href="{{ route('lembaga.show', $row->slug ) }}" class="text-lbb">{{ $row->tutoring_agency }}</a><br>
                    @php $i+=1 @endphp
                     @if($i == $batas)
                        </div>
                        <div class="col-md-4">
                        @php $i = 0 @endphp
                     @endif
                @endforeach
            </div>
        </div>
    </div>
    <br>
    <hr class="featurette-divider">
@endsection
