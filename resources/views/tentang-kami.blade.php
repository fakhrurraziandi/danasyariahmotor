@extends('layouts.app')


@section('seo_title', \App\ContentVariable::getValue('seo_title__tentang_kami') . ' | '. \App\ContentVariable::getValue('website_title'))


@section('content')

    <header class="main-header py-80 h-100 bg-gradient__lush text-white h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="my-3 text-center">
                        <h1>TENTANG KAMI</h1>
                        <h2 class="font-weight-light">DANA SYARIAH MOTOR</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img data-src="{{asset('dsm_design/dist/img/meetin-up-office-2@2x-hijab.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                </div>
            </div>
        </div>
    </header>

    <section class="py-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-50">
                    <img data-src="{{asset('dsm_design/dist/img/navbar-logo@2x.png')}}" class="lazy img-fluid" alt="navbar-logo@2x.png">
                </div>
                <div class="col-md-12">
                                      <div class="mb-50 text-center">
                        <h3 class="font-weight-light">DANA SYARIAH MOTOR SOLUSI KEUANGAN ANDA</h3>
                        <p>Dana Syariah Motor telah berpengalaman lebih dari 10 tahun dengan 4 juta pelanggan yang puas. Jadilah bagian dari mereka dengan mengajukan dana syariah dan bebaskan diri Anda dalam kegiatan riba.</p>
                    </div>
                    <h1 class="text-center font-weight-light">VISI - MISI DSM</h1>

                    <div class="row mb-50">
                        <div class="col-md-6 text-center">
                            <h2 class="mb-4">VISI</h2>
                            <img data-src="{{asset('dsm_design/dist/img/visi-icon.png')}}" class="lazy img-fluid mb-4" alt="Dana Syariah Motor">
                            <p>Mengajak masyarakat untuk melaksanakan kegiatan ekonomi sesuai syariat Islam, agar bisa diperoleh rezeki yang halal dan barokah demi kesejahteraan dunia akhirat</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h2 class="mb-4">MISI</h2>
                            <img data-src="{{asset('dsm_design/dist/img/misi-icon.png')}}" class="lazy img-fluid mb-4" alt="Dana Syariah Motor">
                            <p>Menjadi wadah dan pusat kegiatan ekonomi syariah yang bisa mempermudah masyarakat, untuk melaksanakan kegiatan ekonomi sesuai syariat Islam</p>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center font-weight-light mb-50">Cabang Seluruh Indonesia</h1>
                </div>
            </div>
        </div>
        <img data-src="{{asset('dsm_design/dist/img/indonesia-map@2x.jpg')}}" class="lazy img-fluid w-100" alt="Dana Syariah Motor">
    </section>
        
@endsection
