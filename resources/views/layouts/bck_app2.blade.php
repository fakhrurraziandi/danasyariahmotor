<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="{!!\App\ContentVariable::getValue('meta_description')!!}">
        <meta name="author" content="{!!\App\ContentVariable::getValue('meta_author')!!}">
        <meta name="keywords" content="{!!\App\ContentVariable::getValue('meta_keywords')!!}">
        
        <title>{!!\App\ContentVariable::getValue('website_title')!!}</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{asset('dsm_design/dist/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('dsm_design/node_modules/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('dsm_design/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('dsm_design/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{ asset('plugin/plugin/whatsapp-chat-support.css') }}">
    </head>
    <body class="bg-light" style="padding-top: 0 !important;">
        <div class="">
            <nav class="bg-warning text-white shadow-sm">
                <nav class="navbar navbar-expand-md navbar-light bg-warning text-success shadow-sm">
                    <div class="container">
                        <a class="navbar-brand text-success" style="font-size: 0.875rem;" href="#">
                            Customer Service
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-success" href="#">
                                        <i class="fa fa-phone"></i> 
                                        {!!\App\ContentVariable::getValue('phone_number')!!}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-success" href="https://api.whatsapp.com/send?phone={!!\App\ContentVariable::getValue('whatsapp_number')!!}"><i class="fa fa-whatsapp"></i> {!!\App\ContentVariable::getValue('whatsapp_number')!!}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
            </nav>
            <div class="bg-gradient__lush py-4">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-2 text-center">
                            <a href="{{route('home')}}"><img data-src="{{asset('dsm_design/dist/img/logo-light@2x.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor"></a>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="GET" action="{{route('beli-motor')}}">
                                        
                                        @if(request()->has('type_motor_ids'))
                                            @foreach(request()->get('type_motor_ids') as $type_motor_id)
                                                <input type="hidden" name="type_motor_ids[]" value="{{$type_motor_id}}">
                                            @endforeach
                                        @endif

                                        @if(request()->has('warna_motor_ids'))
                                            @foreach(request()->get('warna_motor_ids') as $warna_motor_id)
                                                <input type="hidden" name="warna_motor_ids[]" value="{{$warna_motor_id}}">
                                            @endforeach
                                        @endif

                                        @if(request()->has('kapasitas_mesin_ids'))
                                            @foreach(request()->get('kapasitas_mesin_ids') as $kapasitas_mesin_id)
                                                <input type="hidden" name="kapasitas_mesin_ids[]" value="{{$kapasitas_mesin_id}}">
                                            @endforeach
                                        @endif

                                        @if(request()->has('tahun'))
                                            @foreach(request()->get('tahun') as $tahun)
                                                <input type="hidden" name="tahun[]" value="{{$tahun}}">
                                            @endforeach
                                        @endif

                                        <div class="input-group mb-3">
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari Motor di DSM" aria-label="Cari Motor di DSM" aria-describedby="button-addon2" style="flex: 6;" value="{{request()->get('keyword')}}">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-warning" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <nav class="navbar navbar-expand-lg px-md-0">
                                        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <form class="form-inline my-2 my-lg-0">
                                                <a href="{{route('beli-motor')}}" class="btn btn-warning my-2 my-sm-0 mr-1">Motor Baru Yamaha</a>
                                                <a href="#" class="btn btn-warning my-2 my-sm-0 mr-1">Bengkel Resmi</a>
                                                <a href="#" class="btn btn-warning my-2 my-sm-0 mr-1">Motor Bekas</a>
                                                <a href="#" class="btn btn-warning my-2 my-sm-0 mr-1">Tips & Trick</a>
                                                <a href="#" class="btn btn-warning my-2 my-sm-0 mr-1">Tentang Kami</a>
                                                
                                            </form>
                                            {{-- <ul class="navbar-nav mr-auto px-2">
                                                <li class="nav-item ">
                                                    <a class="nav-link text-white" href="#">Bengkel</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white" href="#">Forum</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white" href="#">Berita</a>
                                                </li>
                                            </ul> --}}

                                            
                                            
                                           
                                            <ul class="navbar-nav ml-auto px-2">
                                                @if(Auth::guard('admin')->check())
                        
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            <i class="fa fa-bell"></i> {{auth()->guard('admin')->user()->notifications->count()}}
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @forelse(auth()->guard('admin')->user()->notifications as $notification)
                                                                <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                                            @empty
                                                                <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                                            @endforelse
                                                            <a class="dropdown-item text-center" href="{{route('cs_kredit_motor.notifications')}}"><small>See all notifications</small></a>
                                                        </div>
                                                    </li>


                                                @elseif(Auth::guard('spv_kredit_motor')->check())
                                                    
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                                        <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            <i class="fa fa-bell"></i> {{auth()->guard('spv_kredit_motor')->user()->notifications->count()}}
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @forelse(auth()->guard('spv_kredit_motor')->user()->notifications as $notification)
                                                                <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                                            @empty
                                                                <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                                            @endforelse
                                                            <a class="dropdown-item text-center" href="{{route('cs_kredit_motor.notifications')}}"><small>See all notifications</small></a>
                                                        </div>
                                                    </li>

                                                @elseif(Auth::guard('spv_pembiayaan_dana')->check())
                                                    
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                                        <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            <i class="fa fa-bell"></i> {{auth()->guard('spv_pembiayaan_dana')->user()->notifications->count()}}
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            @forelse(auth()->guard('spv_pembiayaan_dana')->user()->notifications as $notification)
                                                                <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                                            @empty
                                                                <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                                            @endforelse
                                                            <a class="dropdown-item text-center" href="{{route('cs_pembiayaan_dana.notifications')}}"><small>See all notifications</small></a>
                                                        </div>
                                                    </li>

                                                @elseif(Auth::guard('cs_kredit_motor')->check())
                                                    
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ Auth::guard('cs_kredit_motor')->user()->name }} <span class="caret"></span>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        
                                                            <a class="dropdown-item" href="{{route('cs_kredit_motor.index')}}">
                                                                {{ __('Profile') }}
                                                            </a>

                                                            <a class="dropdown-item" href="{{route('cs_kredit_motor.list_pengajuan_kredit_motor')}}">
                                                                {{ __('Pengajuan Kredit Motor') }}pengajuan_pembiayaan_dana
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
                                                        <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ Auth::guard('cs_pembiayaan_dana')->user()->name }} <span class="caret"></span>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        
                                                            <a class="dropdown-item" href="{{route('cs_pembiayaan_dana.index')}}">
                                                                {{ __('Profile') }}
                                                            </a>

                                                            <a class="dropdown-item" href="{{route('cs_pembiayaan_dana.list_pengajuan_pembiayaan_dana')}}">
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
                                                        <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            {{ Auth::user()->name }} <span class="caret"></span>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                        
                                                            {{-- <a class="dropdown-item" href="#">
                                                                {{ __('Profile') }}
                                                            </a> --}}

                                                            <a class="dropdown-item" href="{{route('pengajuan_kredit_motor.index')}}">
                                                                {{ __('Pengajuan Kredit Motor Anda') }}
                                                            </a>

                                                            <a class="dropdown-item" href="{{route('pengajuan_pembiayaan_dana.index')}}">
                                                                {{ __('Pengajuan Pembiayaan Dana Anda') }}
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
                                                        <a id="navbarDropdown" class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                                    @if (Route::has('register'))
                                                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                                    @endif
                                                @endif
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
                            Partner Kami <br>
                            
                        </h3>
                        <ul class="list-unstyled">
                            <li>
                                <img data-src="{{asset('dsm_design/dist/img/BAF.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor" style="width: 35%;">
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex align-items-center">
                            <div class="col-6 col-md-6">
                                <img data-src="{{asset('dsm_design/dist/img/mobile-app@2x.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                            </div>
                            <div class="col-6 col-md-6">
                                <h6>Semakin mudah dan nyaman dengan DANA SYARIAH MOTOR Mobile</h6>
                                <a href="#"><img data-src="{{asset('dsm_design/dist/img/google-play-button.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor"></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>

        <footer class="bg-gradient__lush text-white py-4 py-md-1">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <p><i class="fa fa-copyright"></i> 2019 - Dana Syariah Motor</p>
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
                Ada Pertanyaan ?
            </div>  
        <div class="wcs_button wcs_button_circle">
            <span class="fa fa-whatsapp"></span>
        </div>  
     
        <div class="wcs_popup">
            <div class="wcs_popup_close">
                <span class="fa fa-close"></span>
            </div>
            <div class="wcs_popup_header">
                <span class="fa fa-whatsapp"></span>
                <strong>Customer Support DSM</strong>
                
            <div class="wcs_popup_header_description">Butuh Bantuan? Chat whatsapp staf kami</div>
            </div>
			
			<div class="wcs_popup_person_container">
				<div class="wcs_popup_person" data-number="628155554188">
					<div class="wcs_popup_person_img">
						<img src="{{ asset('plugin/img/astrie.jpg')}}" alt="Dana Syariah Motor">
					</div>
					<div class="wcs_popup_person_content">
						<div class="wcs_popup_person_name">Astrie</div>
						<div class="wcs_popup_person_description">Customer Support</div>
						<div class="wcs_popup_person_status">+6281 5555 4188</div>
					</div>
				
				</div>

			</div>
            
        </div>
    </div>
        
    </body>

    <script src="{{asset('dsm_design/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dsm_design/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dsm_design/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('dsm_design/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dsm_design/node_modules/jquery-lazy/jquery.lazy.min.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>

    <script>
        $(function(){
            $('.lazy').Lazy();
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
		   location.href='https://wa.me/'+number;
	   });
    </script>
    @yield('scripts')
</html>