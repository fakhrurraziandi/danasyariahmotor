<?php use Laravolt\Indonesia\Models\Province; ?>
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Report User</div>
                    <div class="card-body">

                        <form action="{{route('admin.user.report_pdf')}}" method="GET">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="from" class="col-sm-2 col-form-label">From</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="from" name="from" value="{{old('from')}}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="to" class="col-sm-2 col-form-label">To</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="to" name="to" value="{{old('to')}}">
                                </div>
                            </div>


                            
                            <div class="row mt-3">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Print</button>
                                    <a href="{{route('admin.user.index')}}" class="btn btn-secondary">Cancel</a>
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

            function provinceIdOnChangeHandler(){
                var json = $('#province_id').find('option:selected').data('json');
                if(json){
                    $('#city_id').find('option').remove();
                    $('#city_id').append('<option>:: Kota ::</option>')
                    json.cities.forEach(function(city){
                        $('#city_id').append('<option value="'+ city.id +'">'+ city.name +'</option>')
                    });
                }
                
            }
            $('#province_id').on('change', provinceIdOnChangeHandler);
            // provinceIdOnChangeHandler(); 

        });
    </script>
@endsection