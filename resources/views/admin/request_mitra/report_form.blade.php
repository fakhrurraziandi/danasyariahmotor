<?php use Laravolt\Indonesia\Models\Province; ?>
@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Report Mitra</div>
                    <div class="card-body">

                        <form action="{{route('admin.request_mitra.report_pdf')}}" method="GET">

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

                            <div class="form-group row">
                                <label for="mitra_status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="mitra_status__1" name="mitra_status[]" class="custom-control-input" value="1" checked="">
                                        <label class="custom-control-label" for="mitra_status__1">Requested</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="mitra_status__2" name="mitra_status[]" class="custom-control-input" value="2" checked="">
                                        <label class="custom-control-label" for="mitra_status__2">Activated</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="mitra_status__3" name="mitra_status[]" class="custom-control-input" value="3" checked="">
                                        <label class="custom-control-label" for="mitra_status__3">Denied</label>
                                    </div>
                                </div>
                            </div>




                            
                            <div class="row mt-3">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Print</button>
                                    <a href="{{route('admin.request_mitra.index')}}" class="btn btn-secondary">Cancel</a>
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