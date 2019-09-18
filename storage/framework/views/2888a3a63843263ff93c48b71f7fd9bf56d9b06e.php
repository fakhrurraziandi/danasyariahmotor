<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new content variable</div>
                    <div class="card-body">

                        <form action="<?php echo e(route('admin.content_variable.store')); ?>" method="POST" enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="key">Key</label>
                                        <input type="text" class="form-control <?php echo e($errors->has('key') ? 'is-invalid' : ''); ?>" id="key" name="key" placeholder="Key" value="<?php echo e(old('key')); ?>">
                                        <?php if($errors->has('key')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('key')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control <?php echo e($errors->has('type') ? 'is-invalid' : ''); ?>" id="type" name="type" placeholder="Type" type="<?php echo e(old('type')); ?>">
                                            <option <?php echo e(old('type') == 'text' ? 'selected=""' : ''); ?> value="text">Text</option>
                                            <option <?php echo e(old('type') == 'html' ? 'selected=""' : ''); ?> value="html">HTML</option>
                                        </select>
                                        <?php if($errors->has('type')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('type')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-value_text" style="display: none;">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="value_text">Value</label>
                                        <textarea rows="8" class="form-control <?php echo e($errors->has('value_text') ? 'is-invalid' : ''); ?>" id="value_text" name="value_text" placeholder="Value" ><?php echo e(old('value_text')); ?></textarea>
                                        <?php if($errors->has('value_text')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('value_text')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row row-value_html" style="display: none;">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="value_html">Value</label>
                                        <textarea rows="8" class="form-control <?php echo e($errors->has('value_html') ? 'is-invalid' : ''); ?>" id="value_html" name="value_html" placeholder="Value"><?php echo e(old('value_html')); ?></textarea>
                                        <?php if($errors->has('value_html')): ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($errors->first('value_html')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo e(route('admin.content_variable.index')); ?>" class="btn btn-secondary">Cancel</a>
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
        $(function(){

            function onTypeChangeHandler(){
                var type = $('#type').val();
                console.log(type);
                if(type == 'text'){
                    $('.row-value_text').show();
                    $('.row-value_html').hide();
                }

                if(type == 'html'){
                    $('.row-value_text').hide();
                    $('.row-value_html').show();
                }
            }
            
            onTypeChangeHandler();
            $('#type').on('change', onTypeChangeHandler);

            $('#value_html').ckeditor();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/admin/content_variable/create.blade.php */ ?>