@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new Photo Motor</div>
                    <div class="card-body">

                        <dl class="row">
                            <dt class="col-sm-3 text-md-right">Name</dt>
                            <dd class="col-sm-9">{{$motor->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Pabrikan</dt>
                            <dd class="col-sm-9">{{$motor->pabrikan_motor->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Type</dt>
                            <dd class="col-sm-9">{{$motor->type_motor->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Jenis Transmisi</dt>
                            <dd class="col-sm-9">{{$motor->jenis_transmisi->name}}</dd>

                            <dt class="col-sm-3 text-md-right">Kapasitas Mesin</dt>
                            <dd class="col-sm-9">{{$motor->kapasitas_mesin->cc . ' cc'}}</dd>

                            <dt class="col-sm-3 text-md-right">Warna</dt>
                            <dd class="col-sm-9">
                                @if($motor->warna_motor) 
                                    @foreach($motor->warna_motor as $warna_motor)
                                        <span class="badge badge-secondary">{{$warna_motor->name}}</span> 
                                    @endforeach
                                @endif
                            </dd>

                            <dt class="col-sm-3 text-md-right">Harga</dt>
                            <dd class="col-sm-9">{{'Rp. '. $motor->harga}}</dd>
                        </dl>

                        <form action="{{route('admin.photo_motor.store', $motor->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}


                            <div class="form-group row">
                                <label for="photo" class="col-sm-2 col-form-label text-md-right">Upload Photo</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" name="photo" id="photo">
                                    @if($errors->has('photo'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('photo')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    <a href="{{route('admin.motor.index')}}" class="btn btn-secondary">Cancel</a>
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

            $('#warna_motor_ids').select2();
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
@endsection