@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new motor</div>
                    <div class="card-body">

                        <form action="{{route('admin.motor.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}

                            

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="slug" class="col-sm-2 col-form-label text-md-right">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{$errors->has('slug') ? 'is-invalid' : ''}}" name="slug" id="slug" value="{{old('slug')}}">
                                    @if($errors->has('slug'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('slug')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pabrikan_motor_id" class="col-sm-2 col-form-label text-md-right">Pabrikan Motor</label>
                                <div class="col-sm-9">
                                    <select name="pabrikan_motor_id" id="pabrikan_motor_id" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        <option value=""></option>
                                        @foreach($list_pabrikan_motor as $pabrikan_motor)
                                            <option {{$pabrikan_motor->id == old('pabrikan_motor_id') ? 'selected=""' : ''}} value="{{$pabrikan_motor->id}}">{{$pabrikan_motor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('pabrikan_motor_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('pabrikan_motor_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_motor_id" class="col-sm-2 col-form-label text-md-right">Type Motor</label>
                                <div class="col-sm-9">
                                    <select name="type_motor_id" id="type_motor_id" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        <option value=""></option>
                                        @foreach($list_type_motor as $type_motor)
                                            <option {{$type_motor->id == old('type_motor_id') ? 'selected=""' : ''}} value="{{$type_motor->id}}">{{$type_motor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('type_motor_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('type_motor_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_transmisi_id" class="col-sm-2 col-form-label text-md-right">Jenis Transmisi</label>
                                <div class="col-sm-9">
                                    <select name="jenis_transmisi_id" id="jenis_transmisi_id" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        <option value=""></option>
                                        @foreach($list_jenis_transmisi as $jenis_transmisi)
                                            <option {{$jenis_transmisi->id == old('jenis_transmisi_id') ? 'selected=""' : ''}} value="{{$jenis_transmisi->id}}">{{$jenis_transmisi->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('jenis_transmisi_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('jenis_transmisi_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jenis_pembakaran_id" class="col-sm-2 col-form-label text-md-right">Jenis Pembakaran</label>
                                <div class="col-sm-9">
                                    <select name="jenis_pembakaran_id" id="jenis_pembakaran_id" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        <option value=""></option>
                                        @foreach($list_jenis_pembakaran as $jenis_pembakaran)
                                            <option {{$jenis_pembakaran->id == old('jenis_pembakaran_id') ? 'selected=""' : ''}} value="{{$jenis_pembakaran->id}}">{{$jenis_pembakaran->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('jenis_pembakaran_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('jenis_pembakaran_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kapasitas_mesin_id" class="col-sm-2 col-form-label text-md-right">Kapasitas Mesin</label>
                                <div class="col-sm-9">
                                    <select name="kapasitas_mesin_id" id="kapasitas_mesin_id" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        <option value=""></option>
                                        @foreach($list_kapasitas_mesin as $kapasitas_mesin)
                                            <option {{$kapasitas_mesin->id == old('kapasitas_mesin_id') ? 'selected=""' : ''}} value="{{$kapasitas_mesin->id}}">{{$kapasitas_mesin->cc . ' cc'}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('kapasitas_mesin_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('kapasitas_mesin_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tahun" class="col-sm-2 col-form-label text-md-right">Tahun</label>
                                <div class="col-sm-9">
                                    <select name="tahun" id="tahun" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        @for($i = date('Y'); $i >= 2000; $i--)
                                            <option {{$i == old('tahun') ? 'selected=""' : ''}} value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    @if($errors->has('tahun'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('tahun')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fitur" class="col-sm-2 col-form-label text-md-right">Fitur</label>
                                <div class="col-sm-9">
                                    <textarea name="fitur" id="fitur" cols="30" rows="10" class="form-control  {{$errors->has('name') ? 'is-invalid' : ''}}">{{old('fitur')}}</textarea>
                                    @if($errors->has('fitur'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('fitur')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="warna_motor_ids" class="col-sm-2 col-form-label text-md-right">Warna</label>
                                <div class="col-sm-9">
                                    <select multiple="" name="warna_motor_ids[]" id="warna_motor_ids" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        @foreach($list_warna_motor as $warna_motor)
                                            <option {{ in_array($warna_motor->id, old('warna_motor_ids', [])) ? 'selected=""' : ''}} value="{{$warna_motor->id}}">{{$warna_motor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('warna_motor_ids'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('warna_motor_ids')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label text-md-right">Harga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{$errors->has('harga') ? 'is-invalid' : ''}}" name="harga" id="harga" value="{{old('harga')}}">
                                    @if($errors->has('harga'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('harga')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.motor.index')}}" class="btn btn-secondary">Cancel</a>
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

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('#fitur').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    
    <script>
        $(function(){

            $('#harga').mask('000.000.000.000.000', {reverse: true});

            $('#warna_motor_ids').select2();
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
@endsection