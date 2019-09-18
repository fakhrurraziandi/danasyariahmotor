<?php 
use Laravolt\Indonesia\Models\Province;
?>

@extends('dashboard_user.main')

@section('sub_content')

    <?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2>List Banner Widget</h2>
            <hr>
            
            <div>
    
              
                <div class="row">
                    <div class="col-md-12">

                        @for($i = 3; $i <= 5; $i++)
                            <div class="card shadow-sm border-0 mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="{{asset('img/widget-img/P'. $i .'.jpg')}}" alt="Dana Syariah Motor" class="img-fluid">
                                        </div>
                                        <div class="col-sm-10">
                                            <code>
                                                <?php 
                                                    echo htmlentities('
                                                        <iframe style="width: 250px; overflow: hidden;" src="'. route('widget', ['P'. $i, $user->mitra_code]) .'"></iframe>
                                                    ') 
                                                ?>
                                            </code>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        @endfor

                        @for($i = 3; $i <= 4; $i++)

                            

                            <div class="card shadow-sm border-0 mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <img src="{{asset('img/widget-img/L'. $i .'.jpg')}}" alt="Dana Syariah Motor" class="img-fluid">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <code>
                                                <?php 
                                                    echo htmlentities('
                                                    <iframe style="width: 100%; overflow: hidden;" src="'. route('widget', ['L'. $i, $user->mitra_code]) .'"></iframe>
                                                    ') 
                                                ?>
                                            </code>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        @endfor

                        @for($i = 1; $i <= 3; $i++)

                            

                            <div class="card shadow-sm border-0 mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12 mb-3">
                                            <img src="{{asset('img/widget-img/S'. $i .'.jpg')}}" alt="Dana Syariah Motor" class="img-fluid">
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <code>
                                                <?php 
                                                    echo htmlentities('
                                                    <iframe style="width: 100%; overflow: hidden;" src="'. route('widget', ['S'. $i, $user->mitra_code]) .'"></iframe>
                                                    ') 
                                                ?>
                                            </code>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        @endfor


                        

                        <p><small><strong>Note:</strong> <i>Silakan di Copy Kode ini  dan paste kan di website / Bloger Anda.</i></small></p>
                    </div>
                    
                </div>


            </div>
            
        </div>
    </div>
                                    
               
   

        
@endsection


@section('scripts')
    <script>
        $(function(){

            
        });
    </script>
@endsection