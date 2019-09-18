
@extends('dashboard_mitra.main')

@section('sub_content')

<?php $mitra = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2>Profile</h2>
            <hr>
        
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Nama Lengkap Sesuai KTP</dt>
                <dd class="col-sm-8">{{$mitra->name}}</dd>
        
                <dt class="col-sm-4 text-md-right">Email</dt>
                <dd class="col-sm-8">{{$mitra->email}}</dd>
        
                <dt class="col-sm-4 text-md-right">No Handphone GSM</dt>
                <dd class="col-sm-8">{{$mitra->no_handphone_1}}</dd>
        
                <dt class="col-sm-4 text-md-right">No Whatsapp</dt>
                <dd class="col-sm-8">{{$mitra->no_handphone_2 ? $mitra->no_handphone_2 : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Jenis Identitas</dt>
                <dd class="col-sm-8">{{$mitra->jenis_identitas ? $mitra->jenis_identitas : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">No Identitas</dt>
                <dd class="col-sm-8">{{$mitra->no_identitas ? $mitra->no_identitas : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Tempat Lahir</dt>
                <dd class="col-sm-8">{{$mitra->tempat_lahir ? $mitra->tempat_lahir : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Tanggal Lahir</dt>
                <dd class="col-sm-8">{{$mitra->tanggal_lahir ? $mitra->tanggal_lahir : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Provinsi</dt>
                <dd class="col-sm-8">{{$mitra->province ? $mitra->province->name : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Kota</dt>
                <dd class="col-sm-8">{{$mitra->city ? $mitra->city->name : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Kecamatan</dt>
                <dd class="col-sm-8">{{$mitra->district ? $mitra->district->name : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Alamat</dt>
                <dd class="col-sm-8">{{$mitra->alamat ? $mitra->alamat : '-'}}</dd>
            </dl>
        </div>
    </div>
                                    
               
   

        
@endsection
