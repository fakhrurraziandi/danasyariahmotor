<?php  
use App\Wilayah;
use App\SpvKreditMotor;
?>



<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit cs kredit motor</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.cs_kredit_motor.update', $cs_kredit_motor->id)); ?>" method="POST">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" id="name" name="name" placeholder="Name" value="<?php echo e(old('name', $cs_kredit_motor->name)); ?>">
                                        <?php if($errors->has('name')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('name')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" id="email" name="email" placeholder="Email" value="<?php echo e(old('email', $cs_kredit_motor->email)); ?>">
                                        <?php if($errors->has('email')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('email')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('phone_number') ? 'is-invalid' : ''); ?>" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php echo e(old('phone_number', $cs_kredit_motor->phone_number)); ?>">
                                        <?php if($errors->has('phone_number')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('phone_number')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wilayah_kredit_motor_ids">Wilayah</label>
                                        <select class="form-control <?php echo e($errors->has('wilayah_kredit_motor_ids') ? 'is-invalid' : ''); ?>" id="wilayah_kredit_motor_ids" name="wilayah_kredit_motor_ids[]" placeholder="Wilayah" multiple="">
                                            <?php $__currentLoopData = $list_wilayah_kredit_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_kredit_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(in_array($wilayah_kredit_motor->id, $cs_kredit_motor->wilayah_kredit_motor_ids) ? 'selected=""' : ''); ?> value="<?php echo e($wilayah_kredit_motor->id); ?>"><?php echo e($wilayah_kredit_motor->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('wilayah_kredit_motor_ids')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('wilayah_kredit_motor_ids')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="spv_kredit_motor_id">SPV Kredit Motor</label>
                                        <select class="form-control <?php echo e($errors->has('spv_kredit_motor_id') ? 'is-invalid' : ''); ?>" id="spv_kredit_motor_id" name="spv_kredit_motor_id" placeholder="SPV Kredit Motor">
                                            <option value="">:: SPV Kredit Motor ::</option>
                                            <?php $list_spv_kredit_motor = SpvKreditMotor::all(); ?>

                                            <?php $__currentLoopData = $list_spv_kredit_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('spv_kredit_motor_id', $cs_kredit_motor->spv_kredit_motor_id) == $wilayah->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('spv_kredit_motor_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('spv_kredit_motor_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                                

                            

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.cs_kredit_motor.index')); ?>" class="btn btn-secondary">Cancel</a>
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

            $('#wilayah_kredit_motor_ids').select2();

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/admin/cs_kredit_motor/edit.blade.php */ ?>