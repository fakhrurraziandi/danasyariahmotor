<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Pengajuan Kredit Motor</small></h1>
    <hr>

    <form action="<?php echo e(route('spv_kredit_motor.process_pengajuan_kredit_motor', $pengajuan_kredit_motor->id)); ?>" method="POST">

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
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->name); ?></dd>

                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->email); ?></dd>

                            <dt class="col-sm-4">No Handphone 1</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->no_handphone_1); ?></dd>

                            <dt class="col-sm-4">No Handphone 2</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->no_handphone_2 ? $pengajuan_kredit_motor->user->no_handphone_2 : '-'); ?></dd>

                            <dt class="col-sm-4">Jenis Identitas</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->jenis_identitas ? $pengajuan_kredit_motor->user->jenis_identitas : '-'); ?></dd>

                            <dt class="col-sm-4">No Identitas</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->no_identitas ? $pengajuan_kredit_motor->user->no_identitas : '-'); ?></dd>

                            <dt class="col-sm-4">Tempat Lahir</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->tempat_lahir ? $pengajuan_kredit_motor->user->tempat_lahir : '-'); ?></dd>

                            <dt class="col-sm-4">Tanggal Lahir</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->tanggal_lahir ? $pengajuan_kredit_motor->user->tanggal_lahir : '-'); ?></dd>

                            <dt class="col-sm-4">Kota</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->city->name ? $pengajuan_kredit_motor->user->city->name : '-'); ?></dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->user->alamat ? $pengajuan_kredit_motor->user->alamat : '-'); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi Customer Service</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nama</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->cs_kredit_motor->name); ?></dd>

                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->cs_kredit_motor->email); ?></dd>
                            
                            <dt class="col-sm-4">Phone Number</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->cs_kredit_motor->phone_number); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi Pengajuan Kredit Motor</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Motor</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->angsuran_motor->motor->name); ?></dd>

                            <dt class="col-sm-4">DP</dt>
                            <dd class="col-sm-8"><?php echo e('Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor->dp, 0, ',', '.')); ?></dd>

                            <?php if($pengajuan_kredit_motor->angsuran_motor->discount_dp): ?>
                                <dt class="col-sm-4">Discount DP</dt>
                                <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->angsuran_motor->discount_dp ? $pengajuan_kredit_motor->angsuran_motor->discount_dp . '%' : '-'); ?></dd>

                                <dt class="col-sm-4">DP Bayar</dt>
                                <dd class="col-sm-8"><?php echo e('Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor->dp_calculated, 0, ',', '.')); ?></dd>
                            <?php endif; ?>
                                

                            <dt class="col-sm-4">Angsuran x Bulan</dt>
                            <dd class="col-sm-8"><?php echo e('Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor_detail->angsuran_per_bulan, 0, ',', '.') . ' x '. $pengajuan_kredit_motor->angsuran_motor_detail->tempo_angsuran_motor->tempo . ' Bulan'); ?></dd>

                            <dt class="col-sm-4">Wilayah</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->wilayah_kredit_motor->name ? $pengajuan_kredit_motor->wilayah_kredit_motor->name : '-'); ?></dd>

                            <dt class="col-sm-4">CS Status</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->cs_kredit_motor_status ? $pengajuan_kredit_motor->cs_kredit_motor_status : '-'); ?></dd>

                            <dt class="col-sm-4">CS Note</dt>
                            <dd class="col-sm-8"><?php echo $pengajuan_kredit_motor->cs_kredit_motor_note ? '<span class="text-danger">'. $pengajuan_kredit_motor->cs_kredit_motor_note .'</span>' : '-'; ?></dd>


                            <dt class="col-sm-4">SPV</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->spv_kredit_motor ? $pengajuan_kredit_motor->spv_kredit_motor->name : '-'); ?></dd>

                            <dt class="col-sm-4">SPV Status</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_kredit_motor->spv_kredit_motor_status ? $pengajuan_kredit_motor->spv_kredit_motor_status : '-'); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <?php if(!$pengajuan_kredit_motor->spv_kredit_motor_status): ?>

                <div class="col-md-12 text-center">
                    <div class="py-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="spv_kredit_motor_status1" name="spv_kredit_motor_status" class="custom-control-input" value="denied">
                            <label class="custom-control-label" for="spv_kredit_motor_status1">Tolak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="spv_kredit_motor_status2" name="spv_kredit_motor_status" class="custom-control-input" value="approved">
                            <label class="custom-control-label" for="spv_kredit_motor_status2">Setujui</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block px-5 py-3">Process</button>
                </div>

            <?php endif; ?>
        </div>
    </form>

        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('spv_kredit_motor.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/spv_kredit_motor/pengajuan_kredit_motor.blade.php */ ?>