<?php $__env->startSection('content'); ?>

    <header class="main-header py-80 h-100 bg-gradient__lush text-white h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="my-3 text-center">
                        <h1>AKAD KREDIT</h1>
                        <h2 class="font-weight-light">SYARIAH</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img data-src="<?php echo e(asset('dsm_design/dist/img/two-men-handshake@2x.png')); ?>" class="lazy img-fluid" alt="">
                </div>
            </div>
        </div>
    </header>

    <section class="py-50">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 mb-4">
                    <p>Dana Syariah merupakan fasilitas pembiayaan kembali  dengan menggunakan Prinsip Syariah bagi pemilik kendaraan bermotor (roda dua) untuk memenuhi berbagai macam kebutuhan. Baik itu kebutuhan saat ini atau pun dijadikan bentuk investasi masa depan.</p>

                    <p>Modal BPKB motor Yamaha, Honda, Kawasaki, dan Suzuki Satria berumur maksimal 10 tahun, Anda bisa mendapatkan pembiayaan hingga 30 JUTA RUPIAH!</p>
                </div>
                <div class="col-md-6 mb-4">
                    <img data-src="<?php echo e(asset('dsm_design/dist/img/vespa-and-bpkb@2x.png')); ?>" class="lazy img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="py-50 bg-success text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-12 mb-4">
                    <h2 class="text-center mb-4">PROSES PENGAJUAN</h2>

                    <div class="row">
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/proses-pengajuan-1-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Surveyor Datang Menemui Customer</h3>
                        </div>
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/proses-pengajuan-2-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Cek Kondisi Motor</h3>
                        </div>
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/proses-pengajuan-3-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Wawancara</h3>
                        </div>
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/proses-pengajuan-4-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Persetujuan Dokumen</h3>
                        </div>
                        <div class="col text-center">
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/proses-pengajuan-5-200x200.png')); ?>" class="lazy img-fluid mb-3" alt="">
                            <h3 class="h5">Dana Tunai Cair</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-50 text-center">
                    <h1>Simulasi Pembiayaan Dana Syariah</h1>
                    <p class="lead">Detail Pembiayaan Anda</p>
                </div>
            </div>

            <form >
                <div class="row">

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="wilayah_id">Wilayah</label>
                            <select name="wilayah_id" id="wilayah_id" class="form-control custom-form-control">
                                <option value="">:: Kota Kamu Tinggal ::</option>
                                <?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="motor_id">Motor</label>
                            <select name="motor_id" id="motor_id" class="form-control custom-form-control">
                                <option value="">:: Pilih Motor ::</option>
                                <?php $__currentLoopData = $list_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-json_angsuran_motor="<?php echo e($motor->angsuran_motor->toJson()); ?>" value="<?php echo e($motor->id); ?>"><?php echo e($motor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="angsuran_motor_id">Uang Muka</label>
                            <select name="angsuran_motor_id" id="angsuran_motor_id" class="form-control custom-form-control">
                                <option value="">:: Pilih Uang Muka ::</option>
                            </select>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="angsuran_motor_detail_id">Jangka Waktu</label>
                            <select name="angsuran_motor_detail_id" id="angsuran_motor_detail_id" class="form-control custom-form-control">
                                <option value="">:: Pilih Jangka Waktu ::</option>
                            </select>
                        </div>    
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
<?php /* C:\xampp\htdocs\dsm\resources\views/akad-kredit.blade.php */ ?>