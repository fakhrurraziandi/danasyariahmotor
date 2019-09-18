<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit testimoni gallery</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.testimoni_gallery.update', $testimoni_gallery->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" id="name" name="name" placeholder="Name" value="<?php echo e(old('name', $testimoni_gallery->name)); ?>">
                                        <?php if($errors->has('name')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('name')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control <?php echo e($errors->has('photo') ? 'is-invalid' : ''); ?>" id="photo" name="photo" placeholder="Photo">
                                        <small class="text-muted">ignore if you don't want to change photos</small>
                                        <?php if($errors->has('photo')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('photo')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control <?php echo e($errors->has('type') ? 'is-invalid' : ''); ?>" id="type" name="type">
                                            <option <?php echo e(old('type', $testimoni_gallery->type) == 'pembiayaan_dana' ? 'selected=""' : ''); ?> value="pembiayaan_dana">Pembiayaan Dana</option>
                                            <option <?php echo e(old('type', $testimoni_gallery->type) == 'kredit_motor' ? 'selected=""' : ''); ?> value="kredit_motor">Kredit Motor</option>
                                        </select>
                                        <?php if($errors->has('type')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('type')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <script>
                                    $(function(){

                                        function onTypeChangeHandler(e){
                                            var type = $('#type').val();
                                            if(type == 'pembiayaan_dana'){
                                                $('#col-wilayah_pembiayaan_dana_id').show();
                                                $('#col-wilayah_kredit_motor_id').hide();
                                            }

                                            if(type == 'kredit_motor'){
                                                $('#col-wilayah_pembiayaan_dana_id').hide();
                                                $('#col-wilayah_kredit_motor_id').show();
                                            }
                                        }
                                        $('#type').on('change', onTypeChangeHandler);
                                        onTypeChangeHandler();
                                    });
                                </script>

                                <div class="col-md-6" id="col-wilayah_pembiayaan_dana_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="wilayah_pembiayaan_dana_id">Wilayah Pembiayaan Dana</label>
                                        <select class="form-control <?php echo e($errors->has('wilayah_pembiayaan_dana_id') ? 'is-invalid' : ''); ?>" id="wilayah_pembiayaan_dana_id" name="wilayah_pembiayaan_dana_id">
                                            <option value=""></option>
                                            <?php $__currentLoopData = App\WilayahPembiayaanDana::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('wilayah_pembiayaan_dana_id', $testimoni_gallery->wilayah_pembiayaan_dana_id) == $wilayah_pembiayaan_dana->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah_pembiayaan_dana->id); ?>"><?php echo e($wilayah_pembiayaan_dana->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('wilayah_pembiayaan_dana_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('wilayah_pembiayaan_dana_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6" id="col-wilayah_kredit_motor_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="wilayah_kredit_motor_id">Wilayah Kredit Motor</label>
                                        <select class="form-control <?php echo e($errors->has('wilayah_kredit_motor_id') ? 'is-invalid' : ''); ?>" id="wilayah_kredit_motor_id" name="wilayah_kredit_motor_id">
                                            <option value=""></option>
                                            <?php $__currentLoopData = App\WilayahKreditMotor::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_kredit_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(old('wilayah_kredit_motor_id', $testimoni_gallery->wilayah_kredit_motor_id) == $wilayah_kredit_motor->id ? 'selected=""' : ''); ?> value="<?php echo e($wilayah_kredit_motor->id); ?>"><?php echo e($wilayah_kredit_motor->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('wilayah_kredit_motor_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('wilayah_kredit_motor_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control <?php echo e($errors->has('message') ? 'is-invalid' : ''); ?>" id="message" name="message" placeholder="Message" rows="7"><?php echo e(old('message', $testimoni_gallery->message)); ?></textarea>
                                        <?php if($errors->has('message')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('message')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                


                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.testimoni_gallery.index')); ?>" class="btn btn-secondary">Cancel</a>
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
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/testimoni_gallery/edit.blade.php */ ?>