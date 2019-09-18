
@extends('layouts.app')

@section('content')

<?php $cs_pembiayaan_dana = auth()->guard('cs_pembiayaan_dana')->user(); ?>


<header class="main-header pt-80 pb-0 h-100 bg-gradient__lush text-white h-100">

    <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-12">
                <div class="row d-flex align-items-center">
                    <div class="col-md-8">
                        <div class="mb-50">
                            <h1>{{$cs_pembiayaan_dana->name}}</h1>
                            {{-- <p class="lead">Customer Service</p> --}}
                            <ul class="list-unstyled">
                                <li class="media d-flex align-items-top">
                                    <i class="fa fa-flag mr-2 mt-2 d-inline-block" style="width: 20px;"></i>
                                    <div class="media-body">
                                        Customer Service
                                    </div>
                                </li>

                                <li class="media d-flex align-items-top">
                                    <i class="fa fa-trophy mr-2 mt-2 d-inline-block" style="width: 20px;"></i>
                                    <div class="media-body">
                                        {{-- Started on February, 23, 2012 --}}
                                        Started on {{$cs_pembiayaan_dana->created_at->diffForHumans()}}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="border-radius: 2.25rem;">
                            <div class="card-body">
                                <img data-src="{{$cs_pembiayaan_dana->photo_profile ? asset('uploads/'. $cs_pembiayaan_dana->photo_profile) : asset('img/no-image.gif')}}" class="lazy img-fluid" alt="Dana Syariah Motor">    
                            </div>
                        </div>

                        <div class="text-center">
                            <h6 class="mb-4 mt-4"> 
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle text-danger fa-stack-2x"></i>
                                    <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                                </span>
                                {{auth()->guard('cs_pembiayaan_dana')->user()->notifications->count()}} Notifications
                            </h6>
                            <p><a href="{{route('cs_pembiayaan_dana.notifications')}}" class="btn btn-primary">Lihat Notifikasi</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item mr-2">
                        <a class="nav-link active" href="{{route('cs_pembiayaan_dana.index')}}">My Profile</a>
                    </li>
                    
                    <li class="nav-item mr-2">
                        <a class="nav-link active" href="{{route('cs_pembiayaan_dana.change_password')}}">Ganti Password</a>
                    </li>

                    <li class="nav-item mr-2">
                        <a class="nav-link active" href="{{route('cs_pembiayaan_dana.list_pengajuan_pembiayaan_dana')}}">Pengajuan Pembiayaan Dana</a>
                    </li>

                    <li class="nav-item mr-2">
                        <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<section class="py-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @yield('sub_content')
            </div>
        </div>
    </div>
</section>

@endsection
