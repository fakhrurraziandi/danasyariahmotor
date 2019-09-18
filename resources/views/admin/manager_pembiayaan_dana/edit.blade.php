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
                    <div class="card-header">Edit manager pembiayaan dana</div>
                    <div class="card-body">

                        <form action="{{route('admin.manager_pembiayaan_dana.update', $manager_pembiayaan_dana->id)}}" method="POST">

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
                                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Name" value="{{old('name', $manager_pembiayaan_dana->name)}}">
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
                                        <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" placeholder="Email" value="{{old('email', $manager_pembiayaan_dana->email)}}">
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
                                        <input type="text" class="form-control {{$errors->has('phone_number') ? 'is-invalid' : ''}}" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{old('phone_number', $manager_pembiayaan_dana->phone_number)}}">
                                        @if($errors->has('phone_number'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('phone_number')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                              
                                
                                
                            </div>
                                

                            

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.manager_pembiayaan_dana.index')}}" class="btn btn-secondary">Cancel</a>
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

            

        });
    </script>
@endsection