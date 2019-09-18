@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">



                <div class="row">
                    <div class="col-md-12">

                        <p class="mb-3"><a href="{{route('admin.pengajuan_pembiayaan_dana.index')}}" class="btn btn-secondary">Back</a></p>

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
                                    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->city ? $pengajuan_pembiayaan_dana->user->city->name : '-'}}</dd>

                                    <dt class="col-sm-4">Kecamatan</dt>
                                    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->user->district ? $pengajuan_pembiayaan_dana->user->district->name : '-'}}</dd>

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
                                @include('inc.informasi_pembiayaan_dana', $pengajuan_pembiayaan_dana)
                            </div>
                        </div>
                    </div>


                    

                    <div class="col-md-12">
                        <div class="card mb-3">
                    

                            <div class="card-body">

                                <dl class="row">

                                    <dt class="col-sm-4">Plafond pembiayaan yang disetujui</dt>
                                    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui ? 'Rp.'. number_format( $pengajuan_pembiayaan_dana->plafond_pembiayaan_disetujui, 0, ',', '.') : '-'}}</dd>

                                    <dt class="col-sm-4">Tempo angsuran yang disetujui</dt>
                                    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_disetujui ?  $pengajuan_pembiayaan_dana->tempo_angsuran_pembiayaan_dana_disetujui->tempo . ' bulan' : '-'}}</dd>

                                    <dt class="col-sm-4">Angsuran</dt>
                                    <dd class="col-sm-8">{{$pengajuan_pembiayaan_dana->angsuran ? 'Rp. '. number_format($pengajuan_pembiayaan_dana->angsuran, 0, ',', '.') : '-'}}</dd>

                                    
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