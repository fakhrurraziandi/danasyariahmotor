<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new type motor</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('backend.typemotor.store')); ?>" method="POST" enctype="multipart/form-data">

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
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('slug') ? 'is-invalid' : ''); ?>" id="slug" name="slug" placeholder="Slug" value="<?php echo e(old('slug')); ?>">
                                        <?php if($errors->has('slug')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('slug')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control <?php echo e($errors->has('harga') ? 'is-invalid' : ''); ?>" id="harga" name="harga" placeholder="Harga" value="<?php echo e(old('harga')); ?>">
                                        <?php if($errors->has('harga')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('harga')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pabrikan_motor_id">Pabrikan Motor</label>
                                        <select class="form-control <?php echo e($errors->has('pabrikan_motor_id') ? 'is-invalid' : ''); ?>" id="pabrikan_motor_id" name="pabrikan_motor_id" placeholder="Pabrikan Motor" value="<?php echo e(old('pabrikan_motor_id')); ?>">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $pabrikanmotor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pabrikanmotor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($pabrikanmotor->id); ?>"><?php echo e($pabrikanmotor->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('pabrikan_motor_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('pabrikan_motor_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control <?php echo e($errors->has('photo') ? 'is-invalid' : ''); ?>" id="photo" name="photo" placeholder="Photo" rows="5" />
                                        <?php if($errors->has('photo')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('photo')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('backend.typemotor.index')); ?>" class="btn btn-secondary">Cancel</a>
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
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/backend/typemotor/create.blade.php */ ?>