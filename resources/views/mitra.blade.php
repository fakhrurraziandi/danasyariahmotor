<?php
use Illuminate\Support\Facades\Auth; 
?>
@extends('layouts.app')

@section('seo_title', \App\ContentVariable::getValue('seo_title__kontak_kami') . ' | '.
\App\ContentVariable::getValue('website_title'))

@section('content')



<section class="py-100" id="section-form" style="background: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Menjadi Mitra DSM</h1>
                <p class="lead">Dana Syariah Motor</p>

                <p>Adalah partner Bisnis DSM yang nanti nya memiliki kesempatan untuk mendapatkan beragam benefit dan fasilitas dengan cara menyebarkan atau Share kan <b>Kode Ref</b> Mitra kepada calon Konsumen kepada DSM.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="accordion" id="accordionExample">

                  


                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-100" id="section-form" >
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12 text-center">
                <h2>Keuntungan Jadi Mitra DSM</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/keunggulan-1.png')}}" alt="Dana Syariah Motor" class="img-fluid">
                </div>
                <p class="lead">Insentif Dan Bonus Menarik, Hingga <b>30 juta / Bulan</b></p>
				</div>
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/keunggulan-2.png')}}" alt="Dana Syariah Motor" class="img-fluid">
                </div>
                <p class="lead">Pembayaran Insentif Lancar dan tepat Waktu</p>
            </div>
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/keunggulan-3.png')}}" alt="Dana Syariah Motor" class="img-fluid">
                </div>
                <p class="lead">Penghasilan Kerja Sesuai Syariah</p>
            </div>
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/keunggulan-4.png')}}" alt="Dana Syariah Motor" class="img-fluid">
                </div>
                <p class="lead">Mudah Mendapatkan Konsumen Tiap Bulan nya</p>
            </div>
        </div>
    </div>
</section>

<section class="py-100" id="section-form" style="background-color: #f9f9f9;" >
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12 text-center">
                <h2>Cara Kerja Mitra</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/cara-kerja-1.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-3">
                </div>
                <p class="lead">Memahami tentang Produk Dana Syariah Motor</p>
				</div>
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/cara-kerja-2.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-3">
                </div>
                <p class="lead"> Sediakan Waktu Sekitar <b>30 s/d 45 Menit</b> Tiap Hari</p>
            </div>
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/cara-kerja-3.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-3">
                </div>
                <p class="lead">Manfaatkan Kontak Whatsapp dan Social Media</p>
            </div>
            <div class="col-6 col-sm-3 col-md-3 text-center">
                <div style="padding-left: 50px; padding-right: 50px;">
                    <img src="{{asset('img/cara-kerja-4.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-3">
                </div>
                <p class="lead">Gunakan Software Canggih Dana Syariah Motor</p>
            </div>
        </div>
    </div>
</section>




<section class="py-100" id="section-form" >
    <div class="container">
        <div class="row py-4">
            <div class="col-md-12 text-center">
                <h2>Persyaratan Menjadi Mitra DSM</h2>
            </div>
        </div>
        <div class="row py-4 justify-content-center">
            
            <div class="col-6 col-sm-2 col-md-2 timeline-col">
                <div class="timeline--line"></div>
                <div class="timeline--dot"></div>
                <div class="text-center">
                    <div style="padding: 16px 40px;"><img src="{{asset('img/menjadi-mitra-1.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-4"></div>
                    <h5>ISI FORMULIR PENDAFTARAN</h5>
                    <p>Lengkapi Formulir Pendaftaran Aplikasi Online</p>
                </div>
            </div>
            <div class="col-6 col-sm-2 col-md-2 timeline-col">
                <div class="timeline--line"></div>
                <div class="timeline--dot"></div>
                <div class="text-center">
                    <div style="padding: 16px 40px;"><img src="{{asset('img/menjadi-mitra-2.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-4"></div>
                    <h5>DIHUBUNGI KAMI</h5>
                    <p>Kami akan menghubungi anda untuk mengkonfirmasi data diri anda</p>
                </div>
            </div>
            <div class="col-6 col-sm-2 col-md-2 timeline-col">
                <div class="timeline--line"></div>
                <div class="timeline--dot"></div>
                <div class="text-center">
                    <div style="padding: 16px 40px;"><img src="{{asset('img/menjadi-mitra-3.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-4"></div>
                    <h5>PERSETUJUAN</h5>
                    <p>Izinkan kami menyimpan informasi dan dokumen bisnis anda </p>
                </div>
            </div>
            <div class="col-6 col-sm-2 col-md-2 timeline-col">
                <div class="timeline--line"></div>
                <div class="timeline--dot"></div>
                <div class="text-center">
                    <div style="padding: 16px 40px;"><img src="{{asset('img/menjadi-mitra-4.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-4"></div>
                    <h5>PEMERIKSAAN</h5>
                    <p>Kami akan melakukan beberapa pemeriksaan</p>
                </div>
            </div>
            <div class="col-6 col-sm-2 col-md-2 timeline-col">
                <div class="timeline--line"></div>
                <div class="timeline--dot"></div>
                <div class="text-center">
                    <div style="padding: 16px 40px;"><img src="{{asset('img/menjadi-mitra-5.png')}}" alt="Dana Syariah Motor" class="img-fluid mb-4"></div>
                    <h5>SELESAI</h5>
                    <p>Setelah semua selesai, kerjasama bisnis kita dapat dimulai</p>
                </div>
            </div>

            
           
        </div>
    </div>
</section>




<section class="py-100" id="section-form" style="background: #f9f9f9;">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2>Simulasi Pendapatan Mitra DSM</h2>

                <div class="px-5">
                    <img src="{{asset('img/simulasi.png')}}" alt="Dana Syariah Motor" class="img-fluid py-4">
                </div>
                
            </div>
        </div>
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8 text-center mb-5">
                <h2 class="mb-4">Video Penjelasan Mitra DSM</h2>

                <div class="card border-success" style="border-width: 10px;">
                    <iframe style="width: 100%; height: 400px;" src="https://youtube.com/embed/MLmhgEgGz6U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                
                
                
            </div>
        </div>
    </div>
</section>

<section class="py-100" id="section-form" style="background: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Minat Menjadi Mitra DSM?</h2>

                <p class="lead">Daftar sekarang karena kuota untuk Mitra DSM Terbatas!</p>

                @if(Auth::user())
                    <p><a href="{{route('mitra-request')}}" class="btn btn-primary btn-lg">DAFTAR DISINI</a></p>
                @else
                    <p><a href="{{route('auth.mitra_register')}}" class="btn btn-primary btn-lg">DAFTAR DISINI</a></p>
                @endif
                
            </div>
        </div>
    </div>
</section>




@endsection

@section('scripts')

@endsection