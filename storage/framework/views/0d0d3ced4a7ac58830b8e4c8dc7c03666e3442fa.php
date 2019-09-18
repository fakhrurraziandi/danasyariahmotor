<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit pabrikan motor</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.pabrikan_motor.update', $pabrikan_motor->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" id="name" name="name" placeholder="Name" value="<?php echo e(old('name', $pabrikan_motor->name)); ?>">
                                        <?php if($errors->has('name')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('name')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('slug') ? 'is-invalid' : ''); ?>" id="slug" name="slug" placeholder="Slug" value="<?php echo e(old('slug', $pabrikan_motor->slug)); ?>">
                                        <?php if($errors->has('slug')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('slug')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control <?php echo e($errors->has('logo') ? 'is-invalid' : ''); ?>" id="logo" name="logo" placeholder="Logo" rows="5" />
                                        <small class="form-text text-muted">Abaikan jika anda tidak ingin mengganti logo</small>
                                        <?php if($errors->has('logo')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('logo')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.pabrikan_motor.index')); ?>" class="btn btn-secondary">Cancel</a>
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

            

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/pabrikan_motor/edit.blade.php */ ?>