<?php $__env->startSection('content'); ?>
	<div class="container py-50">
		<div class="row">
			<div class="col-md-4">
				<div class="card border-0 shadow-sm">
					<div class="card-header bg-white">
						FILTER
					</div>
					<div class="card-body">
						<form>

							<?php if(request()->has('keyword')): ?>
								<input type="hidden" name="keyword" id="keyword" value="<?php echo e(request()->get('keyword')); ?>">
							<?php endif; ?>

						  	<div class="form-group">
							    <label for="exampleInputEmail1">BRAND</label>
							    <div class="row mb-3">
							    	<div class="col-6">
							    		<button class="btn btn-secondary bg-white border-secondary"><img data-src="<?php echo e(asset('img/yamaha-brand@2x.png')); ?>" alt="" class="lazy img-fluid"></button>
							    	</div>
							    </div>
							</div>

							<hr>

							<?php if($list_type_motor): ?>
								<div class="form-group">
								    <label for="exampleInputEmail1">TYPE</label>
								    <div class="row mb-3">

								    	<?php $__currentLoopData = $list_type_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" name="type_motor_ids[]" value="<?php echo e($type_motor->id); ?>" class="custom-control-input" id="type_motor_ids-<?php echo e($type_motor->id); ?>" 
												  	<?php if(request()->has('type_motor_ids')): ?>
														<?php if(in_array($type_motor->id, request()->get('type_motor_ids'))): ?>
															checked=""
														<?php endif; ?>
												  	<?php endif; ?>
												  	>
												  	<label class="custom-control-label" for="type_motor_ids-<?php echo e($type_motor->id); ?>"><?php echo e($type_motor->name); ?></label>
												</div>
									    	</div>
								    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								    </div>
								</div>
								<hr>
							<?php endif; ?>
							
							<?php if($list_warna_motor): ?>
								<div class="form-group">
								    <label for="exampleInputEmail1">WARNA</label>
								    <div class="row mb-3">

								    	<?php $__currentLoopData = $list_warna_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warna_motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" name="warna_motor_ids[]" value="<?php echo e($warna_motor->id); ?>" class="custom-control-input" id="warna_motor_ids-<?php echo e($warna_motor->id); ?>"
												  	<?php if(request()->has('warna_motor_ids')): ?>
														<?php if(in_array($warna_motor->id, request()->get('warna_motor_ids'))): ?>
															checked=""
														<?php endif; ?>
												  	<?php endif; ?>
												  	>
												  	<label class="custom-control-label" for="warna_motor_ids-<?php echo e($warna_motor->id); ?>"><?php echo e($warna_motor->name); ?></label>
												</div>
									    	</div>
								    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								    </div>
								</div>
								<hr>
							<?php endif; ?>

							
							<?php if($list_kapasitas_mesin): ?>
								<div class="form-group">
								    <label for="exampleInputEmail1">KAPASITAS MESIN</label>
								    <div class="row mb-3">
								    	<?php $__currentLoopData = $list_kapasitas_mesin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kapasitas_mesin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" name="kapasitas_mesin_ids[]" value="<?php echo e($kapasitas_mesin->id); ?>" class="custom-control-input" id="kapasitas_mesin_ids-<?php echo e($kapasitas_mesin->id); ?>" 
												  	<?php if(request()->has('kapasitas_mesin_ids')): ?>
														<?php if(in_array($kapasitas_mesin->id, request()->get('kapasitas_mesin_ids'))): ?>
															checked=""
														<?php endif; ?>
												  	<?php endif; ?>
												  	>
												  	<label class="custom-control-label" for="kapasitas_mesin_ids-<?php echo e($kapasitas_mesin->id); ?>"><?php echo e($kapasitas_mesin->cc . ' cc'); ?></label>
												</div>
									    	</div>
								    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								    </div>
								</div>
								<hr>
							<?php endif; ?>
							
							<?php  
							$tahun_min = App\Motor::min('tahun');
							$tahun_max = App\Motor::max('tahun');
							?>

							<?php if($tahun_min && $tahun_max): ?>
								<div class="form-group">
								    <label for="exampleInputEmail1">Tahun</label>
								    <div class="row mb-3">
										<?php for($i = $tahun_min; $i <= $tahun_max; $i++): ?>
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" class="custom-control-input" name="tahun[]" value="<?php echo e($i); ?>" id="tahun-<?php echo e($i); ?>"
												  	<?php if(request()->has('tahun')): ?>
														<?php if(in_array($i, request()->get('tahun'))): ?>
															checked=""
														<?php endif; ?>
												  	<?php endif; ?>
												  	>
												  	<label class="custom-control-label" for="tahun-<?php echo e($i); ?>"><?php echo e($i); ?></label>
												</div>
									    	</div>
								    	<?php endfor; ?>
								    </div>
								</div>
								<hr>
							<?php endif; ?>

							

						  	<button type="submit" class="btn btn-primary btn-block">Filter</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<h6 class="py-3">MOTOR</h6>
					</div>
				</div>
				<div class="row">

					<?php $__empty_1 = true; $__currentLoopData = $list_motor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<div class="col-md-4 mb-3">
							<div class="card border-0 shadow-sm d-flex justify-content-between" style="height: 100%;">
								<div class="card-img text-center p-3">
									<img data-src="<?php echo e($motor->photo_motor()->count() > 0 ? asset('uploads/' . $motor->photo_motor->first()->photo) : asset('img/no-image.gif')); ?>" class="lazy img-fluid" alt="">
								</div>
								<div class="card-body d-flex flex-column justify-content-end">
									<h5><a class="text-dark" href="<?php echo e(route('detail-motor', $motor->slug)); ?>"><?php echo e($motor->name); ?></a></h5>
									<p class="text-secondary mb-0">DP Hanya</p>
									
									<?php $angsuran_motor = $motor->angsuran_motor()->orderBy('dp', 'ASC')->first() ?>

									<?php if($angsuran_motor): ?>

										<?php if($motor->has_discount_dp): ?>
											<h5 class="font-weight-bold text-primary">Rp. <?php echo e(number_format($angsuran_motor->dp_calculated,0,",",".")); ?></h5>
											<h6 class="text-secondary"><strike>Rp. <?php echo e(number_format($angsuran_motor->dp,0,",",".")); ?></strike></h6>
										<?php else: ?>
											<h5 class="font-weight-bold text-primary">Rp. <?php echo e(number_format($angsuran_motor->dp,0,",",".")); ?></h5>
										<?php endif; ?>

										
										
									<?php else: ?>
										<h6 class="text-secondary">Belum ada harga tersedia</h6>
									<?php endif; ?>
									
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<div class="col-md-12 mb-3">
							<p class="text-center">No Product</p>
						</div>
					<?php endif; ?>

				</div>

				<div class="row py-3">
					<div class="col-md-12">
						<?php echo e($list_motor
								->appends([
									'type_motor_ids' => request()->get('type_motor_ids'),
									'warna_motor_ids' => request()->get('warna_motor_ids'),
									'kapasitas_mesin_ids' => request()->get('kapasitas_mesin_ids'),
									'tahun' => request()->get('tahun'),
								])
								->links()); ?>

						
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /home/danasyariahmotor/public_html/resources/views/beli-motor.blade.php */ ?>