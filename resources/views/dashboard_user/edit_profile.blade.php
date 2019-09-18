<?php 
use Laravolt\Indonesia\Models\Province;
?>

@extends('dashboard_user.main')

@section('sub_content')

    <?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2>Edit Profile </h2>
            <hr>
            
            <form method="POST" action="{{ route('dashboard_user.update_profile') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
    
                    
            
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama Lengkap Sesuai KTP</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name', $user->name) }}" required autofocus>
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
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email Anda" value="{{ old('email', $user->email) }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_handphone_1">No Handphone</label>
                            <input type="text" class="form-control {{ $errors->has('no_handphone_1') ? ' is-invalid' : '' }}" id="no_handphone_1" name="no_handphone_1" placeholder="No Handphone" value="{{ old('no_handphone_1', $user->no_handphone_1) }}">
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
                            <input type="text" class="form-control {{ $errors->has('no_handphone_2') ? ' is-invalid' : '' }}" id="no_handphone_2" name="no_handphone_2" placeholder="No Whatsapp" value="{{ old('no_handphone_2', $user->no_handphone_2) }}">
                            
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_identitas">Kartu Identitas</label>
                            <select class="form-control {{ $errors->has('jenis_identitas') ? ' is-invalid' : '' }}" id="jenis_identitas" name="jenis_identitas" placeholder="Jenis Identitas">
                                <option value="">:: Jenis Identitas ::</option>
                                <option {{(old('jenis_identitas', $user->jenis_identitas) == 'KTP') ? 'selected=""' : ''}} value="KTP">KTP</option>
                                <option {{(old('jenis_identitas', $user->jenis_identitas) == 'SIM') ? 'selected=""' : ''}} value="SIM">SIM</option>
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
                            <input type="text" class="form-control {{ $errors->has('no_identitas') ? ' is-invalid' : '' }}" id="no_identitas" name="no_identitas" placeholder="No Identitas" value="{{ old('no_identitas', $user->no_identitas) }}">
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
                            <input type="text" class="form-control {{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{old('tempat_lahir', $user->tempat_lahir)}}">
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
                            <input type="date" class="form-control {{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir', $user->tanggal_lahir)}}">
                            @if ($errors->has('tanggal_lahir'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                
                    

                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="province_id">Provinsi Saat ini anda tinggal</label>
                            <select class="form-control {{ $errors->has('province_id') ? ' is-invalid' : '' }}" id="province_id" name="province_id" placeholder="Provinsi">
                                <option value="">:: Provinsi ::</option>
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
                                    <option {{old('province_id', $user->province_id) == $province->id ? 'selected=""' : ''}} data-json="{{$province->toJson()}}" value="{{$province->id}}">{{$province->name}}</option>
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
                            <label for="city_id">Kabupaten/Kota saat ini anda tinggal</label>
                            <select class="form-control {{ $errors->has('city_id') ? ' is-invalid' : '' }}" id="city_id" name="city_id" placeholder="Kota">
                                <option value="">:: Kota ::</option>
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
                            <label for="district_id">Kecamatan saat ini anda tinggal</label>
                            <select class="form-control {{ $errors->has('district_id') ? ' is-invalid' : '' }}" id="district_id" name="district_id" placeholder="Kecamatan">
                                <option value="">:: Kecamatan ::</option>
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
                            <label for="alamat">Alamat</label>
                            <textarea rows="6" class="form-control  {{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" name="alamat" placeholder="Alamat">{{ old('alamat', $user->alamat) }}</textarea>
                            @if ($errors->has('alamat'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <input type="text" class="form-control {{ $errors->has('nama_bank') ? ' is-invalid' : '' }}" id="nama_bank" name="nama_bank" placeholder="Nama Bank" value="{{old('nama_bank', $user->nama_bank)}}">
                            @if ($errors->has('nama_bank'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nama_bank') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_rekening_bank">No Rekening Bank</label>
                            <input type="text" class="form-control {{ $errors->has('no_rekening_bank') ? ' is-invalid' : '' }}" id="no_rekening_bank" name="no_rekening_bank" placeholder="No Rekening Bank" value="{{old('no_rekening_bank', $user->no_rekening_bank)}}">
                            @if ($errors->has('no_rekening_bank'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('no_rekening_bank') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    


                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photo">Photo  </label> 
                            <input type="file" class="form-control {{ $errors->has('photo') ? ' is-invalid' : '' }}" id="photo" name="photo" placeholder="Photo" value="{{old('photo', $user->photo)}}">
                            <p><small>Abaikan jika anda tidak ingin mengganti photo</small></p>
                            
                            @if ($errors->has('photo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        

                        <p class="text-center">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                {{ __('Update') }}
                            </button>
                        </p>
                    </div>
                </div>


            </form>
            
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

                    var city_id = <?php echo (old('city_id', $user->city_id) ? $user->city_id : 'NULL') ?>;
                    $('#city_id').find('option').remove();
                    $('#city_id').append('<option>:: Kota ::</option>')
                    json.cities.forEach(function(city){
                        $('#city_id').append('<option '+ (city.id == city_id ? 'selected=""' : '') +' data-json=\''+ JSON.stringify(city) +'\' value="'+ city.id +'">'+ city.name +'</option>')
                    });
                }
            }
            $('#province_id').on('change', provinceIdOnChangeHandler);
            provinceIdOnChangeHandler();
            
            function cityIdOnChangeHandler(){
                var json = $('#city_id').find('option:selected').data('json');
                if(json){
                    var district_id = <?php echo (old('district_id', $user->district_id) ? $user->district_id : 'NULL') ?>;
                    $('#district_id').find('option').remove();
                    $('#district_id').append('<option>:: Kecamatan ::</option>')
                    json.districts.forEach(function(district){
                        $('#district_id').append('<option '+ (district.id == district_id ? 'selected=""' : '') +' value="'+ district.id +'">'+ district.name +'</option>')
                    });
                }
            }
            $('#city_id').on('change', cityIdOnChangeHandler);
            cityIdOnChangeHandler();
        });
    </script>
@endsection