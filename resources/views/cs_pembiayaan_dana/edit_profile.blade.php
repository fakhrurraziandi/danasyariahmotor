
@extends('cs_pembiayaan_dana.main')

@section('sub_content')



    <h1 class="mb-20">Edit Profile</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('cs_pembiayaan_dana.update_profile', [$cs_pembiayaan_dana->id])}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="form-group row ">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" value="{{old('email', $cs_pembiayaan_dana->email)}}">
            </div>
        </div>

        <div class="form-group row ">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $cs_pembiayaan_dana->name)}}">
            </div>
        </div>

        <div class="form-group row ">
            <label for="phone_number" class="col-sm-3 col-form-label">Phone Number</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number', $cs_pembiayaan_dana->phone_number)}}">
            </div>
        </div>

        <div class="form-group row ">
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
        </div>

        <div class="form-group row ">
            
            <div class="col-sm-9 offset-sm-3">
                <a href="{{route('cs_pembiayaan_dana.index')}}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
            </div>
        </div>
    </form>
                                    



        
@endsection
