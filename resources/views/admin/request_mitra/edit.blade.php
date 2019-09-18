<?php use Laravolt\Indonesia\Models\Province; ?>
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Process Request Mitra</div>
                    <div class="card-body">

                        <form action="{{route('admin.request_mitra.update', $user->id)}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <dl class="row">
                                <dt class="col-sm-4">Nama Lengkap Sesuai KTP</dt>
                                <dd class="col-sm-8">{{$user->name}}</dd>
                            
                                <dt class="col-sm-4">Email</dt>
                                <dd class="col-sm-8">{{$user->email}}</dd>
                            
                                <dt class="col-sm-4">No Handphone GSM</dt>
                                <dd class="col-sm-8">{{$user->no_handphone_1}}</dd>
                            
                                <dt class="col-sm-4">No Whatsapp</dt>
                                <dd class="col-sm-8">{{$user->no_handphone_2 ? $user->no_handphone_2 : '-'}}</dd>
                            
                                <dt class="col-sm-4">Jenis Identitas</dt>
                                <dd class="col-sm-8">{{$user->jenis_identitas ? $user->jenis_identitas : '-'}}</dd>
                            
                                <dt class="col-sm-4">No Identitas</dt>
                                <dd class="col-sm-8">{{$user->no_identitas ? $user->no_identitas : '-'}}</dd>
                            
                                <dt class="col-sm-4">Tempat Lahir</dt>
                                <dd class="col-sm-8">{{$user->tempat_lahir ? $user->tempat_lahir : '-'}}</dd>
                            
                                <dt class="col-sm-4">Tanggal Lahir</dt>
                                <dd class="col-sm-8">{{$user->tanggal_lahir ? $user->tanggal_lahir : '-'}}</dd>
                            
                                <dt class="col-sm-4">Provinsi</dt>
                                <dd class="col-sm-8">{{$user->province ? $user->province->name : '-'}}</dd>
                            
                                <dt class="col-sm-4">Kota</dt>
                                <dd class="col-sm-8">{{$user->city ? $user->city->name : '-'}}</dd>
                            
                                <dt class="col-sm-4">Kecamatan</dt>
                                <dd class="col-sm-8">{{$user->district ? $user->district->name : '-'}}</dd>
                            
                                <dt class="col-sm-4">Alamat</dt>
                                <dd class="col-sm-8">{{$user->alamat ? $user->alamat : '-'}}</dd>

                                <dt class="col-sm-4">pekerjaan</dt> 
                                <dd class="col-sm-8">{{$user->pekerjaan ? $user->pekerjaan : '-'}}</dd>
                                <dt class="col-sm-4">spesifikasi perangkat komputer</dt> 
                                <dd class="col-sm-8">{{$user->spesifikasi_perangkat_komputer ? $user->spesifikasi_perangkat_komputer : '-'}}</dd>
                                <dt class="col-sm-4">software marketing digital</dt> 
                                <dd class="col-sm-8">{{$user->software_marketing_digital ? $user->software_marketing_digital : '-'}}</dd>
                                <dt class="col-sm-4">alamat website</dt> 
                                <dd class="col-sm-8">{{$user->alamat_website ? $user->alamat_website : '-'}}</dd>
                                <dt class="col-sm-4">bersedia dipasang widget</dt> 
                                <dd class="col-sm-8">{{$user->bersedia_dipasang_widget ? $user->bersedia_dipasang_widget : '-'}}</dd>
                                <dt class="col-sm-4">target income pasif sebagai mitra</dt> 
                                <dd class="col-sm-8">{{$user->target_income_pasif_sebagai_mitra ? $user->target_income_pasif_sebagai_mitra : '-'}}</dd>
                                <dt class="col-sm-4">nama instagram</dt> 
                                <dd class="col-sm-8">{{$user->nama_facebook ? $user->nama_facebook : '-'}}</dd>
                                <dt class="col-sm-4">nama bank</dt> 
                                <dd class="col-sm-8">{{$user->nama_bank ? $user->nama_bank : '-'}}</dd>
                                <dt class="col-sm-4">no rekening bank</dt> 
                                <dd class="col-sm-8">{{$user->no_rekening_bank ? $user->no_rekening_bank : '-'}}</dd>
                                <dt class="col-sm-4">photo</dt> 
                                <dd class="col-sm-8">{!!$user->photo ? '<a href="'. asset('uploads/'. $user->photo) .'" target="_blank" class="btn btn-primary"><i class="fa fa-file-image"></i> Photo</a>' : '-'!!}</dd>
                            </dl>

                            
                            
                            <div class="row mt-3">
                                
                                <div class="col-md-12">

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="mitra_status-2" name="mitra_status" value="2" class="custom-control-input" checked="">
                                        <label class="custom-control-label text-success" for="mitra_status-2">Setujui</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="mitra_status-3" name="mitra_status" value="3" class="custom-control-input">
                                        <label class="custom-control-label text-danger" for="mitra_status-3">Tolak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.request_mitra.index')}}" class="btn btn-secondary">Cancel</a>
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

            function provinceIdOnChangeHandler(){
                var json = $('#province_id').find('option:selected').data('json');
                if(json){
                    $('#city_id').find('option').remove();
                    $('#city_id').append('<option>:: Kota ::</option>')
                    json.cities.forEach(function(city){
                        $('#city_id').append('<option value="'+ city.id +'">'+ city.name +'</option>')
                    });
                }
                
            }
            $('#province_id').on('change', provinceIdOnChangeHandler);
            // provinceIdOnChangeHandler(); 

        });
    </script>
@endsection