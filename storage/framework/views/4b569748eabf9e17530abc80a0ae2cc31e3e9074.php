<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new angsuran motor</div>
                    <div class="card-body">

                        <dl class="row">
                            <dt class="col-sm-3 text-md-right">Name</dt>
                            <dd class="col-sm-9"><?php echo e($motor->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Pabrikan</dt>
                            <dd class="col-sm-9"><?php echo e($motor->pabrikan_motor->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Type</dt>
                            <dd class="col-sm-9"><?php echo e($motor->type_motor->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Jenis Transmisi</dt>
                            <dd class="col-sm-9"><?php echo e($motor->jenis_transmisi->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Kapasitas Mesin</dt>
                            <dd class="col-sm-9"><?php echo e($motor->kapasitas_mesin->cc . ' cc'); ?></dd>

                            <dt class="col-sm-3 text-md-right">Warna</dt>
                            <dd class="col-sm-9">
                                <?php if($motor->warna_motor): ?> 
                                    <?php $__currentLoopData = $motor->warna_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warna_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-secondary"><?php echo e($warna_motor->name); ?></span> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </dd>

                            <dt class="col-sm-3 text-md-right">Harga</dt>
                            <dd class="col-sm-9"><?php echo e('Rp. '. $motor->harga); ?></dd>
                        </dl>

                        <hr>

                        <form action="<?php echo e(route('backend.angsuran_motor.store', $motor->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>



                            <div class="form-group row">
                                <label for="dp" class="col-sm-2 col-form-label text-md-right">DP</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control <?php echo e($errors->has('dp') ? 'is-invalid' : ''); ?>" name="dp" id="dp">
                                    <?php if($errors->has('dp')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('dp')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php $__currentLoopData = $list_tempo_angsuran_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group row">
                                    <label for="tempo_angsuran_motor_id" class="col-sm-2 col-form-label text-md-right"><?php echo e($tempo_angsuran_motor->tempo . ' Bulan'); ?></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control <?php echo e($errors->has('tempo_angsuran_motor_id') ? 'is-invalid' : ''); ?>" name="tempo_angsuran_motor_id[<?php echo e($tempo_angsuran_motor->id); ?>]" id="tempo_angsuran_motor_id">
                                        <?php if($errors->has('tempo_angsuran_motor_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('tempo_angsuran_motor_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('backend.angsuran_motor.index', $motor->id)); ?>" class="btn btn-secondary">Cancel</a>
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

            $('#warna_motor_ids').select2();
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\dsm\resources\views/backend/angsuran_motor/create.blade.php */ ?>