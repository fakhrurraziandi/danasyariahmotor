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
        <link rel="stylesheet" href="<?php echo e(asset('dsm_design/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dsm_design/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css')); ?>">
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
                                    <a class="nav-link text-success" href="#"><i class="fa fa-phone"></i> 021 2345 678</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-success" href="#"><i class="fa fa-whatsapp"></i> 0812 345 67890</a>
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
                            <a href="<?php echo e(route('home')); ?>"><img data-src="<?php echo e(asset('dsm_design/dist/img/logo-light@2x.png')); ?>" class="lazy img-fluid" alt=""></a>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        
                                        <select class="custom-select" id="inputGroupSelect01" >
                                            <option selected>Pilih Kategori</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <input type="text" class="form-control" placeholder="Cari Motor di DSM" aria-label="Cari Motor di DSM" aria-describedby="button-addon2" style="flex: 6;">
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
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
                                                
                                                <button class="btn btn-warning my-2 my-sm-0" type="submit">Produk Kami</button>
                                            </form>
                                            <ul class="navbar-nav mr-auto px-2">
                                                <li class="nav-item ">
                                                    <a class="nav-link text-white" href="#">Bengkel</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white" href="#">Forum</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-white" href="#">Berita</a>
                                                </li>
                                            </ul>
                                            
                                            <?php if(auth()->guard()->guest()): ?>
                                                <form class="form-inline my-2 my-lg-0">
                                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-warning my-2 my-sm-0">Masuk</a>
                                                </form>
                                            <?php else: ?>
                                                <ul class="navbar-nav ml-auto px-2">
                                                    
                                                    <li class="nav-item dropdown">
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                               onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                                                <?php echo e(__('Logout')); ?>

                                                            </a>

                                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                                <?php echo csrf_field(); ?>
                                                            </form>

                                                            <?php if(Auth::user()->hasRole('administrator')): ?>
                                                                <a class="dropdown-item" href="<?php echo e(route('backend.dashboard')); ?>">
                                                                    <?php echo e(__('Dashboard')); ?>

                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                                    
                                            <?php endif; ?>

                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
    <script src="<?php echo e(asset('dsm_design/node_modules/owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dsm_design/node_modules/jquery-lazy/jquery.lazy.min.js')); ?>"></script>

    <script>
        $(function(){
            $('.lazy').Lazy();
        });
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /* C:\xampp\htdocs\dsm\resources\views/layouts/app2.blade.php */ ?>