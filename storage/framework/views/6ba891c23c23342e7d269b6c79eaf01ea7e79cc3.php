<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <title>Dana Syariah Motor</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('dsm_design/dist/css/main.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dsm_design/node_modules/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(asset('dsm_design/dist/img/navbar-logo@2x.png')); ?>" alt="" style="width: 150px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('tentang-kami')); ?>"><?php echo e(__('Tentang Kami')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('akad-kredit')); ?>"><?php echo e(__('Akad Kredit Syariah')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('pengajuan-online')); ?>"><?php echo e(__('Pengajuan Online')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('beli-motor')); ?>"><?php echo e(__('Beli Motor')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><?php echo e(__('Kontak Kami')); ?></a></li>
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                            <?php endif; ?>
                        <?php else: ?>
                             
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php if(Auth::user()->hasRole('member')): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('pengajuan_kredit_motor.index')); ?>">
                                            <?php echo e(__('Pengajuan Kredit Motor Anda')); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if(Auth::user()->hasRole('administrator')): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('backend.dashboard')); ?>">
                                            <?php echo e(__('Dashboard')); ?>

                                        </a>
                                    <?php endif; ?>
                                    
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>

                                    
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-bell"></i> <?php echo e(auth()->user()->notifications->count()); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a class="dropdown-item" href="#"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#">No Notification</a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>


        <?php echo $__env->yieldContent('content'); ?>

        <footer class="py-50 bg-success text-white">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-3">
                        <h3>Dana Syariah</h3>
                        <p>Kantor Pusat <br>
                        Menara Mulia Building <br>
                        Jl. Gatot Subroto Kav.9-11 <br>
                        Jakarta 12930 </p> 
                    </div>
                    <div class="col-md-3">
                        <h3>Dukungan</h3>
                        <ul class="list-unstyled">
                            <li><a class="text-white" href="#">Karir</a></li>
                            <li><a class="text-white" href="#">Tanya Kami</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6">
                                <img data-src="<?php echo e(asset('dsm_design/dist/img/mobile-app@2x.png')); ?>" class="lazy img-fluid" alt="">
                            </div>
                            <div class="col-md-6">
                                <h6>Semakin mudah dan nyaman dengan DANA SYARIAH Mobile</h6>
                                <a href="#"><img data-src="<?php echo e(asset('dsm_design/dist/img/google-play-button.png')); ?>" class="lazy img-fluid" alt=""></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>

        <footer class="bg-gradient__lush text-white py-1">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6">
                        <p><i class="fa fa-copyright"></i> 2019 - Dana Syariah</p>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-9">
                                <p>Terdaftar dan diawasi oleh Otoritas Jasa Keuangan</p>
                            </div>
                            <div class="col-md-3">
                                <img data-src="<?php echo e(asset('dsm_design/dist/img/logo-ojk@2x.png')); ?>" class="lazy img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        
    </body>

    <script src="<?php echo e(asset('dsm_design/node_modules/jquery/dist/jquery.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('dsm_design/node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dsm_design/node_modules/popper.js/dist/umd/popper.min.js')); ?>"></script>

    <script src="<?php echo e(asset('dsm_design/node_modules/jquery-lazy/jquery.lazy.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>



    <script>
        $(function(){
            $('.lazy').Lazy();
        });
    </script>

    <script>
        const base_url = '<?php URL::to('/'); ?>';
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /* C:\xampp\htdocs\dsm\resources\views/layouts/app.blade.php */ ?>