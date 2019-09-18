<?php $__env->startSection('content'); ?>

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-20">Notifications</small></h1>
                <hr>

                <div class="list-group">
                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <a href="<?php echo e($notification->data['url']); ?>" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between py-3">
                            <h5 class="mb-1"><?php echo e($notification->data['title']); ?></h5>
                            <small><?php echo e($notification->created_at->diffForHumans()); ?></small>
                        </div>
                        <p class="mb-1"><?php echo $notification->data['message']; ?></p>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-center">There is no notification at this time</p>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/notifications.blade.php */ ?>