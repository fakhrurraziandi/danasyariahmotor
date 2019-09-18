<?php use App\Wilayah; ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new user</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.user.store')); ?>" method="POST">

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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_handphone_1">No Handphone 1</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('no_handphone_1') ? 'is-invalid' : ''); ?>" id="no_handphone_1" name="no_handphone_1" placeholder="No Handphone 1" value="<?php echo e(old('no_handphone_1')); ?>">
                                        <?php if($errors->has('no_handphone_1')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('no_handphone_1')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_handphone_2">No Handphone 2</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('no_handphone_2') ? 'is-invalid' : ''); ?>" id="no_handphone_2" name="no_handphone_2" placeholder="No Handphone 2" value="<?php echo e(old('no_handphone_2')); ?>">
                                        <?php if($errors->has('no_handphone_2')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('no_handphone_2')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_identitas">Jenis Identitas</label>
                                        <select class="form-control <?php echo e($errors->has('jenis_identitas') ? 'is-invalid' : ''); ?>" id="jenis_identitas" name="jenis_identitas" placeholder="No Handphone 2" >
                                            <option value="">:: Jenis Identitas ::</option>
                                            <option <?php echo e(old('jenis_identitas') == 'KTP' ? 'selected=""' : ''); ?> value="KTP">KTP</option>
                                            <option <?php echo e(old('jenis_identitas') == 'SIM' ? 'selected=""' : ''); ?> value="SIM">SIM</option>
                                        </select>
                                        <?php if($errors->has('jenis_identitas')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('jenis_identitas')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_identitas">No Identitas</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('no_identitas') ? 'is-invalid' : ''); ?>" id="no_identitas" name="no_identitas" placeholder="No Identitas" value="<?php echo e(old('no_identitas')); ?>">
                                        <?php if($errors->has('no_identitas')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('no_identitas')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('tempat_lahir') ? 'is-invalid' : ''); ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo e(old('tempat_lahir')); ?>">
                                        <?php if($errors->has('tempat_lahir')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('tempat_lahir')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control <?php echo e($errors->has('tanggal_lahir') ? 'is-invalid' : ''); ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tempat Lahir" value="<?php echo e(old('tanggal_lahir')); ?>">
                                        <?php if($errors->has('tanggal_lahir')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('tanggal_lahir')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wilayah_id">Wilayah</label>
                                        <select class="form-control <?php echo e($errors->has('wilayah_id') ? 'is-invalid' : ''); ?>" id="wilayah_id" name="wilayah_id" placeholder="Wilayah">
                                            <option value="">:: Wilayah ::</option>
                                            <?php $list_wilayah = Wilayah::all(); ?>

                                            <?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('wilayah_id') == $wilayah->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('wilayah_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('wilayah_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control <?php echo e($errors->has('alamat') ? 'is-invalid' : ''); ?>" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo e(old('alamat')); ?>"></textarea>
                                        <?php if($errors->has('alamat')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('alamat')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                
                                
                                

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.user.index')); ?>" class="btn btn-secondary">Cancel</a>
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
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/admin/user/create.blade.php */ ?>