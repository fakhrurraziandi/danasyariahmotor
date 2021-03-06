@extends('layouts.app')

@section('seo_title', \App\ContentVariable::getValue('seo_title__pinjaman_syariah') . ' | '. \App\ContentVariable::getValue('website_title'))

@section('content')

    @if(!request()->has('from_register'))
        <header class="main-header py-80 h-100 bg-gradient__lush text-white h-100">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-lg-6 col-md-12">
                        <div class="my-3 text-center">
                            <h1>CARA DAN PROSES</h1>
                            <h2 class="font-weight-light">PENGAJUAN DANA SYARIAH</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <img data-src="{{asset('dsm_design/dist/img/two-men-handshake@2x.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                    </div>
                </div>
            </div>
        </header>

        <section class="py-50">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-6 mb-4">
                        <h5>DANA SYARIAH MOTOR MERUPAKAN SOLUSI KEBUTUHAN ANDA</h5>
                        <p>Mekanismenya benar-benar dirancang untuk memudahkan Anda. Bayangkan, proses pengajuan ini memakan waktu tidak sampai 10 menit. Anda sudah siap? Mari ikuti prosedur pengajuannya untuk mendapatkan solusi pembiayaan syariah Anda.</p>

                        <p>Dana syariah akan cair dalam waktu 1 hingga 2 hari kerja ke rekening Anda atau bisa langsung datang ke kantor cabang Dana Syariah Motor terdekat sesuai domisili Anda sambil membawa BPKB dan faktur asli.</p>  

                        <p>Seputar Pertanyan Umum Tentang Hukum Akad Syariah bisa <a href="https://danasyariahmotor.com/faq">Klik Disini</a></p>
                    </div>
                    <div class="col-md-6 mb-4">
                        <img data-src="{{asset('dsm_design/dist/img/vespa-and-bpkb@2x.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-50 bg-success text-white">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-md-12 mb-4">
                        <h2 class="text-center mb-4">ALUR MEKANISME PENCAIRAN SYARIAH</h2>

                        <div class="row">
                            <div class="col text-center">
                                <img data-src="{{asset('dsm_design/dist/img/proses-pengajuan-1-200x200.png')}}" class="lazy img-fluid mb-3" alt="Dana Syariah Motor">
                                <h3 class="h5">Surveyor Datang Menemui Customer</h3>
                            </div>
                            <div class="col text-center">
                                <img data-src="{{asset('dsm_design/dist/img/proses-pengajuan-2-200x200.png')}}" class="lazy img-fluid mb-3" alt="Dana Syariah Motor">
                                <h3 class="h5">Cek Kondisi Motor</h3>
                            </div>
                            <div class="col text-center">
                                <img data-src="{{asset('dsm_design/dist/img/proses-pengajuan-3-200x200.png')}}" class="lazy img-fluid mb-3" alt="Dana Syariah Motor">
                                <h3 class="h5">Penjelasan Mekanisme Syariah</h3>
                            </div>
                            <div class="col text-center">
                                <img data-src="{{asset('dsm_design/dist/img/proses-pengajuan-4-200x200.png')}}" class="lazy img-fluid mb-3" alt="Dana Syariah Motor">
                                <h3 class="h5">Persetujuan dan Kesepakatan Akad Syariah</h3>
                            </div>
                            <div class="col text-center">
                                <img data-src="{{asset('dsm_design/dist/img/proses-pengajuan-5-200x200.png')}}" class="lazy img-fluid mb-3" alt="Dana Syariah Motor">
                                <h3 class="h5">Dana Syariah Cair</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-50 text-center">
                    @if(request()->has('from_register'))
                        <h3 class="text-primary">Selamat anda telah berhasil terdaftar sebagai Konsumen DSM</h3>
                    @endif
                    <h3>SILAKAN ISI FORM PENGAJUAN DIBAWAH INI</h3>
                    <h6>Kami Bukan Pinjaman Tanpa Jaminan (Riba), Wajib Memiliki Kendaraan MOTOR Min Thn 2010 Dengan Mekanisme Syariah</h6>


                    <hr>
                </div>
            </div>

            <form method="POST" action="{{route('submit-akad-kredit')}}#form-akad-kredit"  id="form-akad-kredit"  enctype="multipart/form-data">

                {{csrf_field()}}

                

                <div class="form-group row mb-4"> 
                    <label for="wilayah_pembiayaan_id" class="col-sm-3 col-form-label text-md-right">Kantor Cabang</label>
                    <div class="col-sm-3">
                        <select name="wilayah_pembiayaan_dana_id" id="wilayah_pembiayaan_dana_id" class="form-control {{$errors->has('wilayah_pembiayaan_dana_id') ? 'is-invalid' : ''}} ">
                            <option value="">Kota / Kab Kamu Tinggal</option>
                            @foreach($list_wilayah_pembiayaan_dana as $wilayah_pembiayaan_dana)
                                <option {{old('wilayah_pembiayaan_dana_id') == $wilayah_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$wilayah_pembiayaan_dana->id}}">{{$wilayah_pembiayaan_dana->name}}</option>
                            @endforeach
                        </select>
						<Medium class="text-success"><i><b>PILIH KANTOR CABANG TERDEKAT DENGAN DOMISILI ANDA</b></i></Medium>
                        @if($errors->has('wilayah_pembiayaan_dana_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('wilayah_pembiayaan_dana_id')}}
                            </div>
                        @endif
                    </div>
                
                    <label for="motor_pembiayaan_dana_id" class="col-sm-3 col-form-label text-md-right">Motor</label>
                    <div class="col-sm-3">
                        <select name="motor_pembiayaan_dana_id" id="motor_pembiayaan_dana_id" class="form-control {{$errors->has('motor_pembiayaan_dana_id') ? 'is-invalid' : ''}} ">
                            <option value="">Pilih Motor</option>
                            @foreach($list_motor_pembiayaan_dana as $motor_pembiayaan_dana )
                                <option  {{old('motor_pembiayaan_dana_id') == $motor_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$motor_pembiayaan_dana->id}}">{{$motor_pembiayaan_dana->name}}</option>
                            @endforeach
                        </select>
						<Medium class="text-success"><i><b>PASTIKAN TIDAK SALAH MILIH TIPE DAN JENIS MOTOR</b></i></Medium>
                        @if($errors->has('motor_pembiayaan_dana_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('motor_pembiayaan_dana_id')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-4"> 
                    <label for="tahun_motor" class="col-sm-3 col-form-label text-md-right">Tahun Motor</label>
                    <div class="col-sm-3">
                        <select name="tahun_motor" id="tahun_motor" class="form-control {{$errors->has('tahun_motor') ? 'is-invalid' : ''}} ">
						                            <option value="">Pilih Tahun</option>
						     @foreach($list_tahun as $tahun_motor )
                                <option  {{old('tahun_motor') == $tahun_motor ? 'selected=""' : ''}} value="{{$tahun_motor}}">{{$tahun_motor}}</option>
                            @endforeach
                        </select>
						<Medium class="text-success"><i><b>MINIMAL TAHUN 2010</b></i></Medium>
                        @if($errors->has('tahun_motor'))
                            <div class="invalid-feedback">
                                {{$errors->first('tahun_motor')}}
                            </div>
							@endif
                    </div>
                {{-- </div>
				    <div class="form-group row mb-4">  --}}
                    <label for="status_stnk_id" class="col-sm-3 col-form-label text-md-right">Status STNK</label>
					<div class="col-sm-3">
                        <select name="status_stnk_id" id="status_stnk_id" class="form-control {{$errors->has('status_stnk_id') ? 'is-invalid' : ''}} ">
                            <option value="">Status STNK</option>
                            @foreach($list_status_stnk as $status_stnk )
                                <option {{old('status_stnk_id') == $status_stnk->id ? 'selected=""' : ''}} value="{{$status_stnk->id}}">{{$status_stnk->name}}</option>
                            @endforeach
                        </select>
						<Medium class="text-success"><i><b>STNK MATI TIDAK BISA DI PROSES</b></i></Medium>
                        {{-- <p class="mt-3"><small>Apabila status STNK mati dari 1 s/d 4 tahun harap menghubungi CS melalui icon whatsapp di bawah ini</small></p> --}}
                        @if($errors->has('status_stnk_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_stnk_id')}}
                            </div>
                        @endif
                    </div>
                </div>
                

                


                

                <div class="form-group row mb-4"> 
                    <label for="status_bpkb_id" class="col-sm-3 col-form-label text-md-right">Status Kepemilikan BPKB</label>
                    <div class="col-sm-3">
                        <select name="status_bpkb_id" id="status_bpkb_id" class="form-control {{$errors->has('status_bpkb_id') ? 'is-invalid' : ''}} ">
                            <option value="">Status BPKB</option>
                            @foreach($list_status_bpkb as $status_bpkb )
                                <option {{old('status_bpkb_id') == $status_bpkb->id ? 'selected=""' : ''}} value="{{$status_bpkb->id}}">{{$status_bpkb->name}}</option>
                            @endforeach
                        </select>
						<Medium class="text-success"><i><b>BPKB MASIH DI LEASING TIDAK BISA PROSES</b></i></Medium>
                        @if($errors->has('status_bpkb_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_bpkb_id')}}
                            </div>
                        @endif
                    </div>

                    <label for="status_pekerjaan" class="col-sm-3 col-form-label text-md-right">Status Pekerjaan</label>
                    <div class="col-sm-3">
                        <select name="status_pekerjaan" id="status_pekerjaan" class="form-control {{$errors->has('status_pekerjaan') ? 'is-invalid' : ''}} ">
                            <option value="">Status Pekerjaan</option>
                            <?php  
                            $list_status_pekerjaan = [
                                'Pegawai Swasta',
                                'Pegawai Negeri',
                                'Wirausaha / Dagang',
                                'Transportasi Online',
                            ];
                            ?>
                            @foreach($list_status_pekerjaan as $status_pekerjaan )
                                <option {{old('status_pekerjaan') == $status_pekerjaan ? 'selected=""' : ''}} value="{{$status_pekerjaan}}">{{$status_pekerjaan}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_pekerjaan'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_pekerjaan')}}
                            </div>
                        @endif
                    </div>
                </div> 


                <div class="form-group row mb-4"> 
                    <label for="status_sosial" class="col-sm-3 col-form-label text-md-right">Status Sosial</label>
                    <div class="col-sm-3">
                        <select name="status_sosial" id="status_sosial" class="form-control {{$errors->has('status_sosial') ? 'is-invalid' : ''}} ">
                            <option value="">Status Sosial</option>
                            <?php  
                            $list_status_sosial = [
                                'Menikah',
                                'Duda/Janda',
                                'Belum Nikah',
                            ];
                            ?>
                            @foreach($list_status_sosial as $status_sosial )
                                <option {{old('status_sosial') == $status_sosial ? 'selected=""' : ''}} value="{{$status_sosial}}">{{$status_sosial}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_sosial'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_sosial')}}
                            </div>
                        @endif
                    </div>
                
                    <label for="status_rumah_id" class="col-sm-3 col-form-label text-md-right">Status Kepemilikan Rumah</label>
                    <div class="col-sm-3">
                        <select name="status_rumah_id" id="status_rumah_id" class="form-control {{$errors->has('status_rumah_id') ? 'is-invalid' : ''}} ">
                            <option value="">Status Kepemilikan Rumah</option>
                            @foreach($list_status_rumah as $status_rumah )
                                <option {{old('status_rumah_id') == $status_rumah->id ? 'selected=""' : ''}} value="{{$status_rumah->id}}">{{$status_rumah->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_rumah_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_rumah_id')}}
                            </div>
                        @endif
                    </div>
                </div>

                <script>
                    function statusSosialOnChangeHandler(){
                        var value = $('#status_sosial').val();
                        if(value === 'Menikah'){
                            $('#row-persetujuan_pasangan').show();
                            $('#row-persetujuan_orang_tua').hide();
                        }else if(value === 'Belum Nikah'){
                            $('#row-persetujuan_pasangan').hide();
                            $('#row-persetujuan_orang_tua').show();
                        }else{
                            $('#row-persetujuan_pasangan').hide();
                            $('#row-persetujuan_orang_tua').hide();
                        }
                    }
                    $('#status_sosial').on('change', statusSosialOnChangeHandler);
                </script>

                <div class="form-group row mb-4" id="row-persetujuan_pasangan" style="display: none;"> 
                    <label for="persetujuan_pasangan" class="col-sm-3 col-form-label text-md-right">Apakah Pasangan Setuju Untuk Mengajukan Dana Syariah</label>
                    <div class="col-sm-9">
                        <select name="persetujuan_pasangan" id="persetujuan_pasangan" class="form-control {{$errors->has('persetujuan_pasangan') ? 'is-invalid' : ''}} ">
                            <option value="">Apakah Pasangan Setuju</option>
                            <?php  
                            $list_persetujuan_pasangan = [
                                'ya',
                                'tidak',
                            ];
                            ?>
                            @foreach($list_persetujuan_pasangan as $persetujuan_pasangan )
                                <option {{old('persetujuan_pasangan') == $persetujuan_pasangan ? 'selected=""' : ''}} value="{{$persetujuan_pasangan}}">{{ucwords($persetujuan_pasangan)}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('persetujuan_pasangan'))
                            <div class="invalid-feedback">
                                {{$errors->first('persetujuan_pasangan')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-4" id="row-persetujuan_orang_tua" style="display: none;"> 
                    <label for="persetujuan_orang_tua" class="col-sm-3 col-form-label text-md-right">Apakah Orang Tua Setuju Untuk Mengajukan Dana Syariah</label>
                    <div class="col-sm-9">
                        <select name="persetujuan_orang_tua" id="persetujuan_orang_tua" class="form-control {{$errors->has('persetujuan_orang_tua') ? 'is-invalid' : ''}} ">
                            <option value="">Apakah Orang Tua Setuju</option>
                            <?php  
                            $list_persetujuan_orang_tua = [
                                'ya',
                                'tidak',
                            ];
                            ?>
                            @foreach($list_persetujuan_orang_tua as $persetujuan_orang_tua )
                                <option {{old('persetujuan_orang_tua') == $persetujuan_orang_tua ? 'selected=""' : ''}} value="{{$persetujuan_orang_tua}}">{{ucwords($persetujuan_orang_tua)}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('persetujuan_orang_tua'))
                            <div class="invalid-feedback">
                                {{$errors->first('persetujuan_orang_tua')}}
                            </div>
                        @endif
                    </div>
                </div>
                              
                

                <div class="form-group row mb-4"> 
                    <label for="status_kartu_kredit" class="col-sm-3 col-form-label text-md-right">Memiliki Kartu Kredit?</label>
                    <div class="col-sm-9">
                        <select name="status_kartu_kredit" id="status_kartu_kredit" class="form-control {{$errors->has('status_kartu_kredit') ? 'is-invalid' : ''}} ">
                            <option value="">Memiliki Kartu Kredit?</option>
                            <?php  
                            $list_status_kartu_kredit = ['ya', 'tidak'];
                            ?>
                            @foreach($list_status_kartu_kredit as $status_kartu_kredit )
                                <option {{old('status_kartu_kredit') == $status_kartu_kredit ? 'selected=""' : ''}} value="{{$status_kartu_kredit}}">{{ucwords($status_kartu_kredit)}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_kartu_kredit'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_kartu_kredit')}}
                            </div>
                        @endif
                    </div>
                </div>

                <script>
                    $(function(){
                        function statusKartuKreditOnChangeHandler(){
                            
                            var value = $('#status_kartu_kredit').val();

                            if(value == 'ya'){
                                $('#row-status_pembayaran_kartu_kredit').show();
                            }else{
                                $('#row-status_pembayaran_kartu_kredit').hide();
                            }
                        }
                        
                        $('#status_kartu_kredit').on('change', statusKartuKreditOnChangeHandler);
                        statusKartuKreditOnChangeHandler();
                    });
                </script>

                <div class="form-group row mb-4" id="row-status_pembayaran_kartu_kredit" style="display: none;"> 
                    <label for="status_pembayaran_kartu_kredit" class="col-sm-3 col-form-label text-md-right">Bagaimana Pembayaran Kartu Kredit anda ?</label>
                    <div class="col-sm-9">
                        <select name="status_pembayaran_kartu_kredit" id="status_pembayaran_kartu_kredit" class="form-control {{$errors->has('status_pembayaran_kartu_kredit') ? 'is-invalid' : ''}} ">
                            <option value="">Bagaimana Pembayaran Kartu Kredit anda?</option>
                            <?php  
                            $list_status_pembayaran_kartu_kredit = [
                                'lancar',
                                'tidak lancar',
                            ];
                            ?>
                            @foreach($list_status_pembayaran_kartu_kredit as $status_pembayaran_kartu_kredit )
                                <option {{old('status_pembayaran_kartu_kredit') == $status_pembayaran_kartu_kredit ? 'selected=""' : ''}} value="{{$status_pembayaran_kartu_kredit}}">{{ucwords($status_pembayaran_kartu_kredit)}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_pembayaran_kartu_kredit'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_pembayaran_kartu_kredit')}}
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row mb-4"> 
                    <label for="status_pinjaman" class="col-sm-3 col-form-label text-md-right">Memiliki Pinjaman di Bank/Leasing/Koperasi ?</label>
                    <div class="col-sm-9">
                        <select name="status_pinjaman" id="status_pinjaman" class="form-control {{$errors->has('status_pinjaman') ? 'is-invalid' : ''}} ">
                            <option value="">Memiliki Pinjaman di Bank/Leasing/Koperasi?</option>
                            <?php  
                            $list_status_pinjaman = ['ya', 'tidak'];
                            ?>
                            @foreach($list_status_pinjaman as $status_pinjaman )
                                <option {{old('status_pinjaman') == $status_pinjaman ? 'selected=""' : ''}} value="{{$status_pinjaman}}">{{ucwords($status_pinjaman)}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('status_pinjaman'))
                            <div class="invalid-feedback">
                                {{$errors->first('status_pinjaman')}}
                            </div>
                        @endif
                    </div>
                </div>

                <script>
                    $(function(){
                        function statusPinjamanOnChangeHandler(){
                            
                            var value = $('#status_pinjaman').val();
                            console.log(value);

                            if(value == 'ya'){
                                $('#row-status_pinjaman_ya').show();
                            }else{
                                $('#row-status_pinjaman_ya').hide();
                            }
                        }
                        
                        $('#status_pinjaman').on('change', statusPinjamanOnChangeHandler);
                        statusPinjamanOnChangeHandler();
                    });
                </script>

                <div id="row-status_pinjaman_ya" style="display: none;">

                    <div class="form-group row mb-4" > 
                        <label for="nama_penyedia_pinjaman" class="col-sm-3 col-form-label text-md-right">Nama Bank/Leasing/Koperasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_penyedia_pinjaman" id="nama_penyedia_pinjaman" value="{{old('nama_penyedia_pinjaman')}}" placeholder="Nama Bank/Leasing/Koperasi" />
                            @if($errors->has('nama_penyedia_pinjaman'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nama_penyedia_pinjaman')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-4" > 
                        <label for="status_tunggakan_pinjaman" class="col-sm-3 col-form-label text-md-right">Apakah Masih Ada Tunggakan Pembayaran?</label>
                        <div class="col-sm-9">
                            <select name="status_tunggakan_pinjaman" id="status_tunggakan_pinjaman" class="form-control {{$errors->has('status_tunggakan_pinjaman') ? 'is-invalid' : ''}} ">
                                <option value="">Apakah Masih Ada Tunggakan Pembayaran?</option>
                                <?php  
                                $list_status_tunggakan_pinjaman = [
                                    'ya',
                                    'tidak',
                                ];
                                ?>
                                @foreach($list_status_tunggakan_pinjaman as $status_tunggakan_pinjaman )
                                    <option {{old('status_tunggakan_pinjaman') == $status_tunggakan_pinjaman ? 'selected=""' : ''}} value="{{$status_tunggakan_pinjaman}}">{{ucwords($status_tunggakan_pinjaman)}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_tunggakan_pinjaman'))
                                <div class="invalid-feedback">
                                    {{$errors->first('status_tunggakan_pinjaman')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-4" > 
                        <label for="pernah_terlambat" class="col-sm-3 col-form-label text-md-right">Pernah Terlambat Bayar Lebih dari 6 Hari?</label>
                        <div class="col-sm-9">
                            <select name="pernah_terlambat" id="pernah_terlambat" class="form-control {{$errors->has('pernah_terlambat') ? 'is-invalid' : ''}} ">
                                <option value="">Pernah Terlambat Bayar Lebih dari 6 Hari?</option>
                                <?php  
                                $list_pernah_terlambat = [
                                    'ya',
                                    'tidak',
                                ];
                                ?>
                                @foreach($list_pernah_terlambat as $pernah_terlambat )
                                    <option {{old('pernah_terlambat') == $pernah_terlambat ? 'selected=""' : ''}} value="{{$pernah_terlambat}}">{{ucwords($pernah_terlambat)}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pernah_terlambat'))
                                <div class="invalid-feedback">
                                    {{$errors->first('pernah_terlambat')}}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                

                <div class="form-group row mb-4" > 
                    <label for="keperluan_pinjaman" class="col-sm-3 col-form-label text-md-right">Kebutuhan Untuk Keperluan Apa</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="keperluan_pinjaman" id="keperluan_pinjaman" placeholder="Rencana Kebutuhan Untuk Keperluan Apa" >{{old('keperluan_pinjaman')}}</textarea>
                        @if($errors->has('keperluan_pinjaman'))
                            <div class="invalid-feedback">
                                {{$errors->first('keperluan_pinjaman')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-4" > 
                    <label for="plafond_pembiayaan_diinginkan" class="col-sm-3 col-form-label text-md-right">Berapa Kebutuhan Anda</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="plafond_pembiayaan_diinginkan" id="plafond_pembiayaan_diinginkan" value="{{old('plafond_pembiayaan_diinginkan')}}" placeholder="Berapa Kebutuhan Anda" />
                        @if($errors->has('plafond_pembiayaan_diinginkan'))
                            <div class="invalid-feedback">
                                {{$errors->first('plafond_pembiayaan_diinginkan')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-4" > 
                    <label for="tempo_angsuran_pembiayaan_dana_id" class="col-sm-3 col-form-label text-md-right">Tenor Sewa Motor yg di inginkan</label>
                    <div class="col-sm-9">
                        <select name="tempo_angsuran_pembiayaan_dana_id" id="tempo_angsuran_pembiayaan_dana_id" class="form-control">
                            <?php $list_tempo_angsuran_pembiayaan_dana = App\TempoAngsuranPembiayaanDana::all() ?>
                            <option value="">Tenor Sewa yg di inginkan</option>
                            @foreach($list_tempo_angsuran_pembiayaan_dana as $tempo_angsuran_pembiayaan_dana)
                                <option value="{{$tempo_angsuran_pembiayaan_dana->id}}">{{$tempo_angsuran_pembiayaan_dana->tempo}} Bulan</option>
                            @endforeach
                        </select>
                        @if($errors->has('tempo_angsuran_pembiayaan_dana_id'))
                            <div class="invalid-feedback">
                                {{$errors->first('tempo_angsuran_pembiayaan_dana_id')}}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- tempo_angsuran_pembiayaan_dana_id --}}

                

                
                

                

                <div class="form-group row mb-4" > 
                    <label for="bersedia_disurvey" class="col-sm-3 col-form-label text-md-right">Kapan bisa di survey ke rumah?</label>
                    <div class="col-sm-9">
                        <select name="bersedia_disurvey" id="bersedia_disurvey" class="form-control {{$errors->has('bersedia_disurvey') ? 'is-invalid' : ''}} ">
                            <option value="">Kapan bisa di survey ke rumah? (Wajib Survey di Rumah)</option>
                            <?php  
                            $list_bersedia_disurvey = [
                                'Dibawah Jam 12 Siang ',
                                'Diatas Jam 12 Siang',
                                'Sekitar Jam 7 Malam'
                            ];
                            ?>
                            @foreach($list_bersedia_disurvey as $bersedia_disurvey )
                                <option {{old('bersedia_disurvey') == $bersedia_disurvey ? 'selected=""' : ''}} value="{{$bersedia_disurvey}}">{{ucwords($bersedia_disurvey)}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('bersedia_disurvey'))
                            <div class="invalid-feedback">
                                {{$errors->first('bersedia_disurvey')}}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- <script>
                    function bersediaDisurveyOnChangeHandler(){
                        
                        var value = $('#bersedia_disurvey').val();

                        // console.log(value);  

                        if(value === 'tidak'){ 

                            $('#row-alasan_tidak_bersedia_disurvey').show();
                            
                        }else{
                            $('#row-alasan_tidak_bersedia_disurvey').hide();
                        }
                    }
                    $('#bersedia_disurvey').on('change', bersediaDisurveyOnChangeHandler);
                </script>

                <div class="form-group row mb-4" id="row-alasan_tidak_bersedia_disurvey" style="display: none;"> 
                    <label for="alasan_tidak_bersedia_disurvey" class="col-sm-3 col-form-label text-md-right">Alasan Tidak Bersedia Di Survey</label>
                    <div class="col-sm-9">
                        <textarea name="alasan_tidak_bersedia_disurvey" id="alasan_tidak_bersedia_disurvey" cols="30" rows="10" class="form-control" placeholder="Jika tidak bisa di survey, maka proses Pengajuan Dana Syariah tidak bisa di proses"></textarea> 
                        <p class="text-success"><medium><i>Jika tidak bisa di survey, maka proses Pengajuan Dana Syariah ini tidak bisa di proses.</i></medium></p>
                        @if($errors->has('alasan_tidak_bersedia_disurvey'))
                            <div class="invalid-feedback">
                                {{$errors->first('alasan_tidak_bersedia_disurvey')}}
                            </div>
                        @endif
                    </div>
                </div> --}}

                

                <div class="form-group row mb-4" > 
                    <label for="image_ktp" class="col-sm-3 col-form-label text-md-right">Upload Foto KTP</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image_ktp" id="image_ktp"/>
                        @if($errors->has('image_ktp'))
                            <div class="invalid-feedback">
                                {{$errors->first('image_ktp')}}
                            </div>
                        @endif
                    </div>
                </div>

                {{-- <div class="form-group row mb-4" > 
                    <label for="image_kk" class="col-sm-3 col-form-label text-md-right">Upload Foto KK</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image_kk" id="image_kk"/>
                        @if($errors->has('image_kk'))
                            <div class="invalid-feedback">
                                {{$errors->first('image_kk')}}
                            </div>
                        @endif
                    </div>
                </div> --}}

                <div class="form-group row mb-4" > 
                    <label for="image_stnk" class="col-sm-3 col-form-label text-md-right">Upload Foto STNK</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image_stnk" id="image_stnk"/>
                        @if($errors->has('image_stnk'))
                            <div class="invalid-feedback">
                                {{$errors->first('image_stnk')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-4" > 
                    <label for="image_bpkb" class="col-sm-3 col-form-label text-md-right">Upload Foto BPKB</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image_bpkb" id="image_bpkb"/>
                        @if($errors->has('image_bpkb'))
                            <div class="invalid-feedback">
                                {{$errors->first('image_bpkb')}}
                            </div>
                        @endif
                    </div>
                </div>

                


                

                

                <div class="row">
                    <div class="col-md-12 text-center">
                        <p style="display: none;" id="warning-for-user" class="text-danger text-center">Pengajuan Pinjaman Anda Akan segera kami proses dan akan di review kembali apakah jaminan BPKB motor tersebut bisa mencover pinjaman anda. Customer Service DSM akan segera menghubungi Anda.</p>
                        <button type="submit" id="btn-ajukan" class="btn btn-primary">Ajukan Dana Syariah</button>
                    </div>
                </div>
                
            </form>
        </div>
    </section>


    
        
@endsection

@section('scripts')

<div id="ajax-progress-bar" class="progress-wrapper" style="
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    width: 50vw;
    z-index: 9999;
    transform: translate(-50%, -50%);
    padding: 10px;
    background-color: #fff;"
>
    <div class="progress">
        {{-- <div class="v bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div> --}}
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
    </div>
</div>
    
    <script>
        $(function(){



            
        

            
            
            $('#form-akad-kredit').on('submit', function(e){
                 e.preventDefault();
                
                     $.ajax({
                         url: "{{route('submit-akad-kredit')}}",
                         type: "POST",
                         data:  new FormData(this),
                         cache: false,
                        contentType: false,
                        processData: false,
                         xhr: function () {
                             var xhr = $.ajaxSettings.xhr();
                             xhr.onprogress = function e() {
                                 // For downloads
                                 if (e.lengthComputable) {
                                     console.log(e.loaded / e.total);
                                     
                                     $('#ajax-progress-bar').show();
                                     $('#ajax-progress-bar .progress-bar').css('width', (e.loaded / e.total) * 100 + '%');
                                     $('#ajax-progress-bar .progress-bar').html(Math.floor((e.loaded / e.total) * 100) + '%');
                                 }else{
                                     $('#ajax-progress-bar').hide();
                                 }
                             };
                             xhr.upload.onprogress = function (e) {
                                 // For uploads
                                 if (e.lengthComputable) {
                                     console.log(e.loaded / e.total);
                                     $('#ajax-progress-bar').show();
                                     $('#ajax-progress-bar .progress-bar').css('width', (e.loaded / e.total)  * 100 + '%');
                                     $('#ajax-progress-bar .progress-bar').html(Math.floor((e.loaded / e.total) * 100) + '%');
                                 }else{
                                     $('#ajax-progress-bar').hide();
                                 }
                             };
                             return xhr;
                         },
                         success: function(result){

                             console.log(result);
                            
                             $('.form-control').removeClass('is-invalid');
                             $('.invalid-feedback').remove();

                             if(result.status == false){
                                 $.each(result.errors, function(field, errorMessages){
                                     $('#'+ field).addClass('is-invalid');
                                     $('#'+ field).parent().append(`
                                         <div class="invalid-feedback">
                                             ${errorMessages[0]}
                                         </div>
                                     `);
                                 });
                             }else if(result.status == true){
                                 $('.form-control').removeClass('is-invalid');
                                 $('.invalid-feedback').remove();

                                 window.location.href = "{{route('akad-kredit-success')}}";
                             }else{
                                 console.log('Something wrong');
                             }
                         }
                     });
                
             });
            

           

            function onChangeTempoAngsuranPembiayaanDanaId(){
                var angsuran_pembiayaan_dana_detail = $('#tempo_angsuran_pembiayaan_dana_id').find('option:selected').data('json_angsuran_pembiayaan_dana_detail');
                console.log(angsuran_pembiayaan_dana_detail);
                $('#angsuran').val(number_format(angsuran_pembiayaan_dana_detail.angsuran_per_bulan, 0, ',', '.'));

                // onChangeCalculateField();
            }

            // onChangeTempoAngsuranPembiayaanDanaId();
            
            // $('#tempo_angsuran_pembiayaan_dana_id').on('change', onChangeTempoAngsuranPembiayaanDanaId);
            /*
            function onChangeCalculateField(){

                const motor_pembiayaan_dana_id = $('#motor_pembiayaan_dana_id').val();
                const wilayah_pembiayaan_dana_id = $('#wilayah_pembiayaan_dana_id').val();
                const tahun_motor = $('#tahun_motor').val();
                const status_stnk_id = $('#status_stnk_id').val();
                const status_bpkb_id = $('#status_bpkb_id').val();
                // const tempo_angsuran_pembiayaan_dana_id = $('#tempo_angsuran_pembiayaan_dana_id').val();
                const status_rumah_id = $('#status_rumah_id').val();
                const plafond_pembiayaan_diinginkan = $('#plafond_pembiayaan_diinginkan').val();

                console.log(wilayah_pembiayaan_dana_id, motor_pembiayaan_dana_id, tahun_motor, status_stnk_id, status_bpkb_id, status_rumah_id, plafond_pembiayaan_diinginkan);

                if(wilayah_pembiayaan_dana_id && motor_pembiayaan_dana_id && tahun_motor && status_stnk_id && status_bpkb_id && status_rumah_id && plafond_pembiayaan_diinginkan){
                    

                    const selectedOption = $('#plafond_pembiayaan_diinginkan').find('option:selected');
                    const array_angsuran_pembiayaan_dana_detail = selectedOption.data('json_angsuran_pembiayaan_dana_detail');

                    var selected_angsuran_pembiayaan_dana = null;

                    $('#tempo_angsuran_pembiayaan_dana_id').empty(); 
                    if(array_angsuran_pembiayaan_dana_detail && array_angsuran_pembiayaan_dana_detail.length > 0){

                        $('#warning-for-user').show();

                        console.log(array_angsuran_pembiayaan_dana_detail);

                        array_angsuran_pembiayaan_dana_detail.sort(function(a, b){

                            const a_tempo = a.tempo_angsuran_pembiayaan_dana.tempo;
                            const b_tempo = b.tempo_angsuran_pembiayaan_dana.tempo;

                            let comparison = 0;

                            if(a_tempo > b_tempo){
                                comparison = 1;
                            }else if(a_tempo < b_tempo){
                                comparison = -1;
                            }

                            return comparison;

                        });

                        console.log(array_angsuran_pembiayaan_dana_detail);


                        array_angsuran_pembiayaan_dana_detail.forEach(function(angsuran_pembiayaan_dana_detail){
                            console.log(angsuran_pembiayaan_dana_detail);
                            $('#tempo_angsuran_pembiayaan_dana_id').append('<option data-json_angsuran_pembiayaan_dana_detail=\''+ JSON.stringify(angsuran_pembiayaan_dana_detail) +'\' value="'+ angsuran_pembiayaan_dana_detail.tempo_angsuran_pembiayaan_dana_id +'">'+ angsuran_pembiayaan_dana_detail.tempo_angsuran_pembiayaan_dana.tempo +' Bulan</option>');
                        });

                        onChangeTempoAngsuranPembiayaanDanaId(); 
                    }else{
                        $('#warning-for-user').hide();
                    }
                }
            }

            onChangeCalculateField();

            $('#motor_pembiayaan_dana_id').on('change', onChangeCalculateField);
            $('#wilayah_pembiayaan_dana_id').on('change', onChangeCalculateField);
            $('#tahun_motor').on('change', onChangeCalculateField);
            $('#status_stnk_id').on('change', onChangeCalculateField);
            $('#status_bpkb_id').on('change', onChangeCalculateField);
            
            $('#status_rumah_id').on('change', onChangeCalculateField);
            $('#plafond_pembiayaan_diinginkan').on('change', onChangeCalculateField);
            */

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

            $('#plafond_pembiayaan_diinginkan').mask('000.000.000.000.000', {reverse: true});
            $('#plafond_pembiayaan_disetujui').mask('000.000.000.000.000', {reverse: true});
            $('#leasing_koperasi__nilai_angsuran').mask('000.000.000.000.000', {reverse: true});

            $('#wilayah_pembiayaan_dana_id').select2();
            $('#motor_pembiayaan_dana_id').select2();
            $('#mitra_id').select2();
            


        });
    </script>
@endsection
