<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">



                <div class="row">
                    <div class="col-md-12">

                        <p class="mb-3"><a href="<?php echo e(route('admin.pengajuan_pembiayaan_dana.index')); ?>" class="btn btn-secondary">Back</a></p>

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

                                    <dt class="col-sm-4">SPV Status</dt>
                                    <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status ? $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status : '-'); ?></dd>
                                </dl>
                            </div>
                        </div>
                    </div>


                    

                    <div class="col-md-12">
                        <div class="card mb-3">
                    

                            <div class="card-body">

                                <dl class="row">

                                    <dt class="col-sm-4">Plafond pembiayaan yang disetujui</dt>
                                    <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui ? $pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui : '-'); ?></dd>

                                    <dt class="col-sm-4">Tempo angsuran yang disetujui</dt>
                                    <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_disetujui ?  $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_disetujui->tempo . ' bulan' : '-'); ?></dd>

                                    <dt class="col-sm-4">Angsuran</dt>
                                    <dd class="col-sm-8"><?php echo e($pengajuan_pembiayaan_dana->angsuran ? $pengajuan_pembiayaan_dana->angsuran : '-'); ?></dd>

                                    
                                </dl>
                                
                                
                            </div>
                        </div>
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
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/pengajuan_pembiayaan_dana/show.blade.php */ ?>