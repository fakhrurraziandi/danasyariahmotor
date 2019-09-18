<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Profile <small class="h6"><a href="<?php echo e(route('manager_pembiayaan_dana.edit_profile')); ?>"><i class="fa fa-pencil"></i> Edit Profile</a></small></h1>
    <hr>
    <form>

        <div class="form-group row align-items-center">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" readonly class="form-control-plaintext" id="email" name="email" value="<?php echo e(old('email', $manager_pembiayaan_dana->email)); ?>">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="name" name="name" value="<?php echo e(old('name', $manager_pembiayaan_dana->name)); ?>">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="phone_number" class="col-sm-3 col-form-label">Phone Number </label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="phone_number" name="phone_number" value="<?php echo e(old('phone_number', $manager_pembiayaan_dana->phone_number)); ?>">
            </div>
        </div>

        
    </form>
                                    
               
   

        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('manager_pembiayaan_dana.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/manager_pembiayaan_dana/index.blade.php */ ?>