@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit angsuran motor</div>
                    <div class="card-body">
                        <?php $motor = $testimoni_motor->motor ?>
                        
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

                        <form action="{{route('admin.testimoni_motor.update', $testimoni_motor->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            


                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-6">
                                    <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" clas="form-control" name="name" id="name" value="{{old('name', $testimoni_motor->name)}}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-sm-2 col-form-label text-md-right">Message</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control {{$errors->has('message') ? 'is-invalid' : ''}}" name="message" id="message" cols="30" rows="10">{{old('message', $testimoni_motor->message)}}</textarea>
                                    @if($errors->has('message'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('message')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dp" class="col-sm-2 col-form-label text-md-right">Rate</label>
                                <div class="col-sm-3">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate1" name="rate" class="custom-control-input" value="1" {{old('rate', $testimoni_motor->rate) == 1 ? 'checked=""' : ''}}>
                                        <label class="custom-control-label" for="rate1">
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate2" name="rate" class="custom-control-input" value="2" {{old('rate', $testimoni_motor->rate) == 2 ? 'checked=""' : ''}}>
                                        <label class="custom-control-label" for="rate2">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate3" name="rate" class="custom-control-input" value="3" {{old('rate', $testimoni_motor->rate) == 3 ? 'checked=""' : ''}}>
                                        <label class="custom-control-label" for="rate3">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate4" name="rate" class="custom-control-input" value="4" {{old('rate', $testimoni_motor->rate) == 4 ? 'checked=""' : ''}}>
                                        <label class="custom-control-label" for="rate4">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    <br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="rate5" name="rate" class="custom-control-input" value="5" {{old('rate', $testimoni_motor->rate) == 5 ? 'checked=""' : ''}}>
                                        <label class="custom-control-label" for="rate5">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </label>
                                    </div>
                                    @if($errors->has('rate'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('rate')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                           

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.testimoni_motor.index', $motor->id)}}" class="btn btn-secondary">Cancel</a>
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

            $('#warna_motor_ids').select2();
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
@endsection