
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Change Password</h6>
                    </div>
                    <div class="card-body">
                        @if(Session::get('update_password_success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> update password is success!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        

                        <form action="{{route('admin.update_password')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="form-group row ">
                                <label for="old_password" class="col-sm-3 col-form-label">Old Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control {{$errors->has('old_password') ? 'is-invalid' : ''}}" id="old_password" name="old_password">
                                    @if($errors->has('old_password'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('old_password')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control {{$errors->has('old_password') ? 'is-invalid' : ''}}" id="new_password" name="new_password">
                                    @if($errors->has('new_password'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('new_password')}}
                                        </div>
                                    @endif
                                </div>
                                
                            </div>

                            <div class="form-group row ">
                                <label for="new_password_confirmation" class="col-sm-3 col-form-label">Retype New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                            </div>

                            <div class="form-group row ">
                                
                                <div class="col-sm-9 offset-sm-3">
                                    <a href="{{route('cs_pembiayaan_dana.index')}}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection