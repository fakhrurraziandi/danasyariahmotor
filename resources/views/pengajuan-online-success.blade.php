@extends('layouts.app')

@section('content')

    

    <section class="py-100 my-100">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6 mb-4 text-center">
                    <h1>Pengajuan Kredit Motor Berhasil</h1>
                    <p>Untuk tahap selanjutnya, kami akan menghubungi anda sesuai dengan no handphone yg terdaftar pada user profile anda.</p>
                    <p>
                        <a class="btn btn-primary" href="{{route('home')}}">Kembali ke halaman utama</a> 
                        <a class="btn btn-primary" href="{{route('pengajuan_kredit_motor.index')}}">Lihat Pengajuan Anda</a> 
                    </p>
                </div>
            </div>
        </div>
    </section>


    
        
@endsection


