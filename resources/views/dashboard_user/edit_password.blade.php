<?php 
use Laravolt\Indonesia\Models\Province;
?>

@extends('dashboard_user.main')

@section('sub_content')

    <?php $user = auth()->user(); ?>
    

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2>Edit Password</h2>
            <hr>
            
            <form method="POST" action="{{ route('dashboard_user.update_password') }}" aria-label="{{ __('Password') }}">
    
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Update!</strong> Password Successfully updated!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" class="form-control {{ $errors->has('old_password') ? ' is-invalid' : '' }}" id="old_password" name="old_password" placeholder="Old Password" value="" autofocus>
                            @if ($errors->has('old_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" class="form-control {{ $errors->has('new_password') ? ' is-invalid' : '' }}" id="new_password" name="new_password" placeholder="New Password" value="" autofocus>
                            @if ($errors->has('new_password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="new_password_confirmation">New Password</label>
                            <input type="password" class="form-control {{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" id="new_password_confirmation" name="new_password_confirmation" placeholder="New Password" value="" autofocus>
                            @if ($errors->has('new_password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        

                        <p class="text-center">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                {{ __('Update') }}
                            </button>
                        </p>
                    </div>
                </div>


            </form>
            
        </div>
    </div>
                                    
               
   

        
@endsection


@section('scripts')
    <script>
        $(function(){

            $('#province_id').select2();
            $('#city_id').select2();
            $('#district_id').select2();

            function provinceIdOnChangeHandler(){
                var json = $('#province_id').find('option:selected').data('json');
                if(json){

                    var city_id = <?php echo (old('city_id', $user->city_id) ? $user->city_id : 'NULL') ?>;
                    $('#city_id').find('option').remove();
                    $('#city_id').append('<option>:: Kota ::</option>')
                    json.cities.forEach(function(city){
                        $('#city_id').append('<option '+ (city.id == city_id ? 'selected=""' : '') +' data-json=\''+ JSON.stringify(city) +'\' value="'+ city.id +'">'+ city.name +'</option>')
                    });
                }
            }
            $('#province_id').on('change', provinceIdOnChangeHandler);
            provinceIdOnChangeHandler();
            
            function cityIdOnChangeHandler(){
                var json = $('#city_id').find('option:selected').data('json');
                if(json){
                    var district_id = <?php echo (old('district_id', $user->district_id) ? $user->district_id : 'NULL') ?>;
                    $('#district_id').find('option').remove();
                    $('#district_id').append('<option>:: Kecamatan ::</option>')
                    json.districts.forEach(function(district){
                        $('#district_id').append('<option '+ (district.id == district_id ? 'selected=""' : '') +' value="'+ district.id +'">'+ district.name +'</option>')
                    });
                }
            }
            $('#city_id').on('change', cityIdOnChangeHandler);
            cityIdOnChangeHandler();
        });
    </script>
@endsection