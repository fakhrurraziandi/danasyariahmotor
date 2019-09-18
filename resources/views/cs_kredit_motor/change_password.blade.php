
@extends('cs_kredit_motor.main')

@section('sub_content')


    <h1 class="mb-20">Change Password</h1>
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

    <form action="{{route('cs_kredit_motor.update_password', [$cs_kredit_motor->id])}}" method="POST" enctype="multipart/form-data">

        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="form-group row ">
            <label for="old_password" class="col-sm-3 col-form-label">Old Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
        </div>

        <div class="form-group row ">
            <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="new_password" name="new_password">
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
                <a href="{{route('cs_kredit_motor.index')}}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
            </div>
        </div>
    </form>
                                    



        
@endsection
