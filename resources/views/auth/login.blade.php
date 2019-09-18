@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3 text-center text-md-left">
            <h1 class="h3 text-primary">DANA SYARIAH MOTOR - DSM</h1>
            <hr>

            <div class="mb-3">
                <h5>SOLUSI MASALAH KEUANGAN ANDA.</h5>
                <p>Untuk Kebutuhan Seperti: <strong>Modal Usaha, Biaya Pendidikan, Dana Darurat dll.</strong> MOTOR <strong>Minimal Tahun 2010</strong> , tidak memerlukan proses yang berbelit dan rumit, Melayani Seluruh Wilayah Indonesia dengan Skema Syariah.</p>
            </div>
        </div>
        <div class="col-md-6">
            
            {{-- <p class="text-center">
                <a class="btn btn-primary btn-sm mb-3" href="{{url('login')}}">Member</a>
                <a class="btn btn-primary btn-sm mb-3" href="{{url('login/admin')}}">Administrator</a>
                <a class="btn btn-primary btn-sm mb-3" href="{{url('login/spv_kredit_motor')}}">SPV Kredit Motor</a>
                <a class="btn btn-primary btn-sm mb-3" href="{{url('login/cs_kredit_motor')}}">CS Kredit Motor</a>
                <a class="btn btn-primary btn-sm mb-3" href="{{url('login/manager_pembiayaan_dana')}}">Manager Pembiayaan Dana</a>
                <a class="btn btn-primary btn-sm mb-3" href="{{url('login/spv_pembiayaan_dana')}}">SPV Pembiayaan Dana</a>
                <a class="btn btn-primary btn-sm mb-3" href="{{url('login/cs_pembiayaan_dana')}}">CS Pembiayaan Dana</a>
            </p> --}}

            <div class="card">
                <div class="card-header">{{ isset($url) ? ucwords($url) : ""}} {{ __('Akses Login') }}</div>

                <div class="card-body">
                    @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                    
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Simpan Akses Masuk') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Masuk') }}
                                </button>

                                @if (Route::has('password.request'))
                                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a> --}}
                                @endif
                            </div>

                            <div class="col-md-8 offset-md-4 mt-3">
                                <p>Belum Punya Akun? Daftar <a href="{{route('register')}}">Disini</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
