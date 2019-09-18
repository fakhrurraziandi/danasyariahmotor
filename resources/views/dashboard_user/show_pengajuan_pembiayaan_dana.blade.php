
@extends('dashboard_user.main')

@section('sub_content')


    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <p><a href="{{route('dashboard_user.pengajuan_pembiayaan_dana')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a></p>
            <h2>Pengajuan Pembiayaan Dana Anda</h2>
            <hr>

            @include('inc.informasi_pembiayaan_dana', $pengajuan_pembiayaan_dana)
        </div>
    </div>
                                    
               
   

        
@endsection