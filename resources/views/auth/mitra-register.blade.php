<?php use Laravolt\Indonesia\Models\Province; ?>
@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                
                <h2 class="text-center font-weight-light">{{ isset($url) ? ucwords($url) : ""}} Form Pendaftaran Sebagai Mitra</h2>
				<hr>
                <br>
                @isset($url)
                    <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                @else
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @endisset

                
                    @csrf

                    <input type="hidden" name="as_mitra" value="1">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap Sesuai KTP</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email Anda" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                <small>Password minimal 8 karakter</small>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                <small>Ketik Ulang Password minimal 8 karakter</small>
							</div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_handphone_1">No Handphone</label>
                                <input type="text" class="form-control {{ $errors->has('no_handphone_1') ? ' is-invalid' : '' }}" id="no_handphone_1" name="no_handphone_1" placeholder="Contoh: 08128888xxx" value="{{ old('no_handphone_1') }}">
                                @if ($errors->has('no_handphone_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_handphone_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_handphone_2">No Whatsapp</label>
                                <input type="text" class="form-control {{ $errors->has('no_handphone_2') ? ' is-invalid' : '' }}" id="no_handphone_2" name="no_handphone_2" placeholder="Contoh: 0818999xxx" value="{{ old('no_handphone_2') }}">
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_identitas">Kartu Identitas</label>
                                <select class="form-control {{ $errors->has('jenis_identitas') ? ' is-invalid' : '' }}" id="jenis_identitas" name="jenis_identitas" placeholder="Jenis Identitas">
                                    <option value="">Jenis Identitas:</option>
                                    <option {{(old('jenis_identitas') == 'KTP') ? 'selected=""' : ''}} value="KTP">KTP</option>
                                    <option {{(old('jenis_identitas') == 'SIM') ? 'selected=""' : ''}} value="SIM">SIM</option>
                                </select>
                                @if ($errors->has('jenis_identitas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_identitas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_identitas">&nbsp;</label>
                                <input type="text" class="form-control {{ $errors->has('no_identitas') ? ' is-invalid' : '' }}" id="no_identitas" name="no_identitas" placeholder="No Identitas" value="{{ old('no_identitas') }}">
                                @if ($errors->has('no_identitas'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_identitas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control {{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
                                @if ($errors->has('tempat_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control {{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')}}">
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        

                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="province_id">Provinsi Saat ini Anda Tinggal</label>
                                <select class="form-control {{ $errors->has('province_id') ? ' is-invalid' : '' }}" id="province_id" name="province_id" placeholder="Provinsi">
                                    <option value="">Provinsi:</option>
                                    <?php 
                                    $provinces = Province::orderBy('name')->with(['cities' => function($query){
                                        return $query->orderBy('name')->with([
                                            'districts' => function($query){
                                                return $query->orderBy('name');
                                            }
                                        ]);
                                    }])->get();
                                    ?>
                                    @foreach($provinces as $province) 
                                        <option {{old('province_id') == $province->id ? 'selected=""' : ''}} data-json="{{$province->toJson()}}" value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('province_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city_id">Kota / Kabupaten Saat ini Anda Tinggal</label>
                                <select class="form-control {{ $errors->has('city_id') ? ' is-invalid' : '' }}" id="city_id" name="city_id" placeholder="Kota">
                                    <option value="">Kota:</option>
                                </select>
                                @if ($errors->has('city_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="district_id">Kecamatan Saat ini Anda Tinggal</label>
                                <select class="form-control {{ $errors->has('district_id') ? ' is-invalid' : '' }}" id="district_id" name="district_id" placeholder="Kecamatan">
                                    <option value="">::Kecamatan::</option>
                                </select>
                                @if ($errors->has('district_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                                                                     
                         
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat Tinggal Anda Sekarang</label>
                                <textarea rows="3" class="form-control  {{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" name="alamat" placeholder="Isi Alamat Anda Dengan Lengkap">{{ old('alamat') }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            

                            <p class="text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Lanjutkan') }}
                                </button>
                            </p>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        $(function(){

            $('#province_id').select2();
            $('#city_id').select2();
            $('#district_id').select2();

            function provinceIdOnChangeHandler(){
                var json = $('#province_id').find('option:selected').data('json');
                if(json){
                    $('#city_id').find('option').remove();
                    $('#city_id').append('<option value="">:: Kota ::</option>')
                    json.cities.forEach(function(city){
                        $('#city_id').append('<option data-json=\''+ JSON.stringify(city) +'\' value="'+ city.id +'">'+ city.name +'</option>')
                    });
                }
            }
            $('#province_id').on('change', provinceIdOnChangeHandler);
            provinceIdOnChangeHandler();
            
            function cityIdOnChangeHandler(){
                var json = $('#city_id').find('option:selected').data('json');
                if(json){
                    $('#district_id').find('option').remove();
                    $('#district_id').append('<option value="">:: Kecamatan ::</option>')
                    json.districts.forEach(function(district){
                        $('#district_id').append('<option value="'+ district.id +'">'+ district.name +'</option>')
                    });
                }
            }
            $('#city_id').on('change', cityIdOnChangeHandler);
            cityIdOnChangeHandler();
        });
    </script>
@endsection