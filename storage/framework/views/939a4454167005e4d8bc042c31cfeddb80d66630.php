<?php $__env->startSection('content'); ?>
<div class="container" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                
                <h2 class="text-center font-weight-light">Registrasi</h2>
                <hr>
                <br>
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap Sesuai KTP</label>
                                <input type="text" class="form-control custom-form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="name" name="name" placeholder="Nama Lengkap" value="<?php echo e(old('name')); ?>" required autofocus>
                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control custom-form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="email" name="email" placeholder="Email Anda" value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password"><?php echo e(__('Password')); ?></label>
                                <input id="password" type="password" class="form-control custom-form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="Password">
                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password-confirm"><?php echo e(__('Confirm Password')); ?></label>
                                <input id="password-confirm" type="password" class="form-control custom-form-control" name="password_confirmation" required placeholder="Confirm Password">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_handphone_1">No Handphone 1</label>
                                <input type="text" class="form-control custom-form-control <?php echo e($errors->has('no_handphone_1') ? ' is-invalid' : ''); ?>" id="no_handphone_1" name="no_handphone_1" placeholder="No Handphone" value="<?php echo e(old('no_handphone_1')); ?>">
                                <?php if($errors->has('no_handphone_1')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('no_handphone_1')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_handphone_2">No Handphone 2</label>
                                <input type="text" class="form-control custom-form-control <?php echo e($errors->has('no_handphone_2') ? ' is-invalid' : ''); ?>" id="no_handphone_2" name="no_handphone_2" placeholder="No Handphone (Jika ada)" value="<?php echo e(old('no_handphone_2')); ?>">
                                <?php if($errors->has('no_handphone_2')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('no_handphone_2')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jenis_identitas">Kartu Identitas</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-control custom-form-control <?php echo e($errors->has('jenis_identitas') ? ' is-invalid' : ''); ?>" id="jenis_identitas" name="jenis_identitas" placeholder="Jenis Identitas">
                                                    <option value="">:: Jenis Identitas ::</option>
                                                    <option <?php echo e((old('jenis_identitas') == 'KTP') ? 'selected=""' : ''); ?> value="KTP">KTP</option>
                                                    <option <?php echo e((old('jenis_identitas') == 'SIM') ? 'selected=""' : ''); ?> value="SIM">SIM</option>
                                                </select>
                                                <?php if($errors->has('jenis_identitas')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('jenis_identitas')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" class="form-control custom-form-control <?php echo e($errors->has('no_identitas') ? ' is-invalid' : ''); ?>" id="no_identitas" name="no_identitas" placeholder="No Identitas" value="<?php echo e(old('no_identitas')); ?>">
                                                <?php if($errors->has('no_identitas')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('no_identitas')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                                
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="wilayah_id">Kota</label>
                                        <select class="form-control custom-form-control <?php echo e($errors->has('wilayah_id') ? ' is-invalid' : ''); ?>" id="wilayah_id" name="wilayah_id" placeholder="Kota">
                                            <option value="">:: Kota ::</option>
                                            <?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('wilayah_id')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('wilayah_id')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat/Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control custom-form-control <?php echo e($errors->has('tempat_lahir') ? ' is-invalid' : ''); ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                                                <?php if($errors->has('tempat_lahir')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('tempat_lahir')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="date" class="form-control custom-form-control <?php echo e($errors->has('tanggal_lahir') ? ' is-invalid' : ''); ?>" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tempat Lahir">
                                                <?php if($errors->has('tanggal_lahir')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('tanggal_lahir')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                                
                                    </div>
                                </div>
                            </div>
                                   
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea rows="6" class="form-control  <?php echo e($errors->has('alamat') ? ' is-invalid' : ''); ?>" id="alamat" name="alamat" placeholder="Alamat"><?php echo e(old('alamat')); ?></textarea>
                                <?php if($errors->has('alamat')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('alamat')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                       
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="py-50">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="agreement_1">
                                    <label class="custom-control-label" for="agreement_1">Saya setuju menerima Informasi dari Dana Syariah dan Rekanan dari Dana Syariah</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="agreement_2">
                                    <label class="custom-control-label" for="agreement_2">Saya setuju dengan syarat dan ketentuan Dana Syariah</label>
                                </div>
                            </div>

                            <p class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </p>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\dsm\resources\views/auth/register.blade.php */ ?>