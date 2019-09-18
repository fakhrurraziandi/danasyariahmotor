
@extends('cs_pembiayaan_dana.main')

@section('sub_content')

    

    <h1 class="mb-20">Pengajuan Pembiayaan Dana</small></h1>
    <hr>

    <form action="{{route('cs_pembiayaan_dana.process_pengajuan_pembiayaan_dana', $pengajuan_pembiayaan_dana->id)}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi User</h5>
                    </div>
                    <div class="card-body">
                        @include('inc.informasi_user', ['pengajuan_pembiayaan_dana', $pengajuan_pembiayaan_dana])
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Informasi Pengajuan Pembiayaan Dana</h5>
                    </div>
                    <div class="card-body">

                        @include('inc.informasi_pembiayaan_dana', ['pengajuan_pembiayaan_dana', $pengajuan_pembiayaan_dana])
                    </div>
                </div>
            </div>

            

            
            @if(!$pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status)
            {{-- @if(true) --}}
                
                

                <div class="col-md-12 col-approved">
                    <div class="card mb-3">
                        <div class="card-body">

                            {{-- <div class="form-group row">
                                <label for="plafond_pembiayaan_diinginkan" class="col-sm-3 col-form-label">Plafond pembiayaan yang diinginkan</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly class="form-control {{$errors->has('plafond_pembiayaan_diinginkan') ? 'is-invalid' : ''}}" id="plafond_pembiayaan_diinginkan" name="plafond_pembiayaan_diinginkan" value="{{old('plafond_pembiayaan_diinginkan', $pengajuan_pembiayaan_dana->plafond_pembiayaan_diinginkan)}}">
                                    @if($errors->has('plafond_pembiayaan_diinginkan'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('plafond_pembiayaan_diinginkan')}}
                                        </div>
                                    @endif
                                </div>
                            </div> --}}

                            
                            <div class="form-group row">
                                <label for="plafond_pembiayaan_disetujui" class="col-sm-3 col-form-label">Plafond pembiayaan yang disetujui</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{$errors->has('plafond_pembiayaan_disetujui') ? 'is-invalid' : ''}}" id="plafond_pembiayaan_disetujui" name="plafond_pembiayaan_disetujui" value="{{old('plafond_pembiayaan_disetujui', $pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui)}}">
                                    @if($errors->has('plafond_pembiayaan_disetujui'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('plafond_pembiayaan_disetujui')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tempo_angsuran_pembiayaan_dana_id_disetujui" class="col-sm-3 col-form-label">Tempo angsuran yang disetujui</label>
                                <div class="col-sm-9">
                                    <select name="tempo_angsuran_pembiayaan_dana_id_disetujui" id="tempo_angsuran_pembiayaan_dana_id_disetujui" class="form-control {{$errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui') ? 'is-invalid' : ''}}">
                                        <option value=""></option>
                                        @foreach(App\TempoAngsuranPembiayaanDana::all() as $tempo_angsuran_pembiayaan_dana)
                                            <option {{ old('tempo_angsuran_pembiayaan_dana_id_disetujui', $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana ? $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana->id : null) ==  $tempo_angsuran_pembiayaan_dana->id ? 'selected=""' : ""}} value="{{$tempo_angsuran_pembiayaan_dana->id}}">{{$tempo_angsuran_pembiayaan_dana->tempo . ' bulan'}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('tempo_angsuran_pembiayaan_dana_id_disetujui')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="angsuran" class="col-sm-3 col-form-label">Angsuran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control {{$errors->has('angsuran') ? 'is-invalid' : ''}}" id="angsuran" name="angsuran" value="{{old('angsuran', $pengajuan_pembiayaan_dana->angsuran)}}">
                                    @if($errors->has('angsuran'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('angsuran')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_ktp" class="col-sm-3 col-form-label">Image KTP</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control {{$errors->has('image_ktp') ? 'is-invalid' : ''}}" id="image_ktp" name="image_ktp" value="{{old('image_ktp', $pengajuan_pembiayaan_dana->image_ktp)}}">
                                    @if($errors->has('image_ktp'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('image_ktp')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-2">
                                    @if($pengajuan_pembiayaan_dana->image_ktp)
                                        <a href="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_ktp)}}" target="_blank" class="border d-block">
                                            <img src="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_ktp)}}" class="img-fluid" alt="Dana Syariah Motor">
                                        </a>
                                    @else
                                        <p><small>Belum ada image</small></p>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="image_kk" class="col-sm-3 col-form-label">Image KK</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control {{$errors->has('image_kk') ? 'is-invalid' : ''}}" id="image_kk" name="image_kk" value="{{old('image_kk', $pengajuan_pembiayaan_dana->image_kk)}}">
                                    @if($errors->has('image_kk'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('image_kk')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-2">
                                    @if($pengajuan_pembiayaan_dana->image_kk)
                                        <a href="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_kk)}}" target="_blank" class="border d-block">
                                            <img src="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_kk)}}" class="img-fluid" alt="Dana Syariah Motor">
                                        </a>
                                    @else
                                        <p><small>Belum ada image</small></p>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="image_stnk" class="col-sm-3 col-form-label">Image STNK</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control {{$errors->has('image_stnk') ? 'is-invalid' : ''}}" id="image_stnk" name="image_stnk" value="{{old('image_stnk', $pengajuan_pembiayaan_dana->image_stnk)}}">
                                    @if($errors->has('image_stnk'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('image_stnk')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-2">
                                    @if($pengajuan_pembiayaan_dana->image_stnk)
                                        <a href="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_stnk)}}" target="_blank" class="border d-block">
                                            <img src="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_stnk)}}" class="img-fluid" alt="Dana Syariah Motor">
                                        </a>
                                    @else
                                        <p><small>Belum ada image</small></p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_bpkb" class="col-sm-3 col-form-label">Image BPKB</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control {{$errors->has('image_bpkb') ? 'is-invalid' : ''}}" id="image_bpkb" name="image_bpkb" value="{{old('image_bpkb', $pengajuan_pembiayaan_dana->image_bpkb)}}">
                                    @if($errors->has('image_bpkb'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('image_bpkb')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-2">
                                    @if($pengajuan_pembiayaan_dana->image_bpkb)
                                        <a href="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_bpkb)}}" target="_blank" class="border d-block">
                                            <img src="{{asset('uploads/'. $pengajuan_pembiayaan_dana->image_bpkb)}}" class="img-fluid" alt="Dana Syariah Motor">
                                        </a>
                                    @else
                                        <p><small>Belum ada image</small></p>
                                    @endif
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="spv_pembiayaan_dana_id" class="col-sm-3 col-form-label">Di Teruskan Kepada SPV</label>
                                <div class="col-sm-9">
                                    <select name="spv_pembiayaan_dana_id" id="spv_pembiayaan_dana_id" class="form-control {{$errors->has('spv_pembiayaan_dana_id') ? 'is-invalid' : ''}}">
                                        <option></option>
                                        @foreach($pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana->spv_pembiayaan_dana as $spv_pembiayaan_dana)
                                            <option {{ old('spv_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_id) ==  $spv_pembiayaan_dana->id ? 'selected=""' : ""}} value="{{$spv_pembiayaan_dana->id}}">{{$spv_pembiayaan_dana->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('spv_pembiayaan_dana_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('spv_pembiayaan_dana_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cs_pembiayaan_dana_note" class="col-sm-3 col-form-label">Note For SPV</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control {{$errors->has('cs_pembiayaan_dana_note') ? 'is-invalid' : ''}}" id="cs_pembiayaan_dana_note" name="cs_pembiayaan_dana_note" value="{{old('cs_pembiayaan_dana_note')}}" rows="5"></textarea>
                                    @if($errors->has('cs_pembiayaan_dana_note'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('cs_pembiayaan_dana_note')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            



                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="py-4">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="cs_pembiayaan_dana_status1" name="cs_pembiayaan_dana_status" class="custom-control-input cs_pembiayaan_dana_status" value="denied" {{old('cs_pembiayaan_dana_status', $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status) == 'denied' ? 'checked=""' : ''}}>
                                            <label class="custom-control-label" for="cs_pembiayaan_dana_status1">Tolak</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="cs_pembiayaan_dana_status2" name="cs_pembiayaan_dana_status" class="custom-control-input cs_pembiayaan_dana_status" value="approved" {{old('cs_pembiayaan_dana_status', $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_status) == 'approved' ? 'checked=""' : ''}}>
                                            <label class="custom-control-label" for="cs_pembiayaan_dana_status2">Setujui</label>
                                        </div>
                                    </div>
                                    @if($errors->has('cs_pembiayaan_dana_status'))
                                        <div class="pb-4 text-center text-danger">
                                            {{$errors->first('cs_pembiayaan_dana_status')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <script>
                                $(function(){

                                    function csPembiayaanDanaStatusOnChangehandler(){
                                        var value = $('.cs_pembiayaan_dana_status:checked').val();
                                        if(value == 'denied'){
                                            $('#row-user_note').show();
                                        }else{
                                            $('#row-user_note').hide();
                                        }
                                    }
                                    $('.cs_pembiayaan_dana_status').on('change', csPembiayaanDanaStatusOnChangehandler);
                                    csPembiayaanDanaStatusOnChangehandler();
                                })
                            </script>

                            <div class="form-group row" id="row-user_note" style="display: none;">
                                <label for="user_note" class="col-sm-3 col-form-label">Note For User</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control {{$errors->has('user_note') ? 'is-invalid' : ''}}" id="user_note" name="user_note" value="{{old('user_note')}}" rows="5"></textarea>
                                    @if($errors->has('user_note'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('user_note')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                            
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">Process</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                
            @endif
        </div>
    </form>


@endsection

@section('scripts')
    <script>
        $(function(){

            // function csPembiayaanDanaStatusOnChangeHandler(){
            //     var value = $('.cs_pembiayaan_dana_status:checked').val();
            //     console.log(value);
            //     if(value == 'denied'){
            //         $('.col-approved').hide();
            //     }

            //     if(value == 'approved'){
            //         $('.col-approved').show();
            //     }
            // }
            // $('.cs_pembiayaan_dana_status').on('change', csPembiayaanDanaStatusOnChangeHandler);
            // csPembiayaanDanaStatusOnChangeHandler();

            $('#plafond_pembiayaan_diinginkan').mask('000.000.000.000.000', {reverse: true});
            $('#plafond_pembiayaan_disetujui').mask('000.000.000.000.000', {reverse: true});
            $('#angsuran').mask('000.000.000.000.000', {reverse: true});
        });
    </script>
@endsection
