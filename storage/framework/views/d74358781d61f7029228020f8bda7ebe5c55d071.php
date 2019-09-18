<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('owl.carousel/dist/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('owl.carousel/dist/assets/owl.theme.default.min.css')); ?>">

    <style>

        .col-gallery{
            transition: all 0.3s ease-in-out;
        }

        .col-gallery__hidden{
            transform: scale(0);
        }

        .col-gallery__absolute{
            position: absolute;
            z-index: 99999;
        }

        .testimoni-carousel .owl-nav{
            position: absolute;
            top: 30%;
            transform: translateY(-50%);
            width: 100%;
        }

        .testimoni-carousel .owl-nav .owl-prev{
            position: absolute;
            left: -40px;
            font-size: 50px !important;
        }

        .testimoni-carousel .owl-nav .owl-next{
            position: absolute;
            right: -40px;
            font-size: 50px !important;
        }


        
        .grid_kredit_motor-sizer,
        .grid_kredit_motor-item{
            width: 33.333%;gallery
        }

        .grid_pembiayaan_dana-sizer,
        .grid_pembiayaan_dana-item{
            width: 33.333%;
        }

        @media (max-width: 991.98px) {
            .grid_kredit_motor-sizer,
            .grid_kredit_motor-item{
                width: 50%;
            }

            .grid_pembiayaan_dana-sizer,
            .grid_pembiayaan_dana-item{
                width: 50%;
            }
        }

        @media (max-width: 767.98px) {
            .grid_kredit_motor-sizer,
            .grid_kredit_motor-item{
                width: 50%;
            }

            .grid_pembiayaan_dana-sizer,
            .grid_pembiayaan_dana-item{
                width: 50%;
            }
        }

        

        @media (max-width: 575.98px) {
            .grid_kredit_motor-sizer,
            .grid_kredit_motor-item{
                width: 100%;
            }

            .grid_pembiayaan_dana-sizer,
            .grid_pembiayaan_dana-item{
                width: 100%;
            }
        }
        

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    

    <header class="main-header py-80 h-100 bg-gradient__lush text-white">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h2 text-center font-weight-light mb-5">Testimoni Dari Pembiayaan Dana Kami</p>
                </div>

                

                <?php $__currentLoopData = App\TestimoniGallery::where('type', 'pembiayaan_dana')->with('wilayah_pembiayaan_dana')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimoni_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 p-4 col-<?php echo e(str_slug($testimoni_gallery->wilayah_pembiayaan_dana->name)); ?>">
                        <div class="card border-0 shadow-sm">
                            <img src="<?php echo e(asset('uploads/'. $testimoni_gallery->photo)); ?>" alt="" class="img-fluid">
                            <div class="card-body text-dark">
                                <h4><?php echo e($testimoni_gallery->name); ?></h4>
                                <p class="text-muted"><small>Pelanggan Pembiayaan Dana (<?php echo e($testimoni_gallery->wilayah_pembiayaan_dana->name); ?>)</small></p>
                                <p><?php echo e($testimoni_gallery->message); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
        

    </header>
    

    <header class="main-header py-80 h-100">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h2 text-center font-weight-light mb-5">Testimoni Dari Konsumen Kredit Motor Kami</p>
                </div>
                <?php $__currentLoopData = App\WilayahKreditMotor::whereHas('testimoni_gallery')->with('testimoni_gallery')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_kredit_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 p-4">
                        <div class="card border-0 shadow-sm">
                            <img src="<?php echo e(asset('uploads/'. $testimoni_gallery->photo)); ?>" alt="" class="img-fluid">
                            <div class="card-body text-dark">
                                <h4><?php echo e($testimoni_gallery->name); ?></h4>
                                <p class="text-muted"><small>Pelanggan Kredit Motor (<?php echo e($testimoni_gallery->wilayah_kredit_motor->name); ?>)</small></p>
                                <p><?php echo e($testimoni_gallery->message); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </header>

    
        
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('isotope-layout/dist/isotope.pkgd.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){



            
            
                        

            // --------------------------------------------------------------------------

            $grid_kredit_motor = $('.grid_kredit_motor').isotope({
                // set itemSelector so .grid_kredit_motor-sizer is not used in layout
                itemSelector: '.grid_kredit_motor-item',
                percentPosition: true,
                masonry: {
                    // use element for option
                    columnWidth: '.grid_kredit_motor-sizer'
                }
            });

            $('.filter-buttons_kredit_motor').on( 'click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid_kredit_motor.isotope({ filter: filterValue });
            });



            $grid_pembiayaan_dana = $('.grid_pembiayaan_dana').isotope({
                // set itemSelector so .grid_pembiayaan_dana-sizer is not used in layout
                itemSelector: '.grid_pembiayaan_dana-item',
                percentPosition: true,
                masonry: {
                    // use element for option
                    columnWidth: '.grid_pembiayaan_dana-sizer'
                }
            });

            $('.filter-buttons_pembiayaan_dana').on( 'click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid_pembiayaan_dana.isotope({ filter: filterValue });
            });
            


            $(".testimoni-carousel").owlCarousel({
                loop:true,
                margin:10,
                
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        stagePadding: 100
                    },
                    600:{
                        items:1,
                        stagePadding: 100
                    },
                    1000:{
                        items:1,
                        stagePadding: 200
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/gallery.blade.php */ ?>