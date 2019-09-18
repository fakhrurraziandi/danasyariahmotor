@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Request Withdraw Detail
                    </div>
                    <div class="card-body">
                        @if($withdraw)
                            <form action="{{route('admin.request_withdraw.update', [$withdraw->id])}}" method="post">

                                

                                @csrf
                                @method('PUT')
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Update!</strong> Withdraw Successfully updated!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Id Ref</dt>
                                    <dd class="col-sm-9">{{$withdraw->id}}</dd>

                                    <dt class="col-sm-3 text-md-right">Nama bank</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->nama_bank}}</dd>

                                    <dt class="col-sm-3 text-md-right">No Rekening Bank</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->no_rekening_bank}}</dd>

                                    <dt class="col-sm-3 text-md-right">Total Withdraw</dt>
                                    <dd class="col-sm-9">{{'Rp. '.number_format($withdraw->total_profit, 0, ',', '.')}}</dd>

                                    <div class="col-sm-12"><hr /></div>

                                    <dt class="col-sm-3 text-md-right">Nama Lengkap Sesuai KTP</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->name}}</dd>

                                    <dt class="col-sm-3 text-md-right">Email</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->email}}</dd>

                                    <dt class="col-sm-3 text-md-right">No Handphone GSM</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->no_handphone_1}}</dd>

                                    <dt class="col-sm-3 text-md-right">No Whatsapp</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->no_handphone_2 ? $withdraw->user->no_handphone_2 : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Jenis Identitas</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->jenis_identitas ? $withdraw->user->jenis_identitas : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">No Identitas</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->no_identitas ? $withdraw->user->no_identitas : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Tempat Lahir</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->tempat_lahir ? $withdraw->user->tempat_lahir : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Tanggal Lahir</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->tanggal_lahir ? $withdraw->user->tanggal_lahir : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Provinsi</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->province ? $withdraw->user->province->name : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Kota</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->city ? $withdraw->user->city->name : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Kecamatan</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->district ? $withdraw->user->district->name : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Alamat</dt>
                                    <dd class="col-sm-9">{{$withdraw->user->alamat ? $withdraw->user->alamat : '-'}}</dd>

                                    
                                   
                                </dl>

                                @if($withdraw->status == 1)

                                    <div class="row mt-3">
                                        
                                        <div class="col-sm-9 offset-sm-3">

                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="status-2" name="status" value="2" class="custom-control-input" checked="">
                                                <label class="custom-control-label text-success" for="status-2">Setujui</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="status-3" name="status" value="3" class="custom-control-input">
                                                <label class="custom-control-label text-danger" for="status-3">Tolak</label>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                                <div class="row mt-3">
                                    
                                    <div class="col-sm-9 offset-sm-3">
                                        <a href="{{route('admin.request_withdraw.index')}}" class="btn btn-secondary">Back</a>
                                        @if($withdraw->status == 1)
                                            <button type="submit" class="btn btn-primary">Process</button>
                                        @endif
                                        
                                    </div>
                                </div>

                                
                                 

                               

                                

                            </form>

                            <hr>
                            
                        
                            <div id="table-data-approved-toolbar">
                    
                            </div>
                            <table id="table-data-approved" style="font-size: 0.7rem;"></table>

                        @else
                            <div class="text-center">
                                <h4>Belum ada withdraw request detail</h4>
                                <p>Belum memilih transaksi yang ingin di withdraw</p>
                            </div>
                        @endif
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