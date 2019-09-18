<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new Photo Motor</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('backend.photo_motor.store', $motor->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>



                            <div class="form-group row">
                                <label for="photo" class="col-sm-2 col-form-label text-md-right">Upload Photo</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control <?php echo e($errors->has('photo') ? 'is-invalid' : ''); ?>" name="photo" id="photo">
                                    <?php if($errors->has('photo')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('photo')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    <a href="<?php echo e(route('backend.motor.index')); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>

                            

                            
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    
    <script>
        $(function(){

            $('#warna_motor_ids').select2();
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/backend/photo_motor/create.blade.php */ ?>