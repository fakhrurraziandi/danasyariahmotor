@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit angsuran motor</div>
                    <div class="card-body">
                        <?php $motor = $spesifikasi_motor->motor ?>
                        
                        <dl class="row">
                            <dt class="col-sm-3 text-md-right">Name</dt>
                            <dd class="col-sm-9">{{$motor->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Pabrikan</dt>
                            <dd class="col-sm-9">{{$motor->pabrikan_motor->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Type</dt>
                            <dd class="col-sm-9">{{$motor->type_motor->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Jenis Transmisi</dt>
                            <dd class="col-sm-9">{{$motor->jenis_transmisi->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Kapasitas Mesin</dt>
                            <dd class="col-sm-9">{{$motor->kapasitas_mesin->cc . ' cc'}}</dd>

                            <dt class="col-sm-3 text-md-right">Warna</dt>
                            <dd class="col-sm-9">
                                @if($motor->warna_motor) 
                                    @foreach($motor->warna_motor as $warna_motor)
                                        <span class="badge badge-secondary">{{$warna_motor->name}}</span> 
                                    @endforeach
                                @endif
                            </dd>

                            <dt class="col-sm-3 text-md-right">Harga</dt>
                            <dd class="col-sm-9">{{'Rp. '. $motor->harga}}</dd>
                        </dl>

                        <hr>

                        <form action="{{route('admin.spesifikasi_motor.update', $spesifikasi_motor->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            


                            <div class="form-group row">
                                <label for="kategori_spesifikasi_id" class="col-sm-2 col-form-label text-md-right">Kategori Spesifikasi</label>
                                <div class="col-sm-6">
                                    <select class="form-control {{$errors->has('kategori_spesifikasi_id') ? 'is-invalid' : ''}}" name="kategori_spesifikasi_id" id="kategori_spesifikasi_id">
                                        <option ></option>
                                        @foreach($list_kategori_spesifikasi as $kategori_spesifikasi)
                                            <option {{old('kategori_spesifikasi_id', $spesifikasi_motor->kategori_spesifikasi_id) == $kategori_spesifikasi->id ? 'selected=""' : ''}} value="{{$kategori_spesifikasi->id}}">{{$kategori_spesifikasi->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('kategori_spesifikasi_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('kategori_spesifikasi_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" id="name" value="{{old('name', $spesifikasi_motor->name)}}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="value" class="col-sm-2 col-form-label text-md-right">Value</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control {{$errors->has('value') ? 'is-invalid' : ''}}" type="text" name="value" id="value" rows="10">{{old('value', $spesifikasi_motor->value)}}</textarea>
                                    @if($errors->has('value'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('value')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                           

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.spesifikasi_motor.index', $motor->id)}}" class="btn btn-secondary">Cancel</a>
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
        $('#value').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    
    <script>
        $(function(){

            $('#warna_motor_ids').select2();
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
@endsection