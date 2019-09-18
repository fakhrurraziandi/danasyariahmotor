@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit tempo angsuran motor</div>
                    <div class="card-body">

                        <form action="{{route('admin.tempo_angsuran_motor.update', $tempo_angsuran_motor->id)}}" method="POST">

                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempo">Tempo (Satuan Bulan)</label>
                                        <input type="text" class="form-control {{$errors->has('tempo') ? 'is-invalid' : ''}}" id="tempo" name="tempo" placeholder="Tempo" value="{{old('tempo', $tempo_angsuran_motor->tempo)}}">
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

            

        });
    </script>
@endsection