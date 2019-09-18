@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-12">

    

                <h1 class="mb-20">Pengajuan Pembiayaan Dana</small></h1>
                <hr>

                <div>

                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="row">

                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="mb-0">Informasi Pengajuan Pembiayaan Dana</h5>
                                </div>
                                <div class="card-body">
                                    @include('inc.informasi_pembiayaan_dana', $pengajuan_pembiayaan_dana)
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

        
@endsection
