<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ route('home.index') }}">BimbelNesia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->segment(1) === 'home' ? 'active' : '' }}">
                    <a class="nav-link font-weight-bold" href="{{ route('home.index') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown {{ request()->segment(1) === 'kategori' ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        @foreach($list_category as $row)
                            <a class="{{ request()->segment(2) === $row->slug ? 'active' : '' }} dropdown-item font-weight-bold" href="{{ route('kategori', $row->slug) }}"> {{ $row->category  }}</a>
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item font-weight-bold" href="{{ route('sub.kategori.index') }}">Sub Kategori &raquo;</a>
                    </div>
                </li>
                <li class="nav-item {{ request()->segment(1) === 'direktori' ? 'active' : '' }}"><a class="nav-link font-weight-bold" href="{{ route('direktori.index') }}">Direktori A-Z</a></li>
                <li class="nav-item"><a class="nav-link font-weight-bold" href="https://www.blog.bimbelnesia.com" target="_blank">Blog</a></li>
                @if(session('api_token'))
                    <li class="nav-item dropdown {{ request()->segment(1) === 'kategori' ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ session('name') }}
                        </a>
                        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item font-weight-bold" href="">Profile</a>
                            <a class="dropdown-item font-weight-bold" href="{{ route('do.logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item {{ request()->segment(1) === 'login' ? 'active' : '' }}"><a class="nav-link font-weight-bold" href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>