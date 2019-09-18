<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit angsuran motor</div>
                    <div class="card-body">
                        <?php $motor = $angsuran_motor->motor ?>
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
                            <dd class="col-sm-9"><?php echo e('Rp. '. number_format($motor->harga, 0, ',', '.')); ?></dd>
                        </dl>

                        <hr>

                        <form action="<?php echo e(route('admin.angsuran_motor.update', $angsuran_motor->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>



                            <div class="form-group row">
                                <label for="dp" class="col-sm-2 col-form-label text-md-right">DP</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control <?php echo e($errors->has('dp') ? 'is-invalid' : ''); ?>" name="dp" id="dp" value="<?php echo e(old('dp', $angsuran_motor->dp)); ?>">
                                    <?php if($errors->has('dp')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('dp')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>

                                <label for="discount_dp" class="col-sm-2 col-form-label text-md-right">Discount DP (%)</label>
                                <div class="col-sm-3">
                                    <input type="text" max="100" min="0" class="form-control <?php echo e($errors->has('discount_dp') ? 'is-invalid' : ''); ?>" name="discount_dp" id="discount_dp" value="<?php echo e(old('discount_dp', $angsuran_motor->discount_dp)); ?>">
                                    <?php if($errors->has('discount_dp')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('discount_dp')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php $__currentLoopData = $list_tempo_angsuran_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group row">
                                    <label for="tempo_angsuran_motor_id" class="col-sm-2 col-form-label text-md-right"><?php echo e($tempo_angsuran_motor->tempo . ' Bulan'); ?></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control tempo_angsuran_motor_id <?php echo e($errors->has('tempo_angsuran_motor_id') ? 'is-invalid' : ''); ?>" name="tempo_angsuran_motor_id[<?php echo e($tempo_angsuran_motor->id); ?>]" id="tempo_angsuran_motor_id" value="<?php  
                                            $angsuran_motor_detail = $angsuran_motor->angsuran_motor_detail->where('tempo_angsuran_motor_id', $tempo_angsuran_motor->id)->first();
                                            if($angsuran_motor_detail){
                                                echo old('tempo_angsuran_motor_id['. $tempo_angsuran_motor->id .']', $angsuran_motor_detail->angsuran_per_bulan);
                                            }else{
                                                echo old('tempo_angsuran_motor_id['. $tempo_angsuran_motor->id .']');
                                            }
                                        ?>">
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
                                    <a href="<?php echo e(route('admin.angsuran_motor.index', $angsuran_motor->motor->id)); ?>" class="btn btn-secondary">Cancel</a>
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

            $('#dp').mask('000.000.000.000.000', {reverse: true});
            $('.tempo_angsuran_motor_id').mask('000.000.000.000.000', {reverse: true});
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/angsuran_motor/edit.blade.php */ ?>