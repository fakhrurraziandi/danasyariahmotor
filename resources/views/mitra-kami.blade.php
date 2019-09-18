@extends('layouts.app')

@section('seo_title', \App\ContentVariable::getValue('seo_title__kontak_kami') . ' | '.
\App\ContentVariable::getValue('website_title'))

@section('content')



<section class="py-100" id="section-form" style="background: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 text-center">

                

                <h1>MITRA DANA SYARIAH MOTOR</h1>
                <p class="lead">Berikut Daftar Mitra Yang Sudah Join Bersama DSM</p>


            </div>
        </div>

        <div class="row">
            @foreach($list_mitra as $mitra)
                <div class="col-6 col-sm-3 col-md-3 mb-4">
                    <div class="card border-0 shadow-sm mitra-card" style="height: 100%;">
                        <div class="card-body text-center">
                            
                            <div class="mitra-card__avatar-holder mb-3" style="background-image: url('{{$mitra->photo ? asset('uploads/'. $mitra->photo) : asset('img/no-image.gif')}}')"></div>
                            <h6 class="mt-0">{{$mitra->name}}</h6>
                            <p><small><i class="fa fa-home"></i> {{$mitra->province_name}}, {{$mitra->city_name}}, {{$mitra->district_name}}</small></p>

                        </div>
                        {{-- <div class="mitra-card__items">
                            <div class="mitra-card__item">
                                <h6>{{$mitra->count_pengajuan}}</h6>
                                <p class="mb-0"><small>Pengajuan</small></p>
                            </div>
                            <div class="mitra-card__item">
                                <h6>{{$mitra->count_pengajuan_closing}}</h6>
                                <p class="mb-0"><small>Closing</small></p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                {{ $paginator->links() }}
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-sm-12">
                {{$list_mitra->links()}}
            </div>
        </div> --}}

        <style>
            .mitra-card{}
            .mitra-card__avatar-holder{
                background-size: cover;
                background-position: center center;
                width: 70px;
                height: 70px;
                margin: 0 auto;
                border-radius: 70px;
            }

            .mitra-card__items{
                display: flex;
                background: #9cd85b;
                color:#fff;
            }

            .mitra-card__item{
                text-align: center;
                flex: 1;
                padding: 16px 16px;
            }

        </style>

       
    </div>
</section>




@endsection

@section('scripts')

@endsection