<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit Pengajuan Pembiayaan Dana</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.pengajuan_pembiayaan_dana.update', $pengajuan_pembiayaan_dana->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id">User</label>
                                        <select class="form-control <?php echo e($errors->has('user_id') ? 'is-invalid' : ''); ?>" id="user_id" name="user_id">
                                            <?php $__currentLoopData = \App\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('user_id', $pengajuan_pembiayaan_dana->user_id) == $user->id ? 'selected=""' : ''); ?> value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('user_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('user_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wilayah_pembiayaan_dana_id">Wilayah Pembiayaan Dana</label>
                                        <select class="form-control <?php echo e($errors->has('wilayah_pembiayaan_dana_id') ? 'is-invalid' : ''); ?>" id="wilayah_pembiayaan_dana_id" name="wilayah_pembiayaan_dana_id" >
                                            <?php $__currentLoopData = \App\WilayahPembiayaanDana::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('wilayah_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana_id) == $wilayah_pembiayaan_dana->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah_pembiayaan_dana->id); ?>"><?php echo e($wilayah_pembiayaan_dana->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('wilayah_pembiayaan_dana_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('wilayah_pembiayaan_dana_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempo_angsuran_pembiayaan_dana_id">Tempo Angsuran Pembiayaan Dana</label>
                                        <select class="form-control <?php echo e($errors->has('tempo_angsuran_pembiayaan_dana_id') ? 'is-invalid' : ''); ?>" id="tempo_angsuran_pembiayaan_dana_id" name="tempo_angsuran_pembiayaan_dana_id" >
                                            <?php $__currentLoopData = \App\TempoAngsuranPembiayaanDana::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('tempo_angsuran_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_id) == $tempo_angsuran_pembiayaan_dana->id ? 'selected=""' : ''); ?> value="<?php echo e($tempo_angsuran_pembiayaan_dana->id); ?>"><?php echo e($tempo_angsuran_pembiayaan_dana->tempo . ' Bulan'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('tempo_angsuran_pembiayaan_dana_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('tempo_angsuran_pembiayaan_dana_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="motor_pembiayaan_dana_id">Motor</label>
                                        <select class="form-control <?php echo e($errors->has('motor_pembiayaan_dana_id') ? 'is-invalid' : ''); ?>" id="motor_pembiayaan_dana_id" name="motor_pembiayaan_dana_id" >
                                            <?php $__currentLoopData = \App\MotorPembiayaanDana::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('motor_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->motor_pembiayaan_dana_id) == $motor_pembiayaan_dana->id ? 'selected=""' : ''); ?> value="<?php echo e($motor_pembiayaan_dana->id); ?>"><?php echo e($motor_pembiayaan_dana->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('motor_pembiayaan_dana_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('motor_pembiayaan_dana_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_stnk_id">Status STNK</label>
                                        <select class="form-control <?php echo e($errors->has('status_stnk_id') ? 'is-invalid' : ''); ?>" id="status_stnk_id" name="status_stnk_id" >
                                            <?php $__currentLoopData = \App\StatusStnk::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_stnk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('status_stnk_id', $pengajuan_pembiayaan_dana->status_stnk_id) == $status_stnk->id ? 'selected=""' : ''); ?> value="<?php echo e($status_stnk->id); ?>"><?php echo e($status_stnk->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('status_stnk_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('status_stnk_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_bpkb_id">Status BPKB</label>
                                        <select class="form-control <?php echo e($errors->has('status_bpkb_id') ? 'is-invalid' : ''); ?>" id="status_bpkb_id" name="status_bpkb_id" >
                                            <?php $__currentLoopData = \App\StatusBpkb::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_bpkb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('status_bpkb_id', $pengajuan_pembiayaan_dana->status_bpkb_id) == $status_bpkb->id ? 'selected=""' : ''); ?> value="<?php echo e($status_bpkb->id); ?>"><?php echo e($status_bpkb->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('status_bpkb_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('status_bpkb_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_rumah_id">Status Rumah</label>
                                        <select class="form-control <?php echo e($errors->has('status_rumah_id') ? 'is-invalid' : ''); ?>" id="status_rumah_id" name="status_rumah_id" >
                                            <?php $__currentLoopData = \App\StatusRumah::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_rumah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('status_rumah_id', $pengajuan_pembiayaan_dana->status_rumah_id) == $status_rumah->id ? 'selected=""' : ''); ?> value="<?php echo e($status_rumah->id); ?>"><?php echo e($status_rumah->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('status_rumah_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('status_rumah_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            

                            <hr>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="plafond_pembiayaan_disetujui">Plafond Pembiayaan Di Setujui</label>
                                        <input type="number" class="form-control <?php echo e($errors->has('plafond_pembiayaan_disetujui') ? 'is-invalid' : ''); ?>" id="plafond_pembiayaan_disetujui" name="plafond_pembiayaan_disetujui" value="<?php echo e(old('plafond_pembiayaan_disetujui', $pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui)); ?>"/>
                                        <?php if($errors->has('plafond_pembiayaan_disetujui')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('plafond_pembiayaan_disetujui')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempo_angsuran_pembiayaan_dana_id_disetujui">Tempo Angsuran Pembiayaan Dana yang disetujui</label>
                                        <select class="form-control <?php echo e($errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui') ? 'is-invalid' : ''); ?>" id="tempo_angsuran_pembiayaan_dana_id_disetujui" name="tempo_angsuran_pembiayaan_dana_id_disetujui" >
                                            <option value=""></option>
                                            <?php $__currentLoopData = \App\TempoAngsuranPembiayaanDana::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('tempo_angsuran_pembiayaan_dana_id_disetujui', $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_id_disetujui) == $tempo_angsuran_pembiayaan_dana->id ? 'selected=""' : ''); ?> value="<?php echo e($tempo_angsuran_pembiayaan_dana->id); ?>"><?php echo e($tempo_angsuran_pembiayaan_dana->tempo . ' Bulan'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('tempo_angsuran_pembiayaan_dana_id_disetujui')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="angsuran">Angsuran</label>
                                        <input type="number" class="form-control <?php echo e($errors->has('angsuran') ? 'is-invalid' : ''); ?>" id="angsuran" name="angsuran" value="<?php echo e(old('angsuran', $pengajuan_pembiayaan_dana->angsuran)); ?>"/>
                                        <?php if($errors->has('angsuran')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('angsuran')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>


                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.pengajuan_pembiayaan_dana.index')); ?>" class="btn btn-secondary">Cancel</a>
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
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/pengajuan_pembiayaan_dana/edit.blade.php */ ?>