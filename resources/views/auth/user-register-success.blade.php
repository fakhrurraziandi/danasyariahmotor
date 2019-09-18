<?php use Laravolt\Indonesia\Models\Province; ?>
@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h2 class="text-center font-weight-light mb-4">Pendaftaran Berhasil</h2>
            <p>Selamat anda telah berhasil terdaftar sebagai Konsumen di Dana Syariah Motor</p>
            <p>Untuk melakukan pengajuan Pinjaman Dana Syariah silahkan klik link di bawah ini:</p>
            <p>
                <a class="btn btn-primary" href="{{URL::to('/')}}">Kembali Ke Halaman Utama</a>
                <a class="btn btn-primary" href="{{route('akad-kredit')}}">Pengajuan Pembiayaan Dana</a>
                {{-- <a class="btn btn-primary" href="{{route('beli-motor')}}">Pengajuan Kredit Motor</a> --}}
            </p>
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
            provinceIdOnChangeHandler();
        });
    </script>
@endsection