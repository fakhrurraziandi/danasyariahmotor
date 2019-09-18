

@extends('dashboard_user.main')

@section('sub_content')

 
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2>Software Whatsapp Desktop</h2>
            <hr>

            
            @if($subscription == null)
                <form method="POST" action="{{ route('dashboard_user.submit_subscription_desktop_app') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <p>Kami Menyediakan layanan berupa Software Blasting desktop, untuk mitra kami, untuk dapat menggunakannya anda di haruskan Untuk berlangganan dengan cara.</p>
                            <p>Berlangganan Menggunakan Software adalah dengan cara mentransfer sejumlah Rp. 35.000 ke rekening: <strong>Taufik Mansur Marie - 1390502199 - BCA</strong></p>           
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="subscription_duration">Durasi Langganan</label>
                        <select class="form-control {{$errors->has('subscription_duration') ? 'is-invalid' : ''}}" id="subscription_duration" name="subscription_duration" >
                            @for($i = 1; $i <= 12; $i++)
                                <option {{old('subscription_duration') == $i ? 'selected=""' : ''}} value="{{$i}}">{{$i}} Bulan</option>
                            @endfor
                        </select>
                    </div>

                    
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                
                </form>
            @else

                
                <div>
                    <p>Terima kasih, telah melakukan Permintaan Langganan Software Desktop</p>
                    <dl class="row">
                        <dt class="col-sm-3 text-md-right">Penjelasan</dt>
                        <dd class="col-sm-9">{{$subscription->description}}</dd>

                        <dt class="col-sm-3 text-md-right">Biaya</dt>
                        <dd class="col-sm-9">Rp. {{number_format($subscription->price, 0, ',', '.')}}</dd>

                        
                        @switch($subscription->status)
                            @case('pending')
                                <dt class="col-sm-3 text-md-right">Status</dt>
                                <dd class="col-sm-9">
                                    <span class="text-danger">Tertunda</span>
                                </dd>
                                @break
                            @case('waiting')
                                <dt class="col-sm-3 text-md-right">Status</dt>
                                <dd class="col-sm-9">
                                    <span class="text-info">Menunggu Konfirmasi</span>
                                </dd>

                                <dt class="col-sm-3 text-md-right">Bukti Transaksi</dt>
                                <dd class="col-sm-9">
                                    {!!$subscription->bukti_transaksi ? '<img class="img-fluid mb-3" src="'. asset('uploads/'. $subscription->bukti_transaksi)  .'" alt="Dana Syariah Motor">': '-'!!}
                                </dd>

                                <dt class="col-sm-3 text-md-right">Nama Bank</dt>
                                <dd class="col-sm-9">
                                    {{$subscription->nama_bank}}
                                </dd>

                                <dt class="col-sm-3 text-md-right">No Rekening</dt>
                                <dd class="col-sm-9">
                                    {{$subscription->no_rekening}}
                                </dd>
                                @break
                            @case('approved')
                                <dt class="col-sm-3 text-md-right">Status</dt>
                                <dd class="col-sm-9">
                                    <span class="text-primary">Disetujui</span>
                                </dd>

                                <dt class="col-sm-3 text-md-right">Dimulai pada tgl</dt>
                                <dd class="col-sm-9">
                                    {{$subscription->subscription_approved_at}}
                                </dd>

                                <dt class="col-sm-3 text-md-right">Berakhir Pada tgl</dt>
                                <dd class="col-sm-9">
                                    {{$subscription->subscription_expired_at}}
                                </dd>
                                @break
                            @case('suspend')
                                <dt class="col-sm-3 text-md-right">Status</dt>
                                <dd class="col-sm-9">
                                    <span class="text-danger">Ditolak</span>
                                </dd>
                                @break
                        @endswitch
                        
                    </dl>

                    @if($subscription->status == 'pending')
                        <p>untuk menyelesaikan pembayaran silahkan transfer sejumlah Rp. {{number_format($subscription->price, 0, ',', '.')}} ke rekening <strong>Taufik Mansur Marie - 1390502199 - BCA</strong></p> lalu mengupload bukti transaksi di bawah ini</p>

                        <hr>

                        <form method="POST" enctype="multipart/form-data" action="{{route('dashboard_user.verify_subscription_desktop_app')}}">

                            @csrf
                            <div class="form-group row">
                                <label for="bukti_transaksi" class="col-sm-2 col-form-label text-sm-right">Bukti Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="bukti_transaksi" name="bukti_transaksi">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_bank" class="col-sm-2 col-form-label text-sm-right">Nama Bank</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_rekening" class="col-sm-2 col-form-label text-sm-right">No Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no_rekening" name="no_rekening">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_rekening" class="col-sm-2 col-form-label text-sm-right">Nama Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_rekening" name="nama_rekening">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </form>

                        <hr>

                        <p class="text-right"><a href="{{route('dashboard_user.cancel_subscription_desktop_app')}}" class="btn btn-danger btn-sm">Batalkan Permintaan Langgganan ? </a></p>

                    @elseif($subscription->status == 'waiting')
                        
                        <p>untuk menyelesaikan pembayaran silahkan transfer sejumlah Rp. {{number_format($subscription->price, 0, ',', '.')}} ke rekening <strong>Taufik Mansur Marie - 1390502199 - BCA</strong></p></p>

                        <hr>

                        <p class="text-right"><a href="{{route('dashboard_user.cancel_subscription_desktop_app')}}" class="btn btn-danger btn-sm">Batalkan Permintaan Langgganan ? </a></p>

                    @else


                        <hr>

                        <div class="row">
                            <div class="col-sm-12 text-center my-4">
                                <h5>PASTIKAN ANDA SUDAH DOWNLOAD 2 FILES DI BAWAH INI.</h5>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <a href="https://www.dropbox.com/s/xlzud5v607y22sl/WaBlazV7.zip?dl=0" class="btn btn-primary btn-lg"><i class="fa fa-download"></i> Software Desktop DSM</a>
                            </div>
                            <div class="col-sm-6 text-center mb-3">
                                <a href="https://www.dropbox.com/s/q4h8w36olhdjs3a/Tools%20Support%20DSM.zip?dl=0" class="btn btn-primary btn-lg"><i class="fa fa-download"></i>Tools Support DSM</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center py-4">
                                <h5>VIDEO TUTORIAL PENGGUNAAN SOFTWARE WHATSAPP DESKTOP</h5>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>DEMO SOFTWARE DSM</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/BtFmZKIK97Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>REGISTER WHASTAPP DI SMARTPHONE</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/SWFARw0GclQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>SETTING SOFTWRAE 1</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/XZyiPBup0sc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>SETTING SOFTWRAE 2</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/bjlX1Iiu1G4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>KIRIM PESAN PRIVATE 1</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/oGX_CC0g97g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>KIRIM PESAN PRIVATE 2</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/IuJKrSUgRLQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>KIRIM PESAN PRIVATE 3</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/d6FS7Ji2wDo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>KESIMPULAN KIRIM PESAN</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/w2Zg9-waTOY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>FITUR GROUP 1</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/fCmPeB8hGWo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>FITUR GROUP 2</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/fCmPeB8hGWo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>CARI & JOIN GROUP</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/9pE0TiBGxls" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="col-sm-6 text-center mb-4">
                                <h6>KIRIM & SCRAPE GROUP</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/w2Zg9-waTOY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                             <div class="col-sm-6 text-center mb-4">
                                <h6>TIPS & TRICK</h6>
                                <iframe style="width: 100%; height: 250px;" src="https://youtube.com/embed/kOfiTKXaicw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endif


                    

                    
                </div>
            

                
            @endif
            
        </div>
    </div>
                                    
               
   

        
@endsection


@section('scripts')
    <script>
        $(function(){

            
        });
    </script>
@endsection