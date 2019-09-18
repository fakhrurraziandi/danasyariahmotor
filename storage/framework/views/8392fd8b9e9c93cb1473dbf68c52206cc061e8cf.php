<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new kapasitas mesin</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('backend.kapasitas_mesin.store')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cc">CC</label>
                                        <input type="number" class="form-control <?php echo e($errors->has('cc') ? 'is-invalid' : ''); ?>" id="cc" name="cc" placeholder="CC" value="<?php echo e(old('cc')); ?>">
                                        <?php if($errors->has('cc')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('cc')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('backend.kapasitas_mesin.index')); ?>" class="btn btn-secondary">Cancel</a>
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
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/backend/kapasitas_mesin/create.blade.php */ ?>