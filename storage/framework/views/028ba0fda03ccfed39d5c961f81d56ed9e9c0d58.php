<?php 
use App\Wilayah; 
use App\SpvPembiayaanDana;
?>




<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new CS Pembiayaan Dana</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.cs_pembiayaan_dana.store')); ?>" method="POST">

                            <?php echo e(csrf_field()); ?>


                           
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" id="name" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>">
                                        <?php if($errors->has('name')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('name')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" id="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                                        <?php if($errors->has('email')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('email')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" id="password" name="password" placeholder="Password" value="<?php echo e(old('password')); ?>">
                                        <?php if($errors->has('password')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('password')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('phone_number') ? 'is-invalid' : ''); ?>" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?php echo e(old('phone_number')); ?>">
                                        <?php if($errors->has('phone_number')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('phone_number')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wilayah_pembiayaan_dana_ids">Wilayah</label>
                                        <select class="form-control <?php echo e($errors->has('wilayah_pembiayaan_dana_ids') ? 'is-invalid' : ''); ?>" id="wilayah_pembiayaan_dana_ids" name="wilayah_pembiayaan_dana_ids[]" placeholder="Wilayah" multiple="">
                                            <?php $__currentLoopData = $list_wilayah_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($wilayah_pembiayaan_dana->id); ?>"><?php echo e($wilayah_pembiayaan_dana->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <div class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" id="wilayah_pembiayaan_dana_ids_select_all" name="wilayah_pembiayaan_dana_ids_select_all">
                                            <label class="custom-control-label" for="wilayah_pembiayaan_dana_ids_select_all">Select All</label>
                                        </div>

                                      

                                        <?php if($errors->has('wilayah_pembiayaan_dana_ids')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('wilayah_pembiayaan_dana_ids')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            

                           
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.cs_pembiayaan_dana.index')); ?>" class="btn btn-secondary">Cancel</a>
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

            $('#wilayah_pembiayaan_dana_ids').select2();

            $("#wilayah_pembiayaan_dana_ids_select_all").click(function(){
                if($("#wilayah_pembiayaan_dana_ids_select_all").is(':checked') ){
                    console.log('checked');
                    $("#wilayah_pembiayaan_dana_ids > option").prop("selected", true);
                    $("#wilayah_pembiayaan_dana_ids").trigger("change");
                }else{
                    console.log('unchecked');
                    $("#wilayah_pembiayaan_dana_ids > option").prop("selected", false);
                    $("#wilayah_pembiayaan_dana_ids").trigger("change");
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/cs_pembiayaan_dana/create.blade.php */ ?>