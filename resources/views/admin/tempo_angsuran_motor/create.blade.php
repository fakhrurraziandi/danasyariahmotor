@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Add new tempo angsuran motor</div>
                    <div class="card-body">

                        <form action="{{route('admin.tempo_angsuran_motor.store')}}" method="POST">

                            {{csrf_field()}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempo">Tempo (Satuan Bulan)</label>
                                        <input type="number" class="form-control {{$errors->has('tempo') ? 'is-invalid' : ''}}" id="tempo" name="tempo" placeholder="Tempo" value="{{old('tempo')}}">
                                        @if($errors->has('tempo'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('tempo')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.tempo_angsuran_motor.index')}}" class="btn btn-secondary">Cancel</a>
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