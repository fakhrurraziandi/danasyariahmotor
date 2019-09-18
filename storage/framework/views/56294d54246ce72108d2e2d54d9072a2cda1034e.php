<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit angsuran pembiayaan dana</div>
                    <div class="card-body">
                        <?php $motor_pembiayaan_dana = $angsuran_pembiayaan_dana->motor_pembiayaan_dana ?>
                        <dl class="row">
                            <dt class="col-sm-3 text-md-right">Name</dt>
                            <dd class="col-sm-9"><?php echo e($motor_pembiayaan_dana->name); ?></dd>

                            <dt class="col-sm-3 text-md-right">Pabrikan</dt>
                            <dd class="col-sm-9"><?php echo e($motor_pembiayaan_dana->pabrikan_motor->name); ?></dd>

                          
                        </dl>

                        <hr>

                        <form action="<?php echo e(route('admin.angsuran_pembiayaan_dana.update', $angsuran_pembiayaan_dana->id)); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PUT')); ?>



                            <div class="form-group row">
                                
                                <label for="pencairan" class="col-sm-2 col-form-label text-md-right">Pencairan</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control <?php echo e($errors->has('pencairan') ? 'is-invalid' : ''); ?>" name="pencairan" id="pencairan" value="<?php echo e(old('pencairan', $angsuran_pembiayaan_dana->pencairan)); ?>">
                                    <?php if($errors->has('pencairan')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('pencairan')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <label for="tahun" class="col-sm-2 col-form-label text-md-right">Tahun</label>
                                <div class="col-sm-3">
                                    <select class="form-control <?php echo e($errors->has('tahun') ? 'is-invalid' : ''); ?>" name="tahun" id="tahun">
                                        <option></option>
                                        <?php for($i = 2000; $i < date('Y'); $i++): ?>
                                            <option <?php echo e(old('tahun', $angsuran_pembiayaan_dana->tahun) == $i ? 'selected=""' : ''); ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
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
                                
                                <label for="status_stnk_id" class="col-sm-2 col-form-label text-md-right">Status STNK</label>
                                <div class="col-sm-3">
                                    <select class="form-control <?php echo e($errors->has('status_stnk_id') ? 'is-invalid' : ''); ?>" name="status_stnk_id" id="status_stnk_id">
                                        <option></option>
                                        <?php $__currentLoopData = $list_status_stnk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_stnk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('status_stnk_id', $angsuran_pembiayaan_dana->status_stnk_id) == $status_stnk->id ? 'selected=""' : ''); ?> value="<?php echo e($status_stnk->id); ?>"><?php echo e($status_stnk->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('status_stnk_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('status_stnk_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <label for="status_bpkb_id" class="col-sm-2 col-form-label text-md-right">Status BPKB</label>
                                <div class="col-sm-3">
                                    <select class="form-control <?php echo e($errors->has('status_bpkb_id') ? 'is-invalid' : ''); ?>" name="status_bpkb_id" id="status_bpkb_id">
                                        <option></option>
                                        <?php $__currentLoopData = $list_status_bpkb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_bpkb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('status_bpkb_id', $angsuran_pembiayaan_dana->status_bpkb_id) == $status_bpkb->id ? 'selected=""' : ''); ?> value="<?php echo e($status_bpkb->id); ?>"><?php echo e($status_bpkb->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('status_bpkb_id')): ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($errors->first('status_bpkb_id')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php $__currentLoopData = $list_tempo_angsuran_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group row">
                                    <label for="tempo_angsuran_pembiayaan_dana_id" class="col-sm-2 col-form-label text-md-right"><?php echo e($tempo_angsuran_pembiayaan_dana->tempo . ' Bulan'); ?></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control tempo_angsuran_pembiayaan_dana_id <?php echo e($errors->has('tempo_angsuran_pembiayaan_dana_id') ? 'is-invalid' : ''); ?>" name="tempo_angsuran_pembiayaan_dana_id[<?php echo e($tempo_angsuran_pembiayaan_dana->id); ?>]" id="tempo_angsuran_pembiayaan_dana_id" value="<?php  

                                            $angsuran_pembiayaan_dana_detail = $angsuran_pembiayaan_dana->angsuran_pembiayaan_dana_detail->where('tempo_angsuran_pembiayaan_dana_id', $tempo_angsuran_pembiayaan_dana->id)->first();

                                            if($angsuran_pembiayaan_dana_detail){
                                                echo old('tempo_angsuran_pembiayaan_dana_id['. $tempo_angsuran_pembiayaan_dana->id .']', $angsuran_pembiayaan_dana_detail->angsuran_per_bulan);
                                            }else{
                                                echo old('tempo_angsuran_pembiayaan_dana_id['. $tempo_angsuran_pembiayaan_dana->id .']');
                                            }


                                        ?>">
                                        <?php if($errors->has('tempo_angsuran_pembiayaan_dana_id')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('tempo_angsuran_pembiayaan_dana_id')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.angsuran_pembiayaan_dana.index', $angsuran_pembiayaan_dana->motor_pembiayaan_dana->id)); ?>" class="btn btn-secondary">Cancel</a>
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
            $('.tempo_angsuran_pembiayaan_dana_id').mask('000.000.000.000.000', {reverse: true});
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/admin/angsuran_pembiayaan_dana/edit.blade.php */ ?>