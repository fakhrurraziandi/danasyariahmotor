<?php $__env->startSection('content'); ?>

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-12">

    

                <h1 class="mb-20">Pengajuan Kredit Motor</small></h1>
                <hr>

                <div>

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('PUT')); ?>


                    <div class="row">

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

                                        <dt class="col-sm-4">Angsuran x Bulan</dt>
                                        <dd class="col-sm-8"><?php echo e('Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor_detail->angsuran_per_bulan, 0, ',', '.') . ' x '. $pengajuan_kredit_motor->angsuran_motor_detail->tempo_angsuran_motor->tempo . ' Bulan'); ?></dd>

                                        <dt class="col-sm-4">Status</dt>
                                        <dd class="col-sm-8">
                                            <?php  
                                            function test($pengajuan_kredit_motor){
                                                if($pengajuan_kredit_motor->cs_kredit_motor_status == 'denied'){
                                                    return 'denied';
                                                }elseif($pengajuan_kredit_motor->cs_kredit_motor_status == 'approved'){
                                                    if($pengajuan_kredit_motor->spv_kredit_motor_status == 'denied'){
                                                        return 'denied';
                                                    }elseif($pengajuan_kredit_motor->spv_kredit_motor_status == 'approved'){
                                                        return 'approved';
                                                    }else{
                                                        return '-';
                                                    }
                                                }else{
                                                    return '-';
                                                }
                                            }

                                            echo test($pengajuan_kredit_motor);
                                            ?>
                                        </dd>
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
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/pengajuan_kredit_motor/show.blade.php */ ?>