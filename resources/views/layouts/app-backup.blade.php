<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{asset('img/logo@2x.png')}}" class="img-fluid" style="width: 150px" alt="Dana Syariah Motor">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('tentang-kami')}}">{{ __('Tentang Kami') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('akad-kredit')}}">{{ __('Akad Kredit Syariah') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('pengajuan-online')}}">{{ __('Pengajuan Online') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('beli-motor')}}">{{ __('Beli Motor') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">{{ __('Kontak Kami') }}</a></li>
                        <!-- Authentication Links -->
                        @guest
                            
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    @if(Auth::user()->hasRole('administrator'))
                                        <a class="dropdown-item" href="{{ route('backend.dashboard') }}">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')

            <footer class="section section-footer bg-primary text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Dana Syariah</h5>
                            <p>
                                Kantor Pusat <br>
                                Menara Mulia building <br>
                                Jl. Gatt Subroto Kav.9-11 <br>
                                Jakarta 12930 <br>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h5>Dukungan</h5>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">Karir</a></li>
                                <li><a href="#" class="text-white">Tanya Kami</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <img class="img-fluid" src="{{asset('img/mobile-app@2x.png')}}" alt="Dana Syariah Motor">
                        </div>
                        <div class="col-md-3">
                            <p>Semakin mudah dan nyaman dengan DANA SYARIAH Mobile</p>
                            <img src="{{asset('img/google-play-button.png')}}" alt="Dana Syariah Motor" class="img-fluid">
                        </div>
                    </div>
                </div>
            </footer>

            <nav class="navbar navbar-dark bg-gradient--lush">
                <div class="container">
                    <a class="navbar-brand" href="#">@ 2019 - Dana Syariah</a>
                    <span class="navbar-text">
                        Terdaftar dan diawasi oleh Otoritas Jasa Keuangan <img src="{{asset('img/logo-ojk.png')}}" alt="Dana Syariah Motor">
                    </span>
                </div>
            </nav>
        </main>


    </div>
</body>
</html>
