@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Motor
                    </div>
                    <div class="card-body">
                        <div id="table-data-toolbar">
                            <a href="{{route('admin.motor.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
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
                url: '{{route('admin.motor.json')}}',
                columns: [
                    {
                        field: 'id',
                        title: 'Action',
                        class: 'text-nowrap',
                        formatter: function(value, row, index){
                            
                            return `
                                <a class="btn btn-sm btn-info" href="${base_url + '/admin/motor/' + value + '/edit'}"><i class="fa fa-edit"></i> Edit</a>
                                
                                <form method="POST" action="${base_url + '/admin/motor/' + value}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete  data ${row.name}?')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                </form>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-edit"></i> Manage
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="${base_url + '/admin/photo_motor/' + value}"> Manage Photo (${row.photo_motor.length})</a>
                                        <a class="dropdown-item" href="${base_url + '/admin/angsuran_motor/' + value}"> Manage Angsuran</a>
                                        <a class="dropdown-item" href="${base_url + '/admin/testimoni_motor/' + value}""> Manage Testimoni (${row.testimoni_motor.length})</a>
                                        <a class="dropdown-item" href="${base_url + '/admin/spesifikasi_motor/' + value}""> Manage Spesifikasi</a>
                                    </div>
                                </div>

                            `;
                        }
                    },
                    {
                        field: 'id',
                        title: 'ID',
                    },
                    {
                        field: 'name',
                        title: 'Name',
                    },
                    {
                        field: 'slug',
                        title: 'Slug',
                    },
                    {
                        field: 'tahun',
                        title: 'Tahun Keluaran',
                    },
                    {
                        field: 'pabrikan_motor',
                        title: 'Pabrikan Motor',
                        formatter: function(value, row, index){
                            return value.name;
                        }
                    },
                    {
                        field: 'type_motor',
                        title: 'Type Motor',
                        formatter: function(value, row, index){
                            return value.name;
                        }
                    },

                    {
                        field: 'kapasitas_mesin',
                        title: 'Kapasitas Mesin',
                        formatter: function(value, row, index){
                            return value.cc + ' cc';
                        }
                    },

                    {
                        field: 'warna_motor',
                        title: 'Warna Motor',
                        formatter: function(value, row, index){
                            var html = '';
                            if(value.length > 0){
                                value.forEach(function(warna_motor){
                                    html += '<span data-id="'+ warna_motor.id +'" class="badge badge-secondary">'+ warna_motor.name +'</span> ';
                                });
                            }
                            return html;
                        }
                    },
                    {
                        field: 'harga',
                        title: 'Harga',
                        formatter: function(value, row, index){
                            if(value !== null){
                                return 'Rp.' +  number_format(value, 0, ',', '.');
                            }
                        }
                    },
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