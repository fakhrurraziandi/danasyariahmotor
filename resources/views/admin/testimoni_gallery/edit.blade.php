@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit testimoni gallery</div>
                    <div class="card-body">

                        <form action="{{route('admin.testimoni_gallery.update', $testimoni_gallery->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" name="name" placeholder="Name" value="{{old('name', $testimoni_gallery->name)}}">
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('name')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control {{$errors->has('photo') ? 'is-invalid' : ''}}" id="photo" name="photo" placeholder="Photo">
                                        <small class="text-muted">ignore if you don't want to change photos</small>
                                        @if($errors->has('photo'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('photo')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select class="form-control {{$errors->has('type') ? 'is-invalid' : ''}}" id="type" name="type">
                                            <option {{old('type', $testimoni_gallery->type) == 'pembiayaan_dana' ? 'selected=""' : ''}} value="pembiayaan_dana">Pembiayaan Dana</option>
                                            <option {{old('type', $testimoni_gallery->type) == 'kredit_motor' ? 'selected=""' : ''}} value="kredit_motor">Kredit Motor</option>
                                        </select>
                                        @if($errors->has('type'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('type')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <script>
                                    $(function(){

                                        function onTypeChangeHandler(e){
                                            var type = $('#type').val();
                                            if(type == 'pembiayaan_dana'){
                                                $('#col-wilayah_pembiayaan_dana_id').show();
                                                $('#col-wilayah_kredit_motor_id').hide();
                                            }

                                            if(type == 'kredit_motor'){
                                                $('#col-wilayah_pembiayaan_dana_id').hide();
                                                $('#col-wilayah_kredit_motor_id').show();
                                            }
                                        }
                                        $('#type').on('change', onTypeChangeHandler);
                                        onTypeChangeHandler();
                                    });
                                </script>

                                <div class="col-md-6" id="col-wilayah_pembiayaan_dana_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="wilayah_pembiayaan_dana_id">Wilayah Pembiayaan Dana</label>
                                        <select class="form-control {{$errors->has('wilayah_pembiayaan_dana_id') ? 'is-invalid' : ''}}" id="wilayah_pembiayaan_dana_id" name="wilayah_pembiayaan_dana_id">
                                            <option value=""></option>
                                            @foreach(App\WilayahPembiayaanDana::all() as $wilayah_pembiayaan_dana)
                                                <option {{old('wilayah_pembiayaan_dana_id', $testimoni_gallery->wilayah_pembiayaan_dana_id) == $wilayah_pembiayaan_dana->id ? 'selected=""' : ''}} value="{{$wilayah_pembiayaan_dana->id}}">{{$wilayah_pembiayaan_dana->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('wilayah_pembiayaan_dana_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('wilayah_pembiayaan_dana_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6" id="col-wilayah_kredit_motor_id" style="display: none;">
                                    <div class="form-group">
                                        <label for="wilayah_kredit_motor_id">Wilayah Kredit Motor</label>
                                        <select class="form-control {{$errors->has('wilayah_kredit_motor_id') ? 'is-invalid' : ''}}" id="wilayah_kredit_motor_id" name="wilayah_kredit_motor_id">
                                            <option value=""></option>
                                            @foreach(App\WilayahKreditMotor::all() as $wilayah_kredit_motor)
                                                <option {{old('wilayah_kredit_motor_id', $testimoni_gallery->wilayah_kredit_motor_id) == $wilayah_kredit_motor->id ? 'selected=""' : ''}} value="{{$wilayah_kredit_motor->id}}">{{$wilayah_kredit_motor->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('wilayah_kredit_motor_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('wilayah_kredit_motor_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea class="form-control {{$errors->has('message') ? 'is-invalid' : ''}}" id="message" name="message" placeholder="Message" rows="7">{{old('message', $testimoni_gallery->message)}}</textarea>
                                        @if($errors->has('message'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('message')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                


                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.testimoni_gallery.index')}}" class="btn btn-secondary">Cancel</a>
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
            function onNameInputHandler(){
                const name = $('#name').val();
                $('#slug').val(slugify(name.toLowerCase()));
            }
            $('#name').on('input', onNameInputHandler);
        });
    </script>
@endsection