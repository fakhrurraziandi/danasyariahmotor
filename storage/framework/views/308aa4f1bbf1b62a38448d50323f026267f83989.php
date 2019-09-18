<?php $__env->startSection('content'); ?>

    <header class="main-header py-80 h-100 bg-gradient__lush text-white h-100">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="my-3 text-center">
                        <h1>TENTANG KAMI</h1>
                        <h2 class="font-weight-light">DANA SYARIAH</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <img data-src="<?php echo e(asset('dsm_design/dist/img/meetin-up-office-2@2x.png')); ?>" class="lazy img-fluid" alt="">
                </div>
            </div>
        </div>
    </header>

    <section class="py-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-50">
                    <img data-src="<?php echo e(asset('dsm_design/dist/img/navbar-logo@2x.png')); ?>" class="lazy img-fluid" alt="">
                </div>
                <div class="col-md-12">

                    <h1 class="text-center font-weight-light mb-50">MENGAPA SANA SYARIAH?</h1>

                    <div class="mb-50 text-center">
                        <h3 class="font-weight-light">LAYANAN INVESTASI SYARIAH</h3>
                        <p>Menyediakan Layanan Investasi Syariah dan Pembiayaan Syariah bagi Pemilik Usaha ataupun Perorangan, dengan tujuan mendapatkan manfaat dan Bagi Hasil yang Halal serta terhindar dari unsur Maisir, Gharar dan Riba.</p>
                    </div>

                    <div class="row d-flex justify-content-center mb-50">
                        <div class="col-md-11">
                            <h4 class="font-weight-light border-bottom pb-2">
                                <a class="text-dark d-flex justify-content-between" data-toggle="collapse" href="#collapse-1" role="button" aria-expanded="false" aria-controls="collapse-1">
                                    <span>OBJEK PEMBIAYAAN DANA SYARIAH</span> 
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </h4>
                            <div class="collapse" id="collapse-1">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem numquam aliquid similique quas ratione voluptas porro, cum velit magnam exercitationem. Fugit nostrum illo cupiditate nobis ex quis suscipit, laboriosam dolorem.</p>
                            </div>

                            <h4 class="font-weight-light border-bottom pb-2">
                                <a class="text-dark d-flex justify-content-between" data-toggle="collapse" href="#collapse-2" role="button" aria-expanded="false" aria-controls="collapse-2">
                                    <span>PELAKSANAAN PEMBIAYAAN DI DANA SYARIAH</span> 
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </h4>
                            <div class="collapse" id="collapse-2">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem numquam aliquid similique quas ratione voluptas porro, cum velit magnam exercitationem. Fugit nostrum illo cupiditate nobis ex quis suscipit, laboriosam dolorem.</p>
                            </div>

                            <h4 class="font-weight-light border-bottom pb-2">
                                <a class="text-dark d-flex justify-content-between" data-toggle="collapse" href="#collapse-3" role="button" aria-expanded="false" aria-controls="collapse-3">
                                    <span>PELAKSANAAN PEMBIAYAAN KONVENSIONAL DAN SYARIAH</span> 
                                    <i class="fa fa-chevron-down"></i>
                                </a>
                            </h4>
                            <div class="collapse" id="collapse-3">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem numquam aliquid similique quas ratione voluptas porro, cum velit magnam exercitationem. Fugit nostrum illo cupiditate nobis ex quis suscipit, laboriosam dolorem.</p>
                            </div>
                        </div>
                    </div>


                    <h1 class="text-center font-weight-light">VISI & MISI</h1>

                    <div class="row mb-50">
                        <div class="col-md-6 text-center">
                            <h2 class="mb-4">VISI</h2>
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/visi-icon.png')); ?>" class="lazy img-fluid mb-4" alt="">
                            <p>Mengajak masyarakat untuk melaksanakan kegiatan ekonomi sesuai syariat Islam, agar bisa diperoleh rezeki yang halal dan barokah demi kesejahteraan dunia akhirat</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h2 class="mb-4">MISI</h2>
                            <img data-src="<?php echo e(asset('dsm_design/dist/img/misi-icon.png')); ?>" class="lazy img-fluid mb-4" alt="">
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
        <img data-src="<?php echo e(asset('dsm_design/dist/img/indonesia-map@2x.jpg')); ?>" class="lazy img-fluid w-100" alt="">
    </section>
        
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* C:\xampp\htdocs\dsm\resources\views/tentang-kami.blade.php */ ?>