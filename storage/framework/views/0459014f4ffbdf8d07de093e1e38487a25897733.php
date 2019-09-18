<?php $__env->startSection('content'); ?>

    


    <section class="py-100" id="section-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-50 text-center">
                    <h1>Kontak Kami</h1>
                    <p class="lead">Hubungi kami untuk pertanyaan dan keluhan anda</p>
                </div>
            </div>

			

            <form action="<?php echo e(route('submit-kontak-kami')); ?>#section-form" method="POST">

                <?php echo e(csrf_field()); ?>


				<div class="row my-5">
					<div class="col-md-12">
						<?php if(Session::get('kontak_kami_success')): ?>
							<div class="alert alert-primary alert-dismissible fade show" role="alert">
								<strong>Success!</strong> Pesan anda telah kami terima!
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>
					</div>
				</div>
                

                <div class="row">

                    <div class="col-md-4 mb-4">
                        <div class="form-group">
                            <label for="name">Nama</label>
                           	<input type="text" class="form-control custom-form-control <?php echo e($errors->has('name') ? 'is-invalid' : ''); ?>" name="name" id="name" placeholder="Nama Lengkap Anda">
                            <?php if($errors->has('name')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

					<div class="col-md-4 mb-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                           	<input type="email" class="form-control custom-form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" name="email" id="email" placeholder="Alamat Email Anda">
                            <?php if($errors->has('email')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('email')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

					<div class="col-md-4 mb-4">
                        <div class="form-group">
                            <label for="phone_number">No Telephone/Handphone</label>
                           	<input type="text" class="form-control custom-form-control <?php echo e($errors->has('phone_number') ? 'is-invalid' : ''); ?>" name="phone_number" id="phone_number" placeholder="No Telephone/Handphone Anda">
                            <?php if($errors->has('phone_number')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('phone_number')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>


					<div class="col-md-12 mb-4">
                        <div class="form-group">
                            <label for="message">Pesan</label>
                           	<textarea class="form-control <?php echo e($errors->has('message') ? 'is-invalid' : ''); ?>" name="message" id="message" rows="10" placeholder="Pesan"></textarea>
                            <?php if($errors->has('message')): ?>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('message')); ?>

                                </div>
                            <?php endif; ?>
                        </div>    
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary px-5">Kirim</button>
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
<?php /* /home/fakhrurraziandi/Code/dsm/resources/views/contact-us.blade.php */ ?>