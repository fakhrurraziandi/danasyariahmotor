<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new user</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('backend.user.store')); ?>" method="POST">

                            <?php echo e(csrf_field()); ?>


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
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" id="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('email')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" id="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
                                        <?php if($errors->has('password')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('password')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role_id">Role</label>
                                        <select class="form-control <?php echo e($errors->has('role_id') ? 'is-invalid' : ''); ?>" id="role_id" name="role_id" placeholder="Role">
                                            <option></option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('role_id') == $role->id ? 'selected=""' : ''); ?> value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('role_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('role_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <script>
                                    $(function(){
                                        function onChangeRoleIdhandler(){
                                            var role_id = $('#role_id').val();

                                            if(role_id == 3){ // SPV Pinjaman Dana
                                                $('.col-spv_pinjaman_dana_wilayah_id').show();
                                            }else{
                                                $('.col-spv_pinjaman_dana_wilayah_id').hide();
                                            }

                                            if(role_id == 4){ // CS Pinjaman Dana
                                                $('.col-cs_pinjaman_dana_wilayah_id').show();
                                            }else{
                                                $('.col-cs_pinjaman_dana_wilayah_id').hide();
                                            }

                                            if(role_id == 5){ // SPV Kredit Motor
                                                $('.col-spv_kredit_motor_wilayah_id').show();
                                            }else{
                                                $('.col-spv_kredit_motor_wilayah_id').hide();
                                            }

                                            if(role_id == 6){ // CS Kredit Motor
                                                $('.col-cs_kredit_motor_wilayah_id').show();
                                            }else{
                                                $('.col-cs_kredit_motor_wilayah_id').hide();
                                            }

                                            

                                            
                                        }
                                        onChangeRoleIdhandler();
                                        $('#role_id').on('change', onChangeRoleIdhandler);
                                    });
                                </script>

                                <div class="col-md-6 col-cs_kredit_motor_wilayah_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="cs_kredit_motor_wilayah_id">Wilayah</label>
                                        <select class="form-control <?php echo e($errors->has('cs_kredit_motor_wilayah_id') ? 'is-invalid' : ''); ?>" id="cs_kredit_motor_wilayah_id" name="cs_kredit_motor_wilayah_id" placeholder="Wilayah">
                                            <option></option>
                                            <?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('cs_kredit_motor_wilayah_id') == $wilayah->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('cs_kredit_motor_wilayah_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('cs_kredit_motor_wilayah_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-cs_pinjaman_dana_wilayah_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="cs_pinjaman_dana_wilayah_id">Wilayah</label>
                                        <select class="form-control <?php echo e($errors->has('cs_pinjaman_dana_wilayah_id') ? 'is-invalid' : ''); ?>" id="cs_pinjaman_dana_wilayah_id" name="cs_pinjaman_dana_wilayah_id" placeholder="Wilayah">
                                            <option></option>
                                            <?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('cs_pinjaman_dana_wilayah_id') == $wilayah->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('cs_pinjaman_dana_wilayah_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('cs_pinjaman_dana_wilayah_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-spv_pinjaman_dana_wilayah_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="spv_pinjaman_dana_wilayah_id">Wilayah</label>
                                        <select class="form-control <?php echo e($errors->has('spv_pinjaman_dana_wilayah_id') ? 'is-invalid' : ''); ?>" id="spv_pinjaman_dana_wilayah_id" name="spv_pinjaman_dana_wilayah_id" placeholder="Wilayah">
                                            <option></option>
                                            <?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('spv_pinjaman_dana_wilayah_id') == $wilayah->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('spv_pinjaman_dana_wilayah_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('spv_pinjaman_dana_wilayah_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 col-spv_kredit_motor_wilayah_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="spv_kredit_motor_wilayah_id">Wilayah</label>
                                        <select class="form-control <?php echo e($errors->has('spv_kredit_motor_wilayah_id') ? 'is-invalid' : ''); ?>" id="spv_kredit_motor_wilayah_id" name="spv_kredit_motor_wilayah_id" placeholder="Wilayah">
                                            <option></option>
                                            <?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('spv_kredit_motor_wilayah_id') == $wilayah->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('spv_kredit_motor_wilayah_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('spv_kredit_motor_wilayah_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('backend.user.index')); ?>" class="btn btn-secondary">Cancel</a>
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
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\dsm\resources\views/backend/user/create.blade.php */ ?>