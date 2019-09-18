
@extends('layouts.app')

@section('content')

<?php $user = auth()->user(); ?>



<div class="container pt-80 py-80">
    <div class="row align-items-top">
        <div class="col-md-3">
            
            <div class="card border-0 shadow-sm mb-5">
                <img src="{{$user->url_photo}}" alt="Dana Syariah Motor" class="img-fluid">
                <div class="card-body">
                    <h5>{{$user->name}}</h5>
                    <p class="mb-0 text-primary">{{$user->email}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.index')}}">Profile Anda</a></li>
                    <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.edit_password')}}">Ganti Password</a></li>
                    
                    <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.pengajuan_pembiayaan_dana')}}">Pengajuan Dana Anda</a></li>

                    @if($user->mitra_status == '2')
                        
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.dokumentasi_mitra')}}">Panduan Cara Kerja Mitra</a></li>
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.customer_mitra')}}">List Kustomer Anda</a></li>
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.pengajuan_pembiayaan_dana_mitra')}}">List Pengajuan Kustomer Anda</a></li>
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.withdraw_request')}}"> Permintaan Pencairan Komisi</a></li>
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.withdraw_cart')}}">Keranjang Pencairan Komisi</a></li>
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.subscription_desktop_app')}}">Software Whatsapp Desktop</a></li>
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('dashboard_user.get_widget')}}">Pasang Widget Banner Website</a></li>
                    @else
                        <li class="list-group-item" style="font-size: 0.8rem;"><a href="{{route('mitra-request')}}">Ingin Jadi Mitra Kami</a></li>
                    @endif
                    
                </ul>
            </div>
        </div>
        <div class="col-md-9">

            @yield('sub_content')
        </div>
    </div>

    
</div>





@endsection
