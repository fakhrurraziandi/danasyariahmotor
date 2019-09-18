@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Angsuran Motor <strong>{{$motor->name}}</strong>
                    </div>
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

                        
                        <div id="table-data-toolbar">
                            <a href="{{route('admin.motor.index')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Motor</a>
                            <a href="{{route('admin.angsuran_motor.create', $motor->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                        </div>
                        <table id="table-data"></table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function(){

            $('#table-data').bootstrapTable({
                toolbar: "#table-data-toolbar",
                classes: 'table table-striped table-no-bordered',
                search: true,
                showRefresh: true,
                iconsPrefix: 'fa',
                sortOrder: 'DESC',
                // showToggle: true,
                // showColumns: true,
                // showExport: true,
                // showPaginationSwitch: true,
                pagination: true,
                pageList: [10, 25, 50, 100, 'ALL'],
                // showFooter: false,
                sidePagination: 'server',
                url: '{{route('admin.angsuran_motor.json', $motor->id)}}',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/angsuran_motor/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <form method="POST" action="${base_url + '/admin/angsuran_motor/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to  delete   data ${row.dp}?')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            `;
                        }
                    },
                    {
                        field: 'id',
                        title: 'ID',
                    },
                    {
                        field: 'dp',
                        title: 'DP',
                        formatter: function(dp, row, index){
                            if(dp){
                                return 'Rp. '+ number_format(dp, 0, ',', '.');
                            }
                        }
                    },

                    {
                        field: 'discount_dp',
                        title: 'Discount DP',
                        formatter: function(discount_dp, row, index){
                            if(discount_dp){
                                return 'Rp. '+ number_format(row.discount_dp_calculated, 0, ',', '.') + ' ('+ row.discount_dp +'%)';
                            }
                        }
                    },
                    
                    @foreach($list_tempo_angsuran_motor as $tempo_angsuran_motor)
                        {
                            field: '{{$tempo_angsuran_motor->tempo}}',
                            title: '{{$tempo_angsuran_motor->tempo}} bulan',
                            formatter: function(value, row, index){
                                if(value){
                                    return 'Rp. '+ number_format(value, 0, ',', '.');
                                }
                            }
                        },

                    @endforeach

                    {
                        field: 'created_at',
                        title: 'Created at',
                    },
                    {
                        field: 'updated_at',
                        title: 'Updated at',
                    },
                ]
            });

        });
    </script>
@endsection