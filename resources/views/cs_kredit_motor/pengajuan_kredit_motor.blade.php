
@extends('cs_kredit_motor.main')

@section('sub_content')

    

    <h1 class="mb-20">Pengajuan Kredit Motor</small></h1>
    <hr>

    <form action="{{route('cs_kredit_motor.process_pengajuan_kredit_motor', $pengajuan_kredit_motor->id)}}" method="POST">

        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi User</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nama Lengkap Sesuai KTP</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->name}}</dd>

                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->email}}</dd>

                            <dt class="col-sm-4">No Handphone 1</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->no_handphone_1}}</dd>

                            <dt class="col-sm-4">No Handphone 2</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->no_handphone_2 ? $pengajuan_kredit_motor->user->no_handphone_2 : '-'}}</dd>

                            <dt class="col-sm-4">Jenis Identitas</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->jenis_identitas ? $pengajuan_kredit_motor->user->jenis_identitas : '-'}}</dd>

                            <dt class="col-sm-4">No Identitas</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->no_identitas ? $pengajuan_kredit_motor->user->no_identitas : '-'}}</dd>

                            <dt class="col-sm-4">Tempat Lahir</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->tempat_lahir ? $pengajuan_kredit_motor->user->tempat_lahir : '-'}}</dd>

                            <dt class="col-sm-4">Tanggal Lahir</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->tanggal_lahir ? $pengajuan_kredit_motor->user->tanggal_lahir : '-'}}</dd>

                            <dt class="col-sm-4">Kota</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->city->name ? $pengajuan_kredit_motor->user->city->name : '-'}}</dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->user->alamat ? $pengajuan_kredit_motor->user->alamat : '-'}}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi Pengajuan Kredit Motor</h5>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Motor</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->angsuran_motor->motor->name}}</dd>

                            <dt class="col-sm-4">DP</dt>
                            <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor->dp, 0, ',', '.')}}</dd>

                            @if($pengajuan_kredit_motor->angsuran_motor->discount_dp)
                                <dt class="col-sm-4">Discount DP</dt>
                                <dd class="col-sm-8">{{$pengajuan_kredit_motor->angsuran_motor->discount_dp ? $pengajuan_kredit_motor->angsuran_motor->discount_dp . '%' : '-'}}</dd>

                                <dt class="col-sm-4">DP Bayar</dt>
                                <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor->dp_calculated, 0, ',', '.')}}</dd>
                            @endif
                                

                            <dt class="col-sm-4">Angsuran x Bulan</dt>
                            <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor_detail->angsuran_per_bulan, 0, ',', '.') . ' x '. $pengajuan_kredit_motor->angsuran_motor_detail->tempo_angsuran_motor->tempo . ' Bulan'}}</dd>

                            <dt class="col-sm-4">Wilayah</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->wilayah_kredit_motor->name ? $pengajuan_kredit_motor->wilayah_kredit_motor->name : '-'}}</dd>

                            <dt class="col-sm-4">CS Status</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->cs_kredit_motor_status ? $pengajuan_kredit_motor->cs_kredit_motor_status : '-'}}</dd>

                            <dt class="col-sm-4">CS Note</dt>
                            <dd class="col-sm-8">{!!$pengajuan_kredit_motor->cs_kredit_motor_note ? '<span class="text-danger">'. $pengajuan_kredit_motor->cs_kredit_motor_note .'</span>' : '-'!!}</dd>


                            <dt class="col-sm-4">SPV</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->spv_kredit_motor ? $pengajuan_kredit_motor->spv_kredit_motor->name : '-'}}</dd>

                            <dt class="col-sm-4">SPV Status</dt>
                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->spv_kredit_motor_status ? $pengajuan_kredit_motor->spv_kredit_motor_status : '-'}}</dd>
                        </dl>
                    </div>
                </div>
            </div>

            @if(!$pengajuan_kredit_motor->cs_kredit_motor_status)

                <div class="col-md-12 text-center">
                    <div class="py-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="cs_kredit_motor_status1" name="cs_kredit_motor_status" class="custom-control-input cs_kredit_motor_status" value="denied" {{old('cs_kredit_motor_status', $pengajuan_kredit_motor->cs_kredit_motor_status) == 'denied' ? 'checked=""' : ''}}>
                            <label class="custom-control-label" for="cs_kredit_motor_status1">Tolak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="cs_kredit_motor_status2" name="cs_kredit_motor_status" class="custom-control-input cs_kredit_motor_status" value="approved" {{old('cs_kredit_motor_status', $pengajuan_kredit_motor->cs_kredit_motor_status) == 'approved' ? 'checked=""' : ''}}>
                            <label class="custom-control-label" for="cs_kredit_motor_status2">Setujui</label>
                        </div>
                    </div>

                    @if($errors->has('cs_kredit_motor_status'))
                        <div class="pb-4 text-center text-danger">
                            {{$errors->first('cs_kredit_motor_status')}}
                        </div>
                    @endif
                    
                    
                </div>


                <div class="col-md-12 col-approved" style="display: none;">
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="cs_kredit_motor_note" class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control {{$errors->has('cs_kredit_motor_note') ? 'is-invalid' : ''}}" id="cs_kredit_motor_note" name="cs_kredit_motor_note" value="{{old('cs_kredit_motor_note')}}" rows="5"></textarea>
                                    @if($errors->has('cs_kredit_motor_note'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('cs_kredit_motor_note')}}
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="spv_kredit_motor_id" class="col-sm-3 col-form-label">Di Teruskan Kepada SPV</label>
                                <div class="col-sm-9">
                                    <select name="spv_kredit_motor_id" id="spv_kredit_motor_id" class="form-control {{$errors->has('spv_kredit_motor_id') ? 'is-invalid' : ''}}">
                                        <option></option>
                                        @foreach($pengajuan_kredit_motor->wilayah_kredit_motor->spv_kredit_motor as $spv_kredit_motor)
                                            <option {{ old('spv_kredit_motor_id', $pengajuan_kredit_motor->spv_kredit_motor_id) ==  $spv_kredit_motor->id ? 'selected=""' : ""}} value="{{$spv_kredit_motor->id}}">{{$spv_kredit_motor->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('spv_kredit_motor_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('spv_kredit_motor_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Process</button>
                </div>

            @endif
        </div>
    </form>

        
@endsection


@section('scripts')
    <script>
        $(function(){

            function csKreditMotorStatusOnChangeHandler(){
                var value = $('.cs_kredit_motor_status:checked').val();
                console.log(value);
                if(value == 'denied'){
                    $('.col-approved').hide();
                }

                if(value == 'approved'){
                    $('.col-approved').show();
                }
            }
            $('.cs_kredit_motor_status').on('change', csKreditMotorStatusOnChangeHandler);
            csKreditMotorStatusOnChangeHandler();
        });
    </script>
@endsection
