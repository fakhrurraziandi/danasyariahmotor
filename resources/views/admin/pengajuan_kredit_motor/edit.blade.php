@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit Pengajuan Pembiayaan Dana</div>
                    <div class="card-body">

                        <form action="{{route('admin.pengajuan_pembiayaan_dana.update', $pengajuan_pembiayaan_dana->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id">User</label>
                                        <select class="form-control {{$errors->has('user_id') ? 'is-invalid' : ''}}" id="user_id" name="user_id">
                                            @foreach(\App\User::all() as $user)
                                                <option {{old('user_id', $pengajuan_pembiayaan_dana->user_id) == $user->id ? 'selected=""' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('user_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('user_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wilayah_pembiayaan_dana_id">Wilayah Pembiayaan Dana</label>
                                        <select class="form-control {{$errors->has('wilayah_pembiayaan_dana_id') ? 'is-invalid' : ''}}" id="wilayah_pembiayaan_dana_id" name="wilayah_pembiayaan_dana_id" >
                                            @foreach(\App\WilayahPembiayaanDana::all() as $wilayah_pembiayaan_dana)
                                                <option {{old('wilayah_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->wilayah_pembiayaan_dana_id) == $wilayah_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$wilayah_pembiayaan_dana->id}}">{{$wilayah_pembiayaan_dana->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('wilayah_pembiayaan_dana_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('wilayah_pembiayaan_dana_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempo_angsuran_pembiayaan_dana_id">Tempo Angsuran Pembiayaan Dana</label>
                                        <select class="form-control {{$errors->has('tempo_angsuran_pembiayaan_dana_id') ? 'is-invalid' : ''}}" id="tempo_angsuran_pembiayaan_dana_id" name="tempo_angsuran_pembiayaan_dana_id" >
                                            @foreach(\App\TempoAngsuranPembiayaanDana::all() as $tempo_angsuran_pembiayaan_dana)
                                                <option {{old('tempo_angsuran_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_id) == $tempo_angsuran_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$tempo_angsuran_pembiayaan_dana->id}}">{{$tempo_angsuran_pembiayaan_dana->tempo . ' Bulan'}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tempo_angsuran_pembiayaan_dana_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('tempo_angsuran_pembiayaan_dana_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="motor_pembiayaan_dana_id">Motor</label>
                                        <select class="form-control {{$errors->has('motor_pembiayaan_dana_id') ? 'is-invalid' : ''}}" id="motor_pembiayaan_dana_id" name="motor_pembiayaan_dana_id" >
                                            @foreach(\App\MotorPembiayaanDana::all() as $motor_pembiayaan_dana)
                                                <option {{old('motor_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->motor_pembiayaan_dana_id) == $motor_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$motor_pembiayaan_dana->id}}">{{$motor_pembiayaan_dana->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('motor_pembiayaan_dana_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('motor_pembiayaan_dana_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_stnk_id">Status STNK</label>
                                        <select class="form-control {{$errors->has('status_stnk_id') ? 'is-invalid' : ''}}" id="status_stnk_id" name="status_stnk_id" >
                                            @foreach(\App\StatusStnk::all() as $status_stnk)
                                                <option {{old('status_stnk_id', $pengajuan_pembiayaan_dana->status_stnk_id) == $status_stnk->id ? 'selected=""' : ''}} value="{{$status_stnk->id}}">{{$status_stnk->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('status_stnk_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('status_stnk_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_bpkb_id">Status BPKB</label>
                                        <select class="form-control {{$errors->has('status_bpkb_id') ? 'is-invalid' : ''}}" id="status_bpkb_id" name="status_bpkb_id" >
                                            @foreach(\App\StatusBpkb::all() as $status_bpkb)
                                                <option {{old('status_bpkb_id', $pengajuan_pembiayaan_dana->status_bpkb_id) == $status_bpkb->id ? 'selected=""' : ''}} value="{{$status_bpkb->id}}">{{$status_bpkb->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('status_bpkb_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('status_bpkb_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_rumah_id">Status Rumah</label>
                                        <select class="form-control {{$errors->has('status_rumah_id') ? 'is-invalid' : ''}}" id="status_rumah_id" name="status_rumah_id" >
                                            @foreach(\App\StatusRumah::all() as $status_rumah)
                                                <option {{old('status_rumah_id', $pengajuan_pembiayaan_dana->status_rumah_id) == $status_rumah->id ? 'selected=""' : ''}} value="{{$status_rumah->id}}">{{$status_rumah->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('status_rumah_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('status_rumah_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cs_pembiayaan_dana_id">CS Pembiayaan Dana</label>
                                        <select class="form-control {{$errors->has('cs_pembiayaan_dana_id') ? 'is-invalid' : ''}}" id="cs_pembiayaan_dana_id" name="cs_pembiayaan_dana_id">
                                            @foreach(\App\CSPembiayaanDana::all() as $cs_pembiayaan_dana)
                                                <option {{old('cs_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->cs_pembiayaan_dana_id) == $cs_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$cs_pembiayaan_dana->id}}">{{$cs_pembiayaan_dana->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('cs_pembiayaan_dana_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('cs_pembiayaan_dana_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="spv_pembiayaan_dana_id">SPV Pembiayaan Dana</label>
                                        <select class="form-control {{$errors->has('spv_pembiayaan_dana_id') ? 'is-invalid' : ''}}" id="spv_pembiayaan_dana_id" name="spv_pembiayaan_dana_id">
                                            @foreach(\App\SpvPembiayaanDana::all() as $spv_pembiayaan_dana)
                                                <option {{old('spv_pembiayaan_dana_id', $pengajuan_pembiayaan_dana->spv_pembiayaan_dana_id) == $spv_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$spv_pembiayaan_dana->id}}">{{$spv_pembiayaan_dana->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('spv_pembiayaan_dana_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('spv_pembiayaan_dana_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}

                            <hr>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="plafond_pembiayaan_disetujui">Plafond Pembiayaan Di Setujui</label>
                                        <input type="number" class="form-control {{$errors->has('plafond_pembiayaan_disetujui') ? 'is-invalid' : ''}}" id="plafond_pembiayaan_disetujui" name="plafond_pembiayaan_disetujui" value="{{old('plafond_pembiayaan_disetujui', $pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui)}}"/>
                                        @if($errors->has('plafond_pembiayaan_disetujui'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('plafond_pembiayaan_disetujui')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempo_angsuran_pembiayaan_dana_id_disetujui">Tempo Angsuran Pembiayaan Dana yang disetujui</label>
                                        <select class="form-control {{$errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui') ? 'is-invalid' : ''}}" id="tempo_angsuran_pembiayaan_dana_id_disetujui" name="tempo_angsuran_pembiayaan_dana_id_disetujui" >
                                            <option value=""></option>
                                            @foreach(\App\TempoAngsuranPembiayaanDana::all() as $tempo_angsuran_pembiayaan_dana)
                                                <option {{old('tempo_angsuran_pembiayaan_dana_id_disetujui', $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_id_disetujui) == $tempo_angsuran_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$tempo_angsuran_pembiayaan_dana->id}}">{{$tempo_angsuran_pembiayaan_dana->tempo . ' Bulan'}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tempo_angsuran_pembiayaan_dana_id_disetujui'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('tempo_angsuran_pembiayaan_dana_id_disetujui')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="angsuran">Angsuran</label>
                                        <input type="number" class="form-control {{$errors->has('angsuran') ? 'is-invalid' : ''}}" id="angsuran" name="angsuran" value="{{old('angsuran', $pengajuan_pembiayaan_dana->angsuran)}}"/>
                                        @if($errors->has('angsuran'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('angsuran')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>


                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.pengajuan_pembiayaan_dana.index')}}" class="btn btn-secondary">Cancel</a>
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

            

        });
    </script>
@endsection