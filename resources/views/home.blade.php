@extends('layouts.app')

@section('seo_title', \App\ContentVariable::getValue('seo_title__home') . ' | '. \App\ContentVariable::getValue('website_title'))

@section('content')

    <header class="main-header py-80 h-100 bg-gradient__lush text-white h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="my-3">
                        <h1>DSM | DANA SYARIAH MOTOR</h1>
                        <h2 class="font-weight-light">CEPAT MUDAH DAN HALAL</h2>
                        <p>Dengan dana syariah yang halal dan barokah, kami menghadirkan solusi tepat atas kebutuhan keuangan Anda. Bebaskan diri Anda dari kekhawatiran terlibat gharar, maisir dan riba.</p>
                        <p>Anda pun memiliki kesempatan yang sama. Jika Anda butuh dana cepat, sekaranglah saat yang tepat untuk mengajukan permohonan dana syariah ke Dana Syariah Motor. Tunggu apa lagi? Segera unduh aplikasinya di Google Play dan lengkapi data Anda</p>
                        <h5>Bebaskan diri Anda dari kekhawatiran terlibat Gharar, Maisir dan Riba</h5>
                     </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img data-src="{{asset('dsm_design/dist/img/man-in-the-desk.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                </div>
            </div>
        </div>
    </header>

    <section class="py-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-10">
                    <h3>Apa itu Dana Syariah Motor?</h3>
                    <p>Kami menyediakan dana syariah untuk pemilik usaha dan perorangan dengan mekanisme bagi hasil yang halal berdasarkan prinsip al-bai’ wa al isti’jar <b>(Fatwa Dewan Syariah Nasional No : 89/DSN-MUI/XII/2013)</b>. Pada dasarnya akad yang digunakan adalah jual beli <b>Ba’i Wal Ijarah Munttaiyah Bit Tamlik</b>. Akad </b>Ba’i</b> digunakan ketika pelanggan menjual unit sepeda motornya dan Akad <b>Ijarah Munttaiyah Bit Tamlik</b> digunakan pada saat menyewakan unit sepeda motor kepada konsumen, lalu konsumen membayar biaya sewa motor setiap bulan. Dengan demikian, Konsumen terhindar dari riba.</p>
                </div>
                <div class="col-md-6 mb-10 h-100">
                    <div class="card border-success" style="border-width: 10px;">
                        <iframe style="width: 100%; height: 300px;" src="https://youtube.com/embed/k4QKSABwNNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
           <div class="row mb-30 ml-20">
                <div class="col-md-12">

                <div class="row mb-10 ml-20 d-flex align-items-center">
                <div class="col-md-5">
                    <img data-src="{{asset('dsm_design/dist/img/meeting-in-office@2x.png')}}" class="lazy img-fluid mb-5" alt="Dana Syariah Motor">
                </div>
                <div class="col-md-7">
                    <h4>KRITERIA NASABAH DANA SYARIAH</h4>
                    <p>Warga negara Indonesia perorangan yang memiliki usaha sendiri (pengusaha) dan karyawan yang memiliki kendaraan bermotor roda dua merk apapun dengan dokumen yang lengkap berkesempatan untuk mengajukan dana syariah. Harap diingat bahwa yang bisa diproses adalah sepeda motor buatan 9 tahun ke belakang. Misal sekarang bulan tahun 2019, maka yang masih bisa diproses adalah motor yang dirakit pada tahun 2010.</p>
                    <span>
                    <p>Contoh kemudahan lainnya yang kami hadirkan, yaitu unit sepeda motor yang masih kredit tetap bisa diproses, asalkan maksimal angsuran tersisa 6 bulan dan atas nama sendiri. BPKB atas nama orang lain pun tetap bisa digunakan untuk pengajuan, asalkan STNK masih berlaku. Jika status mati pajak, maka pelanggan wajib memperpanjang terlebih dahulu.</p></span>
                {{-- <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="media d-flex align-items-top">
                                <i class="fa fa-check-square-o text-success fa-2x mr-3"></i>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="media d-flex align-items-top">
                                <i class="fa fa-check-square-o text-success fa-2x mr-3"></i>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="media d-flex align-items-top">
                                <i class="fa fa-check-square-o text-success fa-2x mr-3"></i>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="media d-flex align-items-top">
                                <i class="fa fa-check-square-o text-success fa-2x mr-3"></i>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <section class="py-50 bg-success text-white">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <h4>Cara Dapatkan Dana Syariah?</h4>
                    <p>Mekanismenya benar-benar dirancang untuk memudahkan Anda. Bayangkan, proses pengajuan ini memakan waktu tidak sampai 10 menit. Anda sudah siap? Mari ikuti prosedur pengajuannya untuk mendapatkan solusi pembiayaan syariah Anda.</p>
                    <p>Klik Menu <b>Ajukan Sekarang</b> dan isi formulir pengajuan hingga lengkap lalu klik Ajukan. Anda akan memperoleh notifikasi WhatsApp bahwa pendaftaran pengajuan Anda berhasil.</p> 
					<p>Dana syariah akan cair dalam waktu 1 hingga 2 hari kerja ke rekening Anda atau bisa langsung datang ke kantor cabang Dana Syariah Motor terdekat sesuai domisili Anda sambil membawa BPKB dan faktur asli.</p> 
					<h6>Bagaimana menurut Anda, benar-benar mudah bukan? #YukMoveOnkeSyariah</h6>
                </div>
                <div class="col-md-6">
                    <img data-src="{{asset('dsm_design/dist/img/meeting-up-in-cafe@2x.png')}}" class="lazy img-fluid" alt="Dana Syariah Motor">
                </div>
            </div>
        </div>
    </section>

    <section class="py-50 text-white" style="background-image: url('{{asset('dsm_design/dist/img/home-news-bg@2x.jpg')}}'); background-position: center bottom; background-size: cover;">
        <div class="container">
            <div class="row d-flex align-items-center">
                
                <div class="col-md-6">
                    <div class="card" style="background-color: rgba(0, 0, 0, 0.5)">
                        <div class="card-body">
                            <h4><span style="color:#FFCC00;font-weight">PERBEDAAN SYARIAH VS KONVESIONAL<br>ANTARA LAIN-NYA</span></h4>
                            <p>Lembaga keuangan syariah menganut prinsip-prinsip yang berlandaskan nilai-nilai Islam sehingga pengelolaannya pun bebas dari riba, gharar, dan maisir. Bandingkan dengan lembaga keuangan konvensional yang masih terikat pada bunga alias riba. Allah melarang riba dan menghalalkan jual beli. Menggunakan produk atau jasa yang halal akan mendekatkan Anda pada rahmat-Nya.</p>

                            <p>Lembaga keuangan konvensional berorientasi pada profit melalui pembayaran bunga dan membuat pelanggannya bertanggung jawab atas risiko apa pun. Sebaliknya, lembaga keuangan syariah menerapkan sistem pembagian laba dan rugi secara adil. Risiko pun ditanggung secara bersama dan proporsional antara pihak yang meminjamkan dan yang menerima pinjaman. Contohnya, jika seorang pemodal ingin mengklaim profit dari suatu proyek, dia juga harus merelakan bagian kerugiannya</p> 
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img data-src="{{asset('dsm_design/dist/img/vespa-only@2x.png')}}" alt="Dana Syariah Motor" class="lazy img-fluid w-100">
                </div>
            </div>
        </div>
    </section>

    <section class="py-50">
        <div class="container">
            <?php $testimoni_gallery = App\TestimoniGallery::orderBy('created_at', 'DESC')->first() ?>
            <div class="row d-flex align-items-center justify-content-center mb-50">
                <div class="col-md-6">
                    <div class="card shadow-lg border-0">
                        <div class="card-body text-center">
                            <img data-src="{{asset('uploads/'. $testimoni_gallery->photo)}}" alt="Dana Syariah Motor" class="lazy img-fluid w-100">
                            <img data-src="{{asset('dsm_design/dist/img/navbar-logo.png')}}" class="lazy mt-3" alt="Dana Syariah Motor">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-flex align-items-center justify-content-center">

                <div class="col-md-8 text-center">
                    <h4 class="h2 text-success">{{$testimoni_gallery->name}}</h4>
                    <p class="text-center">{{$testimoni_gallery->message}}</p>
                    <p><a href="{{route('gallery')}}" class="btn btn-danger">Lihat Testimoni</a></p>
                </div>
            </div>
        </div>
    </section>

        
@endsection
