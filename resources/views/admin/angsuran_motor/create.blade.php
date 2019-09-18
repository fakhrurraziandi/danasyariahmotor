@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new angsuran motor</div>
                    <div class="card-body">

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
                            <dd class="col-sm-9">{{'Rp. '. number_format($motor->harga, 0, ',', '.')}}</dd>
                        </dl>

                        <hr>

                        <form action="{{route('admin.angsuran_motor.store', $motor->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}


                            <div class="form-group row">
                                <label for="dp" class="col-sm-2 col-form-label text-md-right">DP</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control {{$errors->has('dp') ? 'is-invalid' : ''}}" name="dp" id="dp">
                                    @if($errors->has('dp'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('dp')}}
                                        </div>
                                    @endif
                                </div>

                                <label for="discount_dp" class="col-sm-2 col-form-label text-md-right">Discount DP (%)</label>
                                <div class="col-sm-3">
                                    <input type="number" max="100" min="0" class="form-control {{$errors->has('discount_dp') ? 'is-invalid' : ''}}" name="discount_dp" id="discount_dp" value="{{old('discount_dp')}}">
                                    @if($errors->has('discount_dp'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('discount_dp')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @foreach($list_tempo_angsuran_motor as $tempo_angsuran_motor)
                                <div class="form-group row">
                                    <label for="tempo_angsuran_motor_id" class="col-sm-2 col-form-label text-md-right">{{$tempo_angsuran_motor->tempo . ' Bulan'}}</label>
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control tempo_angsuran_motor_id {{$errors->has('tempo_angsuran_motor_id') ? 'is-invalid' : ''}}" name="tempo_angsuran_motor_id[{{$tempo_angsuran_motor->id}}]" id="tempo_angsuran_motor_id">
                                        @if($errors->has('tempo_angsuran_motor_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('tempo_angsuran_motor_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.angsuran_motor.index', $motor->id)}}" class="btn btn-secondary">Cancel</a>
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

            $('#dp').mask('000.000.000.000.000', {reverse: true});
            $('.tempo_angsuran_motor_id').mask('000.000.000.000.000', {reverse: true});
        });
    </script>
@endsection