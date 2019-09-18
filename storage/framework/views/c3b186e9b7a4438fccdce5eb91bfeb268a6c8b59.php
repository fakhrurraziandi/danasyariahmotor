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

                        <form action="<?php echo e(route('admin.spesifikasi_motor.store', $motor->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>



                            <div class="form-group row">
                                <label for="kategori_spesifikasi_id" class="col-sm-2 col-form-label text-md-right">Kategori Spesifikasi</label>
                                <div class="col-sm-6">
                                    <select class="form-control <?php echo e($errors->has('kategori_spesifikasi_id') ? 'is-invalid' : ''); ?>" name="kategori_spesifikasi_id" id="kategori_spesifikasi_id">
                                        <option ></option>
                                        <?php $__currentLoopData = $list_kategori_spesifikasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori_spesifikasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('kategori_spesifikasi_id') == $kategori_spesifikasi->id ? 'selected=""' : ''); ?> value="<?php echo e($kategori_spesifikasi->id); ?>"><?php echo e($kategori_spesifikasi->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('kategori_spesifikasi_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('kategori_spesifikasi_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" type="text" name="name" id="name" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('name')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="value" class="col-sm-2 col-form-label text-md-right">Value</label>
                                <div class="col-sm-6">
                                    <input class="form-control <?php echo e($errors->has('value') ? 'is-invalid' : ''); ?>" type="text" name="value" id="value" value="<?php echo e(old('value')); ?>">
                                    <?php if($errors->has('value')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('value')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                           
                           

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.spesifikasi_motor.index', $motor->id)); ?>" class="btn btn-secondary">Cancel</a>
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
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/spesifikasi_motor/create.blade.php */ ?>