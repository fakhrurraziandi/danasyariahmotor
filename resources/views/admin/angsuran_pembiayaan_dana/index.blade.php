@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Angsuran Pembiayaan Dana 
                    </div>
                    <div class="card-body">

                        
                        <div id="table-data-toolbar">
                            <a href="{{route('admin.angsuran_pembiayaan_dana.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
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
                url: '{{route('admin.angsuran_pembiayaan_dana.json')}}',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/angsuran_pembiayaan_dana/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                <form method="POST" action="${base_url + '/admin/angsuran_pembiayaan_dana/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to  delete   data ${row.dp}?')">
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
                    // {
                    //     field: 'wilayah_pembiayaan_dana',
                    //     title: 'Wilayah',
                    //     formatter: function(wilayah_pembiayaan_dana){
                    //         if(wilayah_pembiayaan_dana){
                    //             return wilayah_pembiayaan_dana.name;
                    //         }
                    //     }
                    // },
                    // {
                    //     field: 'tahun',
                    //     title: 'Tahun',
                    // },
                    // {
                    //     field: 'status_stnk',
                    //     title: 'Status STNK',
                    //     formatter: function(status_stnk){
                    //         if(status_stnk){
                    //             return status_stnk.name;
                    //         }
                    //     }
                    // },
                    // {
                    //     field: 'status_bpkb',
                    //     title: 'Status BPKB',
                    //     formatter: function(status_stnk){
                    //         if(status_stnk){
                    //             return status_stnk.name;
                    //         }
                    //     }
                    // },
                    {
                        field: 'pencairan',
                        title: 'Pencairan',
                        formatter: function(pencairan, row, index){
                            if(pencairan){
                                return 'Rp. '+ number_format(pencairan, 0, ',', '.');
                            }
                        }
                    },
                    
                    @foreach($list_tempo_angsuran_pembiayaan_dana as $tempo_angsuran_pembiayaan_dana)
                        {
                            field: '{{$tempo_angsuran_pembiayaan_dana->tempo}}',
                            title: '{{$tempo_angsuran_pembiayaan_dana->tempo}} bulan',
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