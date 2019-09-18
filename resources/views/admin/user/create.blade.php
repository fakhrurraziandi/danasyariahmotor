<?php use App\Wilayah; ?>
<?php use Laravolt\Indonesia\Models\Province; ?>
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new user</div>
                    <div class="card-body">

                        <form action="{{route('admin.user.store')}}" method="POST">

                            {{csrf_field()}}

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('name')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('password')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_handphone_1">No Handphone 1</label>
                                        <input type="text" class="form-control {{$errors->has('no_handphone_1') ? 'is-invalid' : ''}}" id="no_handphone_1" name="no_handphone_1" placeholder="No Handphone 1" value="{{old('no_handphone_1')}}">
                                        @if($errors->has('no_handphone_1'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('no_handphone_1')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_handphone_2">No Whatsapp</label>
                                        <input type="text" class="form-control {{$errors->has('no_handphone_2') ? 'is-invalid' : ''}}" id="no_handphone_2" name="no_handphone_2" placeholder="No Whatsapp" value="{{old('no_handphone_2')}}">
                                        @if($errors->has('no_handphone_2'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('no_handphone_2')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_identitas">Jenis Identitas</label>
                                        <select class="form-control {{$errors->has('jenis_identitas') ? 'is-invalid' : ''}}" id="jenis_identitas" name="jenis_identitas" placeholder="No Handphone 2" >
                                            <option value="">:: Jenis Identitas ::</option>
                                            <option {{old('jenis_identitas') == 'KTP' ? 'selected=""' : ''}} value="KTP">KTP</option>
                                            <option {{old('jenis_identitas') == 'SIM' ? 'selected=""' : ''}} value="SIM">SIM</option>
                                        </select>
                                        @if($errors->has('jenis_identitas'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('jenis_identitas')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_identitas">No Identitas</label>
                                        <input type="text" class="form-control {{$errors->has('no_identitas') ? 'is-invalid' : ''}}" id="no_identitas" name="no_identitas" placeholder="No Identitas" value="{{old('no_identitas')}}">
                                        @if($errors->has('no_identitas'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('no_identitas')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control {{$errors->has('tempat_lahir') ? 'is-invalid' : ''}}" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
                                        @if($errors->has('tempat_lahir'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('tempat_lahir')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control {{$errors->has('tanggal_lahir') ? 'is-invalid' : ''}}" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tempat Lahir" value="{{old('tanggal_lahir')}}">
                                        @if($errors->has('tanggal_lahir'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('tanggal_lahir')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="province_id">Provinsi</label>
                                        <select class="form-control {{ $errors->has('province_id') ? ' is-invalid' : '' }}" id="province_id" name="province_id" placeholder="Provinsi">
                                            <option value="">:: Provinsi ::</option>
                                            
                                            @foreach(Province::with(['cities'])->get() as $province)
                                                <option data-json="{{$province->toJson()}}" value="{{$province->id}}">{{$province->name}}</option>
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
                                        <label for="city_id">Kota</label>
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
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" id="alamat" name="alamat" placeholder="Alamat" >{{old('alamat')}}</textarea>
                                        @if($errors->has('alamat'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('alamat')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                           
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.user.index')}}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
@endsection