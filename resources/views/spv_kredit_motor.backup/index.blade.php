@extends('layouts.app')

@section('content')

    

    <header class="main-header pt-80 pb-0 h-100 bg-gradient__lush text-white h-100">

        
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-12">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-8">
                            <div class="mb-50">
                                <h1>Rosmala Noerbuana</h1>
                                <p class="lead">Supervisor</p>
                                <ul class="list-unstyled">
                                    <li class="media d-flex align-items-top">
                                        <i class="fa fa-flag mr-2 mt-2 d-inline-block" style="width: 20px;"></i>
                                        <div class="media-body">
                                            Management
                                        </div>
                                    </li>

                                    <li class="media d-flex align-items-top">
                                        <i class="fa fa-map-marker mr-2 mt-2 d-inline-block" style="width: 20px;"></i>
                                        <div class="media-body">
                                            Jakarta - Indonesia
                                        </div>
                                    </li>

                                    <li class="media d-flex align-items-top">
                                        <i class="fa fa-trophy mr-2 mt-2 d-inline-block" style="width: 20px;"></i>
                                        <div class="media-body">
                                            Stated on February, 23, 2012
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card" style="border-radius: 2.25rem;">
                                <div class="card-body">
                                    <img data-src="{{asset('dsm_design/dist/img/Group 1927.jpg')}}" class="lazy img-fluid" alt="Dana Syariah Motor">    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="user-profile-photo rounded-lg" style="overflow: hidden;">
                        <img data-src="dist/img/Group 1927.jpg" class="lazy img-fluid" alt="Dana Syariah Motor">    
                    </div> -->


                    
                </div>
                


            </div>


        </div>
    

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item mr-2">
                            <a class="nav-link active" href="#">My Profile</a>
                        </li>
                        
                        <li class="nav-item mr-2">
                            <a class="nav-link active" href="#">Ganti Password</a>
                        </li>

                        <li class="nav-item mr-2">
                            <a class="nav-link active" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="py-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="mb-20">Contact</h1>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="media d-flex align-items-top mb-3">
                                    <i class="fa fa-envelope-o fa-2x mr-2 d-inline-block" style="width: 40px;"></i>
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1">Email</h4>
                                        <a href="#">Rosmala@DSM.com</a>
                                    </div>
                                </li>

                                <li class="media d-flex align-items-top mb-3">
                                    <i class="fa fa-phone fa-2x mr-2 d-inline-block" style="width: 40px;"></i>
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1">Mobile</h4>
                                        <a href="#">+628 123 456 789</a>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                            
                </div>
                <div class="col-md-4 text-center">
                    <div>
                        <h6 class="mb-4"> 
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle text-danger fa-stack-2x"></i>
                                <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                            </span>
                            5 Notifications
                        </h6>
                        <p><a href="" class="btn btn-primary">Lihat Notifikasi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

        
@endsection
