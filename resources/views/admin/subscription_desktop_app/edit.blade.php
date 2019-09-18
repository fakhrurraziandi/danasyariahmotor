@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Detail Langganan Software Desktop
                    </div>
                    <div class="card-body">
                        @if($subscription_desktop_app)
                            <form action="{{route('admin.subscription_desktop_app.update', [$subscription_desktop_app->id])}}" method="post">

                                

                                @csrf
                                @method('PUT')
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Update!</strong> Permintaan Komisi Sukses di Update!
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <dl class="row">

                                    <dt class="col-sm-3 text-md-right">Id</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->id !== '' ? $subscription_desktop_app->id : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">subscription_duration</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->subscription_duration !== '' ? $subscription_desktop_app->subscription_duration : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Biaya</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->price !== '' ? $subscription_desktop_app->price : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Penjelasan</dt>  
                                    <dd class="col-sm-9">{{$subscription_desktop_app->description !== '' ? $subscription_desktop_app->description : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">nama_bank</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->nama_bank !== '' ? $subscription_desktop_app->nama_bank : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">no_rekening</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->no_rekening !== '' ? $subscription_desktop_app->no_rekening : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">nama_rekening</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->nama_rekening !== '' ? $subscription_desktop_app->nama_rekening : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">bukti_transaksi</dt> 
                                    <dd class="col-sm-9">{!!$subscription_desktop_app->bukti_transaksi !== '' ? '<a target="_blank" href="'. asset('uploads/'. $subscription_desktop_app->bukti_transaksi) .'"><img src="'. asset('uploads/'. $subscription_desktop_app->bukti_transaksi) .'" style="width: 250px" ></a>' : '-'!!}</dd>

                                    
                                    <dt class="col-sm-3 text-md-right">subscription_approved_at</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->subscription_approved_at !== '' ? $subscription_desktop_app->subscription_approved_at : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">subscription_expired_at</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->subscription_expired_at !== '' ? $subscription_desktop_app->subscription_expired_at : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">status</dt> 
                                    <dd class="col-sm-9">{{$subscription_desktop_app->status !== '' ? $subscription_desktop_app->status : '-'}}</dd>


                           

                                    <div class="col-sm-12"><hr /></div>

                                    <dt class="col-sm-3 text-md-right">Nama Lengkap Sesuai KTP</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->name}}</dd>

                                    <dt class="col-sm-3 text-md-right">Email</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->email}}</dd>

                                    <dt class="col-sm-3 text-md-right">No Handphone GSM</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->no_handphone_1}}</dd>

                                    <dt class="col-sm-3 text-md-right">No Whatsapp</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->no_handphone_2 ? $subscription_desktop_app->user->no_handphone_2 : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Jenis Identitas</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->jenis_identitas ? $subscription_desktop_app->user->jenis_identitas : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">No Identitas</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->no_identitas ? $subscription_desktop_app->user->no_identitas : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Tempat Lahir</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->tempat_lahir ? $subscription_desktop_app->user->tempat_lahir : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Tanggal Lahir</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->tanggal_lahir ? $subscription_desktop_app->user->tanggal_lahir : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Provinsi</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->province ? $subscription_desktop_app->user->province->name : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Kota</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->city ? $subscription_desktop_app->user->city->name : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Kecamatan</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->district ? $subscription_desktop_app->user->district->name : '-'}}</dd>

                                    <dt class="col-sm-3 text-md-right">Alamat</dt>
                                    <dd class="col-sm-9">{{$subscription_desktop_app->user->alamat ? $subscription_desktop_app->user->alamat : '-'}}</dd>


                                    
                                   
                                </dl>

                                

                                <div class="row mt-3">
                                    
                                    <div class="col-sm-9 offset-sm-3">

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="status-pending" name="status" value="pending" class="custom-control-input" checked="">
                                            <label class="custom-control-label text-info" for="status-pending">Pending</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="status-waiting" name="status" value="waiting" class="custom-control-input">
                                            <label class="custom-control-label text-info" for="status-waiting">Waiting</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="status-cancelled" name="status" value="cancelled" class="custom-control-input">
                                            <label class="custom-control-label text-warning" for="status-cancelled">Dibatalkan</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="status-approved" name="status" value="approved" class="custom-control-input">
                                            <label class="custom-control-label text-success" for="status-approved">Disetujui</label>
                                        </div>

                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="status-suspend" name="status" value="suspend" class="custom-control-input">
                                            <label class="custom-control-label text-danger" for="status-suspend">Suspend</label>
                                        </div>
                                    </div>


                                </div>

                                

                                <div class="row mt-3">
                                    
                                    <div class="col-sm-9 offset-sm-3">
                                        <a href="{{route('admin.subscription_desktop_app.index')}}" class="btn btn-secondary">Kembali</a>
                                   
                                        <button type="submit" class="btn btn-primary">Process</button>
                                        
                                    </div>
                                </div>

                                
                                 

                               

                                

                            </form>

                            <hr>
                            
                        
                            <div id="table-data-approved-toolbar">
                    
                            </div>
                            <table id="table-data-approved" style="font-size: 0.7rem;"></table>

                        @else
                            <div class="text-center">
                                <h4>Belum ada Detail Langganan Software Desktop</h4>
                                <p>Belum memilih transaksi yang ingin di Langganan Software Desktop</p>
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