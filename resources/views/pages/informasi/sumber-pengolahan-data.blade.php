@extends('templates.default')
@section('title')
    <title>Sumber dan Pengolahan Data - BimbelNesia</title>
@endsection
@section('header-content')
    @include('templates.partials.business-header-cut')
@endsection
@section('content')
    <div class="container mt-3">
        <h4 class="text-primary">Sumber dan Pengolahan Data</h4>
        <p>
           <text class="text-primary">Sumber Data :</text> <br>
            - Direktori, data, dan informasi lembaga bimbingan belajar atau kursus diperoleh secara mandiri oleh admin utama BimbelNesia
            melalui mesin pencari, website resmi lembaga, website pendukung informasi lembaga, observasi, maupun sumber lainnya.
            <br>
            - Segala bentuk direktori, data, dan informasi lembaga bimbingan belajar atau kursus yang diperoleh
            secara mandiri dapat dipertanggungjawabkan sesuai apa yang tertera pada sumber asli. <br>
            - Direktori, data, dan informasi lembaga bimbingan belajar atau kursus diperoleh pula dengan melakukan kerja sama (non-profitable)
            dengan admin/pengelola lembaga untuk melengkapi data & informasinya sesuai lembaga yang dikelola. <br>
            - Segala bentuk direktori, data, dan informasi lembaga bimbingan belajar atau kursus yang diperoleh
            secara langsung dari pengelola lembaga merupakan tanggungjawab pengelola lembaga dan/atau BimbelNesia.
        </p>
        <p>
            <text class="text-primary">Pengolahan Data :</text><br>
            - Data & informasi lembaga bimbingan belajar maupun kursus disimpan dan dikelola oleh sistem BimbelNesia
            sesuai dengan kebutuhan. <br>
            - Feedback berupa rating & komentar setiap lembaga merupakan hasil murni dari pengguna dan dikelola secara
            otomatis oleh sistem BimbelNesia. <br>
            - Data & informasi serta detail rating setiap lemabag secara otomatis digunakan sistem BimbelNesia untuk menghasilkan
            rekomendasi lemabag yang akan diberikan kepada pengguna. <br>
            - Setiap data & informasi yang dikelola secara otomatis oleh sistem, admin utama BimbelNesia tidak dapat melakukan perubahan/manupulasi
            secara mandiri dalam bentuk apapun. <br>
            - Data pengguna dikelola secara otomatis oleh sistem BimbelNesia sesuai dengan kebutuhan.
            - Admin utama BimbelNesia tidak berhak atau tidak dapat mengetahui data yang bersifat rahasia seperti password.
        </p>
    </div>
    <br>
    <hr class="featurette-divider">
@endsection