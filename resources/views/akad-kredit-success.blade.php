@extends('layouts.app')


@section('seo_title', \App\ContentVariable::getValue('seo_title__pinjaman_syariah') . ' | '. \App\ContentVariable::getValue('website_title'))

@section('content')

    

    <section class="py-100 my-100">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6 mb-4 text-center">
                    <h1>Pengajuan Pembiayaan Dana Berhasil</h1>
                    <p>Untuk tahap selanjutnya, kami akan menghubungi anda melalui  <strong>No Whatsapp / Via Telp</strong> untuk dilakukan Verifikasi Data dan Analisa Tahap Pertama Sebelum Proses Wawancara dan Survey ke Cabang Sesuai 
					Domisili Anda. Pastikan Semua Pengisian Form Pengajuan Pinjaman Telah Di Isi Dengan Benar dan Jujur</p>
                    <p>
                        <a class="btn btn-primary" href="{{route('home')}}">Kembali ke halaman utama</a> 
                        <a class="btn btn-primary" href="{{route('dashboard_user.pengajuan_pembiayaan_dana')}}">Lihat Pengajuan Anda</a> 
                    </p>
                </div>
            </div>
        </div>
    </section>


    
        
@endsection


