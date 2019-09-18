<?php $__env->startSection('sub_content'); ?>

    

    <h1 class="mb-20">Pengajuan Pembiayaan Dana</small></h1>
    <hr>

    <form action="<?php echo e(route('spv_pembiayaan_dana.process_pengajuan_pembiayaan_dana', $pengajuan_pembiayaan_dana->id)); ?>" method="POST">

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
                        <h5 class="mb-0">Informasi Customer Service</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nama</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->cs_pembiayaan_dana->name); ?></dd>

                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->cs_pembiayaan_dana->email); ?></dd>
                            
                            <dt class="col-sm-4">Phone Number</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->cs_pembiayaan_dana->phone_number); ?></dd>
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
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note ? $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_note : '-'); ?></dd>

                            <dt class="col-sm-4">Plafond Pembiayaan Disetujui</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui ? 'Rp. '. number_format($pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui, 0, ',', '.') : '-'); ?></dd>

                            <dt class="col-sm-4">Tempo Angsuran Dana Disetujui <?php echo e($pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_id_disetujui); ?></dt>
                            <?php $tempo_angsuran_pembiayaan_dana_disetujui = App\TempoAngsuranPembiayaanDana::find($pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_id_disetujui); ?>
                            <dd class="col-sm-8"><?php echo e($tempo_angsuran_pembiayaan_dana_disetujui ? $tempo_angsuran_pembiayaan_dana_disetujui->tempo . ' Bulan' : '-'); ?></dd>

                            <dt class="col-sm-4">Angsuran</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->angsuran ? 'Rp. '. number_format($pengajuan_pembiayaan_dana->angsuran, 0, ',', '.') : '-'); ?></dd>

                            <dt class="col-sm-4">SPV Status</dt>
                            <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status ? $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status : '-'); ?></dd>
                        </dl>
                    </div>
                </div>
            </div>

            <?php if(!$pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status): ?>

                <div class="col-md-12 text-center">
                    <div class="py-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="spv_pembiayaan_dana_status1" name="spv_pembiayaan_dana_status" class="custom-control-input" value="denied">
                            <label class="custom-control-label" for="spv_pembiayaan_dana_status1">Tolak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="spv_pembiayaan_dana_status2" name="spv_pembiayaan_dana_status" class="custom-control-input" value="approved">
                            <label class="custom-control-label" for="spv_pembiayaan_dana_status2">Setujui</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block px-5 py-3">Process</button>
                </div>

            <?php endif; ?>
        </div>
    </form>

        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('spv_pembiayaan_dana.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/spv_pembiayaan_dana/pengajuan_pembiayaan_dana.blade.php */ ?>