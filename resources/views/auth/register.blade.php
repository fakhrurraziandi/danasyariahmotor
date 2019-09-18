@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 150px; margin-bottom: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($url) ? ucwords($url) : '' }} {{ __('Register') }}</div>

                <div class="card-body">
                    @isset($url)
                        <form method="POST" action="{{ url('register/'. $url) }}">
                    @else
                        <form method="POST" action="{{ route('register') }}">
                    @endisset
                    
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        @if(isset($url) && ($url == 'spv_kredit_motor' || $url == 'cs_kredit_motor'))

                            <div class="form-group row">
                                <label for="wilayah_id" class="col-md-4 col-form-label text-md-right">{{ __('Wilayah') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control{{ $errors->has('wilayah_id') ? ' is-invalid' : '' }}" name="wilayah_id" value="{{ old('wilayah_id') }}" required autocomplete="wilayah_id">
                                        <option value=""></option>
                                        @foreach($list_wilayah as $wilayah)
                                            <option value="{{$wilayah->id}}">{{$wilayah->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('wilayah_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('wilayah_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        @endif

                        @if(isset($url) && $url == 'cs_kredit_motor')

                            <div class="form-group row">
                                <label for="spv_kredit_motor_id" class="col-md-4 col-form-label text-md-right">{{ __('SPV Kredit Motor') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control{{ $errors->has('spv_kredit_motor_id') ? ' is-invalid' : '' }}" name="spv_kredit_motor_id" value="{{ old('spv_kredit_motor_id') }}" required autocomplete="spv_kredit_motor_id">
                                        <option value=""></option>
                                        @foreach($list_spv_kredit_motor as $spv_kredit_motor)
                                            <option value="{{$spv_kredit_motor->id}}">{{$spv_kredit_motor->name}} ({{$spv_kredit_motor->email}})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('spv_kredit_motor_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('spv_kredit_motor_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        @endif

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
