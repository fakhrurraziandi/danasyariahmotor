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
                    <p>Dana Syariah Motor merupakan fasilitas pembiayaan kembali  dengan menggunakan Prinsip Syariah bagi pemilik kendaraan bermotor (roda dua) untuk memenuhi berbagai macam kebutuhan. Baik itu kebutuhan saat ini atau pun dijadikan bentuk investasi masa depan.</p>

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
                    <h1>Cek Online Pembiayaan Dana Syariah Motor</h1>
                    <!--<p class="lead">Detail Pembiayaan Anda</p>-->
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('submit-akad-kredit')); ?>">

                <?php echo e(csrf_field()); ?>


                <div class="row">

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="wilayah_pembiayaan_dana_id">Wilayah</label>
                            <select name="wilayah_pembiayaan_dana_id" id="wilayah_pembiayaan_dana_id" class="form-control <?php echo e($errors->has('wilayah_pembiayaan_dana_id') ? 'is-invalid' : ''); ?> custom-form-control">
                                <option value="">:: Kota Kamu Tinggal ::</option>
                                <?php $__currentLoopData = $list_wilayah_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($wilayah_pembiayaan_dana->id); ?>"><?php echo e($wilayah_pembiayaan_dana->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('wilayah_pembiayaan_dana_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('wilayah_pembiayaan_dana_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="tempo_angsuran_pembiayaan_dana_id">Jangka Waktu</label>
                            <select name="tempo_angsuran_pembiayaan_dana_id" id="tempo_angsuran_pembiayaan_dana_id" class="form-control <?php echo e($errors->has('tempo_angsuran_pembiayaan_dana_id') ? 'is-invalid' : ''); ?> custom-form-control">
                                <option value="">:: Pilih Jangka Waktu ::</option>
                                <?php $__currentLoopData = $list_tempo_angsuran_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempo_angsuran_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tempo_angsuran_pembiayaan_dana->id); ?>"><?php echo e($tempo_angsuran_pembiayaan_dana->tempo); ?> Bulan</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('tempo_angsuran_pembiayaan_dana_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('tempo_angsuran_pembiayaan_dana_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="motor_pembiayaan_dana_id">Motor</label>
                            <select name="motor_pembiayaan_dana_id" id="motor_pembiayaan_dana_id" class="form-control <?php echo e($errors->has('motor_pembiayaan_dana_id') ? 'is-invalid' : ''); ?> custom-form-control">
                                <option value="">:: Pilih Motor ::</option>
                                <?php $__currentLoopData = $list_motor_pembiayaan_dana; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor_pembiayaan_dana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($motor_pembiayaan_dana->id); ?>"><?php echo e($motor_pembiayaan_dana->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('motor_pembiayaan_dana_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('motor_pembiayaan_dana_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

					<div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="motor_pembiayaan_dana_id">Tahun</label>
                            <select name="tahun_motor" id="tahun_motor" class="form-control <?php echo e($errors->has('tahun_motor') ? 'is-invalid' : ''); ?> custom-form-control">
                                <option value="">:: Pilih Tahun ::</option>
                                <?php $__currentLoopData = $list_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tahun_motor); ?>"><?php echo e($tahun_motor); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('tahun_motor')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('tahun_motor')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>
					
                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="status_stnk_id">Status STNK</label>
                            <select name="status_stnk_id" id="status_stnk_id" class="form-control <?php echo e($errors->has('status_stnk_id') ? 'is-invalid' : ''); ?> custom-form-control">
                                <option value="">:: Status STNK ::</option>
                                <?php $__currentLoopData = $list_status_stnk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_stnk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status_stnk->id); ?>"><?php echo e($status_stnk->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('status_stnk_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('status_stnk_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="status_bpkb_id">Status BPKB</label>
                            <select name="status_bpkb_id" id="status_bpkb_id" class="form-control <?php echo e($errors->has('status_bpkb_id') ? 'is-invalid' : ''); ?> custom-form-control">
                                <option value="">:: Status BPKB ::</option>
                                <?php $__currentLoopData = $list_status_bpkb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_bpkb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status_bpkb->id); ?>"><?php echo e($status_bpkb->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('status_bpkb_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('status_bpkb_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="status_rumah_id">Status Kepemilikan Rumah</label>
                            <select name="status_rumah_id" id="status_rumah_id" class="form-control <?php echo e($errors->has('status_rumah_id') ? 'is-invalid' : ''); ?> custom-form-control">
                                <option value="">:: Status Kepemilikan Rumah ::</option>
                                <?php $__currentLoopData = $list_status_rumah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_rumah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status_rumah->id); ?>"><?php echo e($status_rumah->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('status_rumah_id')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('status_rumah_id')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

					<div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="plafond_pembiayaan_disetujui">Nilai Cair Bersih diterima</label>
                            <input name="plafond_pembiayaan_disetujui" id="plafond_pembiayaan_disetujui" class="form-control custom-form-control" />
                        </div>    
                    </div>
					<div class="col-md-3 mb-4">
                        <div class="form-group">
                            <label for="angsuran">Angsuran Tiap Bulan</label>
                            <input name="angsuran" id="angsuran" class="form-control custom-form-control" />
                        </div>    
                    </div>
                  

                    

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Ajukan Kredit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>


    
        
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){

            function onChangeCalculateField(){
                const motor_pembiayaan_dana_id = $('#motor_pembiayaan_dana_id').val();
                const wilayah_pembiayaan_dana_id = $('#wilayah_pembiayaan_dana_id').val();
                const tahun_motor = $('#tahun_motor').val();
                const status_stnk_id = $('#status_stnk_id').val();
                const status_bpkb_id = $('#status_bpkb_id').val();
                const tempo_angsuran_pembiayaan_dana_id = $('#tempo_angsuran_pembiayaan_dana_id').val();

                console.log(motor_pembiayaan_dana_id, wilayah_pembiayaan_dana_id, tahun_motor, status_stnk_id, status_bpkb_id, tempo_angsuran_pembiayaan_dana_id);

                if(motor_pembiayaan_dana_id && wilayah_pembiayaan_dana_id && tahun_motor && status_stnk_id && status_bpkb_id && tempo_angsuran_pembiayaan_dana_id){
                    console.log('run');
                    
                    $.ajax({
                        url: "<?php echo e(URL::to('get_pencarian_pembiayaan_dana')); ?>",
                        type: 'POST',
                        data: {
                            motor_pembiayaan_dana_id: motor_pembiayaan_dana_id, 
                            wilayah_pembiayaan_dana_id: wilayah_pembiayaan_dana_id, 
                            tahun_motor: tahun_motor, 
                            status_stnk_id: status_stnk_id, 
                            status_bpkb_id: status_bpkb_id,
                            tempo_angsuran_pembiayaan_dana_id: tempo_angsuran_pembiayaan_dana_id
                        },
                        success: function(result){
                            if(result.status == true){
                                $('#plafond_pembiayaan_disetujui').val(number_format(result.data.angsuran_pembiayaan_dana.pencairan, 0, ',', '.'));
                                $('#angsuran').val(number_format(result.data.angsuran_pembiayaan_dana_detail.angsuran_per_bulan, 0, ',', '.'));
                            }
                        }
                    })
                }
            }

            $('#motor_pembiayaan_dana_id').on('change', onChangeCalculateField);
            $('#wilayah_pembiayaan_dana_id').on('change', onChangeCalculateField);
            $('#tahun_motor').on('change', onChangeCalculateField);
            $('#status_stnk_id').on('change', onChangeCalculateField);
            $('#status_bpkb_id').on('change', onChangeCalculateField);
            $('#tempo_angsuran_pembiayaan_dana_id').on('change', onChangeCalculateField);

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

            $('#plafond_pembiayaan').mask('000.000.000.000.000', {reverse: true});


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/fakhrurraziandi/Code/danasyariahmotor.com/resources/views/akad-kredit.blade.php */ ?>