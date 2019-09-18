@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Edit angsuran pembiayaan dana</div>
                    <div class="card-body">
                       

                        <form action="{{route('admin.angsuran_pembiayaan_dana.update', $angsuran_pembiayaan_dana->id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PUT')}}


                            <div class="form-group row">
                                
                                <label for="pencairan" class="col-sm-2 col-form-label text-md-right">Pencairan</label>
                                <div class="col-sm-3">
                                <input type="text" class="form-control {{$errors->has('pencairan') ? 'is-invalid' : ''}}" name="pencairan" id="pencairan" value="{{old('pencairan', $angsuran_pembiayaan_dana->pencairan)}}">
                                    @if($errors->has('pencairan'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('pencairan')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                
                                <label for="tahun" class="col-sm-2 col-form-label text-md-right">Tahun</label>
                                <div class="col-sm-3">
                                    <select class="form-control {{$errors->has('tahun') ? 'is-invalid' : ''}}" name="tahun" id="tahun">
                                        <option></option>
                                        @for($i = 2000; $i < date('Y'); $i++)
                                            <option {{old('tahun', $angsuran_pembiayaan_dana->tahun) == $i ? 'selected=""' : ''}} value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    @if($errors->has('tahun'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('tahun')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <label for="status_stnk_id" class="col-sm-2 col-form-label text-md-right">Status STNK</label>
                                <div class="col-sm-3">
                                    <select class="form-control {{$errors->has('status_stnk_id') ? 'is-invalid' : ''}}" name="status_stnk_id" id="status_stnk_id">
                                        <option></option>
                                        @foreach($list_status_stnk as $status_stnk)
                                            <option {{old('status_stnk_id', $angsuran_pembiayaan_dana->status_stnk_id) == $status_stnk->id ? 'selected=""' : ''}} value="{{$status_stnk->id}}">{{$status_stnk->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('status_stnk_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('status_stnk_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                <label for="status_bpkb_id" class="col-sm-2 col-form-label text-md-right">Status BPKB</label>
                                <div class="col-sm-3">
                                    <select class="form-control {{$errors->has('status_bpkb_id') ? 'is-invalid' : ''}}" name="status_bpkb_id" id="status_bpkb_id">
                                        <option></option>
                                        @foreach($list_status_bpkb as $status_bpkb)
                                            <option {{old('status_bpkb_id', $angsuran_pembiayaan_dana->status_bpkb_id) == $status_bpkb->id ? 'selected=""' : ''}} value="{{$status_bpkb->id}}">{{$status_bpkb->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('status_bpkb_id'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('status_bpkb_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div> --}}

                            @foreach($list_tempo_angsuran_pembiayaan_dana as $tempo_angsuran_pembiayaan_dana)
                                <div class="form-group row">
                                    <label for="tempo_angsuran_pembiayaan_dana_id" class="col-sm-2 col-form-label text-md-right">{{$tempo_angsuran_pembiayaan_dana->tempo . ' Bulan'}}</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control tempo_angsuran_pembiayaan_dana_id {{$errors->has('tempo_angsuran_pembiayaan_dana_id') ? 'is-invalid' : ''}}" name="tempo_angsuran_pembiayaan_dana_id[{{$tempo_angsuran_pembiayaan_dana->id}}]" id="tempo_angsuran_pembiayaan_dana_id" value="<?php  

                                            
                                            $angsuran_pembiayaan_dana_detail = $angsuran_pembiayaan_dana->angsuran_pembiayaan_dana_detail->where('tempo_angsuran_pembiayaan_dana_id', $tempo_angsuran_pembiayaan_dana->id)->first();

                                            if($angsuran_pembiayaan_dana_detail){
                                                echo old('tempo_angsuran_pembiayaan_dana_id['. $tempo_angsuran_pembiayaan_dana->id .']', $angsuran_pembiayaan_dana_detail->angsuran_per_bulan);
                                            }else{
                                                echo old('tempo_angsuran_pembiayaan_dana_id['. $tempo_angsuran_pembiayaan_dana->id .']');
                                            }


                                        ?>">
                                        @if($errors->has('tempo_angsuran_pembiayaan_dana_id'))
                                            <div class="invalid-feedback">
                                                {{$errors->first('tempo_angsuran_pembiayaan_dana_id')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            

                            

                            <div class="form-group row">
                                
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('admin.angsuran_pembiayaan_dana.index')}}" class="btn btn-secondary">Cancel</a>
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

            $('#dp').mask('000.000.000.000.000', {reverse: true});
            $('.tempo_angsuran_pembiayaan_dana_id').mask('000.000.000.000.000', {reverse: true});
        });
    </script>
@endsection