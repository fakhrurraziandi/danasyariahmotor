@extends('layouts.app')

@section('seo_title', \App\ContentVariable::getValue('seo_title__kontak_kami') . ' | '.
\App\ContentVariable::getValue('website_title'))

@section('content')



<section class="py-100" id="section-form" style="background: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">



                <h1>Form Pendaftaran Mitra</h1>
                <p class="lead">Mitra Dana Syariah Motor</p>

                

                <?php $user = Auth::user(); ?>

                @if($user->mitra_status == 0 OR $user->mitra_status == 3)

                    <p>Adalah partner bisnis DSM yang nanti nya memiliki kesempatan untuk mendapatkan beragam benefit dan fasilitas dengan cara mereferensikan Kode Ref anda ke calon konsumen kepada DSM.</p>
                    <form enctype="multipart/form-data" action="{{route('submit-mitra-request')}}" method="post" class="text-left">
                        @csrf

                        <div class="form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <input type="text" class="form-control  {{$errors->has('nama_bank') ? 'is-invalid' : ''}}" name="nama_bank" id="nama_bank" aria-describedby="nama_bank" placeholder="Nama Bank" value="{{old('nama_bank')}}">
                            
                            @if($errors->has('nama_bank'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nama_bank')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="no_rekening_bank">No Rekening</label>
                            <input type="text" class="form-control  {{$errors->has('no_rekening_bank') ? 'is-invalid' : ''}}" name="no_rekening_bank" id="no_rekening_bank" aria-describedby="no_rekening_bank" placeholder="No Rekening" value="{{old('no_rekening_bank')}}">
                            @if($errors->has('no_rekening_bank'))
                                <div class="invalid-feedback">
                                    {{$errors->first('no_rekening_bank')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan Anda Saat Ini</label>
                            <input type="text" class="form-control  {{$errors->has('pekerjaan') ? 'is-invalid' : ''}}" name="pekerjaan" id="pekerjaan" aria-describedby="pekerjaan" placeholder="Pekerjaan anda saat ini" value="{{old('pekerjaan')}}">
                            @if($errors->has('pekerjaan'))
                                <div class="invalid-feedback">
                                    {{$errors->first('pekerjaan')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="spesifikasi_perangkat_komputer">Apakah Anda Memilki Komputer / Laptop?</label>
                            <textarea class="form-control  {{$errors->has('spesifikasi_perangkat_komputer') ? 'is-invalid' : ''}}" name="spesifikasi_perangkat_komputer" id="spesifikasi_perangkat_komputer" aria-describedby="spesifikasi_perangkat_komputer" placeholder="Apakah Anda Memilki Komputer / Laptop?">{{old('spesifikasi_perangkat_komputer')}}</textarea>
                            @if($errors->has('spesifikasi_perangkat_komputer'))
                                <div class="invalid-feedback">
                                    {{$errors->first('spesifikasi_perangkat_komputer')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nama_facebook">Apakah Anda Mempunyai Akun Instagram? ketik Nama IG Anda</label>
                            <input type="text" class="form-control  {{$errors->has('nama_facebook') ? 'is-invalid' : ''}}" name="nama_facebook" id="nama_facebook" aria-describedby="nama_facebook" placeholder="pakah Anda Mempunyai Akun Instagram? ketik Nama IG Anda" value="{{old('nama_facebook')}}">
                            @if($errors->has('nama_facebook'))
                                <div class="invalid-feedback">
                                    {{$errors->first('nama_facebook')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="target_income_pasif_sebagai_mitra">Berapa Target Income Pasif per Bulan sebagai Mitra DSM?</label>
                            <select class="form-control  {{$errors->has('target_income_pasif_sebagai_mitra') ? 'is-invalid' : ''}}" name="target_income_pasif_sebagai_mitra" id="target_income_pasif_sebagai_mitra" aria-describedby="target_income_pasif_sebagai_mitra" placeholder="Berapa Target Income Pasif per Bulan sebagai Mitra Bisnis DSM Finance.?">

                                <?php 
                                $options = [
                                    'Rp.    750.000',
                                    'Rp.  5.000.000',
                                    'Rp. 15.000.000',
									'Rp. 30.000.000',
                                ];
                                ?>

                                @foreach($options as $option)
                                    <option {{old('target_income_pasif_sebagai_mitra') == $option ? 'selected=""' : ''}} value="{{$option}}">{{$option}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('target_income_pasif_sebagai_mitra'))
                                <div class="invalid-feedback">
                                    {{$errors->first('target_income_pasif_sebagai_mitra')}}
                                </div>
                            @endif
                        </div>


                        
                        <div class="form-group">
                            <label for="photo">Upload Foto Profil Anda Dengan Benar</label>
                            <input type="file" class="form-control  {{$errors->has('photo') ? 'is-invalid' : ''}}" name="photo" id="photo" placeholder="Upload Photo Anda" aria-describedby="photo">
                            <small id="photo" class="form-text text-muted">Upload photo pribadi anda</small>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{$errors->first('photo')}}
                                </div>
                            @endif
                        </div>
                        <button  class="btn btn-primary btn-block btn-lg">Request Menjadi Mitra</button>
                    </form>
                @endif

                @if($user->mitra_status == 1)
                    <p class="text-primary"><i>Permohonan anda telah terkirim dan sedang kami evaluasi. Kami akan menghubungi anda. dan saat fitur mitra telah di aktivasi anda akan menerima notifikasi via whatsapp sesauai dengan nomor whatsapp profile anda.</i></p>
                @endif

                @if($user->mitra_status == 2)
                    <p class="text-primary"><i>Permohonan anda telah telah di setujui.</i></p>
                @endif


            </div>
        </div>

       
    </div>
</section>




@endsection

@section('scripts')

@endsection