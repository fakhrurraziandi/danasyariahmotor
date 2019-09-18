<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('owl.carousel/dist/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('owl.carousel/dist/assets/owl.theme.default.min.css')); ?>">

    <style>
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
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <header class="main-header py-80 h-100 bg-gradient__lush text-white h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="owl-carousel testimoni-carousel">
                    <?php $__currentLoopData = App\TestimoniGallery::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimoni_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="text-center">
                            <h3 class="mb-4"><?php echo e($testimoni_gallery->name); ?></h3>
                            <div class="card border-0 shadow-sm mb-4 mx-3">
                                <div class="card-body p-2">
                                    <img src="<?php echo e(asset('uploads/'. $testimoni_gallery->photo)); ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                            <p><?php echo e($testimoni_gallery->message); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = App\TestimoniGallery::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimoni_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="text-center">
                            <h3 class="mb-4"><?php echo e($testimoni_gallery->name); ?></h3>
                            <div class="card border-0 shadow-sm mb-4 mx-3">
                                <div class="card-body p-2">
                                    <img src="<?php echo e(asset('uploads/'. $testimoni_gallery->photo)); ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                            <p><?php echo e($testimoni_gallery->message); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </header>
        
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            $(".testimoni-carousel").owlCarousel({
                stagePadding: 100,
                loop: true,
                nav: true
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/gallery.blade.php */ ?>