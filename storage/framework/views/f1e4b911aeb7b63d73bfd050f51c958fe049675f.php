<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Notifications</small></h1>
    <hr>

    <div class="list-group">
        <?php $__empty_1 = true; $__currentLoopData = $cs_kredit_motor->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e($notification->data['url']); ?>" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between py-3">
                <p class="mb-1"><?php echo $notification->data['message']; ?></p>    
                <small><?php echo e($notification->created_at->diffForHumans()); ?></small>
            </div>
            
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center">There is no notification at this time</p>
        <?php endif; ?>
        
    </div>

        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cs_kredit_motor.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/cs_kredit_motor/notifications.blade.php */ ?>