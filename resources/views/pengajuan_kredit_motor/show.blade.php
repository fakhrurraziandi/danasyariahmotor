@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="row justify-content-center">
            <div class="col-md-12">

    

                <h1 class="mb-20">Pengajuan Kredit Motor</small></h1>
                <hr>

                <div>

                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    <div class="row">

                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="mb-0">Informasi Pengajuan Kredit Motor</h5>
                                </div>
                                <div class="card-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Motor</dt>
                                        <dd class="col-sm-8">{{$pengajuan_kredit_motor->angsuran_motor->motor->name}}</dd>

                                        <dt class="col-sm-4">DP</dt>
                                        <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor->dp, 0, ',', '.')}}</dd>

                                        @if($pengajuan_kredit_motor->angsuran_motor->discount_dp)
                                            <dt class="col-sm-4">Discount DP</dt>
                                            <dd class="col-sm-8">{{$pengajuan_kredit_motor->angsuran_motor->discount_dp ? $pengajuan_kredit_motor->angsuran_motor->discount_dp . '%' : '-'}}</dd>

                                            <dt class="col-sm-4">DP Bayar</dt>
                                            <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor->dp_calculated, 0, ',', '.')}}</dd>
                                        @endif
                                            

                                        <dt class="col-sm-4">Angsuran x Bulan</dt>
                                        <dd class="col-sm-8">{{'Rp. '. number_format($pengajuan_kredit_motor->angsuran_motor_detail->angsuran_per_bulan, 0, ',', '.') . ' x '. $pengajuan_kredit_motor->angsuran_motor_detail->tempo_angsuran_motor->tempo . ' Bulan'}}</dd>

                                        

                                        @if($pengajuan_kredit_motor->cs_kredit_motor_status == 'denied')
                                            <dt class="col-sm-4">Status</dt>
                                            <dd class="col-sm-8">Denied</dd>
                                        @elseif($pengajuan_kredit_motor->cs_kredit_motor_status == 'approved')
                                            @if($pengajuan_kredit_motor->spv_kredit_motor_status == 'denied')
                                                <dt class="col-sm-4">Status</dt>
                                                <dd class="col-sm-8">Denied</dd>
                                            @elseif($pengajuan_kredit_motor->spv_kredit_motor_status == 'approved')
                                                <dt class="col-sm-4">Status</dt>
                                                <dd class="col-sm-8">Approved</dd>
                                            @else
                                                <dt class="col-sm-4">Status</dt>
                                                <dd class="col-sm-8">Pending</dd>
                                            @endif
                                        @else 
                                            <dt class="col-sm-4">Status</dt>
                                            <dd class="col-sm-8">Pending</dd>
                                        @endif
                                    </dl>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

        
@endsection
