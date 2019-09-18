
@extends('manager_pembiayaan_dana.main')

@section('sub_content')

    

    <h1 class="mb-20">Pengajuan Pembiayaan Dana</small></h1>
    <hr>

    <form action="{{route('manager_pembiayaan_dana.process_pengajuan_pembiayaan_dana', $pengajuan_pembiayaan_dana->id)}}" method="POST">

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
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->name}}</dd>

                            <dt class="col-sm-4">Email</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->email}}</dd>

                            <dt class="col-sm-4">No Handphone GSM</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->no_handphone_1}}</dd>

                            <dt class="col-sm-4">No Whatsapp</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->no_handphone_2 ? $pengajuan_pembiayaan_dana->user->no_handphone_2 : '-'}}</dd>

                            <dt class="col-sm-4">Jenis Identitas</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->jenis_identitas ? $pengajuan_pembiayaan_dana->user->jenis_identitas : '-'}}</dd>

                            <dt class="col-sm-4">No Identitas</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->no_identitas ? $pengajuan_pembiayaan_dana->user->no_identitas : '-'}}</dd>

                            <dt class="col-sm-4">Tempat Lahir</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->tempat_lahir ? $pengajuan_pembiayaan_dana->user->tempat_lahir : '-'}}</dd>

                            <dt class="col-sm-4">Tanggal Lahir</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->tanggal_lahir ? $pengajuan_pembiayaan_dana->user->tanggal_lahir : '-'}}</dd>

                            <dt class="col-sm-4">Kota</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->city->name ? $pengajuan_pembiayaan_dana->user->city->name : '-'}}</dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->alamat ? $pengajuan_pembiayaan_dana->user->alamat : '-'}}</dd>
                        </dl>
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

            {{-- @if(!$pengajuan_pembiayaan_dana->spv_pembiayaan_dana_status)

                <div class="col-md-12 text-center">
                    <div class="py-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="spv_pembiayaan_dana_status1" name="spv_pembiayaan_dana_status" class="custom-control-input" value="denied">
                            <label class="custom-control-label" for="spv_pembiayaan_dana_status1">Tolak</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="spv_pembiayaan_dana_status2" name="spv_pembiayaan_dana_status" class="custom-control-input" value="approved">
                            <label class="custom-control-label" for="spv_pembiayaan_dana_status2">Setujui</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block px-5 py-3">Process</button>
                </div>

            @endif --}}
        </div>
    </form>

        
@endsection
