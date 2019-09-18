<?php $__env->startSection('content'); ?>
	<div class="container py-50">
        <div class="row">
            <div class="col-md-9 mb-30">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <nav aria-label="breadcrumb bg-white">
                            <ol class="breadcrumb bg-white px-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('beli-motor')); ?>">Motor</a></li>
                                <li class="breadcrumb-item"><a href="#"><?php echo e($motor->pabrikan_motor->name); ?></a></li>
                                <li class="breadcrumb-item"><?php echo e($motor->name); ?></li>
                            </ol>
                        </nav>

                        <div class="row">
                            <div class="col-md-5">

                                <div class="card mb-20">
                                    <div class="card-body p-1">
                                    	<?php if($motor->photo_motor): ?>
	                                        <div class="outer">
	                                            <div id="big" class="owl-carousel owl-theme">
	                                            	<?php $__currentLoopData = $motor->photo_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="item">
		                                                    <img src="<?php echo e(asset('uploads/'. $photo_motor->photo)); ?>" class="img-fluid" alt="">
		                                                </div>
	                                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                            </div>
	                                            <div id="thumbs" class="owl-carousel owl-theme">
	                                                <?php $__currentLoopData = $motor->photo_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="item">
		                                                    <img src="<?php echo e(asset('uploads/'. $photo_motor->photo)); ?>" class="img-fluid" alt="">
		                                                </div>
	                                            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                            </div>
	                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="card mb-20">
                                    <div class="card-body">

                                        <div class="media">
                                            <img style="width: 15%;" src="<?php echo e(asset('dsm_design/dist/img/guarantee-icon.png')); ?>" class="mr-3" alt="...">
                                            <div class="media-body">
                                                <h6 class="mt-0 font-weight-light">Jaminan Transaksi 100% Aman</h6>
                                                <p class="text-muted mb-0"><small>Tanpa ada biaya tambahan & informasi data diri terjamin kerahasiaannya.</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-20">
                                    <div class="card-body">

                                        <div class="media">
                                            <img style="width: 15%;" src="<?php echo e(asset('dsm_design/dist/img/award-icon.png')); ?>" class="mr-3" alt="...">
                                            <div class="media-body">
                                                <h6 class="mt-0 font-weight-light">PLATFORM MOTOR ONLINE</h6>
                                                <p class="text-primary mb-0"><small>PERTAMA DI INDONESIA</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-7">
                                <h2 class="h5">Yamaha YZR R-15</h2>
                                <p>Yamaha</p>

                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h3 class="h4 text-center">Harga Kredit</h3>
                                        <form>
                                            <div class="row mb-20">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wilayah_id">Lokasi</label>
                                                        <select name="wilayah_id" id="wilayah_id" name="wilayah_id" class="form-control">
                                                        	<?php $__currentLoopData = $list_wilayah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wilayah): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            	<option value="<?php echo e($wilayah->id); ?>"><?php echo e($wilayah->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="motor_id">Type Motor</label>
                                                        <select name="motor_id" id="motor_id" name="motor_id" class="form-control">
                                                        	<?php $__currentLoopData = $list_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            	<option data-slug="<?php echo e($motor->slug); ?>" value="<?php echo e($motor->id); ?>"><?php echo e($motor->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if($motor->angsuran_motor()->count() > 0): ?>
												

												<div class="row">
	                                                <div class="col-md-12">
	                                                    <h4 class="h5 text-center mb-20"><small>OTR</small> Rp. 35.760.000</h4>

	                                                    <div class="card bg-warning text-dark mb-20">
	                                                        <div class="card-body">
	                                                            <h5 class="text-center">PROMO SPESIAL</h5>
	                                                            <ul class="mb-0">
	                                                                <li>Diskon DP hingga 1.9 juta</li>
	                                                                <li>Gratsi Pengiriman Motor & STNK</li>
	                                                            </ul>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="row">
	                                                <div class="col-md-12">
	                                                    <div class="form-group">
	                                                        <label for="angsuran_motor_id">DP </label>
	                                                        <select name="angsuran_motor_id" id="angsuran_motor_id" name="angsuran_motor_id" class="form-control">
	                                                        	<option value="" data-json_angsuran_motor_detail=""></option>
	                                                        	<?php $__currentLoopData = $motor->angsuran_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $angsuran_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                                            	<option data-json_angsuran_motor_detail="<?php echo e($angsuran_motor->angsuran_motor_detail()->with('tempo_angsuran_motor')->get()->toJson()); ?>" value="<?php echo e($angsuran_motor->id); ?>"><?php echo e('Rp. '. number_format($angsuran_motor->dp, 2, ',', '.')); ?></option>
	                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                                        </select>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            

	                                            <div class="row">
	                                                <div class="col-md-12">
	                                                    <div class="form-group">
	                                                        <label for="angsuran_motor_detail_id">Tenor Cicilan</label>
	                                                        <select name="angsuran_motor_detail_id" id="angsuran_motor_detail_id" name="angsuran_motor_detail_id" class="form-control">
	                                                            <option value=""></option>
	                                                        </select>
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="row mb-20">
	                                                <div class="col-md-12">
	                                                    <button type="submit" class="btn btn-block btn-warning">Ajukan Kredit</button>
	                                                </div>
	                                            </div>

	                                            <div class="row">
	                                                <div class="col-md-12">
	                                                    <p class="text-center"><a class="text-white" href="#">Lihat Table Cicilan</a> | <a class="text-white" href="#">Cara Kredit?</a></p>
	                                                </div>
	                                            </div>

                                            <?php else: ?>
												<div class="row">
	                                                <div class="col-md-12">
	                                                    <h4 class="h5 text-center mb-20"><small>OTR</small> Rp. 35.760.000</h4>

	                                                    <div class="card bg-warning text-dark mb-20">
	                                                        <div class="card-body">
	                                                            <p class="text-center mb-0">Mohon Maaf Cicilan Belum Tersedia Untuk Type Motor Ini</p>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
                                            <?php endif; ?>

	                                            

	                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <h6 class="mb-4 font-weight-light">Ulasan</h6>
                <div class="card border-0 shadow-lg">

                    <div class="card-body p-2">
                        <div class="row mb-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-4 text-center">
                                                <h2>4.3</h2>
                                            </div>
                                            <div class="col-md-8 text-center">
                                                <div>
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-primary"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                                <div>
                                                    <span class="text-primary">170</span> Review
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                           
                        </div>

                        <div class="row mb-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h6">Ardiyanto</h2>
                                        <div>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <span class="text-primary">5.0</span>
                                        </div>
                                        <div><small>25 November 2019</small></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, voluptatibus?</p>
                                        <p><a href="#">Baca selengkapnya</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h6">Ardiyanto</h2>
                                        <div>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <span class="text-primary">5.0</span>
                                        </div>
                                        <div><small>25 November 2019</small></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, voluptatibus?</p>
                                        <p><a href="#">Baca selengkapnya</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h6">Ardiyanto</h2>
                                        <div>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <i class="fa fa-star text-primary"></i>
                                            <span class="text-primary">5.0</span>
                                        </div>
                                        <div><small>25 November 2019</small></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, voluptatibus?</p>
                                        <p><a href="#">Baca selengkapnya</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
        $(document).ready(function() {
            var bigimage = $("#big");
            var thumbs = $("#thumbs");
            //var totalslides = 10;
            var syncedSecondary = true;

            bigimage
                .owlCarousel({
                    items: 1,
                    autoHeight:true,
                    slideSpeed: 2000,
                    nav: true,
                    autoplay: true,
                    dots: false,
                    loop: true,
                    responsiveRefreshRate: 200,
                    navText: [
                        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                    ]
                })
                .on("changed.owl.carousel", syncPosition);

            thumbs
                .on("initialized.owl.carousel", function() {
                    thumbs
                        .find(".owl-item")
                        .eq(0)
                        .addClass("current");
                })
                .owlCarousel({
                    autoHeight:true,
                    items: 4,
                    dots: true,
                    nav: true,
                    navText: [
                        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                    ],
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: 4,
                    responsiveRefreshRate: 100
                })
                .on("changed.owl.carousel", syncPosition2);

            function syncPosition(el) {
                //if loop is set to false, then you have to uncomment the next line
                //var current = el.item.index;

                //to disable loop, comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //to this
                thumbs
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = thumbs.find(".owl-item.active").length - 1;
                var start = thumbs
                    .find(".owl-item.active")
                    .first()
                    .index();
                var end = thumbs
                    .find(".owl-item.active")
                    .last()
                    .index();

                if (current > end) {
                    thumbs.data("owl.carousel").to(current, 100, true);
                }
                if (current < start) {
                    thumbs.data("owl.carousel").to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    bigimage.data("owl.carousel").to(number, 100, true);
                }
            }

            thumbs.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                bigimage.data("owl.carousel").to(number, 300, true);
            });



            $('#angsuran_motor_id').on('change', function(){
            	var json_angsuran_motor_detail = $('#angsuran_motor_id').find('option:selected').data('json_angsuran_motor_detail');
            	console.log(json_angsuran_motor_detail);

            	
            	$('#angsuran_motor_detail_id').find('option').remove().append('<option value="" data-json_angsuran_motor_detail=""></option>');

            	json_angsuran_motor_detail.forEach(function(angsuran_motor_detail){
            		$('#angsuran_motor_detail_id').append('<option value="'+ angsuran_motor_detail.id +'">'+ angsuran_motor_detail.tempo_angsuran_motor.tempo +'x Bulan x Rp. '+ angsuran_motor_detail.angsuran_per_bulan +'</option');
            	});
            	
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\dsm\resources\views/detail-motor.blade.php */ ?>