<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Change Password</h6>
                    </div>
                    <div class="card-body">
                        <?php if(Session::get('update_password_success')): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> update password is success!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        

                        <form action="<?php echo e(route('admin.update_password')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <div class="form-group row ">
                                <label for="old_password" class="col-sm-3 col-form-label">Old Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?php echo e($errors->has('old_password') ? 'is-invalid' : ''); ?>" id="old_password" name="old_password">
                                    <?php if($errors->has('old_password')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('old_password')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control <?php echo e($errors->has('old_password') ? 'is-invalid' : ''); ?>" id="new_password" name="new_password">
                                    <?php if($errors->has('new_password')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('new_password')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                            </div>

                            <div class="form-group row ">
                                <label for="new_password_confirmation" class="col-sm-3 col-form-label">Retype New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row ">
                                
                                <div class="col-sm-9 offset-sm-3">
                                    <a href="<?php echo e(route('cs_pembiayaan_dana.index')); ?>" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/change_password.blade.php */ ?>