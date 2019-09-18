<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Profile <small class="h6"><a href="<?php echo e(route('cs_kredit_motor.edit_profile')); ?>"><i class="fa fa-pencil"></i> Edit Profile</a></small></h1>
    <hr>
    <form>

        <div class="form-group row align-items-center">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" readonly class="form-control-plaintext" id="email" name="email" value="<?php echo e(old('email', $cs_kredit_motor->email)); ?>">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="name" name="name" value="<?php echo e(old('name', $cs_kredit_motor->name)); ?>">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="phone_number" class="col-sm-3 col-form-label">Phone Number </label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="phone_number" name="phone_number" value="<?php echo e(old('phone_number', $cs_kredit_motor->phone_number)); ?>">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="phone_number" class="col-sm-3 col-form-label">Wilayah </label>
            <div class="col-sm-9">
                <?php $__currentLoopData = $cs_kredit_motor->wilayah_kredit_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_kredit_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge badge-primary"><?php echo e($wilayah_kredit_motor->name); ?></span> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
    </form>
                                    
               
   

        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cs_kredit_motor.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/cs_kredit_motor/index.blade.php */ ?>