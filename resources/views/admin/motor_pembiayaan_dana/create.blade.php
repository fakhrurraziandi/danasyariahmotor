@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new motor (Pembiayaan Dana)</div>
                    <div class="card-body">

                        <form action="{{route('admin.motor_pembiayaan_dana.store')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}

                            

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-md-right">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="pabrikan_motor_id" class="col-sm-2 col-form-label text-md-right">Pabrikan Motor</label>
                                <div class="col-sm-10">
                                    <select name="pabrikan_motor_id" id="pabrikan_motor_id" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                                        <option value=""></option>
                                        @foreach($list_pabrikan_motor as $pabrikan_motor)
                                            <option {{$pabrikan_motor->id == old('pabrikan_motor_id') ? 'selected=""' : ''}} value="{{$pabrikan_motor->id}}">{{$pabrikan_motor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('pabrikan_motor_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('pabrikan_motor_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.motor_pembiayaan_dana.index')}}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>

                            

                            
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

