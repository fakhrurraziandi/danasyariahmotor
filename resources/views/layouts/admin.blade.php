<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ URL::to('/') }}">
        <title>Dana Syariah Motor</title>
        <!-- Custom fonts for this template-->
        <link href="{{asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        {{-- <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet"> --}}
        <!-- Custom styles for this template-->
        <link href="{{asset('sb-admin-2/css/custom/sb-admin-2.css')}}" rel="stylesheet">
        <link href="{{asset('css/backend.css')}}" rel="stylesheet">
        <link href="{{asset('select2/dist/css/select2.min.css')}}" rel="stylesheet">

        <link href="{{asset('lightbox2-master/dist/css/lightbox.min.css')}}" rel="stylesheet" />
        

        <script src="{{asset('sb-admin-2/vendor/jquery/jquery.min.js')}}"></script>
        
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient--lush sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Dashboard</div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Users Management
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.user.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.request_mitra.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Request Mitra</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.request_withdraw.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Request Withdraw</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.subscription_desktop_app.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Subscription Desktop App</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.spv_kredit_motor.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>SPV Kredit Motor</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.cs_kredit_motor.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>CS Kredit Motor</span>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.manager_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Manager Pembiayaan Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.spv_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>SPV Pembiayaan Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.cs_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-user"></i>
                        <span>CS Pembiayaan Dana</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                {{-- <div class="sidebar-heading">
                    Data Master
                </div> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.pabrikan_motor.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Pabrikan Motor</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.type_motor.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Type Motor</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.warna_motor.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Warna Motor</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.kapasitas_mesin.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Kapasitas Mesin</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.jenis_transmisi.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Jenis Transmisi</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.jenis_pembakaran.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Jenis Pembakaran</span>
                    </a>
                </li> --}}
                

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master Pembiayaan Dana
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.status_stnk.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Status STNK</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.status_bpkb.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Status BPKB</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.status_rumah.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Status Kepemilikan Rumah</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.wilayah_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Wilayah Pembiayaan Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.tempo_angsuran_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Tempo Angsuran P.Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.type_konsumen_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Type Konsumen P.Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.motor_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Motor P.Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.angsuran_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Table Angsuran P.Dana</span>
                    </a>
                </li>

                

                <hr class="sidebar-divider">
                <!-- Heading -->
                {{-- <div class="sidebar-heading">
                    Data Master Kredit Motor
                </div> --}}
                <!-- Nav Item - Pages Collapse Menu -->

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.wilayah_kredit_motor.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Wilayah Kredit Motor</span>
                    </a>
                </li> --}}

                
                

                

                

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.tempo_angsuran_motor.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Tempo Angsuran Motor</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.kategori_spesifikasi.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Kategori Spesifikasi Motor</span>
                    </a>
                </li> --}}
    

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.motor.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Motor</span>
                    </a>
                </li> --}}

                

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Pengajuan
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.pengajuan_pembiayaan_dana.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Pengajuan P. Dana</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.pengajuan_kredit_motor.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Pengajuan Kredit Motor</span>
                    </a>
                </li> --}}
                

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Lain-lain
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.contact_message.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Contact Message</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.testimoni_gallery.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Testimoni Gallery</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.content_variable.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Content Variable</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.faq.index')}}">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>FAQ</span>
                    </a>
                </li>
                
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-dark bg-dark topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Search -->
                        {{-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-warning" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-warning" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
						
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">{{auth()->guard('admin')->user()->notifications->count()}}</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>

                                    
                                    @forelse(auth()->guard('admin')->user()->notifications as $notification)
									@if($loop->iteration == 5)
										@break
									@endif
									
                                        <a class="dropdown-item" href="{{$notification->data['url']}}"><small>{!!$notification->data['message']!!}</small></a>
                                    @empty
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    @endforelse

                                    <a class="dropdown-item" href="{{route('admin.notification.notifications')}}"><small>See all notifications</small></a>
                                

                                    {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-file-alt text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 12, 2019</div>
                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-success">
                                                <i class="fas fa-donate text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 7, 2019</div>
                                            $290.29 has been deposited into your account!
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">December 2, 2019</div>
                                            Spending Alert: We've noticed unusually high spending for your account.
                                        </div>
                                    </a> --}}
                                    {{-- <a class="dropdown-item small text-gray-500" href="#">Show All Alerts</a> --}}
                                </div>
                            </li>
                            
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600">{{ Auth::user()->name }}</span>
                                {{-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> --}}
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{route('admin.edit_profile')}}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Edit Profile
                                    </a>
                                    <a class="dropdown-item" href="{{route('admin.change_password')}}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Change Password
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    
                    @yield('content')

                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                        <a class="btn btn-warning" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JavaScript-->
        
        <script src="{{asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{asset('sb-admin-2/js/sb-admin-2.min.js')}}"></script>
        <!-- Page level plugins -->
        {{-- <script src="{{asset('sb-admin-2/vendor/chart.js/Chart.min.js')}}"></script> --}}
        <!-- Page level custom scripts -->
        {{-- <script src="{{asset('sb-admin-2/js/demo/chart-area-demo.js')}}"></script> --}}
        {{-- <script src="{{asset('sb-admin-2/js/demo/chart-pie-demo.js')}}"></script> --}}
        <script src="{{asset('js/backend.js')}}"></script>
        <script src="{{asset('select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{asset('jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>

        <script src="{{asset('lightbox2-master/dist/js/lightbox.min.js')}}"></script>


        <script>
            const base_url = '<?php URL::to('/'); ?>';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

        @if(Auth::guard('admin')->check())
            <script src="{{asset('js/onesignal-admin.js')}}"></script>
        @endif

        @yield('scripts')


    </body>
</html>