<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new testimoni gallery</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.testimoni_gallery.store')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" id="name" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>">
                                        <?php if($errors->has('name')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('name')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control <?php echo e($errors->has('photo') ? 'is-invalid' : ''); ?>" id="photo" name="photo" placeholder="Photo">
                                        <?php if($errors->has('photo')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('photo')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control <?php echo e($errors->has('message') ? 'is-invalid' : ''); ?>" id="message" name="message" placeholder="Message" rows="7"><?php echo e(old('message')); ?></textarea>
                                        <?php if($errors->has('message')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('message')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.testimoni_gallery.index')); ?>" class="btn btn-secondary">Cancel</a>
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
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/admin/testimoni_gallery/create.blade.php */ ?>