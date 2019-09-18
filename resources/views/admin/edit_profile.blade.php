
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Edit Profile</h6>
                    </div>
                    <div class="card-body">
                        @if(Session::get('update_profile_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> update profile is success!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        

                        <form action="{{route('admin.update_profile')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}
                    
                            <div class="form-group row ">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email', $admin->email)}}">
                                </div>
                            </div>
                    
                            <div class="form-group row ">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $admin->name)}}">
                                </div>
                            </div>
                    
                            <div class="form-group row ">
                                <label for="phone_number" class="col-sm-3 col-form-label">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number', $admin->phone_number)}}">
                                </div>
                            </div>
                    
                            {{-- <div class="form-group row ">
                                <label for="photo_profile" class="col-sm-3 col-form-label">Photo Profile</label>
                                <div class="col-sm-9">
                                    <div class="input-group ">
                                        <div class="custom-file ">
                                            <input type="file" class="custom-file-input" id="photo_profile" name="photo_profile">
                                            <label class="custom-file-label" for="photo_profile">Choose file</label>
                                        </div>
                                    </div>
                    
                                    <small class="text-muted">Abaikan jika tidak ingin mengganti photo profile</small>
                                    
                                </div>
                            </div> --}}
                    
                            <div class="form-group row ">
                                
                                <div class="col-sm-9 offset-sm-3">
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