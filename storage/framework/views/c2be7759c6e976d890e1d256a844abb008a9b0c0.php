<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="base-url" content="<?php echo e(URL::to('/')); ?>">
        <title>Dana Syariah Motor</title>
        <!-- Custom fonts for this template-->
        <link href="<?php echo e(asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
        <!-- Custom styles for this template-->
        <link href="<?php echo e(asset('sb-admin-2/css/custom/sb-admin-2.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/backend.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('select2/dist/css/select2.min.css')); ?>" rel="stylesheet">
        

        <script src="<?php echo e(asset('sb-admin-2/vendor/jquery/jquery.min.js')); ?>"></script>
        
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient--lush sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('admin.dashboard')); ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Dashboard</div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
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
                    <a class="nav-link" href="<?php echo e(route('admin.user.index')); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.spv_kredit_motor.index')); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>SPV Kredit Motor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.cs_kredit_motor.index')); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>CS Kredit Motor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.manager_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Manager Pembiayaan Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.spv_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>SPV Pembiayaan Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.cs_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-user"></i>
                        <span>CS Pembiayaan Dana</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.pabrikan_motor.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Pabrikan Motor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.type_motor.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Type Motor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.warna_motor.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Warna Motor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.kapasitas_mesin.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Kapasitas Mesin</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.jenis_transmisi.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Jenis Transmisi</span>
                    </a>
                </li>
                

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master Pembiayaan Dana
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.status_stnk.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Status STNK</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.status_bpkb.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Status BPKB</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.status_rumah.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Status Kepemilikan Rumah</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.wilayah_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Wilayah Pembiayaan Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.tempo_angsuran_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Tempo Angsuran P.Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.type_konsumen_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Type Konsumen P.Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.motor_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Motor P.Dana</span>
                    </a>
                </li>

                

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master Kredit Motor
                </div>
                <!-- Nav Item - Pages Collapse Menu -->

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.wilayah_kredit_motor.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Wilayah Kredit Motor</span>
                    </a>
                </li>

                
                

                

                

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.tempo_angsuran_motor.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Tempo Angsuran Motor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.motor.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Motor</span>
                    </a>
                </li>

                

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Pengajuan
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.pengajuan_pembiayaan_dana.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Pengajuan P. Dana</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.pengajuan_kredit_motor.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Pengajuan Kredit Motor</span>
                    </a>
                </li>
                

                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Lain-lain
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.contact_message.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Contact Message</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.testimoni_gallery.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Testimoni Gallery</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('admin.content_variable.index')); ?>">
                        <i class="fas fa-fw fa-circle"></i>
                        <span>Content Variable</span>
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
                                    <span class="badge badge-danger badge-counter"><?php echo e(auth()->guard('admin')->user()->notifications->count()); ?></span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>

                                    
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->guard('admin')->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<?php if($loop->iteration == 5): ?>
										<?php break; ?>
									<?php endif; ?>
									
                                        <a class="dropdown-item" href="<?php echo e($notification->data['url']); ?>"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    <?php endif; ?>

                                    <a class="dropdown-item" href="<?php echo e(route('admin.notification.notifications')); ?>"><small>See all notifications</small></a>
                                

                                    
                                    
                                </div>
                            </li>
                            
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"><?php echo e(Auth::user()->name); ?></span>
                                
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('admin.change_password')); ?>">
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
                    
                    <?php echo $__env->yieldContent('content'); ?>

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

                        <a class="btn btn-warning" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JavaScript-->
        
        <script src="<?php echo e(asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo e(asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo e(asset('sb-admin-2/js/sb-admin-2.min.js')); ?>"></script>
        <!-- Page level plugins -->
        
        <!-- Page level custom scripts -->
        
        
        <script src="<?php echo e(asset('js/backend.js')); ?>"></script>
        <script src="<?php echo e(asset('select2/dist/js/select2.full.min.js')); ?>"></script>
        <script src="<?php echo e(asset('jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')); ?>"></script>

        <script>
            const base_url = '<?php URL::to('/'); ?>';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

        <?php if(Auth::guard('admin')->check()): ?>
            <script src="<?php echo e(asset('js/onesignal-admin.js')); ?>"></script>
        <?php endif; ?>

        <?php echo $__env->yieldContent('scripts'); ?>


    </body>
</html>
<?php /* /home/danasyariahmotor/public_html/resources/views/layouts/admin.blade.php */ ?>