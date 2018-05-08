<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--Main Title--}}
        @yield('title')
    {{--End  Title--}}
    {{-- Head --}}
        @include('templates.partials.head-link')
    {{-- End Head--}}
</head>
<body>
    {{-- Top Menu--}}
        @include('templates.partials.top-menu')
    {{-- End Top Menu--}}


    {{--Header Content--}}
         @yield('header-content')
    {{--End Header Content--}}

    {{--Main Content--}}
        @yield('content')
    {{--End Main Content--}}

    {{-- Footer--}}
        @include('templates.partials.footer')
    {{--End Footer--}}
</body>
{{--Script JavaScript--}}
    @include('templates.partials.script')
{{--End Script JavaScript--}}
</html>
{{--JavaScript--}}
    @yield('javascript')
{{--JavaScript--}}
