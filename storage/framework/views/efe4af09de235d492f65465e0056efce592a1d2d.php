<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new motor (Pembiayaan Dana)</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.motor_pembiayaan_dana.store')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>


                            

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" name="name" id="name" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('name')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="pabrikan_motor_id" class="col-sm-2 col-form-label text-md-right">Pabrikan Motor</label>
                                <div class="col-sm-10">
                                    <select name="pabrikan_motor_id" id="pabrikan_motor_id" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $list_pabrikan_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pabrikan_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($pabrikan_motor->id == old('pabrikan_motor_id') ? 'selected=""' : ''); ?> value="<?php echo e($pabrikan_motor->id); ?>"><?php echo e($pabrikan_motor->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('pabrikan_motor_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('pabrikan_motor_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.motor_pembiayaan_dana.index')); ?>" class="btn btn-secondary">Cancel</a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/motor_pembiayaan_dana/create.blade.php */ ?>