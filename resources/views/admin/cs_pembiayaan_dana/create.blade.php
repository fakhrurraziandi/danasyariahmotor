<?php 
use App\Wilayah; 
use App\SpvPembiayaanDana;
?>


@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new CS Pembiayaan Dana</div>
                    <div class="card-body">

                        <form action="{{route('admin.cs_pembiayaan_dana.store')}}" method="POST">

                            {{csrf_field()}}

                           
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
                                            <div class="invalid-feedback">
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
                                        <label for="wilayah_pembiayaan_dana_ids">Wilayah</label>
                                        <select class="form-control {{$errors->has('wilayah_pembiayaan_dana_ids') ? 'is-invalid' : ''}}" id="wilayah_pembiayaan_dana_ids" name="wilayah_pembiayaan_dana_ids[]" placeholder="Wilayah" multiple="">
                                            @foreach($list_wilayah_pembiayaan_dana as $wilayah_pembiayaan_dana)
                                                <option value="{{$wilayah_pembiayaan_dana->id}}">{{$wilayah_pembiayaan_dana->name}}</option>
                                            @endforeach
                                        </select>

                                        <div class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" id="wilayah_pembiayaan_dana_ids_select_all" name="wilayah_pembiayaan_dana_ids_select_all">
                                            <label class="custom-control-label" for="wilayah_pembiayaan_dana_ids_select_all">Select All</label>
                                        </div>

                                      

                                        @if($errors->has('wilayah_pembiayaan_dana_ids'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('wilayah_pembiayaan_dana_ids')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            

                           
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.cs_pembiayaan_dana.index')}}" class="btn btn-secondary">Cancel</a>
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

            $('#wilayah_pembiayaan_dana_ids').select2();

            $("#wilayah_pembiayaan_dana_ids_select_all").click(function(){
                if($("#wilayah_pembiayaan_dana_ids_select_all").is(':checked') ){
                    console.log('checked');
                    $("#wilayah_pembiayaan_dana_ids > option").prop("selected", true);
                    $("#wilayah_pembiayaan_dana_ids").trigger("change");
                }else{
                    console.log('unchecked');
                    $("#wilayah_pembiayaan_dana_ids > option").prop("selected", false);
                    $("#wilayah_pembiayaan_dana_ids").trigger("change");
                }
            });

        });
    </script>
@endsection