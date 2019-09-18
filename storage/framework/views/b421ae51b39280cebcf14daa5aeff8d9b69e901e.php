<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit motor</div>
                    <div class="card-body">

                        

                        <form action="<?php echo e(route('admin.motor.update', $motor->id)); ?>" method="POST">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" name="name" id="name" value="<?php echo e(old('name', $motor->name)); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('name')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="slug" class="col-sm-2 col-form-label text-md-right">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e($errors->has('slug') ? 'is-invalid' : ''); ?>" name="slug" id="slug" value="<?php echo e(old('slug', $motor->slug)); ?>">
                                    <?php if($errors->has('slug')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('slug')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pabrikan_motor_id" class="col-sm-2 col-form-label text-md-right">Pabrikan Motor</label>
                                <div class="col-sm-9">
                                    <select name="pabrikan_motor_id" id="pabrikan_motor_id" class="form-control <?php echo e($errors->has('pabrikan_motor_id') ? 'is-invalid' : ''); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $list_pabrikan_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pabrikan_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($pabrikan_motor->id == old('pabrikan_motor_id', $motor->pabrikan_motor_id) ? 'selected=""' : ''); ?> value="<?php echo e($pabrikan_motor->id); ?>"><?php echo e($pabrikan_motor->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('pabrikan_motor_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('pabrikan_motor_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_motor_id" class="col-sm-2 col-form-label text-md-right">Type Motor</label>
                                <div class="col-sm-9">
                                    <select name="type_motor_id" id="type_motor_id" class="form-control <?php echo e($errors->has('type_motor_id') ? 'is-invalid' : ''); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $list_type_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($type_motor->id == old('type_motor_id', $motor->type_motor_id) ? 'selected=""' : ''); ?> value="<?php echo e($type_motor->id); ?>"><?php echo e($type_motor->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('type_motor_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('type_motor_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_transmisi_id" class="col-sm-2 col-form-label text-md-right">Jenis Transmisi</label>
                                <div class="col-sm-9">
                                    <select name="jenis_transmisi_id" id="jenis_transmisi_id" class="form-control <?php echo e($errors->has('jenis_transmisi_id') ? 'is-invalid' : ''); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $list_jenis_transmisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_transmisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($jenis_transmisi->id == old('jenis_transmisi_id', $motor->jenis_transmisi_id) ? 'selected=""' : ''); ?> value="<?php echo e($jenis_transmisi->id); ?>"><?php echo e($jenis_transmisi->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('jenis_transmisi_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('jenis_transmisi_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_pembakaran_id" class="col-sm-2 col-form-label text-md-right">Jenis Pembakaran</label>
                                <div class="col-sm-9">
                                    <select name="jenis_pembakaran_id" id="jenis_pembakaran_id" class="form-control <?php echo e($errors->has('jenis_pembakaran_id') ? 'is-invalid' : ''); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $list_jenis_pembakaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_pembakaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($jenis_pembakaran->id == old('jenis_pembakaran_id', $motor->jenis_pembakaran_id) ? 'selected=""' : ''); ?> value="<?php echo e($jenis_pembakaran->id); ?>"><?php echo e($jenis_pembakaran->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('jenis_pembakaran_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('jenis_pembakaran_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kapasitas_mesin_id" class="col-sm-2 col-form-label text-md-right">Kapasitas Mesin</label>
                                <div class="col-sm-9">
                                    <select name="kapasitas_mesin_id" id="kapasitas_mesin_id" class="form-control <?php echo e($errors->has('kapasitas_mesin_id') ? 'is-invalid' : ''); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $list_kapasitas_mesin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kapasitas_mesin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($kapasitas_mesin->id == old('kapasitas_mesin_id', $motor->kapasitas_mesin_id) ? 'selected=""' : ''); ?> value="<?php echo e($kapasitas_mesin->id); ?>"><?php echo e($kapasitas_mesin->cc . ' cc'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('kapasitas_mesin_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('kapasitas_mesin_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tahun" class="col-sm-2 col-form-label text-md-right">Tahun</label>
                                <div class="col-sm-9">
                                    <select name="tahun" id="tahun" class="form-control <?php echo e($errors->has('tahun') ? 'is-invalid' : ''); ?>">
                                        <?php for($i = date('Y'); $i >= 2000; $i--): ?>
                                            <option <?php echo e($i == old('tahun', $motor->tahun) ? 'selected=""' : ''); ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <?php if($errors->has('tahun')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('tahun')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fitur" class="col-sm-2 col-form-label text-md-right">Fitur</label>
                                <div class="col-sm-9">
                                    <textarea name="fitur" id="fitur" cols="30" rows="10" class="form-control <?php echo e($errors->has('fitur') ? 'is-invalid' : ''); ?>"><?php echo e(old('fitur', $motor->fitur)); ?></textarea>
                                    <?php if($errors->has('fitur')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('fitur')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="warna_motor_ids" class="col-sm-2 col-form-label text-md-right">Warna</label>
                                <div class="col-sm-9">
                                    <select multiple="" name="warna_motor_ids[]" id="warna_motor_ids" class="form-control <?php echo e($errors->has('warna_motor_ids') ? 'is-invalid' : ''); ?>">
                                        <?php $__currentLoopData = $list_warna_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warna_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(in_array($warna_motor->id, old('warna_motor_ids', $motor->warna_motor_ids)) ? 'selected=""' : ''); ?> value="<?php echo e($warna_motor->id); ?>"><?php echo e($warna_motor->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('warna_motor_ids')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('warna_motor_ids')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label text-md-right">Harga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?php echo e($errors->has('harga') ? 'is-invalid' : ''); ?>" name="harga" id="harga" value="<?php echo e(old('harga', $motor->harga)); ?>">
                                    <?php if($errors->has('harga')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('harga')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.motor.index')); ?>" class="btn btn-secondary">Cancel</a>
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

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('#fitur').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    
    <script>
        $(function(){

            $('#harga').mask('000.000.000.000.000', {reverse: true});

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
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/motor/edit.blade.php */ ?>