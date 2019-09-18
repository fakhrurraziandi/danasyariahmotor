<?php  
use Shivella\Bitly\Facade\Bitly;
use Mbarwick83\Shorty\Facades\Shorty;
?>
@extends('dashboard_user.main')

@section('sub_content')

<?php $user = auth()->user(); ?>


    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2>Profile <small style="font-size: 0.8rem;"><a href="{{route('dashboard_user.edit_profile')}}"><i class="fa fa-pencil"></i> Edit Profile</a></small></h2>
            <hr>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Update!</strong> Successfully updated!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        
            <dl class="row">
                <dt class="col-sm-4 text-md-right">Nama Lengkap Sesuai KTP</dt>
                <dd class="col-sm-8">{{$user->name}}</dd>
        
                <dt class="col-sm-4 text-md-right">Email</dt>
                <dd class="col-sm-8">{{$user->email}}</dd>
        
                <dt class="col-sm-4 text-md-right">No Handphone GSM</dt>
                <dd class="col-sm-8">{{$user->no_handphone_1}}</dd>
        
                <dt class="col-sm-4 text-md-right">No Whatsapp</dt>
                <dd class="col-sm-8">{{$user->no_handphone_2 ? $user->no_handphone_2 : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Jenis Identitas</dt>
                <dd class="col-sm-8">{{$user->jenis_identitas ? $user->jenis_identitas : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">No Identitas</dt>
                <dd class="col-sm-8">{{$user->no_identitas ? $user->no_identitas : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Tempat Lahir</dt>
                <dd class="col-sm-8">{{$user->tempat_lahir ? $user->tempat_lahir : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Tanggal Lahir</dt>
                <dd class="col-sm-8">{{$user->tanggal_lahir ? $user->tanggal_lahir : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Provinsi</dt>
                <dd class="col-sm-8">{{$user->province ? $user->province->name : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Kota</dt>
                <dd class="col-sm-8">{{$user->city ? $user->city->name : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Kecamatan</dt>
                <dd class="col-sm-8">{{$user->district ? $user->district->name : '-'}}</dd>
        
                <dt class="col-sm-4 text-md-right">Alamat</dt>
                <dd class="col-sm-8">{{$user->alamat ? $user->alamat : '-'}}</dd>

                <div class="col-sm-12">
                    <hr>
                </div>

                

                <dt class="col-sm-4 text-md-right">Kode Referal</dt>
                <dd class="col-sm-8 text-primary font-weight-bold">{{$user->ref_code ? $user->ref_code : '-'}}</dd>

                <dt class="col-sm-4 text-md-right">Nama Bank</dt>
                <dd class="col-sm-8">{{$user->nama_bank ? $user->nama_bank : '-'}}</dd>

                <dt class="col-sm-4 text-md-right">No Rekening Bank</dt>
                <dd class="col-sm-8">{{$user->no_rekening_bank ? $user->no_rekening_bank : '-'}}</dd>
            </dl>
        </div>
    </div>
                                    
               
   

        
@endsection
