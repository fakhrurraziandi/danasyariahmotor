<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Notifications
                    </div>
                    <div class="card-body">

                        <div class="list-group">
                            <?php $__empty_1 = true; $__currentLoopData = $admin->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <a href="<?php echo e($notification->data['url']); ?>" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between py-3">
                                    <p class="mb-1"><?php echo $notification->data['message']; ?></p>    
                                    
                                    <small>
									<button data-id="<?php echo $notification->id; ?>" style="z-index:99999" type="button"  class="btn btn-outline-secondary btn_trash">
									  <i class="fas fa-trash fa-fw"></i>
									</button>
									</small>
                                </div>
                                <small><?php echo e($notification->created_at->diffForHumans()); ?></small>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-center">There is no notification at this time</p>
                            <?php endif; ?>
                            
                        </div>
						
                    </div>
                </div>

            </div>
        </div>
    </div>
	<script>
		$(function(){
			$(".btn_trash").click(function(e){
				e.preventDefault();
				if(confirm('Hapus Notif')){
					window.location='/admin/notifications/remove/'+$(this).attr("data-id");
				};
				
			});
		});
	</script>
	
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/notification/notifications.blade.php */ ?>