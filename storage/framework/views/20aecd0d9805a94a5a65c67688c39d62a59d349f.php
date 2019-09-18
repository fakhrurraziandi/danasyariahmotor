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

                        <form action="<?php echo e(route('admin.testimoni_motor.store', $motor->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>



                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" clas="form-control" name="name" id="name" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('name')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-sm-2 col-form-label text-md-right">Message</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control <?php echo e($errors->has('message') ? 'is-invalid' : ''); ?>" name="message" id="message" cols="30" rows="10"><?php echo e(old('message')); ?></textarea>
                                    <?php if($errors->has('message')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('message')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dp" class="col-sm-2 col-form-label text-md-right">Rate</label>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate1" name="rate" class="custom-control-input" value="1" <?php echo e(old('rate') == 1 ? 'checked=""' : ''); ?>>
                                        <label class="custom-control-label" for="rate1">
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate2" name="rate" class="custom-control-input" value="2" <?php echo e(old('rate') == 2 ? 'checked=""' : ''); ?>>
                                        <label class="custom-control-label" for="rate2">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate3" name="rate" class="custom-control-input" value="3" <?php echo e(old('rate') == 3 ? 'checked=""' : ''); ?>>
                                        <label class="custom-control-label" for="rate3">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate4" name="rate" class="custom-control-input" value="4" <?php echo e(old('rate') == 4 ? 'checked=""' : ''); ?>>
                                        <label class="custom-control-label" for="rate4">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate5" name="rate" class="custom-control-input" value="5" <?php echo e(old('rate') == 5 ? 'checked=""' : ''); ?>>
                                        <label class="custom-control-label" for="rate5">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <?php if($errors->has('rate')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('rate')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                           

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.testimoni_motor.index', $motor->id)); ?>" class="btn btn-secondary">Cancel</a>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/testimoni_motor/create.blade.php */ ?>