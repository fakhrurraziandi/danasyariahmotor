
@extends('layouts.app')

@section('content')

<?php $mitra = auth()->user(); ?>



<div class="container pt-80 py-80">
    <div class="row align-items-top">
        <div class="col-md-3">
            
            <div class="card border-0 shadow-sm mb-5">
                <img src="{{$mitra->url_photo}}" alt="Dana Syariah Motor" class="img-fluid">
                <div class="card-body">
                    <h5>{{$mitra->name}}</h5>
                    <p class="mb-0 text-primary">{{$mitra->email}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item" style="font-size: 0.8rem;"><a href="#">Edit Profile</a></li>
                    <li class="list-group-item" style="font-size: 0.8rem;"><a href="#">Pengajuan Pembiayaan Dana Anda</a></li>
                    <li class="list-group-item" style="font-size: 0.8rem;"><a href="#">Pengajuan Pembiayaan Dana Customer Anda</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">

            @yield('sub_content')
        </div>
    </div>

    
</div>





@endsection
