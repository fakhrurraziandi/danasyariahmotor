<?php $__env->startSection('content'); ?>

    <header class="main-header py-80 h-100 bg-gradient__lush text-white h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="my-3 text-center">
                        <h1>PENGAJUAN</h1>
                        <h2 class="font-weight-light">ONLINE</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img data-src="<?php echo e(asset('dsm_design/dist/img/vespa-only@2x.png')); ?>" class="lazy img-fluid" alt="">
                </div>
            </div>
        </div>
    </header>

    <section class="py-50">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 mb-4">
                   <p>Melakukan Pembiayaan Motor melalui BAF sangat Cepat, Ringan, dan Aman. Anda tidak perlu susah-susah ke dealer Yamaha dan mengajukan pembiayaan motor Yamaha. Anda hanya butuh 1 menit mengisi pengajuan aplikasi secara online dengan data Anda yang sebenarnya dan nomot handphone yang dapat dihubungi. Segera setelah pengisian, tim kami akan menghubungi Anda.</p>

                    <p>Tidak perlu khawatir, BAF sudah melayani pelanggan setia kami di seluruh pelosok Indonesia dengan bantuan lebih dari 250 cabang yang siap membantu Anda untuk kenyamanan pembiayaan Anda bersama Bussan Auto Finance</p>
                </div>
                <div class="col-md-6 mb-4 text-center">
                    <img data-src="<?php echo e(asset('dsm_design/dist/img/vespa-circle@2x.png')); ?>" class="lazy img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="py-50 bg-success text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-12 mb-4">
                    <h2 class="text-center mb-4">PERSYARATAN UMUM</h2>

                    <div class="row">
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/persyaratan-umum-1-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Usia 21-60 tahun dan atau sudah berkeluarga</h3>
                        </div>
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/persyaratan-umum-2-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Fotokopi Kartu Keluarga atau Akte Nikah</h3>
                        </div>
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/persyaratan-umum-3-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Fotokopi PBB 2 tahun terakhir atau rekening listrik 6 bulan terakhir</h3>
                        </div>
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/persyaratan-umum-4-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Fotokopi KTP / SIM / Passpor (dan pasangan)</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-100" id="section-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-50 text-center">
                    <h1>Hitung Estimasi Cicilan Bulanan Anda</h1>
                    <p class="lead">Detail Pembiayaan Anda</p>
                </div>
            </div>

            <form action="<?php echo e(route('submit-pengajuan-online')); ?>#section-form" method="POST">

                <?php echo e(csrf_field()); ?>

                

                <div class="row">

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="wilayah_kredit_motor_id">Wilayah</label>
                            <select name="wilayah_kredit_motor_id" id="wilayah_kredit_motor_id" class="form-control custom-form-control <?php echo e($errors->has('wilayah_kredit_motor_id') ? 'is-invalid' : ''); ?>">
                                <option value="">:: Kota Kamu Tinggal ::</option>
                                <?php $__currentLoopData = $list_wilayah_kredit_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_kredit_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($wilayah_kredit_motor->id); ?>"><?php echo e($wilayah_kredit_motor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('wilayah_kredit_motor_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('wilayah_kredit_motor_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="motor_id">Motor</label>
                            <select name="motor_id" id="motor_id" class="form-control custom-form-control <?php echo e($errors->has('motor_id') ? 'is-invalid' : ''); ?>">
                                <option value="">:: Pilih Motor ::</option>
                                <?php $__currentLoopData = $list_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('motor_id') == $motor->id ? 'selected=""' : ''); ?> data-json_angsuran_motor="<?php echo e($motor->angsuran_motor->toJson()); ?>" value="<?php echo e($motor->id); ?>"><?php echo e($motor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('motor_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('motor_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="angsuran_motor_id">Uang Muka</label>
                            <select name="angsuran_motor_id" id="angsuran_motor_id" class="form-control custom-form-control <?php echo e($errors->has('angsuran_motor_id') ? 'is-invalid' : ''); ?>">
                                <option value="">:: Pilih Uang Muka ::</option>
                            </select>
                            <?php if($errors->has('angsuran_motor_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('angsuran_motor_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="angsuran_motor_detail_id">Jangka Waktu</label>
                            <select name="angsuran_motor_detail_id" id="angsuran_motor_detail_id" class="form-control custom-form-control <?php echo e($errors->has('angsuran_motor_detail_id') ? 'is-invalid' : ''); ?>">
                                <option value="">:: Pilih Jangka Waktu ::</option>
                            </select>
                            <?php if($errors->has('angsuran_motor_detail_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('angsuran_motor_detail_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Note: <i>Pengajuan anda akan diteruskan kepada sales sesuai dengan lokasi profile anda.</i></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary">Ajukan Kredit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>



    
        
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){

            function number_format (number, decimals, dec_point, thousands_sep) {
                // Strip all characters but numerical ones.
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function (n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            onChangeMotorIdHandler();

            function onChangeMotorIdHandler(){

                var json_angsuran_motor = $('#motor_id').find('option:selected').data('json_angsuran_motor');

                console.log(json_angsuran_motor);

                if(json_angsuran_motor){
                    
                    $('#angsuran_motor_id').find('option').remove();
                    $('#angsuran_motor_id').append('<option value="">:: Pilih Uang Muka ::</option>');

                    $('#angsuran_motor_detail_id').find('option').remove();
                    $('#angsuran_motor_detail_id').append('<option value="">:: Pilih Jangka Waktu ::</option>');

                    json_angsuran_motor.forEach(function(angsuran_motor){
                        $('#angsuran_motor_id').append('<option data-json_angsuran_motor_detail=\''+ JSON.stringify(angsuran_motor.angsuran_motor_detail) +'\' value="'+ angsuran_motor.id +'">Rp. '+ number_format(angsuran_motor.dp, 0, ',', '.') +'</option>');
                    });
                }
                    

                onChangeAngsuranMotorIdhandler();
            }

            function onChangeAngsuranMotorIdhandler(){
                var json_angsuran_motor_detail = $('#angsuran_motor_id').find('option:selected').data('json_angsuran_motor_detail');

                console.log(json_angsuran_motor_detail);

                if(json_angsuran_motor_detail){
                    $('#angsuran_motor_detail_id').find('option').remove();
                    $('#angsuran_motor_detail_id').append('<option value="">:: Pilih Jangka Waktu ::</option>');
                    json_angsuran_motor_detail.forEach(function(angsuran_motor_detail){
                        $('#angsuran_motor_detail_id').append('<option value="'+ angsuran_motor_detail.id +'">'+ angsuran_motor_detail.tempo_angsuran_motor.tempo +' Bulan x Rp. '+ number_format(angsuran_motor_detail.angsuran_per_bulan, 0, ',', '.') +'</option>');
                    });
                }

                    
            }

            $('#motor_id').on('change', onChangeMotorIdHandler);

            

            $('#angsuran_motor_id').on('change', onChangeAngsuranMotorIdhandler);


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/pengajuan-online.blade.php */ ?>