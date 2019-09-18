<?php  
use Shivella\Bitly\Facade\Bitly;
use Mbarwick83\Shorty\Facades\Shorty;
?>
@extends('dashboard_user.main')

@section('sub_content')

<?php $user = auth()->user(); ?>


    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2>PANDUAN CARA KERJA MITRA</h2>
            <hr>

            <h4><p class="text-center"><b>SELAMAT BERGABUNG DAN BEKERJA MITRA DSM</b></p></h4>
            <p class="text-center"><i>" SEMOGA MITRA DI BERIKAN KEMUDAHAN DAN KELANCARAAN UNTUK MENCARI KUSTOMER YANG BANYAK "</i></p>
           
        </div>
        <hr>
                            <div class="row">
                            <div class="col-sm-12 text-center py-4">
                                <h5>SILAKAN DI SIMAK 6 VIDEO PENJELASAN CARA KERJA MITRA DIBAWAH INI</h5>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>PERKENALAN MITRA DSM</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/r9Avud0Robc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>PROFILE MITRA DSM</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/HIfmSj6yaKI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>PENJELASAN MENU 1</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/jdfhFqeqcTQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>PENJELLESAN MENU 2</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/5Fmk8_WnONU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>FUNGSI SOFTWARE WA BLAZ V7</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/zGC8WW_YzWs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>DEMO SOFTWARE WA BLAZ V7</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/BtFmZKIK97Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            
                          </div>
                          </div>      
               
           
@endsection
