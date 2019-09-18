@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit kapasitas mesin</div>
                    <div class="card-body">

                        <form action="{{route('admin.kapasitas_mesin.update', $kapasitas_mesin->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cc">CC</label>
                                        <input type="number" class="form-control {{$errors->has('cc') ? 'is-invalid' : ''}}" id="cc" name="cc" placeholder="CC" value="{{old('cc', $kapasitas_mesin->cc)}}">
                                        @if($errors->has('cc'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('cc')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.kapasitas_mesin.index')}}" class="btn btn-secondary">Cancel</a>
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