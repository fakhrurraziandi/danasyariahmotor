<?php $__env->startSection('content'); ?>

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-12">

    

                <h1 class="mb-20">Pengajuan Pembiayaan Dana</small></h1>
                <hr>

                <div>

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>


                    <div class="row">

                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="mb-0">Informasi Pengajuan Pembiayaan Dana</h5>
                                </div>
                                <div class="card-body">
                                    <dl class="row">

                                        <dt class="col-sm-4">Wilayah</dt>
                                        <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana->name); ?></dd>

                                        <dt class="col-sm-4">Plafond Pembiayaan</dt>
                                        <dd class="col-sm-8"><?php echo e('Rp. '. number_format($pengajuan_pembiayaan_dana->plafond_pembiayaan, 0, '.', ',')); ?></dd>

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

                                        <dt class="col-sm-4">SPV Status</dt>
                                        <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status ? $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status : '-'); ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/pengajuan_pembiayaan_dana/show.blade.php */ ?>