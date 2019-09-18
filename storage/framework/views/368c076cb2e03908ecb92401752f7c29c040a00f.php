<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Pengajuan Pembiayaan Dana</small></h1>
    <hr>

    <form action="<?php echo e(route('cs_pembiayaan_dana.process_pengajuan_pembiayaan_dana', $pengajuan_pembiayaan_dana->id)); ?>" method="POST">

        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('PUT')); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi User</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nama Lengkap Sesuai KTP</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->name); ?></dd>

                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->email); ?></dd>

                            <dt class="col-sm-4">No Handphone 1</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->no_handphone_1); ?></dd>

                            <dt class="col-sm-4">No Handphone 2</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->no_handphone_2 ? $pengajuan_pembiayaan_dana->user->no_handphone_2 : '-'); ?></dd>

                            <dt class="col-sm-4">Jenis Identitas</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->jenis_identitas ? $pengajuan_pembiayaan_dana->user->jenis_identitas : '-'); ?></dd>

                            <dt class="col-sm-4">No Identitas</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->no_identitas ? $pengajuan_pembiayaan_dana->user->no_identitas : '-'); ?></dd>

                            <dt class="col-sm-4">Tempat Lahir</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->tempat_lahir ? $pengajuan_pembiayaan_dana->user->tempat_lahir : '-'); ?></dd>

                            <dt class="col-sm-4">Tanggal Lahir</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->tanggal_lahir ? $pengajuan_pembiayaan_dana->user->tanggal_lahir : '-'); ?></dd>

                            <dt class="col-sm-4">Kota</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->city->name ? $pengajuan_pembiayaan_dana->user->city->name : '-'); ?></dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->user->alamat ? $pengajuan_pembiayaan_dana->user->alamat : '-'); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi Pengajuan Pembiayaan Dana</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">

                            <dt class="col-sm-4">Wilayah</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana->name); ?></dd>

                            <dt class="col-sm-4">Tempo Angsuran</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana->tempo . ' Bulan'); ?></dd>

                            <dt class="col-sm-4">Motor</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->motor_pembiayaan_dana->name); ?></dd>

                            <dt class="col-sm-4">Status STNK</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->status_stnk->name); ?></dd>

                            <dt class="col-sm-4">Status BPKB</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->status_bpkb->name); ?></dd>

                            <dt class="col-sm-4">Status Kepemilikan Rumah</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->status_rumah->name); ?></dd>

                            <dt class="col-sm-4">CS Status</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status ? $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status : '-'); ?></dd>

                            <dt class="col-sm-4">CS Note</dt>
                            <dd class="col-sm-8"><?php echo $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note ? '<span class="text-danger">'. $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note .'</span>' : '-'; ?></dd>


                            <dt class="col-sm-4">SPV</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->spv_pembiayaan_dana ? $pengajuan_pembiayaan_dana->spv_pembiayaan_dana->name : '-'); ?></dd>

                            <dt class="col-sm-4">SPV Status</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status ? $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status : '-'); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            

            

            <?php if(!$pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status): ?>

                
                <div class="col-md-12 text-center">
                    <div class="py-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="cs_pembiayaan_dana_status1" name="cs_pembiayaan_dana_status" class="custom-control-input cs_pembiayaan_dana_status" value="denied" <?php echo e(old('cs_pembiayaan_dana_status', $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status) == 'denied' ? 'checked=""' : ''); ?>>
                            <label class="custom-control-label" for="cs_pembiayaan_dana_status1">Tolak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="cs_pembiayaan_dana_status2" name="cs_pembiayaan_dana_status" class="custom-control-input cs_pembiayaan_dana_status" value="approved" <?php echo e(old('cs_pembiayaan_dana_status', $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status) == 'approved' ? 'checked=""' : ''); ?>>
                            <label class="custom-control-label" for="cs_pembiayaan_dana_status2">Setujui</label>
                        </div>
                    </div>
                    <?php if($errors->has('cs_pembiayaan_dana_status')): ?>
                        <div class="pb-4 text-center text-danger">
                            <?php echo e($errors->first('cs_pembiayaan_dana_status')); ?>

                        </div>
                    <?php endif; ?>
                    
                    
                </div>

                <div class="col-md-12 col-approved" style="display: none;">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="plafond_pembiayaan_disetujui" class="col-sm-3 col-form-label">Plafond pembiayaan yang disetujui</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e($errors->has('plafond_pembiayaan_disetujui') ? 'is-invalid' : ''); ?>" id="plafond_pembiayaan_disetujui" name="plafond_pembiayaan_disetujui" value="<?php echo e(old('plafond_pembiayaan_disetujui')); ?>">
                                    <?php if($errors->has('plafond_pembiayaan_disetujui')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('plafond_pembiayaan_disetujui')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tempo_angsuran_pembiayaan_dana_id_disetujui" class="col-sm-3 col-form-label">Tempo angsuran yang disetujui</label>
                                <div class="col-sm-9">
                                    <select name="tempo_angsuran_pembiayaan_dana_id_disetujui" id="tempo_angsuran_pembiayaan_dana_id_disetujui" class="form-control <?php echo e($errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui') ? 'is-invalid' : ''); ?>">
                                        <?php $__currentLoopData = App\TempoAngsuranPembiayaanDana::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('tempo_angsuran_pembiayaan_dana_id_disetujui', $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana->id) ==  $tempo_angsuran_pembiayaan_dana->id ? 'selected=""' : ""); ?> value="<?php echo e($tempo_angsuran_pembiayaan_dana->id); ?>"><?php echo e($tempo_angsuran_pembiayaan_dana->tempo . ' bulan'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('tempo_angsuran_pembiayaan_dana_id_disetujui')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="angsuran" class="col-sm-3 col-form-label">Angsuran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e($errors->has('angsuran') ? 'is-invalid' : ''); ?>" id="angsuran" name="angsuran" value="<?php echo e(old('angsuran')); ?>">
                                    <?php if($errors->has('angsuran')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('angsuran')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cs_pembiayaan_dana_note" class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?php echo e($errors->has('cs_pembiayaan_dana_note') ? 'is-invalid' : ''); ?>" id="cs_pembiayaan_dana_note" name="cs_pembiayaan_dana_note" value="<?php echo e(old('cs_pembiayaan_dana_note')); ?>" rows="5"></textarea>
                                    <?php if($errors->has('cs_pembiayaan_dana_note')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('cs_pembiayaan_dana_note')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="spv_pembiayaan_dana_id" class="col-sm-3 col-form-label">Di Teruskan Kepada SPV</label>
                                <div class="col-sm-9">
                                    <select name="spv_pembiayaan_dana_id" id="spv_pembiayaan_dana_id" class="form-control <?php echo e($errors->has('spv_pembiayaan_dana_id') ? 'is-invalid' : ''); ?>">
                                        <option></option>
                                        <?php $__currentLoopData = $pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana->spv_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spv_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('spv_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_id) ==  $spv_pembiayaan_dana->id ? 'selected=""' : ""); ?> value="<?php echo e($spv_pembiayaan_dana->id); ?>"><?php echo e($spv_pembiayaan_dana->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('spv_pembiayaan_dana_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('spv_pembiayaan_dana_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Process</button>
                </div>

                
            <?php endif; ?>
        </div>
    </form>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){

            function csPembiayaanDanaStatusOnChangeHandler(){
                var value = $('.cs_pembiayaan_dana_status:checked').val();
                console.log(value);
                if(value == 'denied'){
                    $('.col-approved').hide();
                }

                if(value == 'approved'){
                    $('.col-approved').show();
                }
            }
            $('.cs_pembiayaan_dana_status').on('change', csPembiayaanDanaStatusOnChangeHandler);
            csPembiayaanDanaStatusOnChangeHandler();

            $('#plafond_pembiayaan_disetujui').mask('000.000.000.000.000', {reverse: true});
            $('#angsuran').mask('000.000.000.000.000', {reverse: true});
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cs_pembiayaan_dana.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/cs_pembiayaan_dana/pengajuan_pembiayaan_dana.blade.php */ ?>