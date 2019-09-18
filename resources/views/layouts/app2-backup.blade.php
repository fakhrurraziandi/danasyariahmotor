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
        
        <div class="fixed-top">
            <div class="bg-warning py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row text-success">
                                <div class="col-md-4">CUSTOMER SERVICE</div>
                                <div class="col-md-4"><i class="fa fa-phone"></i> 021  2345 678</div>
                                <div class="col-md-4"><i class="fa fa-whatsapp"></i> 0812 345 67890</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient--lush py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 text-center mb-4 mb-lg-0">
                            <img src="{{asset('img/logo-light@2x.png')}}" class="img-fluid" alt="Dana Syariah Motor">
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn text-success bg-white dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button">Button</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <nav class="navbar navbar-expand-lg navbar-light px-0">
                                       
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link nav-link---sm-warning text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        PRODUK KAMI
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white" href="#">BENGKEL </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white" href="#">FORUM</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white" href="#">BERITA</a>
                                                </li>
                                            </ul>

                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link nav-link---sm-white text-white" href="#">MASUK</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                                   
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

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
