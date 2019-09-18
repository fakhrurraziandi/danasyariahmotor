@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-3"><a href="{{route('admin.pengajuan_kredit_motor.index')}}" class="btn btn-secondary">Back</a></p>
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

                                    <dt class="col-sm-4">Wilayah</dt>
                                    <dd class="col-sm-8">{{$pengajuan_kredit_motor->wilayah_kredit_motor->name}}</dd>

                                    <dt class="col-sm-4">Motor</dt>
                                    <dd class="col-sm-8">{{$pengajuan_kredit_motor->angsuran_motor->motor->name}}</dd>

                                    <dt class="col-sm-4">DP</dt>
                                    <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor->dp, 0, ',', '.')}}</dd>

                                    <dt class="col-sm-4">Angsuran x Bulan</dt>
                                    <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor_detail->angsuran_per_bulan, 0, ',', '.') . ' x '. $pengajuan_kredit_motor->angsuran_motor_detail->tempo_angsuran_motor->tempo . ' Bulan'}}</dd>

                                    <dt class="col-sm-4">CS Status</dt>
                                    <dd class="col-sm-8">{{$pengajuan_kredit_motor->cs_kredit_motor_status ? $pengajuan_kredit_motor->cs_kredit_motor_status : '-'}}</dd>

                                    <dt class="col-sm-4">SPV Status</dt>
                                    <dd class="col-sm-8">{{$pengajuan_kredit_motor->spv_kredit_motor_status ? $pengajuan_kredit_motor->spv_kredit_motor_status : '-'}}</dd>
                                </dl>

                                
                            </div>
                        </div>
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