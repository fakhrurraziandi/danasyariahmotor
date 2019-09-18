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
                    <div class="card-header">Edit spv kredit motor</div>
                    <div class="card-body">

                        <form action="{{route('admin.spv_kredit_motor.update', $spv_kredit_motor->id)}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

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
                                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Name" value="{{old('name', $spv_kredit_motor->name)}}">
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
                                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email" value="{{old('email', $spv_kredit_motor->email)}}">
                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('email')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control {{$errors->has('phone_number') ? 'is-invalid' : ''}}" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{old('phone_number', $spv_kredit_motor->phone_number)}}">
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
                                                <option {{in_array($wilayah_kredit_motor->id, old('wilayah_kredit_motor_ids', $spv_kredit_motor->wilayah_kredit_motor_ids)) ? 'selected=""' : ''}} value="{{$wilayah_kredit_motor->id}}">{{$wilayah_kredit_motor->name}}</option>
                                            @endforeach
                                        </select>

                                        <div class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" id="wilayah_kredit_motor_ids_select_all" name="wilayah_kredit_motor_ids_select_all">
                                            <label class="custom-control-label" for="wilayah_kredit_motor_ids_select_all">Select All</label>
                                        </div>

                                      

                                        @if($errors->has('wilayah_kredit_motor_ids'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('wilayah_kredit_motor_ids')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                              
                                
                                
                            </div>
                                

                            

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.spv_kredit_motor.index')}}" class="btn btn-secondary">Cancel</a>
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

            $("#wilayah_kredit_motor_ids_select_all").click(function(){
                if($("#wilayah_kredit_motor_ids_select_all").is(':checked') ){
                    console.log('checked');
                    $("#wilayah_kredit_motor_ids > option").prop("selected", true);
                    $("#wilayah_kredit_motor_ids").trigger("change");
                }else{
                    console.log('unchecked');
                    $("#wilayah_kredit_motor_ids > option").prop("selected", false);
                    $("#wilayah_kredit_motor_ids").trigger("change");
                }
            });

        });
    </script>
@endsection