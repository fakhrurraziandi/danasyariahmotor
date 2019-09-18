<?php use Laravolt\Indonesia\Models\Province; ?>


<?php $__env->startSection('content'); ?>
<div class="container" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h2 class="text-center font-weight-light">Registrasi Berhasil</h2>
            <p>Selamat anda telah berhasil terdaftar sebagai customer di Dana Syariah Motor</p>
            <p><a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>">Kembali Ke Halaman Utama</a></p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        $(function(){
            function provinceIdOnChangeHandler(){
                var json = $('#province_id').find('option:selected').data('json');
                if(json){
                    $('#city_id').find('option').remove();
                    $('#city_id').append('<option>:: Kota ::</option>')
                    json.cities.forEach(function(city){
                        $('#city_id').append('<option value="'+ city.id +'">'+ city.name +'</option>')
                    });
                }
                
            }
            $('#province_id').on('change', provinceIdOnChangeHandler);
            provinceIdOnChangeHandler();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/auth/user-register-success.blade.php */ ?>