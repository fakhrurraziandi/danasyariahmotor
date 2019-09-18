<?php 
use App\Wilayah; 
use App\SpvKreditMotor;
?>


@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new CS Kredit Motor</div>
                    <div class="card-body">

                        <form action="{{route('admin.cs_kredit_motor.store')}}" method="POST">

                            {{csrf_field()}}

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('name')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="password" name="password" placeholder="Password" value="{{old('password')}}">
                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">use App\SpvKreditMotor;
                                                {{$errors->first('password')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control {{$errors->has('phone_number') ? 'is-invalid' : ''}}" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}">
                                        @if($errors->has('phone_number'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('phone_number')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wilayah_kredit_motor_ids">Wilayah</label>
                                        <select class="form-control {{$errors->has('wilayah_kredit_motor_ids') ? 'is-invalid' : ''}}" id="wilayah_kredit_motor_ids" name="wilayah_kredit_motor_ids[]" placeholder="Wilayah" multiple="">
                                            @foreach($list_wilayah_kredit_motor as $wilayah_kredit_motor)
                                                <option value="{{$wilayah_kredit_motor->id}}">{{$wilayah_kredit_motor->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('wilayah_kredit_motor_ids'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('wilayah_kredit_motor_ids')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="spv_kredit_motor_id">SPV Kredit Motor</label>
                                        <select class="form-control {{$errors->has('spv_kredit_motor_id') ? 'is-invalid' : ''}}" id="spv_kredit_motor_id" name="spv_kredit_motor_id" placeholder="SPV Kredit Motor">
                                            <option value="">:: SPV Kredit Motor ::</option>
                                            <?php $list_spv_kredit_motor = SpvKreditMotor::all(); ?>

                                            @foreach($list_spv_kredit_motor as $wilayah)
                                                <option {{old('spv_kredit_motor_id') == $wilayah->id ? 'selected=""' : ''}} value="{{$wilayah->id}}">{{$wilayah->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('spv_kredit_motor_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('spv_kredit_motor_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                               
                            </div>

                           
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.cs_kredit_motor.index')}}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function(){

            $('#wilayah_kredit_motor_ids').select2();

        });
    </script>
@endsection