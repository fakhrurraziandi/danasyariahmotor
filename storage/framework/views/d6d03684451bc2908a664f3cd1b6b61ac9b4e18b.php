<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit tempo angsuran motor</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('backend.tempo_angsuran_motor.update', $tempo_angsuran_motor->id)); ?>" method="POST">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempo">Tempo (Satuan Bulan)</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('tempo') ? 'is-invalid' : ''); ?>" id="tempo" name="tempo" placeholder="Tempo" value="<?php echo e(old('tempo', $tempo_angsuran_motor->tempo)); ?>">
                                        <?php if($errors->has('tempo')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('tempo')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                               

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('backend.tempo_angsuran_motor.index')); ?>" class="btn btn-secondary">Cancel</a>
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

            

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/backend/tempo_angsuran_motor/edit.blade.php */ ?>