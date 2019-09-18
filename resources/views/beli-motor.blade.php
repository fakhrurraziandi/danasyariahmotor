
@extends('layouts.app2')


@section('seo_title', \App\ContentVariable::getValue('seo_title__beli_motor') . ' | '. \App\ContentVariable::getValue('website_title'))

@section('content')
	<div class="container py-50">
		<div class="row">
			<div class="col-md-4">
				<div class="card border-0 shadow-sm">
					<div class="card-header bg-white">
						FILTER
					</div>
					<div class="card-body">
						<form>

							@if(request()->has('keyword'))
								<input type="hidden" name="keyword" id="keyword" value="{{request()->get('keyword')}}">
							@endif

						  	<div class="form-group">
							    <label for="exampleInputEmail1">BRAND</label>
							    <div class="row mb-3">
							    	<div class="col-6">
							    		<button class="btn btn-secondary bg-white border-secondary"><img data-src="{{asset('img/yamaha-brand@2x.png')}}" alt="Dana Syariah Motor" class="lazy img-fluid"></button>
							    	</div>
							    </div>
							</div>

							<hr>

							@if($list_type_motor)
								<div class="form-group">
								    <label for="exampleInputEmail1">TYPE</label>
								    <div class="row mb-3">

								    	@foreach($list_type_motor as $type_motor)
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" name="type_motor_ids[]" value="{{$type_motor->id}}" class="custom-control-input" id="type_motor_ids-{{$type_motor->id}}" 
												  	@if(request()->has('type_motor_ids'))
														@if(in_array($type_motor->id, request()->get('type_motor_ids')))
															checked=""
														@endif
												  	@endif
												  	>
												  	<label class="custom-control-label" for="type_motor_ids-{{$type_motor->id}}">{{$type_motor->name}}</label>
												</div>
									    	</div>
								    	@endforeach
								    </div>
								</div>
								<hr>
							@endif
							
							@if($list_warna_motor)
								<div class="form-group">
								    <label for="exampleInputEmail1">WARNA</label>
								    <div class="row mb-3">

								    	@foreach($list_warna_motor as $warna_motor)
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" name="warna_motor_ids[]" value="{{$warna_motor->id}}" class="custom-control-input" id="warna_motor_ids-{{$warna_motor->id}}"
												  	@if(request()->has('warna_motor_ids'))
														@if(in_array($warna_motor->id, request()->get('warna_motor_ids')))
															checked=""
														@endif
												  	@endif
												  	>
												  	<label class="custom-control-label" for="warna_motor_ids-{{$warna_motor->id}}">{{$warna_motor->name}}</label>
												</div>
									    	</div>
								    	@endforeach
								    </div>
								</div>
								<hr>
							@endif

							
							@if($list_kapasitas_mesin)
								<div class="form-group">
								    <label for="exampleInputEmail1">KAPASITAS MESIN</label>
								    <div class="row mb-3">
								    	@foreach($list_kapasitas_mesin as $kapasitas_mesin)
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" name="kapasitas_mesin_ids[]" value="{{$kapasitas_mesin->id}}" class="custom-control-input" id="kapasitas_mesin_ids-{{$kapasitas_mesin->id}}" 
												  	@if(request()->has('kapasitas_mesin_ids'))
														@if(in_array($kapasitas_mesin->id, request()->get('kapasitas_mesin_ids')))
															checked=""
														@endif
												  	@endif
												  	>
												  	<label class="custom-control-label" for="kapasitas_mesin_ids-{{$kapasitas_mesin->id}}">{{$kapasitas_mesin->cc . ' cc'}}</label>
												</div>
									    	</div>
								    	@endforeach
								    </div>
								</div>
								<hr>
							@endif
							
							<?php  
							$tahun_min = App\Motor::min('tahun');
							$tahun_max = App\Motor::max('tahun');
							?>

							@if($tahun_min && $tahun_max)
								<div class="form-group">
								    <label for="exampleInputEmail1">Tahun</label>
								    <div class="row mb-3">
										@for($i = $tahun_min; $i <= $tahun_max; $i++)
									    	<div class="col-6 my-1">
									    		<div class="custom-control custom-checkbox">
												  	<input type="checkbox" class="custom-control-input" name="tahun[]" value="{{$i}}" id="tahun-{{$i}}"
												  	@if(request()->has('tahun'))
														@if(in_array($i, request()->get('tahun')))
															checked=""
														@endif
												  	@endif
												  	>
												  	<label class="custom-control-label" for="tahun-{{$i}}">{{$i}}</label>
												</div>
									    	</div>
								    	@endfor
								    </div>
								</div>
								<hr>
							@endif

							

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

					@forelse($list_motor as $motor)
						<div class="col-md-4 mb-3">

							<a href="{{route('detail-motor', $motor->slug)}}" class="card border-0 shadow-sm d-flex justify-content-between text-dark" style="height: 100%;">
								
								
								<div class="card-img text-center p-3">
									<img data-src="{{$motor->photo_motor()->count() > 0 ? asset('uploads/' . $motor->photo_motor->first()->photo) : asset('img/no-image.gif') }}" class="lazy img-fluid" alt="Dana Syariah Motor">
								</div>
								<div class="card-body d-flex flex-column justify-content-end">
									<h5>{{$motor->name}}</h5>
									<p class="text-secondary mb-0">DP Hanya</p>
									
									<?php $angsuran_motor = $motor->angsuran_motor()->orderBy('dp', 'ASC')->first() ?>

									@if($angsuran_motor)

										@if($motor->has_discount_dp)
											<h5 class="font-weight-bold text-primary">Rp. {{number_format($angsuran_motor->dp_calculated,0,",",".")}}</h5>
											<h6 class="text-secondary"><strike>Rp. {{number_format($angsuran_motor->dp,0,",",".")}}</strike></h6>
										@else
											<h5 class="font-weight-bold text-primary">Rp. {{number_format($angsuran_motor->dp,0,",",".")}}</h5>
										@endif

										
										
									@else
										<h6 class="text-secondary">Belum ada harga tersedia</h6>
									@endif
									
								</div>
								
							</a>
						</div>
					@empty
						<div class="col-md-12 mb-3">
							<p class="text-center">No Product</p>
						</div>
					@endforelse

				</div>

				<div class="row py-3">
					<div class="col-md-12">
						{{
							$list_motor
								->appends([
									'type_motor_ids' => request()->get('type_motor_ids'),
									'warna_motor_ids' => request()->get('warna_motor_ids'),
									'kapasitas_mesin_ids' => request()->get('kapasitas_mesin_ids'),
									'tahun' => request()->get('tahun'),
								])
								->links()
						}}
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection