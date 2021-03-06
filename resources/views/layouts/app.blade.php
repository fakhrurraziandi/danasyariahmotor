<!doctype html>
<html lang="id">
    <head>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142284104-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-142284104-1');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="{!!\App\ContentVariable::getValue('meta_description')!!}">
        <meta name="author" content="{!!\App\ContentVariable::getValue('meta_author')!!}">
        <meta name="keywords" content="{!!\App\ContentVariable::getValue('meta_keywords')!!}">
        
        <title>@yield('seo_title')</title>

        <link rel="manifest" href="/manifest.json" />

        

        
        <link rel="canonical" href="https://danasyariahmotor.com/">
        <!-- Bootstrap core CSS -->
    


        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">


        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ URL::to('/') }}">
        

        @yield('styles')
       
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

       

        <script src="{{asset('dsm_design/node_modules/jquery/dist/jquery.min.js')}}"></script>
        
    </head>
    <body>

        

        
        


        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('dsm_design/dist/img/navbar-logo@2x.png')}}" alt="navbar-logo@2x.png" style="width: 150px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">


                        
                        
                        <!-- Authentication Links -->

                        
                        
                        @if(Auth::guard('admin')->check())
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('admin')->user()->name }}  <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> {{auth()->guard('admin')->user()->notifications->count()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->guard('admin')->user()->notifications as $notification)
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse
                                    <a class="dropdown-item text-center" href="{{route('admin.notifications')}}"><small>See all notifications</small></a>
                                </div>
                            </li> --}}


                        @elseif(Auth::guard('spv_kredit_motor')->check())
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('spv_kredit_motor')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{route('spv_kredit_motor.index')}}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('spv_kredit_motor.list_pengajuan_kredit_motor')}}">
                                        {{ __('Pengajuan Kredit Motor') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> {{auth()->guard('spv_kredit_motor')->user()->notifications->count()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->guard('spv_kredit_motor')->user()->notifications as $notification)
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse
                                    <a class="dropdown-item text-center" href="{{route('spv_kredit_motor.notifications')}}"><small>See all notifications</small></a>
                                </div>
                            </li>
                        @elseif(Auth::guard('manager_pembiayaan_dana')->check())
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('manager_pembiayaan_dana')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{route('manager_pembiayaan_dana.index')}}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('manager_pembiayaan_dana.list_pengajuan_pembiayaan_dana')}}">
                                        {{ __('Pengajuan Pembiayaan Dana') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> {{auth()->guard('manager_pembiayaan_dana')->user()->notifications->count()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->guard('manager_pembiayaan_dana')->user()->notifications as $notification)
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse
                                    <a class="dropdown-item text-center" href="{{route('manager_pembiayaan_dana.notifications')}}"><small>See all notifications</small></a>
                                </div>
                            </li>

                        @elseif(Auth::guard('spv_pembiayaan_dana')->check())
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('spv_pembiayaan_dana')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{route('spv_pembiayaan_dana.index')}}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('spv_pembiayaan_dana.list_pengajuan_pembiayaan_dana')}}">
                                        {{ __('Pengajuan Pembiayaan Dana') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> {{auth()->guard('spv_pembiayaan_dana')->user()->notifications->count()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->guard('spv_pembiayaan_dana')->user()->notifications as $notification)
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse
                                    <a class="dropdown-item text-center" href="{{route('spv_pembiayaan_dana.notifications')}}"><small>See all notifications</small></a>
                                </div>
                            </li>

                        @elseif(Auth::guard('cs_kredit_motor')->check())
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('cs_kredit_motor')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{route('cs_kredit_motor.index')}}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('cs_kredit_motor.list_pengajuan_kredit_motor')}}">
                                        {{ __('Pengajuan Kredit Motor') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> {{auth()->guard('cs_kredit_motor')->user()->notifications->count()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->guard('cs_kredit_motor')->user()->notifications as $notification)
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse
                                    <a class="dropdown-item text-center" href="{{route('cs_kredit_motor.notifications')}}"><small>See all notifications</small></a>
                                </div>
                            </li>

                        @elseif(Auth::guard('cs_pembiayaan_dana')->check())
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('cs_pembiayaan_dana')->user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{route('cs_pembiayaan_dana.index')}}">
                                        {{ __('Profile') }}
                                    </a>

                                    <a class="dropdown-item" href="{{route('cs_pembiayaan_dana.list_pengajuan_pembiayaan_dana')}}">
                                        {{ __('Pengajuan Pembiayaan Dana') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> {{auth()->guard('cs_pembiayaan_dana')->user()->notifications->count()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->guard('cs_pembiayaan_dana')->user()->notifications as $notification)
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse
                                    <a class="dropdown-item text-center" href="{{route('cs_pembiayaan_dana.notifications')}}"><small>See all notifications</small></a>
                                </div>
                            </li>

                        @elseif(Auth::check())
                            <li class="nav-item"><a class="nav-link" title="Dana Syariah Motor" href="{{route('tentang-kami')}}">{{ __('Tentang Kami') }}</a></li>
                            <li class="nav-item"><a class="nav-link" title="Dana Syariah Motor" href="{{route('akad-kredit')}}">{{ __('Ajukan Sekarang') }}</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" title="Dana Syariah Motor" href="{{route('pengajuan-online')}}">{{ __('Pengajuan Online') }}</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" title="Dana Syariah Motor" href="{{route('beli-motor')}}">{{ __('Beli Motor') }}</a></li> --}}
                            <li class="nav-item"><a class="nav-link" title="Dana Syariah Motor" href="{{route('gallery')}}">{{ __('Testimoni') }}</a></li>
                            <li class="nav-item"><a class="nav-link" title="Dana Syariah Motor" href="{{route('faq')}}">{{ __('Pertanyaan Umum') }}</a></li>
                            <li class="nav-item"><a class="nav-link" title="Dana Syariah Motor" href="{{route('mitra-kami')}}">{{ __('Mitra Kami') }}</a></li>
                            

                            <?php $user = Auth::user(); ?>

                            @if($user->mitra_status !== 2)
                                <li class="nav-item"><a class="nav-link" href="{{route('mitra')}}">{{ __('Join Mitra') }}</a></li>
                            @endif

                            <li class="nav-item"><a class="nav-link" href="{{route('kontak-kami')}}">{{ __('Kontak Kami') }}</a></li>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    {{-- <a class="dropdown-item" href="#">
                                        {{ __('Profile') }}
                                     </a> --}}

                                    {{-- <a class="dropdown-item" href="{{route('pengajuan_kredit_motor.index')}}">
                                        {{ __('Pengajuan Kredit Motor Anda') }}
                                     </a> --}}
                                    <a class="dropdown-item" href="{{route('dashboard_user.index')}}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{route('dashboard_user.edit_password')}}">{{ __('Ganti Password') }}</a>
                                    <a class="dropdown-item" href="{{route('dashboard_user.pengajuan_pembiayaan_dana')}}">{{ __('Pengajuan Pembiayaan Dana Anda') }}</a>

                                    <?php $user = Auth::user(); ?>

                                    @if($user->mitra_status !== 2)
                                        <a class="dropdown-item" href="{{route('mitra-request')}}">
                                            {{ __('Ingin Jadi Mitra Kami') }}
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{route('dashboard_user.dokumentasi_mitra')}}">
                                            {{ __('Panduan Cara Kerja Mitra') }}
                                        </a>
                                        <a class="dropdown-item" href="{{route('dashboard_user.pengajuan_pembiayaan_dana_mitra')}}">
                                            {{ __('Pengajuan Pembiayaan Dana Customer Anda') }}
                                        </a>
                                        <a class="dropdown-item" href="{{route('dashboard_user.withdraw_cart')}}">
                                            {{ __('Keranjang Komisi') }}
                                        </a>
                                        <a class="dropdown-item" href="{{route('dashboard_user.withdraw_request')}}">
                                            {{ __('Pengajuan Komisi') }}
                                        </a>
                                        <a class="dropdown-item" href="{{route('dashboard_user.subscription_desktop_app')}}">
                                            {{ __('Langganan Desktop App') }}
                                        </a>
                                        <a class="dropdown-item" href="{{route('dashboard_user.get_widget')}}">
                                            {{ __('Tambahkan Widget Banner') }}
                                        </a>
                                    @endif

                                   
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> {{auth()->user()->notifications->count()}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->user()->notifications as $notification)
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse
                                    <a class="dropdown-item text-center" href="{{route('notifications')}}"><small>See all notifications</small></a>
                                </div>
                            </li>
                        @else 

                            <li class="nav-item"><a class="nav-link" href="{{route('tentang-kami')}}">{{ __('Tentang Kami') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('akad-kredit')}}">{{ __('Ajukan Sekarang') }}</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="{{route('pengajuan-online')}}">{{ __('Pengajuan Online') }}</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="{{route('beli-motor')}}">{{ __('Beli Motor') }}</a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="{{route('gallery')}}">{{ __('Testimoni') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('faq')}}">{{ __('Pertanyaan Umum') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('mitra-kami')}}">{{ __('Mitra Kami') }}</a></li>
                            @if(!session()->has('mitra_code'))
                                <li class="nav-item"><a class="nav-link" href="{{route('mitra')}}">{{ __('Join Mitra') }}</a></li>
                            @endif
                            
                            <li class="nav-item"><a class="nav-link" href="{{route('kontak-kami')}}">{{ __('Kontak Kami') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a></li>
                            @endif
                        @endif

                        
                    </ul>
                </div>
            </div>
        </nav>


        @yield('content')

        <footer class="py-50 bg-success text-white">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-3">
                        <h3>Dana Syariah Motor</h3>
                        <p>
                            {!!\App\ContentVariable::getValue('alamat')!!}
                        </p> 

                        <p>
                            <a href="{!!\App\ContentVariable::getValue('facebook_url')!!}" class="mr-2"><img src="{{asset('img/facebook.png')}}" alt="Dana Syariah Motor" style="height: 50px;"></a>
                            <a href="{!!\App\ContentVariable::getValue('instagram_url')!!}" class="mr-2"><img src="{{asset('img/instagram.png')}}" alt="Dana Syariah Motor" style="height: 50px;"></a>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h3>Dukungan</h3>
                        <ul class="list-unstyled">
                            <li><a class="text-white" href="{{route('kontak-kami')}}">Tanya Kami</a></li>
                        </ul>
                        <h3 class="mb-3">
                            Peluang Bisnis
                        </h3>
                        <ul class="list-unstyled">
                            <li><a class="text-white" href="{{route('mitra')}}">Mau Jadi Mitra Kami?</a></li>
                            <li>
                                {{-- <img data-src="{{asset('dsm_design/dist/img/BAF.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor" style="width: 35%;"> --}}
                            </li>
                        </ul>
                    </div>

                    @if(!preg_match('/Mobile-App/i', request()->header('User-Agent')))

                        <div class="col-md-6">
                            <div class="row d-flex align-items-center">
                                <div class="col-6 col-md-6">
                                    <img data-src="{{asset('dsm_design/dist/img/mobile-app@2x.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                                </div>
                                <div class="col-6 col-md-6">
                                    <h5>Semakin mudah dan nyaman dengan DANA SYARIAH MOTOR Mobile</h5>
                                    <a href="https://play.google.com/store/apps/details?id=com.danasyariahmotor.dsm"><img data-src="{{asset('dsm_design/dist/img/google-play-button.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor"></a>
                                </div>
                            </div>
                            
                        </div>

                    @endif
                </div>
            </div>
        </footer>

        <footer class="bg-gradient__lush text-white py-4 py-md-1">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <p><i class="fa fa-copyright"></i> 2018 - Dana Syariah Motor By Taufik Marie</p>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-9">
                                <p>Terdaftar dan diawasi oleh Otoritas Jasa Keuangan</p>
                            </div>
                            <div class="col-md-3">
                                <img data-src="{{asset('dsm_design/dist/img/logo-ojk@2x.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        {{-- <script src="//code.jivosite.com/widget.js" jv-id="xbT2SaLT9r" async></script> --}}
        {{-- <script src="//code.jivosite.com/widget.js" jv-id="5ouNZHF8XF" async></script> --}}


        
         <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
        /*(function(){ var widget_id = '5ouNZHF8XF';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
        s.src = '//code.jivosite.com/script/widget/'+widget_id
            ; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
        if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
        else{w.addEventListener('load',l,false);}}})();*/
        </script>
        <!-- {/literal} END JIVOSITE CODE -->
        
		<div class="whatsapp_chat_support wcs_fixed_right wcs-effect-2 wcs_show" id="example_3">

            <div class="wcs_button_label">
                    Ada Pertanyaan?
                </div>  
            <div class="wcs_button wcs_button_circle">
                <span class="fa fa-whatsapp"></span>
            </div>  
        
            <div class="wcs_popup">
                <div class="wcs_popup_close">
                    <span class="fa fa-close"></span>
                </div>
                <div class="wcs_popup_header">
                   
                <div class="wcs_popup_header_description">Ada Bertanya ? Chat Disini</div>
                </div>
                
                <div class="wcs_popup_person_container">
                	  <div class="wcs_popup_person" data-number="628155554188">
                        <div class="wcs_popup_person_img">
                            <img src="{{ asset('plugin/img/vinny.jpg')}}" alt="Dana Syariah Motor">
                        </div>
                        <div class="wcs_popup_person_content">
                            <div class="wcs_popup_person_name">VINNY CS USER</div>
                            <div class="wcs_popup_person_status">SEDANG ONLINE SILAKAN CHAT</div>
                        </div>
                   </div> 
                    <div class="wcs_popup_person" data-number="628122015550">
                        <div class="wcs_popup_person_img">
                            <img src="{{ asset('plugin/img/rika.jpg')}}" alt="Dana Syariah Motor">
                        </div>
                        <div class="wcs_popup_person_content">
                            <div class="wcs_popup_person_name">RIKA CS USER</div>
                            <div class="wcs_popup_person_status">SEDANG ONLINE SILAKAN CHAT</div>
                        </div>
                   </div>   
                   <div class="wcs_popup_person" data-number="628562151122">
                        <div class="wcs_popup_person_img">
                            <img src="{{ asset('plugin/img/vio.jpg')}}" alt="Dana Syariah Motor">
                        </div>
                        <div class="wcs_popup_person_content">
                            <div class="wcs_popup_person_name">VIO STAF CS MITRA</div>
                            <div class="wcs_popup_person_status">SEDANG ONLINE SILAKAN CHAT</div>
                        </div>
                    </div> 
                 </div>
            </div>
                
        </div> 
    </div>

</body>

    
    <script src="{{asset('codeseven-toastr/build/toastr.min.js')}}"></script>
    {{-- <script src="{{asset('fake_toastr.js')}}"></script> --}}
    
    
    <script src="{{asset('dsm_design/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('dsm_design/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('dsm_design/node_modules/jquery-lazy/jquery.lazy.min.js')}}"></script>

    <script src="{{asset('jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>

    <script src="{{asset('lightbox2-master/dist/js/lightbox.min.js')}}"></script>
    
    <script src="{{asset('js/app.js')}}"></script>

    <script>
        var base_url = "<?php URL::to('/'); ?>";
        $(function(){
            $('.lazy').Lazy();
        });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
     <script>
       
	   $(".wcs_button.wcs_button_circle").click(function(){
			 $('#example_3').toggleClass("wcs-show");
			 $(".wcs_button_label").toggleClass("wcs_button_label_hide");
			 $(".wcs_popup").css("visibility","visible");
	   });
	   $(".wcs_popup_close").click(function(){
			 $('#example_3').toggleClass("wcs-show");
			 $(".wcs_button_label").toggleClass("wcs_button_label_hide");
			 $(".wcs_popup").css("visibility","hidden");
	   });
	   $(".wcs_popup_person").click(function(){
		   var number=$(this).attr("data-number");
		   location.href='https://wa.me/'+number+'?text=*Assalamualaikum*%20*Wr*%20*Wb*%20%0ANama%20Saya%20:%20.....%20%0ASaya%20Mau%20bertanya%20:%20 .....';
	   });
    </script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    @if(Auth::guard('admin')->check())
        <script src="{{asset('js/onesignal-admin.js')}}"></script>

    @elseif(Auth::guard('cs_kredit_motor')->check())
        <script src="{{asset('js/onesignal-cs_kredit_motor.js')}}"></script>

    @elseif(Auth::guard('spv_kredit_motor')->check())
        <script src="{{asset('js/onesignal-spv_kredit_motor.js')}}"></script>

    @elseif(Auth::guard('manager_pembiayaan_dana')->check())
        <script src="{{asset('js/onesignal-manager_pembiayaan_dana.js')}}"></script>

    @elseif(Auth::guard('spv_pembiayaan_dana')->check())
        <script src="{{asset('js/onesignal-spv_pembiayaan_dana.js')}}"></script>

    @elseif(Auth::guard('cs_pembiayaan_dana')->check())
        <script src="{{asset('js/onesignal-cs_pembiayaan_dana.js')}}"></script>

    @elseif(Auth::check())
        <script src="{{asset('js/onesignal-user.js')}}"></script>
    @else 
        
    @endif



    

    

    
    
    

    
    

    @yield('scripts')
</html>