
@extends('layouts.app2')

@section('seo_title',  $motor->name . ' | '. \App\ContentVariable::getValue('website_title'))

@section('content')
	<div class="container py-50">
        <div class="row">
            <div class="col-md-8 mb-30">
                <div class="card border-0 shadow-lg mb-3">
                    <div class="card-body">
                        <nav aria-label="breadcrumb bg-white">
                            <ol class="breadcrumb bg-white px-0">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('beli-motor')}}">Motor</a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">{{$motor->pabrikan_motor->name}}</a></li> --}}
                                <li class="breadcrumb-item">{{$motor->name}}</li>
                            </ol>
                        </nav>

                        <div class="row">
                            <div class="col-md-5">

                                <div class="card mb-20">
                                    <div class="card-body p-1">
                                    	@if($motor->photo_motor()->count())
	                                        <div class="outer">
	                                            <div id="big" class="owl-carousel owl-theme">
	                                            	@foreach($motor->photo_motor as $photo_motor)
														<div class="item">
		                                                    <img src="{{asset('uploads/'. $photo_motor->photo)}}" class="img-fluid" alt="Dana Syariah Motor">
		                                                </div>
	                                            	@endforeach
	                                            </div>
	                                            <div id="thumbs" class="owl-carousel owl-theme">
	                                                @foreach($motor->photo_motor as $photo_motor)
														<div class="item">
		                                                    <img src="{{asset('uploads/'. $photo_motor->photo)}}" class="img-fluid" alt="Dana Syariah Motor">
		                                                </div>
	                                            	@endforeach
	                                            </div>
	                                        </div>
                                        @else
                                            <img src="{{asset('uploads/no_image.png')}}" alt="Dana Syariah Motor" class="img-fluid">
                                        @endif
                                    </div>
                                </div>

                                <div class="card mb-20">
                                    <div class="card-body">

                                        <div class="media">
                                            <img style="width: 15%;" src="{{asset('dsm_design/dist/img/guarantee-icon.png')}}" class="mr-3" alt="...">
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
                                            <img style="width: 15%;" src="{{asset('dsm_design/dist/img/award-icon.png')}}" class="mr-3" alt="...">
                                            <div class="media-body">
                                                <h6 class="mt-0 font-weight-light">PLATFORM MOTOR ONLINE</h6>
                                                <p class="text-primary mb-0"><small>TERPERCAYA</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-7">
                                <h2 class="h5">{{$motor->name}}</h2>
                                <p>{{$motor->pabrikan_motor->name}}</p>

                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        

                                        <form action="{{route('submit-pengajuan-online')}}" method="POST">

                                            {{csrf_field()}}

                                            <input type="hidden" name="motor_id" id="motor_id" value="{{$motor->id}}">

                                            

                                            @if($motor->angsuran_motor()->count() > 0)

                                                <h3 class="h4 text-center">Harga Kredit</h3>
												

												

                                                <div class="row mb-20">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="wilayah_kredit_motor_id">Lokasi</label>
                                                            <select name="wilayah_kredit_motor_id" id="wilayah_kredit_motor_id" name="wilayah_kredit_motor_id" class="form-control {{$errors->has('wilayah_kredit_motor_id') ? 'is-invalid' : ''}}">
                                                                <option value="">Lokasi Anda</option>
                                                                @foreach($list_wilayah_kredit_motor as $wilayah_kredit_motor)
                                                                    <option value="{{$wilayah_kredit_motor->id}}">{{$wilayah_kredit_motor->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('wilayah_kredit_motor_id'))
                                                                <div class="invalid-feedback">
                                                                    {{$errors->first('wilayah_kredit_motor_id')}}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
	                                                <div class="col-md-12">
	                                                    <h4 class="h5 text-center mb-20"><small>OTR </small>Rp. {{ number_format($motor->harga,0,",",".") }}</h4>
	                                                </div>
	                                            </div>
                                                
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card bg-warning">
                                                            <div class="card-body text-dark">
                                                                <h5 class="text-center">PROMO SPESIAL</h5>
                                                                <ul>
                                                                    @if($motor->has_discount_dp)                                                                                          
                                                                        <li>Diskon DP Hingga {{$motor->angsuran_motor_with_biggest_discount_dp->discount_dp}}%</li>
                                                                    @endif
                                                                    <li>Gratis Pengiriman Motor & STNK</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                

	                                            <div class="row">
	                                                <div class="col-md-12">
	                                                    <div class="form-group">
	                                                        <label for="angsuran_motor_id">DP <span class="discount_label" style="display: none;">Normal <small>(sebelum diskon)</small></span></label>
	                                                        <select name="angsuran_motor_id" id="angsuran_motor_id" name="angsuran_motor_id" class="form-control  {{$errors->has('angsuran_motor_id') ? 'is-invalid' : ''}}">
	                                                        	<option value="" data-json_angsuran_motor="">DP</option>
	                                                        	@foreach($motor->angsuran_motor as $angsuran_motor)
	                                                            	<option data-json_angsuran_motor="{{$angsuran_motor->toJson()}}" value="{{$angsuran_motor->id}}">{{'Rp. '. number_format($angsuran_motor->dp, 2, ',', '.')}} {{$angsuran_motor->discount_dp ? '(Diskon DP '. $angsuran_motor->discount_dp .'%)' : ''}}</option>
	                                                            @endforeach
	                                                        </select>
                                                            @if($errors->has('angsuran_motor_id'))
                                                                <div class="invalid-feedback">
                                                                    {{$errors->first('angsuran_motor_id')}}
                                                                </div>
                                                            @endif
	                                                    </div>
	                                                </div>
	                                            </div>

                                                <div class="row row_dp_bayar" style="display: none;">
	                                                <div class="col-md-12">
	                                                    <div class="form-group">
	                                                        <label for="angsuran_motor_id" class="d-flex justify-content-between">
                                                                <span>DP Bayar</span> 
                                                                <span>
                                                                    <small class="dp_real_label"><strike>2.700.000</strike></small>
                                                                    <span class="dp_bayar_label text-warning font-weight-bold">2.700.000</span>
                                                                </span>
                                                            </label>
	                                                    </div>
	                                                </div>
	                                            </div>


	                                            <div class="row">
	                                                <div class="col-md-12">
	                                                    <div class="form-group">
	                                                        <label for="angsuran_motor_detail_id">Tenor Cicilan</label>
	                                                        <select name="angsuran_motor_detail_id" id="angsuran_motor_detail_id" name="angsuran_motor_detail_id" class="form-control {{$errors->has('angsuran_motor_detail_id') ? 'is-invalid' : ''}}">
	                                                            <option value=""></option>
	                                                        </select>
                                                            @if($errors->has('angsuran_motor_detail_id'))
                                                                <div class="invalid-feedback">
                                                                    {{$errors->first('angsuran_motor_detail_id')}}
                                                                </div>
                                                            @endif
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            <div class="row mb-20">
	                                                <div class="col-md-12">
	                                                    <button type="submit" class="btn btn-block btn-warning">Ajukan Kredit</button>
	                                                </div>
	                                            </div>

	                                            {{-- <div class="row">
	                                                <div class="col-md-12">
	                                                    <p class="text-center"><a class="text-white" href="#">Lihat Table Cicilan</a> | <a class="text-white" href="#">Cara Kredit?</a></p>
	                                                </div>
	                                            </div> --}}

                                            @else
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
                                            @endif

	                                            

	                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-lg mb-3">
                    <div class="card-body">

                        <div class="card border-0 mb-3" style="background-color: #eee;">
                            <div class="card-body text-center">
                                <h3 class="mb-3 text-primary">Spesfikasi Umum</h3>

                                <div class="row">
                                    <div class="col-md-3">CC: {{$motor->kapasitas_mesin ? $motor->kapasitas_mesin->cc : '-'}}</div>
                                    <div class="col-md-3">Pembakaran: {{$motor->jenis_pembakaran ? $motor->jenis_pembakaran->name : '-'}}</div>
                                    <div class="col-md-3">Transmisi: {{$motor->jenis_transmisi ? $motor->jenis_transmisi->name : '-'}}</div>
                                    <div class="col-md-3">Type: {{$motor->type_motor ? $motor->type_motor->name : '-'}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <a class="nav-link active" id="fitur-tab" data-toggle="pill" href="#fitur" role="tab" aria-controls="fitur" aria-selected="true">Fitur</a>

                                    @foreach($list_kategori_spesifikasi as $kategori_spesifikasi)
                                        <a class="nav-link" id="{{str_slug($kategori_spesifikasi->name)}}-tab" data-toggle="pill" href="#{{str_slug($kategori_spesifikasi->name)}}" role="tab" aria-controls="{{str_slug($kategori_spesifikasi->name)}}" aria-selected="true">{{$kategori_spesifikasi->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="fitur" role="tabpanel" aria-labelledby="fitur-tab">
                                        {!!$motor->fitur!!}
                                    </div>

                                    @foreach($list_kategori_spesifikasi as $kategori_spesifikasi)
                                        
                                        <div class="tab-pane fade" id="{{str_slug($kategori_spesifikasi->name)}}" role="tabpanel" aria-labelledby="{{str_slug($kategori_spesifikasi->name)}}-tab">
                                            <?php  
                                            $list_spesifikasi_motor = App\SpesifikasiMotor::where([
                                                ['kategori_spesifikasi_id', '=', $kategori_spesifikasi->id],
                                                ['motor_id', '=', $motor->id],
                                            ])->get();
        
                                            
                                            ?>
        
                                            @if($list_spesifikasi_motor->count() > 0)
        
                                                
                                                @foreach($list_spesifikasi_motor as $spesifikai_motor)
                                                
                                                    {!!$spesifikai_motor->value!!}
                                                
                                                @endforeach
                                            
        
                                            @else
                                                <p class="text-center">No spesification on this category</p>    
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-4">
                    <h6 class="mb-4 font-weight-light">Ulasan</h6>
                    <div class="card border-0 shadow-lg">

                        <div class="card-body p-2">

                            @if($motor->testimoni_motor->count() > 0)

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


                                @foreach($motor->testimoni_motor as $testimoni_motor)
                                    <div class="row mb-10">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h2 class="h6">{{$testimoni_motor->name}}</h2>
                                                    <div class="d-flex justify-content-between">
                                                        <span>
                                                            @for($i = 0; $i < $testimoni_motor->rate; $i++)
                                                                <i class="fa fa-star text-primary"></i>
                                                            @endfor
                                                        </span>
                                                        <span class="text-primary">{{$testimoni_motor->rate}}.0</span>
                                                    </div>
                                                    <div><small>{{$testimoni_motor->created_at->format('d-m-Y H:i:s')}}</small></div>
                                                    <p>{{$testimoni_motor->message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                @endforeach

                            @else 
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <p class="mb-0">Belum ada testimoni tersedia</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="mb-3 font-weight-light">Produk Lainnya</h6>
                    <div class="card border-0 shadow-lg">

                        <?php $motor_random = App\Motor::whereHas('photo_motor')->whereHas('angsuran_motor')->with([
                            'photo_motor'
                        ])->inRandomOrder()->limit(4)->get() ?>

                        <div class="card-body">
                            <div class="row">
                                @foreach($motor_random as $motor)
                                    <div class="col-md-6 mb-3">
                                        <a class="text-dark" href="{{route('detail-motor', $motor->slug)}}">
                                            <div class="card border-0 shadow-sm d-flex justify-content-between" style="height: 100%;">
                                                <div class="card-img text-center p-3">
                                                    <img data-src="{{$motor->photo_motor()->count() > 0 ? asset('uploads/' . $motor->photo_motor->first()->photo) : asset('img/no-image.gif') }}" class="lazy img-fluid" alt="Dana Syariah Motor">
                                                </div>
                                                <div class="card-body d-flex flex-column justify-content-end">
                                                    <p class="text-center font-weight-bold"><small>{{$motor->name}}</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
                
            	var json_angsuran_motor = $('#angsuran_motor_id').find('option:selected').data('json_angsuran_motor');
            	
                console.log(json_angsuran_motor);
                console.log(json_angsuran_motor.angsuran_motor_detail);
                

                if(json_angsuran_motor.discount_dp){
                    $('.discount_label').show();
                    $('.row_dp_bayar').show();
                    $('.dp_real_label').html('<strike>Rp. '+ number_format(json_angsuran_motor.dp, 0, ',', '.') +'</strike>');
                    $('.dp_bayar_label').html('Rp'+ number_format(json_angsuran_motor.dp_calculated, 0, ',', '.'));
                }else{
                    $('.discount_label').hide();
                    $('.row_dp_bayar').hide();
                }
            	
            	$('#angsuran_motor_detail_id').find('option').remove().append('<option value="" data-json_angsuran_motor_detail=""></option>');

            	json_angsuran_motor.angsuran_motor_detail.forEach(function(angsuran_motor_detail){
            		$('#angsuran_motor_detail_id').append('<option value="'+ angsuran_motor_detail.id +'">'+ angsuran_motor_detail.tempo_angsuran_motor.tempo +'x Bulan x Rp. '+ number_format(angsuran_motor_detail.angsuran_per_bulan, 0, ',', '.') +'</option');
            	});
            	
            });
        });
    </script>
@endsection