<header class="main-header pt-80 pb-0 h-100 bg-gradient__lush text-white h-100">

        
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-8">
                        <div class="mb-50">
                            <h1><?php echo e($cs_kredit_motor->name); ?></h1>
                            
                            <ul class="list-unstyled">
                                <li class="media d-flex align-items-top">
                                    <i class="fa fa-flag mr-2 mt-2 d-inline-block" style="width: 20px;"></i>
                                    <div class="media-body">
                                        Customer Service
                                    </div>
                                </li>

                                <li class="media d-flex align-items-top">
                                    <i class="fa fa-trophy mr-2 mt-2 d-inline-block" style="width: 20px;"></i>
                                    <div class="media-body">
                                        
                                        Started on <?php echo e($cs_kredit_motor->created_at->diffForHumans()); ?>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 2.25rem;">
                            <div class="card-body">
                                <img data-src="<?php echo e($cs_kredit_motor->photo_profile ? asset('uploads/'. $cs_kredit_motor->photo_profile) : asset('img/no-image.gif')); ?>" class="lazy img-fluid" alt="">    
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="user-profile-photo rounded-lg" style="overflow: hidden;">
                    <img data-src="dist/img/Group 1927.jpg" class="lazy img-fluid" alt="">    
                </div> -->


                
            </div>
            


        </div>


    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item mr-2">
                        <a class="nav-link active" href="<?php echo e(route('cs_kredit_motor.index')); ?>">My Profile</a>
                    </li>
                    
                    <li class="nav-item mr-2">
                        <a class="nav-link active" href="<?php echo e(route('cs_kredit_motor.change_password')); ?>">Ganti Password</a>
                    </li>

                    <li class="nav-item mr-2">
                        <a class="nav-link active" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/cs_kredit_motor/header.blade.php */ ?>