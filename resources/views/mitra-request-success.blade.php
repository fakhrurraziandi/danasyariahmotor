@extends('layouts.app')

@section('seo_title', \App\ContentVariable::getValue('seo_title__kontak_kami') . ' | '.
\App\ContentVariable::getValue('website_title'))

@section('content')



<section class="py-100" id="section-form" style="background: #f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Request Menjadi Mitra Telah Terkirim</h1>
                <p class="lead">Mitra Dana Syariah Motor</p>

                <p>Kami akan segera menghubungi anda, ketika permitaan Join Mitra telah di aktivasi anda akan menerima notifikasi via whatsapp sesauai dengan nomor whatsapp profile anda.</p>

                <p><a class="btn btn-primary btn-lg" href="{{route('home')}}">Kembali Ke Halaman Utama</a></p>
            </div>
        </div>

       
    </div>
</section>




@endsection

@section('scripts')

@endsection