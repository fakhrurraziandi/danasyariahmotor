
@extends('cs_kredit_motor.main')

@section('sub_content')

    

    <h1 class="mb-20">Profile <small class="h6"><a href="{{route('cs_kredit_motor.edit_profile')}}"><i class="fa fa-pencil"></i> Edit Profile</a></small></h1>
    <hr>
    <form>

        <div class="form-group row align-items-center">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" readonly class="form-control-plaintext" id="email" name="email" value="{{old('email', $cs_kredit_motor->email)}}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="name" name="name" value="{{old('name', $cs_kredit_motor->name)}}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="phone_number" class="col-sm-3 col-form-label">Phone Number </label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" id="phone_number" name="phone_number" value="{{old('phone_number', $cs_kredit_motor->phone_number)}}">
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label for="phone_number" class="col-sm-3 col-form-label">Wilayah </label>
            <div class="col-sm-9">
                @foreach($cs_kredit_motor->wilayah_kredit_motor as $wilayah_kredit_motor)
                    <span class="badge badge-primary">{{$wilayah_kredit_motor->name}}</span> 
                @endforeach
            </div>
        </div>

        {{-- <div class="form-group row align-items-center">
            
            <div class="col-sm-9 offset-sm-3">
                <a href="{{route('cs_kredit_motor.index')}}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
            </div>
        </div> --}}
    </form>
                                    
               
   

        
@endsection
