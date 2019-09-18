<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="<?php echo \App\ContentVariable::getValue('meta_description'); ?>">
        <meta name="author" content="<?php echo \App\ContentVariable::getValue('meta_author'); ?>">
        <meta name="keywords" content="<?php echo \App\ContentVariable::getValue('meta_keywords'); ?>">
        
        <title>Dana Syariah Motor</title>

        <link rel="manifest" href="/manifest.json" />

        

        
        <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('dsm_design/dist/css/main.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dsm_design/node_modules/font-awesome/css/font-awesome.min.css')); ?>">


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


        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="base-url" content="<?php echo e(URL::to('/')); ?>">

        

        

        <?php echo $__env->yieldContent('styles'); ?>
		<link rel="stylesheet" href="<?php echo e(asset('plugin/plugin/whatsapp-chat-support.css')); ?>">
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
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('akad-kredit')); ?>"><?php echo e(__('Pinjaman Syariah')); ?></a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('beli-motor')); ?>"><?php echo e(__('Motor Yamaha')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('gallery')); ?>"><?php echo e(__('Testimoni')); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(route('kontak-kami')); ?>"><?php echo e(__('Kontak Kami')); ?></a></li>
                        
                        <!-- Authentication Links -->

                        
                        
                        <?php if(Auth::guard('admin')->check()): ?>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::guard('admin')->user()->name); ?>  <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">
                                        <?php echo e(__('Dashboard')); ?>

                                    </a>
                                    
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
                            


                        <?php elseif(Auth::guard('spv_kredit_motor')->check()): ?>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::guard('spv_kredit_motor')->user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="<?php echo e(route('spv_kredit_motor.index')); ?>">
                                        <?php echo e(__('Profile')); ?>

                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('spv_kredit_motor.list_pengajuan_kredit_motor')); ?>">
                                        <?php echo e(__('Pengajuan Kredit Motor')); ?>

                                    </a>
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
                                    <i class="fa fa-bell"></i> <?php echo e(auth()->guard('spv_kredit_motor')->user()->notifications->count()); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->guard('spv_kredit_motor')->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a class="dropdown-item" href="<?php echo e($notification->data['url']); ?>"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item text-center" href="<?php echo e(route('spv_kredit_motor.notifications')); ?>"><small>See all notifications</small></a>
                                </div>
                            </li>
                        <?php elseif(Auth::guard('manager_pembiayaan_dana')->check()): ?>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::guard('manager_pembiayaan_dana')->user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="<?php echo e(route('manager_pembiayaan_dana.index')); ?>">
                                        <?php echo e(__('Profile')); ?>

                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('manager_pembiayaan_dana.list_pengajuan_pembiayaan_dana')); ?>">
                                        <?php echo e(__('Pengajuan Pembiayaan Dana')); ?>

                                    </a>
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
                                    <i class="fa fa-bell"></i> <?php echo e(auth()->guard('manager_pembiayaan_dana')->user()->notifications->count()); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->guard('manager_pembiayaan_dana')->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a class="dropdown-item" href="<?php echo e($notification->data['url']); ?>"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item text-center" href="<?php echo e(route('manager_pembiayaan_dana.notifications')); ?>"><small>See all notifications</small></a>
                                </div>
                            </li>

                        <?php elseif(Auth::guard('spv_pembiayaan_dana')->check()): ?>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::guard('spv_pembiayaan_dana')->user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="<?php echo e(route('spv_pembiayaan_dana.index')); ?>">
                                        <?php echo e(__('Profile')); ?>

                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('spv_pembiayaan_dana.list_pengajuan_pembiayaan_dana')); ?>">
                                        <?php echo e(__('Pengajuan Pembiayaan Dana')); ?>

                                    </a>
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
                                    <i class="fa fa-bell"></i> <?php echo e(auth()->guard('spv_pembiayaan_dana')->user()->notifications->count()); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->guard('spv_pembiayaan_dana')->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a class="dropdown-item" href="<?php echo e($notification->data['url']); ?>"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item text-center" href="<?php echo e(route('spv_pembiayaan_dana.notifications')); ?>"><small>See all notifications</small></a>
                                </div>
                            </li>

                        <?php elseif(Auth::guard('cs_kredit_motor')->check()): ?>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::guard('cs_kredit_motor')->user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="<?php echo e(route('cs_kredit_motor.index')); ?>">
                                        <?php echo e(__('Profile')); ?>

                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('cs_kredit_motor.list_pengajuan_kredit_motor')); ?>">
                                        <?php echo e(__('Pengajuan Kredit Motor')); ?>

                                    </a>
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
                                    <i class="fa fa-bell"></i> <?php echo e(auth()->guard('cs_kredit_motor')->user()->notifications->count()); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->guard('cs_kredit_motor')->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a class="dropdown-item" href="<?php echo e($notification->data['url']); ?>"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item text-center" href="<?php echo e(route('cs_kredit_motor.notifications')); ?>"><small>See all notifications</small></a>
                                </div>
                            </li>

                        <?php elseif(Auth::guard('cs_pembiayaan_dana')->check()): ?>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::guard('cs_pembiayaan_dana')->user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="<?php echo e(route('cs_pembiayaan_dana.index')); ?>">
                                        <?php echo e(__('Profile')); ?>

                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('cs_pembiayaan_dana.list_pengajuan_pembiayaan_dana')); ?>">
                                        <?php echo e(__('Pengajuan Pembiayaan Dana')); ?>

                                    </a>
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
                                    <i class="fa fa-bell"></i> <?php echo e(auth()->guard('cs_pembiayaan_dana')->user()->notifications->count()); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php $__empty_1 = true; $__currentLoopData = auth()->guard('cs_pembiayaan_dana')->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <a class="dropdown-item" href="<?php echo e($notification->data['url']); ?>"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item text-center" href="<?php echo e(route('cs_pembiayaan_dana.notifications')); ?>"><small>See all notifications</small></a>
                                </div>
                            </li>

                        <?php elseif(Auth::check()): ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    

                                    <a class="dropdown-item" href="<?php echo e(route('pengajuan_kredit_motor.index')); ?>">
                                        <?php echo e(__('Pengajuan Kredit Motor Anda')); ?>

                                    </a>

                                    <a class="dropdown-item" href="<?php echo e(route('pengajuan_pembiayaan_dana.index')); ?>">
                                        <?php echo e(__('Pengajuan Pembiayaan Dana Anda')); ?>

                                    </a>
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
                                        <a class="dropdown-item" href="<?php echo e($notification->data['url']); ?>"><small><?php echo $notification->data['message']; ?></small></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <a class="dropdown-item" href="#"><small>No new notifications</small></a>
                                    <?php endif; ?>
                                    <a class="dropdown-item text-center" href="<?php echo e(route('notifications')); ?>"><small>See all notifications</small></a>
                                </div>
                            </li>
                        <?php else: ?> 
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
                            <?php endif; ?>
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
                        <h3>Dana Syariah Motor</h3>
                        <p>
                            <?php echo \App\ContentVariable::getValue('alamat'); ?>

                        </p> 

                        <p>
                            <a href="<?php echo \App\ContentVariable::getValue('facebook_url'); ?>" class="mr-2"><img src="<?php echo e(asset('img/facebook.png')); ?>" alt="" style="height: 50px;"></a>
                            <a href="<?php echo \App\ContentVariable::getValue('instagram_url'); ?>" class="mr-2"><img src="<?php echo e(asset('img/instagram.png')); ?>" alt="" style="height: 50px;"></a>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h3>Dukungan</h3>
                        <ul class="list-unstyled">
                            <li><a class="text-white" href="<?php echo e(route('kontak-kami')); ?>">Tanya Kami</a></li>
                        </ul>
                        <h3 class="mb-3">
                            Partner Kami <br>
                            
                        </h3>
                        <ul class="list-unstyled">
                            <li>
                                <img data-src="<?php echo e(asset('dsm_design/dist/img/BAF.png')); ?>" class="lazy img-fluid" alt="" style="width: 35%;">
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex align-items-center">
                            <div class="col-6 col-md-6">
                                <img data-src="<?php echo e(asset('dsm_design/dist/img/mobile-app@2x.png')); ?>" class="lazy img-fluid" alt="">
                            </div>
                            <div class="col-6 col-md-6">
                                <h6>Semakin mudah dan nyaman dengan DANA SYARIAH MOTOR Mobile</h6>
                                <a href="#"><img data-src="<?php echo e(asset('dsm_design/dist/img/google-play-button.png')); ?>" class="lazy img-fluid" alt=""></a>
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
                                <img data-src="<?php echo e(asset('dsm_design/dist/img/logo-ojk@2x.png')); ?>" class="lazy img-fluid" alt="">
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
				<div class="wcs_popup_person" data-number="628976354043">
					<div class="wcs_popup_person_img">
						<img src="<?php echo e(asset('plugin/img/img_1.jpg')); ?>" alt="">
					</div>
					<div class="wcs_popup_person_content">
						<div class="wcs_popup_person_name">Tika Putri</div>
						<div class="wcs_popup_person_description">Customer Support</div>
						<div class="wcs_popup_person_status">+62 897-6354-043</div>
					</div>
				
				</div>
				<div class="wcs_popup_person" data-number="6285694121569">
					<div class="wcs_popup_person_img">
						<img src="<?php echo e(asset('plugin/img/img_2.jpg')); ?>" alt="">
					</div>
					<div class="wcs_popup_person_content">
						<div class="wcs_popup_person_name">Nendi</div>
						<div class="wcs_popup_person_description">Customer Support</div>
						<div class="wcs_popup_person_status">+62 856-9412-1569</div>
					</div>
				
				</div>
			</div>
            
        </div>
    </div>
    </body>

    <script src="<?php echo e(asset('dsm_design/node_modules/jquery/dist/jquery.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('dsm_design/node_modules/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dsm_design/node_modules/popper.js/dist/umd/popper.min.js')); ?>"></script>

    <script src="<?php echo e(asset('dsm_design/node_modules/jquery-lazy/jquery.lazy.min.js')); ?>"></script>

    <script src="<?php echo e(asset('jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

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
		   location.href='https://wa.me/'+number;
	   });
    </script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <?php if(Auth::guard('admin')->check()): ?>
        <script src="<?php echo e(asset('js/onesignal-admin.js')); ?>"></script>

    <?php elseif(Auth::guard('cs_kredit_motor')->check()): ?>
        <script src="<?php echo e(asset('js/onesignal-cs_kredit_motor.js')); ?>"></script>

    <?php elseif(Auth::guard('spv_kredit_motor')->check()): ?>
        <script src="<?php echo e(asset('js/onesignal-spv_kredit_motor.js')); ?>"></script>

    <?php elseif(Auth::guard('manager_pembiayaan_dana')->check()): ?>
        <script src="<?php echo e(asset('js/onesignal-manager_pembiayaan_dana.js')); ?>"></script>

    <?php elseif(Auth::guard('spv_pembiayaan_dana')->check()): ?>
        <script src="<?php echo e(asset('js/onesignal-spv_pembiayaan_dana.js')); ?>"></script>

    <?php elseif(Auth::guard('cs_pembiayaan_dana')->check()): ?>
        <script src="<?php echo e(asset('js/onesignal-cs_pembiayaan_dana.js')); ?>"></script>

    <?php elseif(Auth::check()): ?>
        <script src="<?php echo e(asset('js/onesignal-user.js')); ?>"></script>
    <?php else: ?> 
        
    <?php endif; ?>



    

    

    
    
    

    
    

    <?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /* /home/danasyariahmotor/public_html/resources/views/layouts/app.blade.php */ ?>